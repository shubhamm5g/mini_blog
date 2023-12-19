<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$data=[];
		
		if(isset($_SESSION['userid'])){
			redirect('admin/dashboard');
		}
		if(isset($_SESSION['invalid'])){
			
			$data['error']=$_SESSION['invalid'];
		}
		
		$this->load->view('admin_panel/login_view',$data);
	}

	public function login_post(){
		// print_r($_POST);
		if(!empty($_POST['email']) && !empty($_POST['password'])){
			$email=$_POST['email'];
			$password=$_POST['password'];

			$query=$this->db->query("select * from backenduser WHERE username='$email' AND password='$password'");
			if($query->num_rows()){
				$result=$query->result_array();
				print_r($result);
				$this->session->set_userdata('userid', "$result[0]['uid']");
				redirect('admin/dashboard');

				//credentials are valid 
			}else{
				//credentials are invalid
				$this->session->set_flashdata('invalid', 'Invalid Credentials');
				redirect('admin/login');
			}

		}else{
			
			die("Invaid input");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "session logout";
		redirect("admin/login");
	}
	
}
