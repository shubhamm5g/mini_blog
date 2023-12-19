<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
       
        $this->load->model("article_model",'am');
		$result=$this->am->fetch_all_article();
		$data['result']=$result;
		$this->load->view('home_view',$data);
	}

	public function blog_details($blog_id){
		$this->load->model("article_model",'am');
		$result=$this->am->fetch_blog_details($blog_id);
		$data['result']=$result[0];
		$this->load->view('detailblog_view',$data);
    }
}
