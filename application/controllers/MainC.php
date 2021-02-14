<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MainC extends CI_Controller{
    public function __construct()  
    {
        parent::__construct();
        
    }

    public function index()     //Home page
    {    
        $this->load->model('WorkM');
        $sec1 = $this->WorkM->Gets('our_attractions');
        $sec2 = $this->WorkM->Gets('home_sec2');
        $sec3 = $this->WorkM->Gets('culture_home');
        $sec4 = $this->WorkM->Gets('food-stuff_home');
        $sec5=$this->WorkM->Gets('popup_data');
        $sec6=$this->WorkM->Gets('news_section');
        $Page = $this->WorkM->GetRow('pages',1);
        $con=$this->WorkM->Gets('popup_status');
        $Page['data'] = $this->load->view('public/home',compact('con','sec1','sec2','sec3','sec4','sec5','sec6'),True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');
        $this->load->view('public/base',compact('Page'));
    }
   
    
    public function FoodStuff()         //Foodstuff page
    {
        $this->load->model('WorkM');
        $sec1 = $this->WorkM->Gets('food-stuff_sec1');
        $sec2 = $this->WorkM->Gets('food-stuff_sec2');
        $sec3 = $this->WorkM->Gets('food-stuff_sec3');
        $sec4 = $this->WorkM->Gets('food-stuff_sec4');
        $Page = $this->WorkM->GetRow('pages',5); 
        $Page['data'] = $this->load->view('public/foodStuff',compact('sec1','sec2','sec3','sec4'),True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');

        $this->load->view('public/base',compact('Page'));
    }


     public function Dest()         //Destinition page
    {
        $this->load->model('WorkM');    
            $sec1 = $this->WorkM->Gets('places_for_worship_dest');
            $sec2 = $this->WorkM->Gets('exploring_nashik_dest');
            $sec3 = $this->WorkM->Gets('destsec3');
            $sec4 = $this->WorkM->Gets('your_planning_dest');
            $sec5 = $this->WorkM->Gets('museums_dest');
            $sec6 = $this->WorkM->Gets('mountains_dest');
            $sec7 = $this->WorkM->Gets('waterfalls_dest');
            $Page = $this->WorkM->GetRow('pages',2);
            $Page['data'] = $this->load->view('public/dest',compact('sec1','sec2','sec3','sec4','sec5','sec6','sec7'),True);
            $Page['navbar'] = $this->WorkM->Gets('navbar');
            $this->load->view('public/base',compact('Page'));        

    }
    
    public function my404()
    {
        $this->output->set_status_header('404');
        $this->load->view('public/my404');
    }


    public function Culture()           //Culture page
    {
        $this->load->model('WorkM');
        $sec1 = $this->WorkM->Gets('history_culture');
        $sec2 = $this->WorkM->Gets('our_events_culture');
        $sec3 = $this->WorkM->Gets('our_speciality_culture');
        $Page = $this->WorkM->GetRow('pages',3);
        $Page['data'] = $this->load->view('public/culture',compact('sec1','sec2','sec3'),True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');
        $this->load->view('public/base',compact('Page'));   
        
    }
    
    public function AboutNashik()       //About Nashik page
    {
        $this->load->model('WorkM');
        $Page = $this->WorkM->GetRow('pages',4);
        $Page['data'] = $this->load->view('public/aboutnashik',"",True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');
        $this->load->view('public/base',compact('Page'));
    }


    public function Places($Name=NULL)      //Places page
    {
        $this->load->model('WorkM');
        $N = explode("%20",$Name);
        //  echo $N."<br><br>";
        $data = $this->WorkM->GetName($N[0]);
        // print_r($data);
            
            $res=$data[0]->main_category;
            $tabledata=$this->WorkM->Suggest($res);       
             $len=count($tabledata);
             // $len>3?$len=3:$len=count($tabledata);
             $Page = $this->WorkM->GetRow('pages',19);
             $Page['data'] = $this->load->view('public/places',compact('data','tabledata','len'),True);
             $Page['navbar'] = $this->WorkM->Gets('navbar');

             $this->load->view('public/base',compact('Page'));
    }

    public function liveSearch($query)          //Search results       
    {
        $this->load->model('WorkM');
        $query = $this->security->xss_clean($query);
        $S = explode(" ", $query);        
        $S = $S[0];
        $data = [];          
        
        $row = $this->WorkM->fetch_row($S);
        if($row > 0){
            $result = $this->WorkM->fetch_limit($S,9,0);
            foreach( $result as $i){
                array_push($data,$i->name);
            }
        }else{
            array_push($data,"No Data Avaliable");
        }
        
        echo json_encode($data);        
    }

    

    public function Search()        //Related to search result
    {
        $this->load->model('WorkM');

        if ($this->input->post('query') == "") {
            return redirect("MainC/SearchResult/");
             
        } else if (!$this->input->post('query')) {
            return redirect("MainC/SearchResult/");
        } else {
            $query = $this->input->post('query');
            $query = $this->security->xss_clean($query);
            $S = explode(" ", $query);
            $S = $S[0];
            return redirect("MainC/SearchResult/$S");
        }
    }
    
    public function SearchResult($query = "")       //Related to search results
    {
        $this->load->model('WorkM');
        $result = array();

        $config['full_tag_open'] = '<ul class="pagination pagination-info">';
        $config['full_tag_close'] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class=" page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class=" page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item"><a class="page-link">';
        $config['cur_tag_close'] = '<a></li>';

        $row = $this->WorkM->fetch_row($query);
        $o = $this->security->xss_clean($this->uri->segment(4));

        $offset = ($o) ? $o : 0;
               
        $config['base_url'] = base_url('/MainC/SearchResult/'.$query);
        $config['total_rows'] = $row;
        $config['per_page'] = 8;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $result['data'] = $this->WorkM->fetch_limit($query, $config['per_page'], $offset);
        $result['msg'] = ($row > 0) ?  "Search Results!!!" : "Search Not Found Check This";
        
        $Page = $this->WorkM->GetRow('pages', 6);
        $Page['data'] =  $this->load->view('public/search', compact('result'), True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');

        $this->load->view('public/base', compact('Page'));
    }


    public function Contact()       //Contact form
    {
        if (isset($_POST['name'])) {
            
            $data['name']  = $this->security->xss_clean($this->input->post('name'));
        }
        if (isset($_POST['email'])) {
            $data['email'] = $this->security->xss_clean($this->input->post('email'));
            
        }
        if (isset($_POST['msg'])) {
            $data['msg'] = $this->security->xss_clean($this->input->post('msg'));
        }
        $k='contact';
        $this->load->model('WorkM');
        if ($this->WorkM->InsertK($k, $data)) {
            redirect("MainC");
            
        } else {
            $this->session->set_flashdata('error', 'Inalid DATA');
        }

    }

   
  public function Feedback()        //Feedback form
    {
        if (isset($_POST['name'])) {
            $data['name'] = $this->security->xss_clean($this->input->post('name'));
        }   

        if (isset($_POST['email'])) {
            $data['email'] = $this->security->xss_clean($this->input->post('email'));
        }

        if (isset($_POST['msg'])) {
            $data['msg'] = $this->security->xss_clean($this->input->post('msg'));
        }
        $k='feedback';        
        $this->load->model('WorkM');
        if ($this->WorkM->InsertK($k, $data)) {
            redirect("MainC");
            
        } else {
            $this->session->set_flashdata('error', 'Inalid DATA');
            
        }

    }

    public function All($category)             //View All Content page
    {   
        // if($category == "destination" ||  $category == "foodstuff" || $category == "culture"){
        $this->load->model('WorkM');
        // print_r($data);
        $config = [
            'base_url'   => base_url('MainC/All/'.$category),
            'per_page'   => 6,
            'total_rows' =>$this->WorkM->GetByCategory($category),
            'full_tag_open' => '<ul class="pagination pagination-info">',
            'full_tag_close' => "</ul>",
            'attributes' => array('class' => 'page-link'),
        ];
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class=" page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class=" page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item"><a class="page-link">';
        $config['cur_tag_close'] = '<a></li>';

        $this->pagination->initialize($config);
        $offset = $this->uri->segment(4);
        $data = $this->WorkM->GetAll($category,$config['per_page'],$offset);

        if($category=="Tourist"){$Page = $this->WorkM->GetRow('pages',8);}
        elseif ($category=="Food") {$Page = $this->WorkM->GetRow('pages',9);}
        else{$Page = $this->WorkM->GetRow('pages',10);}
        
        $Page['data'] = $this->load->view('public/all',compact('data'),True);
        $Page['navbar'] = $this->WorkM->Gets('navbar');

        $this->load->view('public/Base',compact('Page'));
    // }
    // else{
    //         redirect('MainC/All/destination');
            
    // }
    //     

    }
    

}


?>
