<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Category_models extends CI_Model
{
    function get_category_by_slug($slug=null)
    {
            $query = $this->db->get_where('category', array('slug' => $slug));
            return $query;
    }

    function get_category($id=null)
    {
        if($id!=null){
            $query = $this->db->get_where('category', array('id' => $id));
            return $query;
        }

        $query = $this->db->get('category');
        return $query;
    

    }
}