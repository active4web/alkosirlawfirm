<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teamwork extends MX_Controller
{

    public function __construct()
    {
		parent::__construct();
		$this->lang->load('admin', get_lang() );
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('data','','true');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url','text','main_helper'));
        $this->load->library('lib_pagination');
        $this->load->library('CKEditor');
        $this->load->library('CKFinder');
        $this->ckfinder->SetupCKEditor($this->ckeditor,'../../design/ckfinder/');      
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




    public function intro(){
        $data['site_info']= $this->data->get_table_data('site_info');
        $this->load->view("admin/teamwork/intro",$data); 
    }
    
    
    
    
    public function intro_action(){
        $team_work_intro_ar=$this->input->post('team_work_intro_ar');
        $team_work_intro_en=$this->input->post('team_work_intro_en');
        $data = array('team_work_intro_en'=>$team_work_intro_en,'team_work_intro_ar'=>$team_work_intro_ar);
        $this->db->update('site_info',$data,array('id'=>1));
            $this->session->set_flashdata('msg', 'تم التعديل بنجاحٍ');
            $this->session->mark_as_flash('msg');
            redirect('/admin/teamwork/intro');	
    
    }
    


    public function index(){
        redirect(base_url().'admin/teamwork/teamwork','refresh');
    }

    public function teamwork(){
        $pg_config['sql'] = $this->data->get_sql('team_work','','id','DESC');
        $pg_config['per_page'] = 50;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/teamwork/teamwork", $data); 
    }

    public function add_teamwork(){
        $data['data'] = $this->data->get_table_data('job_type',array('view'=>'1'));
        $this->load->view("admin/teamwork/add_teamwork",$data); 
    }

   


    public function product_action(){
		$title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $details_ar=$this->input->post('details_ar');
        $details_eng=$this->input->post('details_eng');
        $jobtype_id=$this->input->post('jobtype_id');
        $job_type=$this->input->post('job_type');
        
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['details'] = $details_eng;
        $data['details_ar'] = $details_ar;
        $data['jobtype_id'] = $jobtype_id;
        $data['type'] = $job_type;
        
        $this->db->insert('team_work',$data);
        $id = $this->db->insert_id();
        $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
       redirect(base_url().'admin/teamwork/teamwork','refresh');
    }

    public function delete_teamwork(){
        $id_blog = $this->input->get('id_type');
        $check=$this->input->post('check');

        if($id_blog!=""){
        $ret_value=$this->data->delete_table_row('team_work',array('id'=>$id_blog)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('team_work',array('id'=>$check[$i]));    
        }
        }

        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
        redirect(base_url().'admin/teamwork/teamwork','refresh');
    }

    function check_view_teamwork(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("team_work",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("team_work",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("team_work",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

    public function update_teamwork(){
        $id=$this->input->get('id_type');
        $data['data'] = $this->data->get_table_data('team_work',array('id'=>$id));
        $data['job_type'] = $this->data->get_table_data('job_type',array('view'=>'1'));
        $this->load->view("admin/teamwork/update_teamwork",$data); 
    }

    function edit_action(){
        $title_ar=$this->input->post('title_ar');
		$title_eng=$this->input->post('title_eng');
        $details_ar=$this->input->post('details_ar');
        $details_eng=$this->input->post('details_eng');
		$type=$this->input->post('type');
        $jobtype_id=$this->input->post('jobtype_id');
        $id=$this->input->post('id');
        $data['title_eng'] = $title_eng;
        $data['title_ar'] = $title_ar;
        $data['details'] = $details_eng;
        $data['details_ar'] = $details_ar;
        $data['type'] = $type;
        if($jobtype_id!=""){
        $data['jobtype_id'] = $jobtype_id;
        }
		$this->data->edit_table_id('team_work',array('id'=>$id),$data);
        $this->session->set_flashdata('msg', 'تم التعديل بنجاح');
        redirect(base_url().'admin/teamwork/','refresh');
    }
    
	
/*********************************************************************** *////


public function job_type(){
    $pg_config['sql'] = $this->data->get_sql('job_type','','id','DESC');
    $pg_config['per_page'] = 50;
    $data = $this->lib_pagination->create_pagination($pg_config);
    $this->load->view("admin/teamwork/job_type", $data); 
}

public function add_jobtype(){
    $this->load->view("admin/teamwork/add_jobtype"); 
}


public function jobtype_action(){
    $title_ar=$this->input->post('title_ar');
    $title_eng=$this->input->post('title_eng');
    $data['name_en'] = $title_eng;
    $data['name_ar'] = $title_ar;
    $this->db->insert('job_type',$data);
    $id = $this->db->insert_id();
    $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
   redirect(base_url().'admin/teamwork/job_type','refresh');
}


public function delete_jobtype(){
    $id_blog = $this->input->get('id_type');
    $check=$this->input->post('check');

    if($id_blog!=""){
    $ret_value=$this->data->delete_table_row('job_type',array('id'=>$id_blog)); 
    }
 
    if(isset($check) && $check!=""){  
    $check=$this->input->post('check');
    $length=count($check);
    for($i=0;$i<$length;$i++){
    $ret_value=$this->data->delete_table_row('job_type',array('id'=>$check[$i]));    
    }
    }

    $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
    redirect(base_url().'admin/teamwork/job_type','refresh');
}

function check_view_jobtype(){
    $id = $this->input->post("id");
    $ser = $this->db->get_where("job_type",array("id"=>$id,"view" => "1"))->num_rows();
    if ($ser == 1) {
        $this->db->update("job_type",array("view" => "0"),array("id"=>$id));
        echo "0";
    }
    if ($ser == 0) {
        $this->db->update("job_type",array("view" => "1"),array("id"=>$id));
        echo "1";
    } 
}

public function update_jobtype(){
    $id=$this->input->get('id_type');
    $data['data'] = $this->data->get_table_data('job_type',array('id'=>$id));
    $this->load->view("admin/teamwork/update_jobtype",$data); 
}

function edit_typeaction(){
    $title_ar=$this->input->post('title_ar');
    $title_eng=$this->input->post('title_eng');

    $id=$this->input->post('id');
    $data['name_en'] = $title_eng;
    $data['name_ar'] = $title_ar;
    $this->data->edit_table_id('job_type',array('id'=>$id),$data);
    $this->session->set_flashdata('msg', 'تم التعديل بنجاح');
    redirect(base_url().'admin/teamwork/job_type','refresh');
}



}
