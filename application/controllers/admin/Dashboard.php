<?php
defined('BASEPATH') OR exit("exit");

class Dashboard extends CI_Controller{
    public function index(){
        if(isset($_SESSION['userid'])){
            // die("session is set");
        $this->load->view('admin_panel/dashboard_view');
        }else{
            redirect('admin/login');
        }

    }
}

?>