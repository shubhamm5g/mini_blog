<?php

class article_model extends CI_Model{
    function fetch_all_article(){
        $query= $this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE `status`= '1' ");
        return $query->result_array();
    }

    function fetch_blog_details($blog_id){
        $query= $this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE `blogid`= '$blog_id' ");
        return $query->result_array();
    }
}

?>