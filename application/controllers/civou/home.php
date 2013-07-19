<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function index() {
			if($this->session->userdata('admin_logged_in')){
         $data['dashboard']=true;
           $this->load->view('admin/dashboard',$data);
		   
			}else{
				$this->load->view('admin/login');
				}
    }
//////////////////////////////////////////
  function valid_loign() {
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $user_id = $this->sitead->valid_user_pass($username, $password);
            if (!$user_id) {
                $data['login_error']= true;
                $this->load->view('admin/login', $data);
            } else {
                $login_data = array("admin_logged_in" => true, "admin_id" => $user_id);
                $this->session->set_userdata($login_data);
				$this->dashboard();
            }
        }
    }
///////////////////////////////////////////	
function dashboard(){
	if($this->session->userdata('admin_logged_in')){
		 $data['dashboard']=true;
           $this->load->view('admin/dashboard',$data);
		   

		}else{
			redirect('admin/home/index');
			}
	      
	}
	
///////////////////////////////////////////	
function add_category(){
	if($this->session->userdata('admin_logged_in')){
		 $data['add_category']=true;
		 if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
			$this->load->view('admin/add_category',$data); 
			 }else{
				 $this->load->view('admin/add_category',$data);
				 
				 }
           
		   

		}else{
			redirect('admin/home/index');
			} 
	}		
////////////////////////////////////////
 function insert_category() {
        if($this->session->userdata('admin_logged_in')){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {            
            $this->load->view('civou/view_addblogcategory');
        } else {
            $categoryname = $this->input->post('cat_name');
            if ($this->sitead->addcategory($categoryname)) {
                $data['insert'] =1 ;
               if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
			$this->load->view('admin/add_category',$data); 
			 }else{
				 $this->load->view('admin/add_category',$data);
				 
				 }
         
            } else {
               $data['insert'] =0 ;
              if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
			$this->load->view('admin/add_category',$data); 
			 }else{
				 $this->load->view('admin/add_category',$data);
				 
				 }
         
            }
        }
		}else{
			redirect('admin/home/index');
			}
    }
	///////////////////////////////////////////////
	function insert_sub_category(){
		if($this->session->userdata('admin_logged_in')){
		 $this->load->library('form_validation');
        $this->form_validation->set_rules('categoryid', 'Category Name Not Selected', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Category Name', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
           
            $this->load->view('admin/add_category');
        } else {
            $categoryname = $this->input->post('sub_cat_name');
            $categoryid = $this->input->post('categoryid');
			if ($this->sitead->addsubcategory($categoryname, $categoryid)) {
				$data['sub_insert']=1;
				
				$this->load->view('admin/add_category',$data);
			} else {
			   $data['sub_insert']=0;
				$this->load->view('admin/add_category', $data);
			}
		
        }
	}else{
			redirect('admin/home/index');
			}
		}	

}
?>