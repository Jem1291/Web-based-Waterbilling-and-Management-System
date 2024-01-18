<?php

class Reader_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function initial_reading($data_read){ 
        $this->db->insert('tblreading',$data_read);
        return $this->db->insert_id();
    }
    

    public function add_reading(){
        $data = array(
            'tblmeter_ID' => $this->input->post('meter_no'),
            'reading' => $this->input->post('reading')
        );
        $this->db->insert('tblreading',$data);
        return $this->db->insert_id();
    }

    public function add_consumption($id){
        $data_consumption = array(
            'previous_read' => $this->input->post('prev_reading'),
            'present_read' => $this->input->post('reading'),
            'tblcubicrate_ID' => $this->input->post('price_ID'),
            'tblreading_ID'=>$id,
            'tblconsumer_ID' => $this->input->post('id'),
            'tblmeter_ID' => $this->input->post('meter_no')
        );
        $this->db->insert('tblconsumption',$data_consumption);
        return $this->db->insert_id();
    }

    public function initial_consumption($data_consumption){
        return $this->db->insert('tblconsumption',$data_consumption);
    }   

    public function add_billing($con_id){
        $prev = $this->input->post('prev_reading');
        $present = $this->input->post('reading');
        $price = $this->input->post('price');
        $total = $present-$prev;
        $amount = $total * $price;

        $data = array(
            'total_consumption' => $total,
            'Total_Payables' => $amount,
            'tblcubicrate_ID' => $this->input->post('price_ID'),
            'bill_status' => "Unpaid",
            'tblconsumption_ID' => $con_id,
            'tblconsumer_ID' => $this->input->post('id'),
            'tblmeter_ID' => $this->input->post('meter_no')
        );

        $this->db->insert('tblbilling',$data);
    }

    public function set_tag(){
        $tag = 2;
        $id = $this->input->post('meter_no');
        $data = array(
            'tag' => $tag
        );
        $this->db->where('ID',$id);
        $this->db->update('tblmeter', $data);
    }

    public function read_details($data){
        $this->db->insert('tblreading', $data);
        return $this->db->insert_id();
    }

    public function get_reading(){
        $id = $this->input->post('id');
        $this->db->where('tblconsumer_ID',$id);
        $this->db->select('
        `tblconsumer_ID`,
        `reading`,
        `read_date
        ');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_consumers_single($param){
        
        $this->db->select('tblconsumer.id, 
        tblconsumer.fname, 
        tblconsumer.mname, 
        tblconsumer.lname, 
        tblconsumer.name_ex,
        tblmeter.Connection_date,
        tblconsumer.Contact_Number, 
        tblreading.read_date, 
        tblreading.reading,
        tblpurok.Purok, 
        tblbaranggay.Baranggay_Name, 
        tblmeter.status, 
        tblmeter.tag, 
        tblmeter.meter_no,
        tblmeter.type,
        tblmeter.ID, 
        previous_read, 
        present_read,  
        tblreading_ID,
        tblconsumption.tblmeter_ID
        ');
        $this->db->from('tblconsumption');
        $this->db->join('tblconsumer', 'tblconsumption.tblconsumer_ID = tblconsumer.id', 'left');
        $this->db->join('tblpurok', 'tblconsumer.Purok_ID = tblpurok.ID', 'left');
        $this->db->join('tblbaranggay', 'tblconsumer.Brgy_ID = tblbaranggay.ID', 'left');
        $this->db->join('tblmeter', 'tblconsumption.tblmeter_ID = tblmeter.ID', 'left');
        $this->db->join('tblreading', 'tblreading.id = tblconsumption.tblreading_ID', 'left');
        $this->db->join('tblcubicrate', 'tblcubicrate.ID = tblconsumption.tblcubicrate_ID', 'left');
        $this->db->where('tblmeter.ID', $param);
        $this->db->order_by('tblreading.read_date', 'desc');
        $this->db->limit(1);

        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_price($param) {
        $this->db->select('ID, previous_rate, present_rate, type, Effectivity_Date');
        $this->db->from('tblcubicrate');
        $this->db->where('type', $param);
        $this->db->order_by('ID', 'DESC');
        $this->db->limit(1);
    
        $query = $this->db->get();
        return $query->row_array();
    
    }

}