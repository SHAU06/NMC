<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkC extends CI_Controller
{

    public function __construct()  
    {
        parent::__construct();
        if($this->session->userdata('username'))
        {
            redirect('UserC');
            if($this->session->tempdata('penalty')){
                $this->session->set_flashdata('error', "Your Ip is Blocked. Go back to home page");
                $this->index();
            }
        }
    }

    public function index()             //Login page
    {
        $this->load->model('WorkM');
        $Page = $this->WorkM->GetRow('pages',13);
        $navbar=$this->WorkM->Gets('navbar');        
        $this->load->view('public/loginpage',compact('Page','navbar'));

    }

    
    public function AuthUser()              //Authenticate user
    {
        $un = $this->input->post('username');
        $un =  html_escape($un);                
        $pw = $this->input->post('password');
        $pw =  html_escape($pw);
        
        $this->load->model('WorkM');
        $navbar=$this->WorkM->Gets('navbar');
        $Page = $this->WorkM->GetRow('pages',13);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','User Name','required|alpha_numeric|max_length[8]|min_length[4]|trim');
        $this->form_validation->set_rules('password','password','required|alpha_numeric|max_length[8]|min_length[4]|trim');
        if($this->form_validation->run())
        {            
            if($this->WorkM->CheckUserName($un,$pw)){
                redirect('UserC');
            }
            elseif(($this->WorkM->CheckUserName($un,$pw))==false)
            {
                $this->session->set_flashdata('error', 'Username /Password is wrong');                
                $this->load->view('public/loginpage',compact('Page','navbar'));
            }
        }
        else{
            $this->load->view('public/loginpage',compact('Page','navbar'));
        }   
        
    }



    public function activate($email,$hash)          //Activate email
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
         $data = array(
            'email' => $email,
            'hash' => $hash,
        );
         $data = $this->security->xss_clean($data);
         $this->load->model('WorkM');
         
         $d = $this->WorkM->GetUsernameByEmail(urldecode($data['email']));
         
         $hash = $d->hash;

         if($data['hash'] == $hash){
            
            $data = array(
                'verified'=> 1,
                'hash'=>''
            );
            $this->WorkM->UpdateK('users',$d->id,$data);
            $this->session->set_userdata('username', $d->username, 'id', $d->id);
            $this->session->set_userdata('verified', 1);
            $this->session->set_flashdata('success', "User verified ");
            
            redirect('/login');             
        }else{
            $this->session->set_flashdata('error', "Url is Incorrect ");
            redirect('/login');    
            
        }
    }
}



    public function ForgotPassword()            //Forgot password 
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
         $data = array(
            'username' => $this->input->post('username'),
        );
         $data = $this->security->xss_clean($data);
         
         $this->load->library('user_agent');
         $agent = [];
         if ($this->agent->is_browser())
         {
            $agent['browser'] = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent['mobile'] = $this->agent->mobile();
        }else if($this->agent->platform()){
            $agent['platform'] = $this->agent->platform(); 
        }           

        echo $this->agent->platform();

        $this->load->model('WorkM');			
        $d = $this->WorkM->GetUsername(($data['username']));
        if ($d){
            $hash= md5(rand(0,1000));

            if(filter_var($d->email, FILTER_VALIDATE_EMAIL)){

                    //Add Admin Mail with ip , brower , os  ,username                    

                $to      = $d->email; 
                    $subject = 'Forgot Password | Nashik Tourism '; // Give the email a subject 
                    $email = urlencode($d->email);
                    $url = base_url('/changePassword/'.$email.'/'.$hash);
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
                    Hi Admin,
                    </a></p>
                    <p><a style="text-decoration:none;color:#000">A password reset for your account was requested.</a></p>
                    <p><a style="text-decoration:none;color:#000">Please check following details... </a></p>
                    <p style="text-decoration:none;color:#000"><b>Brower : </b> '. $agent['browser'] .'</p>
                    <p style="text-decoration:none;color:#000"><b> Platform : </b> '.  $this->agent->platform() .'</p>'.
                    ($this->agent->is_mobile()?'<p style="text-decoration:none;color:#000"> Platform :  '.$agent['platform'].'</p>':'').'
                    <p style="text-decoration:none;color:#000"> If its not you then please report to admin. </p>
                    <br>
                    
                    <p><a style="text-decoration:none;color:#000">Please click the button below to change your password.</a></p>
                    <p><a style="text-decoration:none;color:#000">Note that this link is valid for 24 hours. After the time limit has expired, you will have to resubmit the request for a password reset.</a></p>
                    <a href='.$url.' style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#ec5252;border-top:12px solid #ec5252;border-bottom:12px solid #ec5252;border-right:18px solid #ec5252;border-left:18px solid #ec5252;display:inline-block" target="_blank" data-saferedirecturl="#">
                    Change Your Password
                    </a>
                    </div>
                    </div>
                    </div>
                    <div style="font:11px sans-serif;color:#686f7a">
                    <p style="font-size:11px;color:#686f7a">
                    Delivered by <a href="http://nashiktourism.ga">NASHIK TOURISM</a> Team.
                    </p>
                    </div>
                    </div>
                    </div>';

                    $this->emailConfig();
                    $this->email->from('05nashiktourism@gmail.com');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
                    if( $this->email->send()){
                        $this->WorkM->UpdateK('users',$d->id,array('hash'=>$hash));

                        $this->session->set_flashdata('success', " Forgot Password link is send to your Email. Please check you inbox or spam folder. ");
                        redirect('/login');   

                    }else{
                        $this->session->set_flashdata('error', "Can\'t send email. check email or contact developer kunalguptadev007@gmail.com");
                        redirect('/login');    
                    }
                }else{
                    $this->session->set_flashdata('error', "Can\'t send email. Email is not vaild. Pls contact the developer kunalguptadev007@gmail.com");
                    redirect('/login');  
                }
            }else{
                //Add Admin Mail with ip , brower , os  ,username
                $attempt = $this->session->userdata('attempt');
                $attempt++;
                $this->session->set_userdata('attempt', $attempt);

                if ($attempt >= 5) {
                    $attempt = 0 ;
                    $this->session->set_userdata('attempt', $attempt);
                    $this->session->set_tempdata('penalty', true, 300); //set the name of the sess var to 'penalty, the value will be true and will expire within 5 minutes (expressed in sec.)
                    $this->session->set_flashdata('error', "Too many tries User is Blocked for 5 minutes. For security reason This insident is reported. $attempt");
                    
                }                 
                $this->session->set_flashdata('error', "Username is Incorrect. For security reason This insident is reported. $attempt");
                redirect('/login');    
            }

        }else if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $this->load->model('WorkM');
            $Page = $this->WorkM->GetRow('pages',13);
            $this->load->view('public/forgotpassword',compact('Page'));
        }
    }

    public function ChangePasswordView($email,$hash)            //Change password form
    {
        $data = array(
            'email' => $email,
            'hash' => $hash,
        );
        $data = $this->security->xss_clean($data);
        
        $this->load->model('WorkM');
        $d = $this->WorkM->GetUsernameByEmail(urldecode($data['email']));
        $hash = $d->hash;

        if($data['hash'] == $hash){
            
            $this->load->model('WorkM');
            $Page = $this->WorkM->GetRow('pages',13);
            $this->load->view('public/changepassword',compact('Page','d'));
        }else{
            $this->session->set_flashdata('error', "Url is Incorrect ");
            redirect('/login');    
        }
    }


    public function ChangePassword()            //Chnage password 
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
         $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
         $data = $this->security->xss_clean($data);
         $this->load->model('WorkM');
         $d = $this->WorkM->GetUsername(($data['username']));
         if($d){

            
            $password= password_hash($data['password'], PASSWORD_DEFAULT) ;
            
            if($this->WorkM->UpdateK('users',$d->id,array('password'=>$password , 'hash'=>'')))
            {
                $this->session->set_flashdata('success', "Password Changed Successfully. ");
                redirect('/login');    

            }else{
                $this->session->set_flashdata('error', "Server Error pls contact developer ");
                redirect('/login');    
                
            }
        }else{
            $this->session->set_flashdata('error', "Unauthories access . For security reason This insident is reported");
            redirect('/login');    
        }
    }
}



    public function error_display($k,$c)                //Error messages
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
    elseif(form_error('username')!=NULL){
        $this->function_alert(form_error('username'),$k,$c);
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
    elseif(form_error('email')!=NULL){
            // echo form_error('email');
        $this->function_alert(form_error('email'),$k,$c);
    }
}

    private function emailConfig()          //Configure email
    {
        $config = array(
            'protocol'  => 'smtp' , 
            'smtp_host' => 'smtp.gmail.com' , 
            'smtp_port' => 465 , 
            'smtp_crypto'=>'ssl',
            'smtp_user' => '05nashiktourism@gmail.com',
            'smtp_pass' => '@gaurav@',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8', 
            'newline'   => "\r\n",  
            'wordwrap'  => TRUE 
        );
        
            // Load email library and passing configured values to email library
        $this->load->library('email',$config);
    }

}
?>