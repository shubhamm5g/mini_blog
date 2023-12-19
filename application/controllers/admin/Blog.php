<?php
defined("BASEPATH") OR exit("blog exit");

class Blog extends CI_Controller{

    public function index(){
        $data=[];
        $query=$this->db->query("select * from articles ORDER BY blogid desc");
        $data['result']=$query->result_array();
        $this->load->view("admin_panel/viewblog",$data);
    }

    public function addblog(){
        $this->load->view("admin_panel/addblog");
    }

    public function addblog_post(){

        if(isset($_FILES) && !empty($_FILES)){
            //Image pass to upload

            $config['upload_path']          = './assets/upload/blogimg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('blog_img'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('upload_error', 'yes');
                    redirect("admin/blog/addblog");
                    // die("error uploading file");
                    // $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    echo "<pre>";
                    print_r($data);
                    echo "</pre>";
                    echo $data["upload_data"]["file_name"];

                    $blog_img="assets/upload/blogimg/".$data["upload_data"]["file_name"];
                    $blog_title=$_POST['blog_title'];
                    $blog_desc=$_POST['blog_desc'];
                    $status=$_POST['status'];

                    $query=$this->db->query("INSERT INTO `articles`( `blog_title`, `blog_desc`, `blog_img`,`status`) VALUES ('$blog_title','$blog_desc','$blog_img','$status')");
                    if($query){
                        $this->session->set_flashdata('inserted', 'yes');
                        redirect("admin/blog/addblog");

                    }
                    else{
                        $this->session->set_flashdata('inserted', 'no');
                        redirect("admin/blog/addblog");

                    }
                    // $this->load->view('upload_success', $data);
            }

        }else{
            //Image not pass

        }
    }

    public function viewblog(){
        $data=[];
        $query=$this->db->query("select * from articles ORDER BY blogid desc");
        $data['result']=$query->result_array();
        $this->load->view("admin_panel/viewblog",$data);
    }


    public function deleteblog(){
        $id=$_POST['id'];
        $query=$this->db->query("delete from articles where blogid='$id'");
        if($query){
            echo "deleted";
        }else{
            echo "notdeleted";
        }
    }

    
    public function editblog($blog_id){
        $query=$this->db->query("SELECT `blogid`,`blog_title`, `blog_desc`, `blog_img`,`status` FROM `articles` WHERE `blogid`= $blog_id;
        ");
        
        $data['result']=$query->result_array();
        $this->load->view("admin_panel/edit_blog",$data);

    }

    public function editblog_post(){
        $blogid=$_POST['blogid'];
        if($_FILES['blog_img']['name']){

            $config['upload_path']          = './assets/upload/blogimg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('blog_img'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    die("error uploading file");
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $img_name=$data['upload_data']['file_name'];
                    $filename='assets/upload/blogimg/'.$img_name;
                    $blog_title=$_POST['blog_title'];
                    $blog_desc=$_POST['blog_desc'];
                    $status=$_POST['status'];
                    
                    $query=$this->db->query("update articles set blog_title='$blog_title',blog_desc='$blog_desc',blog_img='$filename',status='$status' where blogid='$blogid'");
                    if($query){
                        $this->session->set_flashdata('updated', 'yes');
                        redirect("admin/blog/viewblog");
                    }else{

                    }
            }
        }else{
            $this->session->set_flashdata('updated', 'no');
            redirect("admin/blog/editblog/".$blogid);
        }

    }


   


}

?>