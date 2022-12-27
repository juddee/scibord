<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Program_models');
        $this->load->model('Category_models');
        $this->load->helper('cookie');  
    }
 
    function index()
    {
        
        $data['title'] = 'Live Free & Sponsored Programs';
        $data['active_navbar'] = 'programs';
        $data['active_status_bar'] = 'live';
        $programs = $this->Program_models->get_programs(1)->result_array();
        $new_program = $this->add_category_name($programs);
        $_SESSION['programs'] = $new_program;
        if(isset($_REQUEST["cat"]))
        {
            $category_slug = $_REQUEST["cat"];
            $category_details = $this->Category_models->get_category_by_slug($category_slug)->row();
            $programs = $this->Program_models->get_programs_by_category($category_details->id,1)->result_array();
            $new_program = $this->add_category_name($programs);
            $_SESSION['programs'] = $new_program;
            
        }
        
        $this->load->view('programs/home',$data);
    }

    function get_programs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            echo json_encode($_SESSION['programs']);
        }
    }

    function all_programs()
    {
        
        $data['title'] = 'All Free & Sponsored Programs';
        $data['active_navbar'] = 'programs';
        $data['active_status_bar'] = 'all';
        $programs = $this->Program_models->get_programs()->result_array();
        $new_program = $this->add_category_name($programs);
        $_SESSION['programs'] = $new_program;

        if(isset($_REQUEST["cat"]))
        {
            $category_slug = $_REQUEST["cat"];
            $category_details = $this->Category_models->get_category_by_slug($category_slug)->row();
            $programs = $this->Program_models->get_programs_by_category($category_details->id)->result_array();
            $new_program = $this->add_category_name($programs);
            $_SESSION['programs'] = $new_program;
            
        }
        $this->load->view('programs/home',$data);
    }

    function add_category_name($programs)
    {
        
        if(!empty($programs))
        {
            foreach($programs as $key=>$row)
            {
                $category = $this->Category_models->get_category($row['category'])->row();
                $programs[$key]['category_name'] = $category->name;
            }
        }
        return $programs;

    }

}

