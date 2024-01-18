<?php

class Consumer_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    } 

    public function get_id($param){
        $this->db->select('id');
        $this->db->from('tblconsumer');
        $this->db->where('login_info_ID',$param);
        $query = $this->db->get();
        $result = $query->row_array();
        return implode(',', $result);
    }

    public function status($param){
        $this->db->where('tblconsumer.login_info_ID', $param);
        $this->db->select('tblconsumer.id,
            tblmeter.status,
            tblmeter.tag,
            tblconsumer.login_info_ID,
            tblmeter.meter_no AS meter,
            tblmeter.ID as meter_id');
        $this->db->from('tblconsumer');
        $this->db->join('tblmeter', 'tblmeter.tblconsumer_ID = tblconsumer.id');
        $this->db->join('tblbaranggay', 'tblmeter.Brgy_ID = tblbaranggay.ID');
        $this->db->join('tblpurok', 'tblmeter.Purok_ID = tblpurok.ID');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_status($param){
        $this->db->where('tblmeter.ID', $param);
        $this->db->select('tblconsumer.id,
            tblmeter.status,
            tblmeter.tag,
            tblconsumer.login_info_ID,
            tblmeter.meter_no AS meter,
            tblmeter.ID as meter_id');
        $this->db->from('tblconsumer');
        $this->db->join('tblmeter', 'tblmeter.tblconsumer_ID = tblconsumer.id');
        $this->db->join('tblbaranggay', 'tblmeter.Brgy_ID = tblbaranggay.ID');
        $this->db->join('tblpurok', 'tblmeter.Purok_ID = tblpurok.ID');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_meter($param){
        $this->db->where('tblconsumer.login_info_ID',$param);
        $this->db->select('
        tblconsumer.id,
        tblmeter.ID as meter_id,
        tblmeter.meter_no
        ');
        $this->db->from('tblconsumer');
        $this->db->join('tblmeter','tblmeter.tblconsumer_ID = tblconsumer.id');
        $result = $this->db->get();
        return $result->result();

    }

    public function get_consumption($param){
        $this->db->select('total_consumption,Total_Payables');
        $this->db->from('tblbilling');
        $this->db->where('tblmeter_ID',$param);
        $status = array('Unpaid','Overdue');
        $this->db->where_in('bill_status',$status);
        $this->db->order_by('tblbilling.date', 'desc');
        $result = $this->db->get();
        return $result->row_array();
    }
    
    public function consumption($param){
        $this->db->select('total_consumption,Total_Payables');
        $this->db->from('tblbilling');
        $this->db->where('tblmeter_ID',$param);
        $status = array('Unpaid','Overdue');
        $this->db->where_in('bill_status',$status);
        $this->db->order_by('tblbilling.date', 'desc');
        $result = $this->db->get();
        return $result->row_array();
    }
    

    public function get_consumerCon($param) {
        $this->db->select('YEAR(date) AS year, 
            MONTHNAME(date) AS month, 
            SUM(total_consumption) AS total_data');
        $this->db->from('tblbilling');
        $this->db->where('tblmeter_ID',$param);
        $this->db->where('YEAR(date)', date('Y'));
        $this->db->group_by(array('YEAR(date)', 'MONTH(date)'));
        $query = $this->db->get();
        return $query->result();  

    }

    public function get_consumers_single($param){
        $this->db->where('meter_no', $param);
        $this->db->select('tblconsumer.id,
            tblconsumer.fname,
            tblconsumer.mname,
            tblconsumer.lname,
            tblconsumer.name_ex,
            tblmeter.status,
            `tag`,
            tblbaranggay.Baranggay_Name,
            tblpurok.Purok,
            tblconsumer.Contact_Number,
            tblconsumer.login_info_ID,
            `meter_no`,
            tblmeter.ID');
        $this->db->from('tblmeter');
        $this->db->join('tblbaranggay', 'tblmeter.Brgy_ID = tblbaranggay.ID');
        $this->db->join('tblpurok', 'tblmeter.Purok_ID = tblpurok.ID');
        $this->db->join('tblconsumer', 'tblmeter.tblconsumer_ID = tblconsumer.id');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_userConsumption($param) {
        $this->db->select('tblbilling.tblconsumption_ID, MONTHNAME(tblbilling.date) AS month, YEAR(tblbilling.date) AS year, total_consumption, tblcubicrate.present_rate, Total_Payables, bill_status');
        $this->db->from('tblbilling');
        $this->db->join('tblcubicrate', 'tblcubicrate.ID = tblbilling.tblcubicrate_ID', 'left');
        $this->db->join('tblconsumer', 'tblconsumer.id = tblbilling.tblconsumer_ID', 'left');
        $this->db->join('tblmeter', 'tblmeter.ID = tblbilling.tblmeter_ID');
        $this->db->where('tblbilling.tblmeter_ID', $param);
        $this->db->where('YEAR(tblbilling.date)', 2023);
        $this->db->order_by('tblbilling.date', 'desc');
        $result = $this->db->get()->result_array();
        return $result;    

    }

}