<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Program_models extends CI_Model
{

    function get_programs_by_category($category_id,$status=null)
    {
        if($status!=null){
            $query = $this->db->get_where('programs', array('category'=> $category_id, 'status' => $status));
            return $query;
        }

        $query = $this->db->get_where('programs', array('category'=> $category_id));
        return $query;
    

    }

    function get_programs($status=null)
    {
        if($status!=null){
            $query = $this->db->get_where('programs', array('status' => $status));
            return $query;
        }

        $query = $this->db->get('programs');
        return $query;
    

    }


}