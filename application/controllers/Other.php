<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller{
    public function __construct()  
    {
        parent::__construct();
        
    }

    public function info()          //How to reach page
    {
        $this->load->model('WorkM');
        $sec1=$this->WorkM->Gets('how_to_reach');
        $sec2 = $this->WorkM->Gets('nashik_transportation');
        $Page = $this->WorkM->GetRow('pages',12);
        $Page['data'] = $this->load->view('public/other/info',compact('sec1','sec2'), True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');

        $this->load->view('public/base',compact('Page'));
    }

    public function map()               //Full page map
    {
        $this->load->model('WorkM');
        $Page['navbar'] = $this->WorkM->Gets('navbar');        
        $this->load->view('public/other/map',compact('Page'));
    }

    public function Gallery()           //Gallery page
    {
        $this->load->model('WorkM');
        $data=$this->WorkM->Gets('gallery');       
        $Page = $this->WorkM->GetRow('pages',2);
        $Page['navbar'] = $this->WorkM->Gets('navbar');
        $Page['data']=$this->load->view('public/other/gallery',compact('data'));
    }

    public function Team()              //Team page
    {
        $this->load->model('WorkM');
        $Page = $this->WorkM->GetRow('pages',11);
        $Page['data'] = $this->load->view('public/other/team',"",True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');
        $this->load->view('public/base',compact('Page'));
    }

   
    
}


?>