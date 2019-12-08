<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller
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
        redirect(base_url().'admin/faq/faq','refresh');
    }

    public function faq(){
        $pg_config['sql'] = $this->data->get_sql('achievements_text','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/faq/faq", $data); 
    }
    
    public function mainimg(){
        $data['site_info']= $this->data->get_table_data('site_info');
        $this->load->view("admin/faq/mainimg",$data); 
    }


    



    public function edit_img(){

        if($_FILES['file']['name']!=""){
          $logo = $this->data->get_table_row('site_info',array('id'=>1),'main_img'); 
          if ($logo != "") {
          unlink("uploads/site_setting/$logo");
          }
          $img_name=$this->gen_random_string(); 
          $imagename = $img_name;
          $config['upload_path'] = 'uploads/site_setting/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          $config['max_size']             =600000;
          $config['max_width']            = 600000;
          $config['max_height']           = 600000;
          $config['file_name'] = $imagename; 
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('file')){
          echo $this->upload->display_errors();
           }
          else {
          $url= $_FILES['file']['name'];
          $ext = explode(".",$url);
          $file_extension = end($ext);

          $config['source_image'] = 'uploads/site_setting/'.$imagename.".".$file_extension ;
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = TRUE;
          $config['quality'] = '90%';
          $config['width']     = 350;
          $config['height']   = 750;
          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          $data = array('main_img'=>$imagename.".".$file_extension);
          $this->db->update('site_info',$data,array('id'=>1));
            }
            }
            $this->session->set_flashdata('msg', 'تم التعديل بنجاحٍ');
            $this->session->mark_as_flash('msg');
            redirect('/admin/faq/mainimg');	
    
    }


    public function add_faq(){
        $this->load->view("admin/faq/add_faq"); 
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
        $this->db->insert('achievements_text',$data);
        $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
       redirect(base_url().'admin/faq','refresh');
    }

    public function delete_faq(){
        $id_blog = $this->input->get('id_type');
        $check=$this->input->post('check');
        if($id_blog!=""){
        $ret_value=$this->data->delete_table_row('achievements_text',array('id'=>$id_blog)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('achievements_text',array('id'=>$check[$i]));    
        }
        }
        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
        redirect(base_url().'admin/faq','refresh');
    }

    function check_view_faq(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("achievements_text",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("achievements_text",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("achievements_text",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

    public function update_faq(){
        $id=$this->input->get('id_type');
        $data['data'] = $this->data->get_table_data('achievements_text',array('id'=>$id));
        $this->load->view("admin/faq/update_faq",$data); 
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
		$this->data->edit_table_id('achievements_text',array('id'=>$id),$data);
        $this->session->set_flashdata('msg', 'تم التعديل بنجاح');
        redirect(base_url().'admin/faq/','refresh');
	}
	
/*********************************************************************** *////

}
