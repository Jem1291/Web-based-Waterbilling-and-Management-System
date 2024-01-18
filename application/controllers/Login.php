<?php

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();

     }

    public function login(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $page = 'login';
    
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $this->load->view('pages/'.$page);
        }else {
            $username =  $this->input->post('username',TRUE);
            $password =  $this->input->post('password',TRUE);
            $result = $this->User_Model->check_user($username,$password);
    
            if($result->num_rows() > 0){
                $data = $result->row_array();
                $username = $data['username'];
                $access = $data['Usertype'];
                $id = $data['ID'];

    
                $userdata = array(
                    'ID' =>$id,
                    'username' => $username,
                    'Usertype' => $access,
                    'logged_in' => TRUE
                );
    
                $this->session->set_userdata($userdata);

                if($this->session->userdata('Usertype') === 'Admin'){
                    $this->session->set_flashdata('logged_in','Successfully Logged in!');    
                    redirect(base_url('dashboard'));
                }elseif($userdata['Usertype'] === 'Meter reader'){
                    $this->session->set_flashdata('logged_in','Successfully Logged in!');
                    redirect(base_url('view_consumer'));
                }elseif($userdata['Usertype'] === 'Cashier'){
                    $this->session->set_flashdata('logged_in','Successfully Logged in!');
                    redirect(base_url('cashier_view'));
                }elseif($userdata['Usertype'] === 'Consumer'){
                    $this->session->set_flashdata('logged_in','Successfully Logged in!');
                    redirect(base_url('consumer_dashboard'));
                }else{
                    echo 'Failed';
                }
    
            }else{
                $this->session->set_flashdata('logged_in_failed','Invalid username and password!');
                redirect(base_url().'login');
            }


        } 
    }
     

    public function logout(){
        if(isset($this->session)){
            $this->session->sess_destroy();
        }
        redirect(base_url().'login');
    }

}