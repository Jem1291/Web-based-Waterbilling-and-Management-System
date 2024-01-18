<?php

class Cashier extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // if($this->session->userdata('Usertype') != 'Cashier'){
        //     $this->session->sess_destroy();
        //     redirect(base_url().'login');
        // }

    }

    
    public function cashier_view($param = null){

        $param = $this->input->post('search');

        if($param == null){

            $page = 'consumer';

            if(!file_exists(APPPATH.'views/pages/cashier/'.$page.'.php')){
                show_404();
            }
            $data['consumer'] = $this->User_Model->consumer_details();


            $this->load->view('templates/cheader');
            $this->load->view('pages/cashier/'.$page,$data);
            $this->load->view('templates/cfooter');
        }else{
            $page = "consumer";
            

            if(!file_exists(APPPATH.'views/pages/cashier/'.$page.'.php')){
                show_404();
            }
            $data['consumer'] = $this->User_Model->search($param);
            
                
            $this->load->view('templates/cheader');
            $this->load->view('pages/cashier/'.$page,$data);
            $this->load->view('templates/cfooter');
        }
    
    }

    public function cashier($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('reading','reading', 'required');

        if($this->form_validation-> run() == FALSE){
            $page = "cashier";

            if(!file_exists(APPPATH.'views/pages/cashier/'.$page.'.php')){
                show_404();
            }

        $data['consumer'] = $this->Reader_Model->get_consumers_single($param);
        $data['fname'] = $data['consumer']['fname'];
        $data['mname'] = $data['consumer']['mname'];
        $data['lname'] = $data['consumer']['lname'];
        $data['name_ex'] = $data['consumer']['name_ex'];
        $data['con_date'] = $data['consumer']['Connection_date'];
        $data['status'] = $data['consumer']['status'];
        $data['tag'] = $data['consumer']['tag'];
        $data['baranggay'] = $data['consumer']['Baranggay_Name'];
        $data['purok'] = $data['consumer']['Purok'];
        $data['contact'] = $data['consumer']['Contact_Number'];
        $data['meter'] = $data['consumer']['meter_no'];
        $data['meter_id'] = $data['consumer']['ID'] ?? '';
        $data['id'] = $data['consumer']['id'];

        $data['consumption'] = $this->Cashier_Model->get_consumption($param);

        $data['total'] = $this->Cashier_Model->get_sum($param);

        $this->load->view('templates/cheader');
        $this->load->view('pages/cashier/'.$page,$data);
        $this->load->view('templates/cfooter');
        
        }
    }

    public function payment(){
        
        $total = $this->input->post('total');
        $payment = $this->input->post('payment');
        $bal = $payment - $total;
        date_default_timezone_set('Asia/Manila');

        if($bal==0){

        $ID = $this->input->post('bill_ID');
        $bill_data = array(
            'bill_status' => 'Paid',
            'payment' => $payment,
            'date_paid' => date('Y-m-d')
        );
        $this->Cashier_Model->update_bill($ID,$bill_data);
        $this->Cashier_Model->set_tag();

        $this->session->set_flashdata('pay','Paid Successfully!');
        redirect('cashier_view');
        
        }elseif($payment>$total){
    
            $ID = $this->input->post('bill_ID');
            $bill_data = array(
                'bill_status' => 'Paid',
                'payment' => $payment,
                'date_paid' => date('Y-m-d')
            );
            $this->Cashier_Model->update_bill($ID,$bill_data);
            $this->Cashier_Model->set_tag();
            $this->session->set_flashdata('pay_change','The change is ₱'.$bal);
            redirect('cashier_view');
        }elseif($payment<$total){
            $this->session->set_flashdata('pay_failed',' <i class="bi bi-exclamation-circle"></i> Must be fully paid!');
            redirect('cashier/'.$this->input->post('ID'));
        }
        
    }

    public function expenses(){
        $page = 'expenses';
        if(!file_exists(APPPATH.'views/pages/cashier/'.$page.'.php')){
            show_404();
        }

        $data['expenses'] = $this->Cashier_Model->view_expenses();

        $data['total'] = $this->Cashier_Model->total_expenses();

        $data['total_expenses'] = $data['total']['amount'];

        $this->load->view('templates/cheader');
        $this->load->view('pages/cashier/'.$page, $data);
        $this->load->view('templates/cfooter');
    }

    public function add_expenses(){

        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('UOM', 'Unit of Measurement', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
    
        if($this->form_validation->run() == FALSE){
            $page = 'add_expenses';
    
            if(!file_exists(APPPATH.'views/pages/cashier/'.$page.'.php')){
                show_404();
            }
    
            $data['error'] = validation_errors();
    
            $this->load->view('templates/cheader');
            $this->load->view('pages/cashier/'.$page,$data);
            $this->load->view('templates/cfooter');
        } else {
            $data = array(
                'qty' => $this->input->post('qty'),
                'UOM' => $this->input->post('UOM'),
                'Description' => $this->input->post('Description'),
                'amount' => $this->input->post('amount')
            );
    
            $this->Cashier_Model->add_expenses($data);
    
            $this->session->set_flashdata('success','Successfuly Added!');
            redirect('expenses');
        }
    }
    


}