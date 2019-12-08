<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Site extends MX_Controller {
    function __construct() {

		parent::__construct();
        $this->lang->load('main_lang', get_lang() );
        $this->db->order_by('id', 'DESC');
        $this->load->library('session');
        if( isset($this->session->get_userdata('lang')['lang']) ){
        $lang = $this->session->get_userdata('lang')['lang'];
        }else{
        $lang = 'arabic';
        }
        $dir = ( $lang == 'arabic' )? 'left' : 'right' ;
		define( "LANGU" , $lang );
		$this->load->model('data','','true');
		@date_default_timezone_set('Asia/Riyadh');
    }

    function index() {





		global $lang;
		if( isset($this->session->get_userdata('lang')['lang']) ){
			$lang = $this->session->get_userdata('lang')['lang'];
			}else{
			$lang = 'arabic';
			}
$data['site_info'] =$this->db->get_where('site_info')->result(); 
$data['home_page'] =$this->db->get_where('home_page')->result(); 
$data['main_slider']=$this->db->get_where('slider',array('view'=>'1'))->result();
$data['main_slider_count']=$this->db->get_where('slider',array('view'=>'1'))->result();

		$data['lang'] =$lang; 
$data_contant['siteinfo']=$this->db->get_where('site_info')->result();
$data_contant['our_services']=$this->db->order_by('id','asc')->limit(10)->get_where('our_services',array('view'=>'1'))->result()
		; 
$data_contant['team_work']=$this->db->order_by('id','desc')->limit(6)->get_where('team_work',array('view'=>'1'))->result()
		; 
$data_contant['home_page'] =$this->db->get_where('home_page')->result(); 
$data_contant['lang'] =$lang; 

	$this->load->view('include/head',$data );
	$this->load->view('include/header',$data );
	$this->load->view('home',$data_contant);
	$this->load->view('include/footer',$data);
    }


	public function lang_site( $lang = null )
    {
        if( $lang == 'ar' ){
            $newdata = array(
            'lang'  => 'arabic'
            );
            $this->session->set_userdata($newdata);
        }else{
            $newdata = array(
            'lang'  => 'english'
            );
            $this->session->set_userdata($newdata);
		}
		echo  $this->session->get_userdata($newdata);
		//echo $_GET['link'];
 redirect($_GET['link']);
    }

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
