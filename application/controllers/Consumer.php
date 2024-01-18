<?php

class Consumer extends CI_Controller{


    public function __construct(){ 
        parent::__construct();
        // if($this->session->userdata('Usertype') != 'Consumer'){
        //     redirect(base_url('login'));
        // }

    }    
    
    public function register(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('fname','firstname', 'required');

        if($this->form_validation-> run() == FALSE){
            $page = "register";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Personal Information:";

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
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
                redirect('register');
            }elseif($ContactNo == true){
                $this->session->set_flashdata('contact_exist','Contact Number Already Used!');
                redirect('register');
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
                $this->User_Model->register($data_prof);

                $this->session->set_flashdata('add_user','Successfully Added!');
                redirect(base_url().'consumer');
            } 
        }
    }

    public function consumer_dashboard(){
            $page = 'consumer_dashboard';
        
            if(!file_exists(APPPATH.'views/pages/consumer/'.$page.'.php')){
                show_404();
            }
    
            $ID = $this->session->userdata('ID');
            $data['id'] = $this->Consumer_Model->get_id($ID);
            $data['meter'] = $this->Consumer_Model->get_meter($ID);
            $data['status'] = $this->Consumer_Model->status($ID); 
            $data['consumption'] = $this->Consumer_Model->get_consumption($data['id']);
            $data['con'] = $data['consumption']['total_consumption'] ?? '';
            $data['pay'] = $data['consumption']['Total_Payables'] ?? '';
            $data['consumerCon'] = $this->Consumer_Model->get_consumerCon(0);
    
            $chart_data = array();
            foreach($data['consumerCon'] as $row){
                $chart_data[] = array(
                    'year' =>$row->year,
                    'month' => $row->month,
                    'total_data' => $row->total_data
                );
            }
            $data['chart_data'] = json_encode($chart_data);
        
            $this->load->view('templates/consumer_header',$data);
            $this->load->view('pages/consumer/'.$page,$data);
            $this->load->view('templates/cfooter');
    }

    public function dashboard($param){
    
        $page = 'dashboard';
        
        if(!file_exists(APPPATH.'views/pages/consumer/'.$page.'.php')){
            show_404();
        }

        $ID = $this->session->userdata('ID');
        $data['id'] = $this->Consumer_Model->get_id($ID);
        $data['meter'] = $this->Consumer_Model->get_meter($ID);

        $data['status'] = $this->Consumer_Model->get_status($param); 
        $data['consumption'] = $this->Consumer_Model->consumption($param);
        $data['con'] = $data['consumption']['total_consumption'] ?? '';
        $data['pay'] = $data['consumption']['Total_Payables'] ?? '';

        $data['consumerCon'] = $this->Consumer_Model->get_consumerCon($param);

        $chart_data = array();
        foreach($data['consumerCon'] as $row){
            $chart_data[] = array(
                'year' =>$row->year,
                'month' => $row->month,
                'total_data' => $row->total_data
            );
        }
        $data['chart_data'] = json_encode($chart_data);
    
        $this->load->view('templates/consumer_header',$data);
        $this->load->view('pages/consumer/'.$page,$data);
        $this->load->view('templates/cfooter');
    }

    public function single($param){
    
        $page = 'single';
        
        if(!file_exists(APPPATH.'views/pages/consumer/'.$page.'.php')){
            show_404();
        }

        $ID = $this->session->userdata('ID');
        $data['meter'] = $this->Consumer_Model->get_meter($ID);

            $data['consumer'] = $this->Consumer_Model->get_consumers_single($param);
            $data['fname'] = $data['consumer']['fname'] ?? '';
            $data['mname'] = $data['consumer']['mname'] ?? '';
            $data['lname'] = $data['consumer']['lname'] ?? '';
            $data['name_ex'] = $data['consumer']['name_ex'] ?? '';
            $data['status'] = $data['consumer']['status'] ?? '';
            $data['tag'] = $data['consumer']['tag'] ?? '';
            $data['baranggay'] = $data['consumer']['Baranggay_Name'] ?? '';
            $data['purok'] = $data['consumer']['Purok'] ?? '';
            $data['contact'] = $data['consumer']['Contact_Number'] ?? '';
            $data['id'] = $data['consumer']['id'] ?? '';
            $data['ID'] = $data['consumer']['ID'] ?? '';
            $data['meterno'] = $data['consumer']['meter_no'] ?? '';

            $data['consumption'] = $this->Consumer_Model->get_userConsumption($data['ID']);

        $this->load->view('templates/consumer_header',$data);
        $this->load->view('pages/consumer/'.$page,$data);
        $this->load->view('templates/cfooter');
    }

    public function bill($param){
        $page = "bill";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['consumer'] = $this->User_Model->get_bill_details($param);
            $data['fname'] = $data['consumer']['fname'] ?? '';
            $data['mname'] = $data['consumer']['mname'] ?? '';
            $data['lname'] = $data['consumer']['lname'] ?? '';
            $data['name_ex'] = $data['consumer']['name_ex'] ?? '';
            $data['status'] = $data['consumer']['status'] ?? '';
            $data['tag'] = $data['consumer']['tag'] ?? '';
            $data['baranggay'] = $data['consumer']['Baranggay_Name'] ?? '';
            $data['purok'] = $data['consumer']['Purok'] ?? '';
            $data['contact'] = $data['consumer']['Contact_Number'] ?? '';
            $data['id'] = $data['consumer']['id'] ?? '';
            $data['ID'] = $data['consumer']['ID'] ?? '';
            $data['meter'] = $data['consumer']['meter_no'] ?? '';

            $data['consumption'] = $this->User_Model->get_consumption($data['meter']);
            


            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
    }

    
}

?>