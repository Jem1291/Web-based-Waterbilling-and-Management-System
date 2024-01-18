<?php

class Cashier_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_consumers_single($id){
        $this->db->select('tblconsumer.id, 
            meter_no,
            tbl 
            fname, 
            mname, 
            lname, 
            name_ex, 
            status, 
            tag_id, 
            Baranggay_Name,
            Purok, 
            Contact_Number');
        $this->db->from('tblconsumer');
        $this->db->join('tblpurok', 'tblconsumer.Purok_ID = tblpurok.ID', 'left');
        $this->db->join('tblbaranggay', 'tblconsumer.Brgy_ID = tblbaranggay.ID', 'left');

        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_consumption($param){
        $this->db->select('tblbilling.tblmeter_ID,
            tblbilling.ID, 
            MONTHNAME(tblbilling.date) AS month, 
            total_consumption, 
            tblcubicrate.present_rate, 
            Total_Payables, 
            bill_status');
        $this->db->from('tblbilling');
        $this->db->join('tblcubicrate', 'tblcubicrate.ID = tblbilling.tblcubicrate_ID', 'right');
        $this->db->join('tblconsumer', 'tblconsumer.id = tblbilling.tblconsumer_ID', 'left');
        $this->db->where_in('bill_status', array('Unpaid', 'Overdue'));
        $this->db->where('tblbilling.tblmeter_ID', $param);
        $this->db->order_by('tblbilling.date', 'desc');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_sum($param) {
        $this->db->select_sum('Total_Payables');
        $this->db->from('tblbilling');
        $this->db->where('tblmeter_ID',$param);
        $this->db->where_in('bill_status', array('Unpaid', 'Overdue'));
        $query = $this->db->get();
        return $query->row()->Total_Payables;
    }

    public function update_bill($ID,$bill_data){
        $this->db->where('ID', $ID);
        $this->db->set($bill_data);
        $this->db->update('tblbilling');
    }

    public function set_tag(){
        $tag = 1;
        $id = $this->input->post('ID');
        $data = array(
            'tag' => $tag
        );
        $this->db->where('ID',$id);
        $this->db->update('tblmeter', $data);
    }

    public function add_expenses($data){
        
        $this->db->insert('tblexpenses', $data);
    }

    public function view_expenses(){
        $this->db->select('
            ID,
            Description,
            UOM,
            qty,
            amount,
            date');
        $this->db->from('tblexpenses');
        $this->db->order_by('date','desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function total_expenses(){
        $this->db->select('
            SUM(amount) AS amount,
            YEAR(date)
        ');
        $this->db->from('tblexpenses');
        $this->db->group_by('YEAR(date)');
        $query = $this->db->get();
        return $query->row_array(); 
    }
    
    
    
    
    
    
    
    
    

}