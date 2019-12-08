<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MX_Controller
{

    public function __construct()
    {
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
		$pg_config['sql'] = $this->data->get_sql('our_services','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/products/products", $data); 
    }

    public function products(){
        $pg_config['sql'] = $this->data->get_sql('our_services','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/products/products", $data); 
    }

    public function add_product(){
        $this->load->view("admin/products/add_product"); 
    }

    public function product_action(){
       
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $details_ar=$this->input->post('details_ar');
        $details_eng=$this->input->post('details_eng');
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['details'] = $details_eng;
        $data['details_ar'] = $details_ar;

        $this->db->insert('our_services',$data);
        $id = $this->db->insert_id();
        
if($_FILES['file']['name']!=""){
$file=$_FILES['file']['name'];
$file_name="file";
$config=get_img_config('our_services','uploads/products/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id),"400","400");
}
$this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
redirect(base_url().'admin/products/products','refresh');
    }

    public function delete_product(){
        $id_blog = $this->input->get('id_type');
        $check=$this->input->post('check');

        if($id_blog!=""){
			$img_right = $this->data->get_table_row('our_services',array('id'=>$id_blog),'img'); 
			unlink("uploads/products/$img_right");	
        $ret_value=$this->data->delete_table_row('our_services',array('id'=>$id_blog)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
			$img_right = $this->data->get_table_row('our_services',array('id'=>$check[$i]),'img'); 
			unlink("uploads/products/$img_right");	
        $ret_value=$this->data->delete_table_row('our_services',array('id'=>$check[$i]));    
        }
        }

        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
        redirect(base_url().'admin/products/products','refresh');
    }

    function check_view_product(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("our_services",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("our_services",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("our_services",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

    public function update_product(){
        $id=$this->input->get('id_type');
        $data['data'] = $this->data->get_table_data('our_services',array('id'=>$id));
        $this->load->view("admin/products/update_product",$data); 
    }

    function edit_action(){
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $details_ar=$this->input->post('details_ar');
        $details_eng=$this->input->post('details_eng');
		$id = $this->input->post('id');
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['details'] = $details_eng;
        $data['details_ar'] = $details_ar;

		$this->data->edit_table_id('our_services',array('id'=>$id),$data);
   
   
 if($_FILES['file']['name']!=""){
$file=$_FILES['file']['name'];
$file_name="file";
$config=get_img_config('our_services','uploads/products/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id),"400","400");
}
$this->session->set_flashdata('msg', 'تم التعديل بنجاح');
redirect(base_url().'admin/products/','refresh');
	}
	
/*********************************************************************** *////


}
