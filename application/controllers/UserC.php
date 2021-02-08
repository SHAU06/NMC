<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserC extends CI_Controller
{

    public function __construct()       //Login page
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('MainC');
        }
        if($this->session->tempdata('penalty')){
            $this->session->set_flashdata('error', "Your Ip is Blocked");
            redirect('/login');
        }
    }

    

    public function index()         //Dashboard
    {
        
        $this->load->model('WorkM');
        $k = 0;
        $UserData = $this->WorkM->Gets('users');
        $Page['title'] = "Admin Area | Dashboard";
        $Page['data'] = $this->load->view('private/dashboard', compact('UserData', 'k'), True);
        $this->load->view('private/base', compact('Page'));
    }


    public function check( $k)      //Check Table
    {
        $this->load->model('WorkM');
        if( $this->WorkM->checkTables(strtolower($k))){
            return true;
        }
        else{
            return false;
        }

    }

    public function View($k="pages")        //View page
    {
        $this->load->model('WorkM');
        if($this->check($k)){
        $UserData = $this->WorkM->Gets($k);
        // print_r($UserData);
        $C = 0;
        $Page['title'] = $k;
        $Page['data'] = $this->load->view('private/view', compact('UserData', 'k', 'C'), True);
        $this->load->view('private/base', compact('Page'));}
        else{
            echo $k;
            show_404();
        }
    }


    public function Change($k="pages")      //Change page
    {
        $this->load->model('WorkM');
        if($this->check($k)){
        $data = $this->WorkM->Gets($k);
        $status = 0;
        if($k == 'popup_data'){
           $status = $this->WorkM->Gets('popup_status');
        //    print_r($status);
           $status = $status[0]->status;
        }
        $C = 1;
         $this->WorkM->start_tra();
        $Page['title'] = $k;
$Page['data'] = $this->load->view('private/view', compact('data', 'k', 'C','status'), True);
        $this->load->view('private/base', compact('Page'));
        }else{
            show_404();
        }
    }


    public function loadAdd($k="pages")         //Add content form
    {
        $up = 0;
        $this->load->model('WorkM');
        if($this->check($k)){
        $UserData = $this->WorkM->Gets($k);
        $Page['title'] = $k;
        $Page['data'] = $this->load->view('private/form', compact('UserData', 'k', 'up'), True);
        $this->load->view('private/base', compact('Page'));
    }else{
        show_404();
    }

    }

    public function loadEdit($k="pages", $id)           //Edit content form
    {
        $this->load->model('WorkM');
        $up = 1;
        if($this->check($k)){
        $UserData =  $this->WorkM->GetRow($k, $id);
        $Page['title'] = $k;
        $Page['data'] = $this->load->view('private/form', compact('UserData', 'k', 'up'), True);
        $this->load->view('private/base', compact('Page'));
    }else{
        show_404();
    }
    }


    public function loadChange( $k="pages")
    {
        $this->load->model('WorkM'); 
        $this->WorkM->start_tra();
        redirect('UserC/Change/' . $k);
    }

    public function rollBack($k="pages")        //Rollback button
    {
        $this->load->model('WorkM');
        $this->WorkM->rollback_tra();
        redirect('UserC/View/' . $k);
    }


    public function finalChange($k)         //Confirmchanges button
    {
        $this->load->model('WorkM');

        if (isset($_POST['submit'])) {
            
            if($k=='popup_data')
            {        if(isset($_POST['status'])){
                    // popup will display
                    // active value of all incoming values will be 1;
                    $id = $_POST['check_list'];
                    if(count($id) != 0){
                        $this->WorkM->popup_status_on(1,$id); 
                        redirect('UserC/View/' . $k);      
                    }else{
                        $this->session->set_flashdata('error', 'Select at least one value');
                        redirect('UserC/View/' . $k);      
                    }
                }else{
                    // popup not will display
                    //active value of all become 0
                    $this->WorkM->popup_status_off(0);
                    $this->session->set_flashdata('success', "Popup window successfully Deactivated."); 
                    redirect('UserC/View/' . $k);      
                }                                                        
            }
            elseif($k=='pages' || $k=='Contact' || $k=='Feedback' || $k=='Users')
                {
                     redirect('UserC/View/' . $k);
                    
                }
            elseif (!empty($_POST['check_list'])) 
            {               
                $id = $_POST['check_list'];
                if ($this->WorkM->Change($k, $id))
                {                   
                    $this->WorkM->commit_tra();
                    redirect('UserC/View/' . $k);
                }else {      echo "Not done";           }
            } 
            else {
                if($k=='pages')
                {
                    if ($this->WorkM->Change($k, $id)) {
                        $this->WorkM->commit_tra();
                        redirect('UserC/View/' . $k);
                    }
                }

            }
        }
    }



    public function Add($k)             //Adding data to table from Add form
    {   
        
        if (isset($_POST['Name'])) {
            $data['name'] = $this->input->post('Name');
            $this->form_validation->set_rules('Name', 'Name', 'required|max_length[100]|min_length[1]');
        }

        if (isset($_POST['link'])) {
            $data['link'] = $this->input->post('link');
            $this->form_validation->set_rules('link', 'link', 'required');           
            
        }

        if (isset($_POST['Descripition'])) {
            $des = $this->input->post('Descripition');
            $des = html_escape($des);
            $data['des'] = $this->security->xss_clean($des);
            $this->form_validation->set_rules('Descripition', 'Description', 'required');
        }


        if (isset($_POST['Descripition1'])) {
            $des1 = $this->input->post('Descripition1');
            $des1 = html_escape($des1);
            $data['des1'] = $this->security->xss_clean($des1);
            $this->form_validation->set_rules('Descripition1', 'Description1', 'required');
        }

        if (isset($_POST['Descripition2'])) {
            $des2 = $this->input->post('Descripition2');
            $des2 = html_escape($des2);
            $data['des2'] = $this->security->xss_clean($des2);
            $this->form_validation->set_rules('Descripition2', 'Description2', 'required');
        }

        if (isset($_POST['Descripition3'])) {
            $des3 = $this->input->post('Descripition3');
            $des3 = html_escape($des3);
            $data['des3'] = $this->security->xss_clean($des3);
            $this->form_validation->set_rules('Descripition3', 'Description3', 'required');
        }

        if (isset($_POST['map_url'])) {
            $map_url = $this->input->post('map_url');
            $map_url = html_escape($map_url);
            $data['map_url'] = $this->security->xss_clean($map_url);

            $this->form_validation->set_rules('map_url', 'map_url', 'required');
        }


            if (isset($_POST['target'])) {
            $target = $this->input->post('target');
            $this->form_validation->set_rules('target', 'target', 'required');
            if($target == 1 ){
                $data['target'] = "SELF";
               
            }
            else if($target == 2){
                $data['target'] = "BLANK";
            }else{
                $this->session->set_flashdata('error', "Something is wrong in Target Field");
                redirect('UserC/loadAdd/' . $k);
            }

            if (isset($_POST['outsidelink'])) {             
                
                $data['outsidelink'] = 1;
                
            }else{
                $data['outsidelink'] = 0;
            }
            
        }

        if (isset($_POST["main_category"])) {
            $cat = $_POST["main_category"];
            $data['main_category']=$cat;         
             $this->form_validation->set_rules('main_category', 'main_category', 'required');    
            }
        
        if (isset($_POST['username'])) {
            $data['username'] = $this->input->post('username');
            $this->form_validation->set_rules('username', 'username', 'required');

            $data['email'] = $this->input->post('email');
            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            $data['hash']= md5(rand(0,1000));
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');

            if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)){

                $to      = $data['email']; 
                $subject = 'Signup | Verification'; // Give the email a subject 
                $email = urlencode($data['email']);
		        $url = base_url('/activate/'.$email.'/'.$data['hash']);
                $message = '
                <div style="background-color:#f2f3f5;padding:20px">
                <div style="max-width:600px;margin:0 auto">
                <div style="background:#fff;font:14px sans-serif;color:#686f7a;border-top:4px solid #ec5252;margin-bottom:20px">
                <div style="border-bottom:1px solid #f2f3f5;padding:20px 30px">
                <div class="row">
                <div class="column" style="font-family: verdana; text-align: center; font-size: 1rem; color: #555555;">
                            NASHIK TOURISM
                       </div>
                    </div>
                </div>
                <div style="padding:20px 30px">
                <div style="font-size:16px;line-height:1.5em;border-bottom:1px solid #f2f3f5;padding-bottom:10px;margin-bottom:20px">
                 	<p><a style="text-decoration:none;color:#000">
                        Welcome Admin,
                    </a></p>
                    <p><a style="text-decoration:none;color:#000">Your account has been successfully Created.</a></p>
                    <p><a style="text-decoration:none;color:#000">Please click the button below to activate your account.</a></p>
                    <p><a style="text-decoration:none;color:#000">You can login with your credentials after you have activated your account.</a></p>
                    <a href='.$url.' style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#ec5252;border-top:12px solid #ec5252;border-bottom:12px solid #ec5252;border-right:18px solid #ec5252;border-left:18px solid #ec5252;display:inline-block" target="_blank" data-saferedirecturl="#">
                    Activate Your Account
                    </a>
                </div>
                </div>
            </div>
            <div style="font:11px sans-serif;color:#686f7a">
                <p style="font-size:11px;color:#686f7a">
                    Delivered by <a href="http://nashiktourism.ga">NASHIK TOURISM</a> Team .
                </p>
            </div>
    	</div>
    </div>
';
                 // Our message above including the link
                // $headers = 'from:m3uproject@gmail.com';
                                    
		        // mail($to, $subject, $message, $headers); // Send our email
                $this->emailConfig();

                $this->email->from('05nashiktourism@gmail.com');
                $this->email->to($to);
                

                $this->email->subject($subject);
                $this->email->message($message);

                if( $this->email->send()){
                    $this->session->set_flashdata('success', " Email comfirmation link is sent to your Email. Please check you inbox or spam folder. ");
                    
                }else{
                    $this->session->set_flashdata('error', "Can\'t send email check email or contact developer.");
                    
                }
                
            }

            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->form_validation->set_rules('password', 'password', 'required');            
        }

        if (isset($_FILES['userfile'])) {
            $img = $_FILES['userfile']['name'];
            

            if ($img == '') {
                $data['img'] = '';
            } else {
                $config['upload_path']          = './assets/images/' . $k;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_size']             = 30000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata('error', 'cant upload');
                    redirect('UserC/loadAdd/' . $k);      
                    
                } else {
                    $data['img'] = $k . "/" . $this->upload->data('file_name');
                
                }
            }

            if (empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'image', 'required');
            }
    
        }       
        // print_r($data); 

        $this->load->model('WorkM');
            if($k=='gallery' || $k=='popup_data'||$this->form_validation->run()) { 
            
            if ($this->WorkM->InsertK($k, $data)) {
                        
                redirect('UserC/Change/' . $k);
               
            } else {
                $this->session->set_flashdata('error', 'CAN\'T INSERT');
                redirect('UserC/loadAdd/' . $k);                
                
            }
        } else {           
            
            $this->error_display($k,"Add");
        }
    }
    
    public function function_alert($msg,$k,$c)          //Alret of errors
    {

        $this->session->set_flashdata('error', $msg);
        if($c == "add" || $c == "Add")
        redirect('UserC/loadAdd/' . $k);
        else 
        redirect('UserC/loadEdit/' . $k ."/".$c);
    }

    public function error_display($k,$c)            //Validation errors
    {  
       
       if(form_error('Name')!=NULL){

        $this->function_alert(form_error('Name'),$k,$c);
        }
       elseif(form_error('Descripition')!=NULL){
        $this->function_alert(form_error('Descripition'),$k,$c);
        }
        elseif(form_error('userfile')!=NULL){
            $this->function_alert(form_error('userfile'),$k,$c);
        }
        elseif(form_error('Username')!=NULL){
            $this->function_alert(form_error('Username'),$k,$c);
        }
        elseif(form_error('password')!=NULL){
            $this->function_alert(form_error('password'),$k,$c);
        }
        elseif(form_error('target')!=NULL){
            $this->function_alert(form_error('target'),$k,$c);
        }
        elseif(form_error('outsidelink')!=NULL){
            $this->function_alert(form_error('outsidelink'),$k,$c);
        }
    }

    
    public function Edit($k, $id)           //Updated data to table
    {
        $this->load->model('WorkM');

        if (isset($_POST['Name'])) {
            $data['name'] = $this->input->post('Name');
            $this->form_validation->set_rules('Name', 'Name', 'required|max_length[100]|min_length[1]');
        }

        if (isset($_POST['link'])) {
            $data['link'] = $this->input->post('link');
            $this->form_validation->set_rules('link', 'link', 'required');            
        }

        if (isset($_POST['Descripition'])) {
            $des = $this->input->post('Descripition');
            $des = html_escape($des);
            $data['des'] = $this->security->xss_clean($des);
            $this->form_validation->set_rules('Descripition', 'Description', 'required');            
        }

        if (isset($_POST['Descripition1'])) {
            $des1 = $this->input->post('Descripition1');
            $des1 = html_escape($des1);
            $data['des1'] = $this->security->xss_clean($des1);
            $this->form_validation->set_rules('Descripition1', 'Description1', 'required');            
        }

        if (isset($_POST['Descripition2'])) {
            $des2 = $this->input->post('Descripition2');
            $des2 = html_escape($des2);
            $data['des2'] = $this->security->xss_clean($des2);
            $this->form_validation->set_rules('Descripition2', 'Description2', 'required');        
        }

        if (isset($_POST['Descripition3'])) {
            $des3 = $this->input->post('Descripition3');
            $des3 = html_escape($des3);
            $data['des3'] = $this->security->xss_clean($des3);
            $this->form_validation->set_rules('Descripition3', 'Description3', 'required');
            
        }

        if (isset($_POST['map_url'])) {
            $map_url = $this->input->post('map_url');
            $map_url = html_escape($map_url);
            $data['map_url'] = $this->security->xss_clean($map_url);

            $this->form_validation->set_rules('map_url', 'map_url', 'required');
        }


        if (isset($_POST['outsidelink'])) {
            $des = $this->input->post('outsidelink');
            $des = html_escape($des);
            $data['outsidelink'] = $this->security->xss_clean($des);
                                
        }

        if (isset($_POST['target'])) {
            $target = $this->input->post('target');
            $this->form_validation->set_rules('target', 'target', 'required');
            if($target == 1 ){
                $data['target'] = "SELF";
               
            }
            else if($target == 2){
                $data['target'] = "BLANK";
            }else{
                $this->session->set_flashdata('error', "Something is wrong in Target Field");
                redirect('UserC/loadAdd/' . $k);
            }            
        }

        if (isset($_POST['username'])) {
            $data['username'] = $this->input->post('username');
            $this->form_validation->set_rules('username', 'username', 'required');
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->form_validation->set_rules('password', 'password', 'required');
      } 

        if (isset($_POST['email'])){
            $data['email'] = $this->input->post('email');
            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            $data['hash']= md5(rand(0,1000));
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)){

                $to      = $data['email']; 
                $subject = 'Email | Verification'; // Give the email a subject 
                $email = urlencode($data['email']);
		        $url = base_url('/activate/'.$email.'/'.$data['hash']);
                $message = '
                <div style="background-color:#f2f3f5;padding:20px">
                <div style="max-width:600px;margin:0 auto">
                <div style="background:#fff;font:14px sans-serif;color:#686f7a;border-top:4px solid #ec5252;margin-bottom:20px">
                <div style="border-bottom:1px solid #f2f3f5;padding:20px 30px">
                <div class="row">
                <div class="column" style="font-family: verdana; text-align: center; font-size: 1rem; color: #555555;">
                            NASHIK TOURISM
                       </div>
                    </div>
                </div>
                <div style="padding:20px 30px">
                <div style="font-size:16px;line-height:1.5em;border-bottom:1px solid #f2f3f5;padding-bottom:10px;margin-bottom:20px">
                 	<p><a style="text-decoration:none;color:#000">
                        Welcome Admin,
                    </a></p>
                    <p><a style="text-decoration:none;color:#000">Your email has been successfully updated.</a></p>
                    <p><a style="text-decoration:none;color:#000">Please click the button below to activate your updated email for your account.</a></p>
                    <p><a style="text-decoration:none;color:#000">You can login with your credentials after you confirmed your email.</a></p>
                    <a href='.$url.' style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#ec5252;border-top:12px solid #ec5252;border-bottom:12px solid #ec5252;border-right:18px solid #ec5252;border-left:18px solid #ec5252;display:inline-block" target="_blank" data-saferedirecturl="#">
                    Activate New Email
                    </a>
                </div>
                </div>
            </div>
            <div style="font:11px sans-serif;color:#686f7a">
                <p style="font-size:11px;color:#686f7a">
                    Delivered by <a href="http://nashiktourism.ga">NASHIK TOURISM</a> Team .
                </p>
            </div>
    	</div>
    </div>
';
   
                $this->emailConfig();

                $this->email->from('05nashiktourism@gmail.com');
                $this->email->to($to);                

                $this->email->subject($subject);
                $this->email->message($message);

                if( $this->email->send()){
                    $this->session->set_flashdata('success', " Email comfirmation link is sent to your Email. Please check you inbox or spam folder. ");
                    
                }else{
                    $this->session->set_flashdata('error', "Can\'t send email check email or contact developer.");
                    
                }
               
            }

        }

        if (isset($_FILES['userfile'])) {
        
            $i = $this->WorkM->GetRow($k, $id);
            $tempImg = $i[0]->img;
           
            $img = $_FILES['userfile']['name'];
            if ($img == '' or ($k . "/" . $img) == $tempImg) {
                $data['img'] = $tempImg;
            } else {
                $data['img'] = $k . "/" . $this->UpdateImg($tempImg, $k, $id);
            }
                    }

        if (isset($_POST["category"])) {
            $data['category'] = $_POST["category"];      
 

    }
    
        if($k=="gallery" || $this->form_validation->run())
    {   
        if ($this->WorkM->UpdateK($k, $id, $data)) {
            redirect('UserC/View/' . $k);
              
        } else {
            $this->session->set_flashdata('error', 'Inalid DATA');
            redirect('UserC/loadEdit/' . $k);
        }
    }

        else{
            $this-> error_display($k, $id); 

        } 
    }

    public function Remove($k, $id)         //To remove data
    {

        $this->load->model('WorkM');        
        
        $tempImg = ' ';
        $i = $this->WorkM->getRow($k, $id);
        if (isset($i[0]->img)) {
            $tempImg = $i[0]->img;
            $this->delImg($k . "/" . $tempImg);
        }

        if ($this->WorkM->Deletek($k, $id)) {
            
            $this->session->set_flashdata('success', "Data deleted Succefully  $k $id");
            redirect('UserC/Change/' . $k);
        } else {
            $this->session->set_flashdata('error', "can't  delete due to server error ");
        redirect('UserC/Change/' . $k);
        }
    }




    public function UpdateImg($tempImg, $k, $id)            //Update image
    {
        $config['upload_path']          = './assets/images/' . $k . "/";
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100000000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->loadEdit($k, $id);     
        } else {
            $this->delImg($tempImg);
            $im = $this->upload->data('file_name');
            return $im;
        }
    }


    public function DelImg($tempImg)            //Delete Image
    {
        if (file_exists('./assets/images/' . $tempImg)) {
            unlink('./assets/images/' . $tempImg);
        } 
    }


    public function logout()            //Logout Admin
    {
        $this->session->unset_userdata('username');
        redirect('MainC');

    }


    public function emailConfig()           //Configure Email
		{
			$config = array(
				'protocol' 	=> 'smtp', 
				'smtp_host' => 'ssl://smtp.gmail.com' , 
				'smtp_port' => 465, 
				'smtp_user' => '05nashiktourism@gmail.com',
				'smtp_pass' => '@gaurav@',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8',
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
			
			// Load email library and passing configured values to email library
			$this->load->library('email',$config);
		}
}
