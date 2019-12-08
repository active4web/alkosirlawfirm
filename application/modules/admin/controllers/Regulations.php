<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulations extends MX_Controller
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
        redirect(base_url().'admin/regulations/systems_regulations','refresh');
        }

    public function systems_regulations(){
        $pg_config['sql'] = $this->data->get_sql('systems_regulations','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/regulations/systems_regulations", $data); 
    }

    public function add_regulation(){
        $this->load->view("admin/regulations/add_regulation"); 
    }

    public function product_action(){
       
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $link=$this->input->post('link');
           $link_en=$this->input->post('link_en');
       // $details_eng=$this->input->post('details_eng');

        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['link'] = $link;
        $data['link_en'] = $link_en;
        //$data['details_ar'] = $details_ar;

        $this->db->insert('systems_regulations',$data);
        $id = $this->db->insert_id();
         
  /*if($_FILES['file']['name']!=""){
$file=$_FILES['file']['name'];
$file_name="file";
$config=get_img_config('systems_regulations','uploads/systems_regulations/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id),"400","400");
}*/ 
        
$this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
redirect(base_url().'admin/regulations/systems_regulations','refresh');
    }

    public function delete_regulations(){
        $id_blog = $this->input->get('id_type');
        $check=$this->input->post('check');

        if($id_blog!=""){
			$img_right = $this->data->get_table_row('systems_regulations',array('id'=>$id_blog),'img'); 
			//unlink("uploads/systems_regulations/$img_right");	
        $ret_value=$this->data->delete_table_row('systems_regulations',array('id'=>$id_blog)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
			$img_right = $this->data->get_table_row('systems_regulations',array('id'=>$check[$i]),'img'); 
			//unlink("uploads/systems_regulations/$img_right");	
        $ret_value=$this->data->delete_table_row('systems_regulations',array('id'=>$check[$i]));    
        }
        }

        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
        redirect(base_url().'admin/regulations','refresh');
    }

    function check_view_regulation(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("systems_regulations",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("systems_regulations",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("systems_regulations",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

    public function update_regulations(){
        $id=$this->input->get('id_type');
        $data['data'] = $this->data->get_table_data('systems_regulations',array('id'=>$id));
        $this->load->view("admin/regulations/update_regulations",$data); 
    }

    function edit_action(){
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $link=$this->input->post('link');
         $link_en=$this->input->post('link_en');
        //$details_eng=$this->input->post('details_eng');
		$id = $this->input->post('id');
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['link'] = $link;
        $data['link_en'] = $link_en;
        //$data['details_ar'] = $details_ar;
		$this->data->edit_table_id('systems_regulations',array('id'=>$id),$data);

/*if($_FILES['file']['name']!=""){
$file=$_FILES['file']['name'];
$file_name="file";
$config=get_img_config('systems_regulations','uploads/systems_regulations/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id),"400","400");
}*/      
$this->session->set_flashdata('msg', 'تم التعديل بنجاح');
redirect(base_url().'admin/regulations/','refresh');
	}
	
/*********************************************************************** *////




public function regulation_service(){
    $pg_config['sql'] = $this->data->get_sql('regulations_txt','','id','DESC');
    $pg_config['per_page'] = 50;
    $data = $this->lib_pagination->create_pagination($pg_config);
    $this->load->view("admin/regulations/regulation_service", $data); 
}

public function add_regulation_service(){
    $this->load->view("admin/regulations/add_regulation_service"); 
}

public function regulation_service_action(){
   
    $title_ar=$this->input->post('title_ar');
    $title_eng=$this->input->post('title_eng');
    $details_ar=$this->input->post('details_ar');
    $details_eng=$this->input->post('details_eng');

    $data['title_eng'] = $title_eng;
    $data['title_ar'] = $title_ar;
    $data['details'] = $details_eng;
    $data['details_ar'] = $details_ar;
    $this->db->insert('regulations_txt',$data);
    $id = $this->db->insert_id();
  $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
  redirect(base_url().'admin/regulations/regulation_service','refresh');
}

public function delete_regulation_service(){
    $id_blog = $this->input->get('id_type');
    $check=$this->input->post('check');

    if($id_blog!=""){
        //unlink("uploads/systems_regulations/$img_right");	
    $ret_value=$this->data->delete_table_row('regulations_txt',array('id'=>$id_blog)); 
    }
 
    if(isset($check) && $check!=""){  
    $check=$this->input->post('check');
    $length=count($check);
    for($i=0;$i<$length;$i++){
    $ret_value=$this->data->delete_table_row('regulations_txt',array('id'=>$check[$i]));    
    }
    }

    $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
    redirect(base_url().'admin/regulations/regulation_service','refresh');
}

function check_view_regulation_service(){
    $id = $this->input->post("id");
    $ser = $this->db->get_where("regulations_txt",array("id"=>$id,"view" => "1"))->num_rows();
    if ($ser == 1) {
        $this->db->update("regulations_txt",array("view" => "0"),array("id"=>$id));
        echo "0";
    }
    if ($ser == 0) {
        $this->db->update("regulations_txt",array("view" => "1"),array("id"=>$id));
        echo "1";
    } 
}

public function update_regulation_service(){
    $id=$this->input->get('id_type');
    $data['data'] = $this->data->get_table_data('regulations_txt',array('id'=>$id));
    $this->load->view("admin/regulations/update_regulation_service",$data); 
}

function regulation_service_edit_action(){
    $title_ar=$this->input->post('title_ar');
    $title_eng=$this->input->post('title_eng');
    $details_ar=$this->input->post('details_ar');
    $details_eng=$this->input->post('details_eng');
    $id = $this->input->post('id');
    $data['title_eng'] = $title_eng;
    $data['title_ar'] = $title_ar;
    $data['details'] = $details_eng;
    $data['details_ar'] = $details_ar;
    $this->data->edit_table_id('regulations_txt',array('id'=>$id),$data);
    $this->session->set_flashdata('msg', 'تم التعديل بنجاح');
    redirect(base_url().'admin/regulations/regulation_service','refresh');
}


public function intro(){
    $data['site_info']= $this->data->get_table_data('site_info');
    $this->load->view("admin/regulations/intro",$data); 
}




public function intro_action(){
    $team_work_intro_ar=$this->input->post('team_work_intro_ar');
    $team_work_intro_en=$this->input->post('team_work_intro_en');
    $title_eng=$this->input->post('title_eng');
    $title_ar=$this->input->post('title_ar');
    $data = array('regulations_intro_en'=>$team_work_intro_en,'regulations_intro_ar'=>$team_work_intro_ar,'regulations_title_intro_ar'=>$title_ar,'regulations_title_intro_en'=>$title_eng);
    $this->db->update('site_info',$data,array('id'=>1));
        $this->session->set_flashdata('msg', 'تم التعديل بنجاحٍ');
        $this->session->mark_as_flash('msg');
        redirect('/admin/regulations/intro');	

}

}
