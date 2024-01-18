<?php

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // if($this->session->userdata('Usertype') != 'Admin'){
        //  redirect(base_url().'logout');   
        // }
 
    }

    public function dashboard(){

        $page = 'dashboard';

        $data['total'] = $this->User_Model->get_totalConsumer();

        $data['connected'] = $this->User_Model->get_totalPending();

        $data['transaction'] = $this->User_Model->daily_transaction();

        $data['revenue'] = $this->User_Model->annual_revenue();
        
        $chart_data = array();
        foreach($data['revenue'] as $row){
            $chart_data[] = array(
                'year' =>$row->year,
                'month' => $row->month,
                'total_data' => $row->total_data
            );
        }
        $data['chart_data'] = json_encode($chart_data);

        $data['tag_counts'] = $this->User_Model->get_tag();
        $data['tag_counts_json'] = json_encode($data['tag_counts']);
               

        $this->load->view('templates/header');
        $this->load->view('pages/Admin/'.$page,$data);
        $this->load->view('templates/footer');
    }

    public function view($param = null){

        if($param == null){

            $page = "consumer";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['consumer'] = $this->User_Model->consumer_details();

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }else{

            $page = "single";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['consumer'] = $this->User_Model->get_consumers_single($param);
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

            $data['consumption'] = $this->User_Model->get_consumption($data['ID']);                       

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
        }
    }

    public function view_users($param = null){

        if($param == null){
            $page = 'users';
    
            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
            $data['users'] = $this->User_Model->user_details();
    
            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
        }else{
            $page = 'user_single';
    
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
    
            $data['user'] = $this->User_Model->get_user_single($param);
            $data['fname'] = $data['user']['fname'];
            $data['mname'] = $data['user']['mname'];
            $data['lname'] = $data['user']['lname'];
            $data['name_ex'] = $data['user']['name_ex'];
            $data['username'] = $data['user']['username'];
            $data['password'] = $data['user']['password'];
            $data['Usertype'] = $data['user']['Usertype'];
            $data['baranggay'] = $data['user']['Baranggay_Name'];
            $data['purok'] = $data['user']['Purok'];
            $data['contact'] = $data['user']['Contact_Number'];
            $data['id'] = $data['user']['login_info_ID'];
    
            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
        }
    
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

    public function add_employee(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('fname','firstname', 'required');

        if($this->form_validation-> run() == FALSE){
            $page = "add_employee";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Personal Information:";

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page, $data);
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

            $result = $this->User_Model->check_exist_employee($fname,$mname,$lname,$name_ex);
            $ContactNo = $this->User_Model->check_emp_contact($Contact);
            
            if($result == true){
                $this->session->set_flashdata('user_exist','User Already Exist!');
                redirect(base_url().'add_employee');
            }elseif($ContactNo == true){
                $this->session->set_flashdata('contact_exist','Contact Number Already Exist!');
                $this->session->set_flashdata('input_data', $this->input->post('fname'));
                redirect('add_employee');
            }else{
                $username = strtolower($this->input->post('fname').'.'.$this->input->post('lname'));
                $username = str_replace(' ', '', $username); 
                $Usertype = $this->input->post('usertype');
                $pass = 'employee123';
                $data = array(
                    'Usertype' => $Usertype,
                    'username'=> $username,
                    'password'=> $pass
                );
            
                $id=$this->User_Model->employee_log_details($data);

                $data_prof =array(
                    'fname'=> $fname,
                    'mname'=> $mname,
                    'lname'=>ucfirst($this->input->post('lname')),
                    'name_ex'=>ucfirst($this->input->post('name_ex')),
                    'Purok_ID'=>$this->input->post('purok'),
                    'Brgy_ID'=>'1',
                    'Contact_Number'=>$Contact,
                    'status'=> '1',
                    'login_info_ID'=> $id
                );

                $this->User_Model->register_employee($data_prof);
                $this->session->set_flashdata('add_user','Successfully Added!');
                redirect(base_url().'users');
            }
        }

    }

    public function approve($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('fname','firstname', 'required');


        if($this->form_validation-> run() == FALSE){
            $page = "approve";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Consumer Details: ";
            $consumerData = $this->User_Model->view_details($param);
            $data['fname'] = $consumerData['fname'];
            $data['mname'] = $consumerData['mname'];
            $data['lname'] = $consumerData['lname'];
            $data['name_ex'] = $consumerData['name_ex'];
            $data['con_date'] = $consumerData['Connection_date'];
            $data['baranggay'] = $consumerData['Baranggay_Name'];
            $data['purok'] = $consumerData['Purok'];
            $data['contact'] = $consumerData['Contact_Number'];
            $data['id'] = $consumerData['id'];
            $data['login_info_ID'] = $consumerData['login_info_ID'];

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page, $data);
            $this->load->view('templates/footer');
        }else{

            $meter = $this->input->post('meter_no');
            $meter_no = $this->User_Model->check_meter($meter);

            if ($meter_no == false) {
                $this->User_Model->approve_consumer();
                $this->session->set_flashdata('update_user','Successfully Approved!');
                redirect(base_url().'consumer');
            }else{
                $this->session->set_flashdata('meter_exist','Meter Number already exist!');
                redirect('approve/'.$param);
            }

        }

    }

    public function edit($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('fname','firstname', 'required');


        if($this->form_validation-> run() == FALSE){
            $page = "edit";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Details:";
            $consumerData = $this->User_Model->view_details($param);
            $data['fname'] = $consumerData['fname'];
            $data['mname'] = $consumerData['mname'];
            $data['lname'] = $consumerData['lname'];
            $data['name_ex'] = $consumerData['name_ex'];
            $data['status'] = $consumerData['status'];
            $data['baranggay'] = $consumerData['Baranggay_Name'];
            $data['purok'] = $consumerData['Purok'];
            $data['contact'] = $consumerData['Contact_Number'];
            $data['meter_no'] = $consumerData['meter_no'];
            $data['id'] = $consumerData['id'];
            $data['meter_id'] = $consumerData['ID'];
            $data['reading_id'] = $consumerData['reading_id'];
            $data['reading'] = $consumerData['reading'];
            $data['type'] = $consumerData['type'];


            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page, $data);
            $this->load->view('templates/footer');

        }else{
            $this->User_Model->update();
            $this->session->set_flashdata('update_user','Successfully Updated!');
            redirect(base_url().'consumer');
        }

    }

    public function edit_user($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 500px;">','</div>');
        $this->form_validation->set_rules('username','username', 'required');
        $this->form_validation->set_rules('password','password', 'required');


        if($this->form_validation-> run() == FALSE){
            $page = "edit_user";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Login Details:";
            $data['user'] = $this->User_Model->edit_user($param);
            $data['Usertype'] = $data['user']['Usertype'];
            $data['username'] = $data['user']['username'];
            $data['password'] = $data['user']['password'];
            $data['id'] = $data['user']['id'];

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page, $data);
            $this->load->view('templates/footer');
        }else{
            $this->User_Model->update_user();
            $this->session->set_flashdata('update_user','Successfully Updated!');
            redirect(base_url().'users');
        }

    }

    public function reports(){
        $page = "reports";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['report'] = $this->User_Model->annual_data(2023);
            $data['year'] = '2023';

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
    }

    public function bill($param){
        $page = "bill";

            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['consumer1'] = $this->User_Model->get_bill_details($param);
            $data['fname'] = $data['consumer1']['fname'];
            $data['mname'] = $data['consumer1']['mname'];
            $data['lname'] = $data['consumer1']['lname'];
            $data['name_ex'] = $data['consumer1']['name_ex'];
            $data['meter'] = $data['consumer1']['meter_no'];
            $data['prev_read'] = $data['consumer1']['previous_read'];
            $data['present_read'] = $data['consumer1']['present_read'];
            $data['amount'] = $data['consumer1']['Total_Payables'];
            $data['date'] = $data['consumer1']['date'];
            


            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
    }

    public function delete($id){
        
        $this->User_Model->delete($id);
        $this->session->set_flashdata('delete','Successfully Deleted!');
        redirect('consumer');
        
    }

    public function user_delete($id){
        
        $this->User_Model->user_delete($id);
        $this->session->set_flashdata('delete','Successfully Deleted!');
        redirect('users');
        
    }

    public function search(){
        $page = 'consumer';
        $param = $this->input->post('search');

        if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
            show_404();
        }
        $data['consumer'] = $this->User_Model->search($param);

        $this->load->view('templates/header');
        $this->load->view('pages/Admin/'.$page,$data);
        $this->load->view('templates/footer');
    }

    public function add_meter($ID) {

            $page = 'add_meter';    
            if (!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')) {
                show_404();
            }
    
            $data['title'] = "Add New Meter:";
            $data['consumer'] = $this->User_Model->get_consumers_single($ID);
            $data['fname'] = $data['consumer']['fname'] ?? '';
            $data['mname'] = $data['consumer']['mname'] ?? '';
            $data['lname'] = $data['consumer']['lname'] ?? '';
            $data['name_ex'] = $data['consumer']['name_ex'] ?? '';
            $data['baranggay'] = $data['consumer']['Baranggay_Name'] ?? '';
            $data['purok'] = $data['consumer']['Purok'] ?? '';
            $data['id'] = $data['consumer']['id'] ?? '';
    
            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
    }

    public function add_newMeter(){
        
        $meter = $this->input->post('meter');
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $read = $this->input->post('present_read');
        
        $meter_no = $this->User_Model->check_meter($meter);
    
        if ($meter_no == true) {
            $this->session->set_flashdata('meter_exist', 'Meter Number Already Exist! ');
            redirect('add_meter/'.$id);
        } else {
            $data_meter = array(
                'tblconsumer_ID' => $id,
                'meter_no' => $this->input->post('meter'),
                'type' => $type,
                'status' => '1',
                'tag' => '1',
                'Brgy_ID' => '1',
                'Purok_ID' => $this->input->post('purok')
            );
            $meter_id = $this->User_Model->add_meter($data_meter);
    
            $data_read = array(
                'tblmeter_ID' => $meter_id,
                'reading' => $read
            );
            $read_id = $this->Reader_Model->initial_reading($data_read); 


            $data_consumption = array(
                'previous_read' => '0',
                'present_read' => $this->input->post('present_read'),
                'tblcubicrate_ID' => $type,
                'tblreading_ID'=>$read_id,
                'tblconsumer_ID' => $id,
                'tblmeter_ID' => $meter_id
            );
            if ($this->Reader_Model->initial_consumption($data_consumption)) {
                $this->session->set_flashdata('add_meter', 'Successfully Added!');
                redirect(base_url().'consumer');
            } else {
                log_message('error', 'Failed to save consumption data');
                $this->session->set_flashdata('error', 'Failed!');
                redirect(base_url().'consumer');
            }
            
   

            }
    }

    public function expenses(){
        $page = 'expenses';
        if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
            show_404();
        }

        $data['expenses'] = $this->Cashier_Model->view_expenses();

        $data['total'] = $this->Cashier_Model->total_expenses();

        $data['total_expenses'] = $data['total']['amount'];

        $this->load->view('templates/header');
        $this->load->view('pages/Admin/'.$page, $data);
        $this->load->view('templates/footer');
    }

    public function add_expenses(){

        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('UOM', 'Unit of Measurement', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
    
        if($this->form_validation->run() == FALSE){
            $page = 'add_expenses';
    
            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
    
            $data['error'] = validation_errors();
    
            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
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
    

    public function update_overdue_bills() {
        $this->User_Model->overdue_bills();
        redirect('consumer');
        
    }

    public function update_price($param = null){
        if ($param == null) {
            $page = 'price';
            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }  


            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page);
            $this->load->view('templates/footer');
        }else{
            $page = 'update_price';
            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }

            $data['price'] = $this->User_Model->get_price($param);
            $data['present'] = $data['price']['present_rate'];
            $data['type'] = $data['price']['type'];

            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/footer');
        }
            
    }

    public function set_price(){
        $this->form_validation->set_rules('new_price', 'Price', 'required');
    
        if($this->form_validation->run() == FALSE){
            $page = 'update_price';
    
            if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
                show_404();
            }
    
            $data['error'] = validation_errors();
    
            $this->load->view('templates/header');
            $this->load->view('pages/Admin/'.$page,$data);
            $this->load->view('templates/cfooter');
        } else {
            $data = array(
                'previous_rate' => $this->input->post('present_rate'),
                'present_rate' => $this->input->post('new_price'),
                'type' => $this->input->post('type')
            );
    
            $this->User_Model->set_price($data);
    
            $this->session->set_flashdata('success','Successfuly Updated!');
            redirect('price');
        }
    }

    public function collectibles(){
        $page = 'collectibles';
    
        if(!file_exists(APPPATH.'views/pages/Admin/'.$page.'.php')){
            show_404();
        }

        $data['collectibles'] = $this->User_Model->get_collectibles();

        $this->load->view('templates/header');
        $this->load->view('pages/Admin/'.$page,$data);
        $this->load->view('templates/cfooter');
    }

    public function update_status($param){

        $data = $this->User_Model->set_status($param);

        if ($data == true) {
            $this->session->set_flashdata('success','Successfuly Updated!');
            redirect('users');
        }else {
            $this->session->set_flashdata('failed','Update Failed!');
            redirect('users');
        }
    }

    public function update_meter_stat($param){

        $data = $this->User_Model->set_meter_status($param);

        if ($data == true) {
            $this->session->set_flashdata('success','Successfuly Updated!');
            redirect('consumer');
        }else {
            $this->session->set_flashdata('failed','Update Failed!');
            redirect('consumer');
        }
    }
}
    
    

?>