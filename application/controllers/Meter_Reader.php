<?php

class Meter_Reader extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // if($this->session->userdata('Usertype') != "Meter reader"){
        //     redirect(base_url().'login');
        // }


    }

    public function view_consumer($param = null){

        $param = $this->input->post('search');
    
        if($param == null){
    
            $page = 'consumer';
    
            if(!file_exists(APPPATH.'views/pages/mreader/'.$page.'.php')){
                show_404();
            }
            $data['consumer'] = $this->User_Model->consumer_details();
    
    
            $this->load->view('templates/mheader');
            $this->load->view('pages/mreader/'.$page,$data);
            $this->load->view('templates/mfooter');
        }else{
            $page = "consumer";
            
            if(!file_exists(APPPATH.'views/pages/mreader/'.$page.'.php')){
                show_404();
            }
            $data['consumer'] = $this->User_Model->search($param);
            
                
            $this->load->view('templates/mheader');
            $this->load->view('pages/mreader/'.$page,$data);
            $this->load->view('templates/mfooter');
        }
        
    }
    
    public function reader($param){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('reading','reading', 'required');
    
        if($this->form_validation-> run() == FALSE){
            $page = "reader";
    
            if(!file_exists(APPPATH.'views/pages/mreader/'.$page.'.php')){
                show_404();
            }
            
            $data['reader'] = $this->Reader_Model->get_consumers_single($param);
            $data['fname'] = $data['reader']['fname'];
            $data['mname'] = $data['reader']['mname'];
            $data['lname'] = $data['reader']['lname'];
            $data['name_ex'] = $data['reader']['name_ex'];
            $data['con_date'] = $data['reader']['Connection_date'];
            $data['status'] = $data['reader']['status'];
            $data['tag'] = $data['reader']['tag'];
            $data['baranggay'] = $data['reader']['Baranggay_Name'];
            $data['purok'] = $data['reader']['Purok'];
            $data['contact'] = $data['reader']['Contact_Number'];
            $data['meter'] = $data['reader']['meter_no'];
            $data['type'] = $data['reader']['type'];
            $data['id'] = $data['reader']['id'];
            $data['prev_reading'] = $data['reader']['present_read'];
            $data['meter_ID'] = $data['reader']['tblmeter_ID'];
            $data['get_price'] = $this->Reader_Model->get_price($data['type']);
            $data['price'] = $data['get_price']['present_rate'];
            $data['price_ID'] = $data['get_price']['ID'];
    
            $this->load->view('templates/mheader');
            $this->load->view('pages/mreader/'.$page,$data);
            $this->load->view('templates/mfooter');
        }
    }
    
    public function add_reading(){
        $id = $this->Reader_Model->add_reading();
        $con_id = $this->Reader_Model->add_consumption($id);    
        $this->Reader_Model->add_billing($con_id);
        $this->Reader_Model->set_tag();
        $this->session->set_flashdata('add_reading','Successfully Added!');
        redirect(base_url().'view_consumer');
    }
}

?>