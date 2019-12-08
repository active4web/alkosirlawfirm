<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends MX_Controller{
    public function __construct(){
		parent::__construct();
		$this->lang->load('admin', get_lang() );
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('data','','true');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url','text'));
        $this->load->library('lib_pagination');
        $this->load->library('CKEditor');
        $this->load->library('CKFinder');
        $this->ckfinder->SetupCKEditor($this->ckeditor,'../../design/ckfinder/');  
        $this->load->library('image_lib');	    
    }

    public function gen_random_string()
    {
        $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
        $final_rand='';
        for($i=0;$i<4; $i++) {
            $final_rand .= $chars[ rand(0,strlen($chars)-1)];
        }
        return $final_rand;
    }

    public function index(){
    redirect(base_url().'admin/files/our_files','refresh');
    }
 public function our_files(){
        $pg_config['sql'] = $this->data->get_sql('profiles_files','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/files/our_files", $data); 
    }

 public function add_files(){
        $this->load->view("admin/files/add_files"); 
    }



    public function product_action(){
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');

		
		$data['creation_date'] =date("Y-d-m");
         $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $this->db->insert('profiles_files',$data);
        $id = $this->db->insert_id();
    if($_FILES['file']['name']!=""){
        $file=$_FILES['file']['name'];
        $file_name="file";
        $config=get_img_config('profiles_files','uploads/files/',$file,$file_name,'file_pdf','gif|jpg|png|jpeg|pdf|doc|xlsx|docx|xls',50000000,50000000,50000000,array('id'=>$id));

            }
        $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
       redirect(base_url().'admin/files/','refresh');
    }



    public function delete_product(){
        $id_blog = $this->input->get('id_type');
        $check=$this->input->post('check');
if($id_blog!=""){
$img_right = $this->data->get_table_row('profiles_files',array('id'=>$id_blog),'file_pdf'); 
unlink("uploads/files/$img_right");	
 $ret_value=$this->data->delete_table_row('profiles_files',array('id'=>$id_blog)); 
}

if(isset($check) && $check!=""){  
$check=$this->input->post('check');
$length=count($check);
for($i=0;$i<$length;$i++){
$img_right = $this->data->get_table_row('profiles_files',array('id'=>$check[$i]),'file_pdf'); 
unlink("uploads/files/$img_right");	
$ret_value=$this->data->delete_table_row('profiles_files',array('id'=>$check[$i]));    
 }
  }
 $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
redirect(base_url().'admin/files/','refresh');
  }



    function check_view_files(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("profiles_files",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("profiles_files",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("profiles_files",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 

    }



    public function update_files(){
        $id=$this->input->get('id_type');
        $data['data'] = $this->data->get_table_data('profiles_files',array('id'=>$id));
        $this->load->view("admin/files/update_files",$data); 
    }



    function edit_action(){
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
		$id = $this->input->post('id');
		$data['creation_date'] =date("Y-d-m");
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
		$this->data->edit_table_id('profiles_files',array('id'=>$id),$data);
   
    if($_FILES['file']['name']!=""){
        $file=$_FILES['file']['name'];
        $file_name="file";
        $config=get_img_config('profiles_files','uploads/files/',$file,$file_name,'file_pdf','gif|jpg|png|jpeg|pdf|doc|xsxl',50000000,50000000,50000000,array('id'=>$id));

            }
        $this->session->set_flashdata('msg', 'تم التعديل بنجاح');
        redirect(base_url().'admin/files/','refresh');
	}

}

