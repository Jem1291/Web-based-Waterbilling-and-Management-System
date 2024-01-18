<?php

class Register extends CI_Controller{
    public function consumer_register(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('fname','firstname', 'required');

        if($this->form_validation->run() == FALSE){
            $page = 'consumer_register';
    
            if(!file_exists(APPPATH.'views/pages/consumer/'.$page.'.php')){
                show_404();
            }

            $this->load->view('pages/consumer/'.$page);
        }else{

            $mname = $this->input->post('mname');
            
            if($mname== null){
                $mname = '';
            }else{
                $mname = ucfirst(substr($this->input->post('mname'),0,1)).'.';
            }

                $fname=ucwords($this->input->post('fname'));
                $mname= $mname;
                $lname=ucfirst($this->input->post('lname'));
                $name_ex=ucfirst($this->input->post('name_ex'));
                $Contact=$this->input->post('contact');

            $result = $this->User_Model->check_exist($fname,$mname,$lname,$name_ex);
            $ContactNo = $this->User_Model->check_contact($Contact);
            
            if($result == true){
                $this->session->set_flashdata('user_exist','User Already Exist!');
                redirect('consumer_register');
            }elseif($ContactNo == true){
                $this->session->set_flashdata('contact_exist','Contact Number Already Used!');
                redirect('consumer_register');
            }else{
                $username = $this->input->post('fname').'.'.$this->input->post('lname');
                $username = str_replace(' ', '', $username); 
                $usertype = 'Consumer';
                $pass = "pass123";
                
                $data = array(
                    'Usertype' => $usertype,
                    'username'=> strtolower($username),
                    'password'=> $pass
                );
            
                $log_id=$this->User_Model->log_details($data);
                $data_prof =array(
                    'fname'=> $fname,
                    'mname'=> $mname,
                    'lname'=>ucfirst($this->input->post('lname')),
                    'name_ex'=>ucfirst($this->input->post('name_ex')),
                    'Purok_ID'=>$this->input->post('purok'),
                    'Brgy_ID'=>'1',
                    'Contact_Number'=>$Contact,
                    'login_info_ID'=> $log_id
                );
                $id = $this->User_Model->register($data_prof);

                $this->session->set_flashdata('add_user','Successfully Added!');
                redirect('log_details/'.$log_id);
            } 
        }
    }

    public function log_details($log_id){
        $page = 'log_details';
        
        if(!file_exists(APPPATH.'views/pages/consumer/'.$page.'.php')){
            show_404();
        }

        $log_info = $this->User_Model->get_log_details($log_id);
    
        if(!empty($log_info)){
            $data['log_info'] = $log_info;
            $data['username'] = $data['log_info']['username'];
            $data['password'] = $data['log_info']['password'];
        } else {
            $data['username'] = '';
            $data['password'] = '';
        }
    
        $this->load->view('pages/consumer/'.$page, $data);
        $this->session->set_flashdata('add_user','Successfully Added!');
    }

}