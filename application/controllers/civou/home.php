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
			redirect('civou/home/');
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
			redirect('civou/home/');
			} 
	}		
////////////////////////////////////////
 function insert_category() {
        if($this->session->userdata('admin_logged_in')){
        $this->load->library('form_validation');
		
		 
		
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {            
            if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
			$this->load->view('admin/add_category',$data); 
			 }else{
				 $this->load->view('admin/add_category',$data);
				 
				 }
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
			redirect('civou/home/');
			}
    }
	///////////////////////////////////////////////
	function insert_sub_category(){
		if($this->session->userdata('admin_logged_in')){
		 $this->load->library('form_validation');
		  if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
		  }
		 
        $this->form_validation->set_rules('categoryid', 'Category Name Not Selected', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Category Name', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
           
             if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
			$this->load->view('admin/add_category',$data); 
			 }else{
				 $this->load->view('admin/add_category',$data);
				 
				 }
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
			redirect('civou/home/');
			}
		}
		
	////////////////////////////////////////////////
	function delete_category(){
			if($this->session->userdata('admin_logged_in')){
				 if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
			$categoryid = $this->input->post('categoryid');
			     if ($this->sitead->delete($categoryid, 'category')) {
                  	$data['delete']=1;	
				$this->load->view('admin/add_category',$data);
			} else {
			   $data['delete']=0;
				$this->load->view('admin/add_category', $data);   
                }
	
				
		    }else{
			redirect('civou/home/');
			}
		}
		////////////////////////////////////////////////
	function delete_sub_category(){
			if($this->session->userdata('admin_logged_in')){
				 if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
			$sub_id = $this->uri->segment(4);
			
			     if ($this->sitead->delete($sub_id, 'sub_categ')) {
                  	$data['sub_delete']=1;	
				$this->load->view('admin/add_category',$data);
			} else {
			   $data['sub_delete']=0;
				$this->load->view('admin/add_category', $data);   
                }
	
				
		    }else{
			redirect('civou/home/');
			}
		}	
    //////////////////////////////////////////////////////////
	function add_service(){
		if($this->session->userdata('admin_logged_in')){
			if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
			$this->load->view('admin/add_service',$data);
		 }else{
			redirect('civou/home/');
			}
		}		
      /////////////////////////////////////////////////////////
	  
	   //////////////////////////////////////////////////////////
	function edit_service(){
		if($this->session->userdata('admin_logged_in')){
			if($this->sitead->select_category()){
				
			$data['services']=$this->sitead->select_all_service();
			$data['categores']=$this->sitead->select_category();
				 }
			$this->load->view('admin/edit_service',$data);
		 }else{
			redirect('civou/home/');
			}
		}		
      /////////////////////////////////////////////////////////
	  
	  
	      function insert_service() {
        if($this->session->userdata('admin_logged_in')){
		if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('servicename', 'Service Name ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('serviceprice', 'Service Price', 'required|numeric|trim|max_length[10]|xss_clean');
        $this->form_validation->set_rules('search_category', 'Category ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sub_category', 'Sub Category ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('discription', 'Discription ', 'required|trim|xss_clean');
        $this->form_validation->set_rules('instruction', 'Instruction ', 'required|trim|xss_clean');
        $this->form_validation->set_rules('duration', 'duration ', 'required|trim|xss_clean');
        $this->form_validation->set_rules('userfile', 'Photo ', 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
           
            $this->load->view('admin/add_service',$data);
        } else {
            $name = $this->input->post('servicename');
            $price_point = $this->input->post('serviceprice');
            $c_id = $this->input->post('search_category');
            $sc_id = $this->input->post('sub_category');
            $detail = $this->input->post('discription');
            $instruction = $this->input->post('instruction');
            $duration = $this->input->post('duration');
            //**********8
			
		$gallery_path = realpath(APPPATH . '../images_service/');
        $gallery_path_thumb = realpath(APPPATH . '../images_service/thumb/');
        
        $config = array(
            'allowed_types' => 'jpg|JPEG|png|gif',
            'upload_path' => $gallery_path,
            'max_size' => 3000
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            echo $this->upload->display_errors();
        }
        $image_data = $this->upload->data();
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        $config2 = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $gallery_path_thumb,
            'maintain_ratio' => TRUE,
            'width' => 300,
            'height' => 200
        );
        $this->load->library('image_lib', $config2);
        if (!$this->image_lib->resize()) {
           echo $this->upload->display_errors();
        }
			
			/////////////////////
				
		  $photo = $image_data['file_name'];
            //**********8
            $data = array(
                'name' => $name,
                'price_point' => $price_point,
                'c_id' => $c_id,
                'sc_id' => $sc_id,
                'detail' => $detail,
                'instruction' => $instruction,
                'duration'=>$duration,
                'photo_name'=>$photo
            );
            if ($this->sitead->addservice($data)) {
                $data['insert']=1;
                $this->load->view('admin/add_service', $data);
            } else {
                $data['insert']=0;
                $this->load->view('admin/add_service', $data);
            }		
				
				
          
        }
		 }else{
			redirect('civou/home/');
			}
    }
//////////////////////////////////////////////////////////////
function select_edit_service(){
	if($this->session->userdata('admin_logged_in')){
		if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
				 if($this->sitead->select_sub_category()){
			$data['sub_categores']=$this->sitead->select_sub_category();
				 }
				 if($this->sitead->select_all_service()){
				 $data['services']=$this->sitead->select_all_service();
				 }
	 $id = $this->input->post('service_id');
	 
	 $data['select_service']=$this->sitead->select_service_by_id($id);
	 $this->load->view('admin/edit_service',$data);
	}else{
		  redirect('civou/home/');
		 }
	}
	//////////////////////////////////////////////////////////////
function update_service(){
	if($this->session->userdata('admin_logged_in')){
		if($this->sitead->select_category()){
			$data['categores']=$this->sitead->select_category();
				 }
				 if($this->sitead->select_sub_category()){
			$data['sub_categores']=$this->sitead->select_sub_category();
				 }
				  $id = $this->input->post('service_id');
				 $name = $this->input->post('servicename');
            $price_point = $this->input->post('serviceprice');
            $c_id = $this->input->post('search_category');
            $sc_id = $this->input->post('sub_search_category');
            $detail = $this->input->post('discription');
            $instruction = $this->input->post('instruction');
            $duration = $this->input->post('duration'); 
				 
				  $data2 = array(
                'name' => $name,
                'price_point' => $price_point,
                'c_id' => $c_id,
                'sc_id' => $sc_id,
                'detail' => $detail,
                'instruction' => $instruction,
                'duration'=>$duration,
                );
				 if($this->sitead->update_service($data2,$id)){
					 $data['update']=1;
					 }else{
						 $data['update']=0;
						 }
				 
				 
				 if($this->sitead->select_all_service()){
				 $data['services']=$this->sitead->select_all_service();
				 }
	 $id = $this->input->post('service_id');
	 if($this->sitead->select_service_by_id($id)){
	 $data['select_service']=$this->sitead->select_service_by_id($id);
	 }
	 $this->load->view('admin/edit_service',$data);
	}else{
		  redirect('civou/home/');
		 }
	}
}
?>