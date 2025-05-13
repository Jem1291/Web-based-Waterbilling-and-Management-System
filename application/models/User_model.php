<?php

class User_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    } 

    public function check_user($username,$password){
        $this->db->select('*');
        $this->db->from('login_info');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get();
        return $query;
    }

    public function to_archive($param){
        $this->db->where('tblconsumer.id', $param);
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
    public function get_consumers_single($param){
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
        $this->db->where('tblmeter.ID', $param);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_bill_details($param){
        $this->db->select('
            tblconsumer.fname,
            tblconsumer.mname,
            tblconsumer.lname,
            tblconsumer.name_ex,
            tblmeter.meter_no,
            tblconsumption.previous_read,
            tblconsumption.present_read,
            tblbilling.Total_Payables,
            tblbilling.date');
        $this->db->from('tblbilling');
        $this->db->join('tblconsumer','tblconsumer_ID = tblconsumer.id');
        $this->db->join('tblconsumption','tblconsumption_ID = tblconsumption.ID');
        $this->db->join('tblmeter','tblbilling.tblmeter_ID = tblmeter.ID');
        $this->db->where('tblbilling.ID',$param);
        $result = $this->db->get();
        return $result->row_array();

    }

    public function get_consumption($param) {
        $this->db->select('
            tblbilling.ID,
            tblbilling.tblconsumption_ID, 
            MONTHNAME(tblbilling.date) AS month, 
            YEAR(tblbilling.date) AS year, 
            total_consumption, 
            tblcubicrate.present_rate, 
            Total_Payables, 
            bill_status');
        $this->db->from('tblbilling');
        $this->db->join('tblcubicrate', 'tblcubicrate.ID = tblbilling.tblcubicrate_ID', 'left');
        $this->db->join('tblconsumer', 'tblconsumer.id = tblbilling.tblconsumer_ID', 'left');
        $this->db->join('tblmeter', 'tblmeter.ID = tblbilling.tblmeter_ID');
        $this->db->where('tblbilling.tblmeter_ID', $param);
        $this->db->where('YEAR(tblbilling.date)', 2023);
        $this->db->order_by('tblbilling.date', 'desc');
        $result = $this->db->get();
        return $result->result_array();    

    }

    public function consumer_details(){
        $query = $this->db->query('SELECT 
            c.id,
            c.fname,
            c.mname,
            c.lname,
            c.name_ex,
            c.Contact_Number,
            m.ID,
            m.meter_no,
            m.type,
            m.status,
            m.tag,
            CONCAT(
                COALESCE(bg1.Baranggay_Name, bg2.Baranggay_Name), 
                ", ", 
                COALESCE(p1.Purok, p2.Purok)
            ) AS Address,
            m.tblconsumer_ID
        FROM
            tblconsumer c
        LEFT JOIN tblmeter m ON c.id = m.tblconsumer_ID
        LEFT JOIN tblbaranggay bg1 ON m.Brgy_ID = bg1.ID
        LEFT JOIN tblpurok p1 ON m.Purok_ID = p1.ID
        LEFT JOIN tblbaranggay bg2 ON c.Brgy_ID = bg2.ID
        LEFT JOIN tblpurok p2 ON c.Purok_ID = p2.ID
        ORDER BY c.lname
        ');

        return $query->result_array();

    }

    public function user_details(){
        $query = $this->db->query('SELECT
            fname,
            mname,
            lname,
            name_ex,
            username,
            password,
            Purok,
            Baranggay_Name,
            Contact_Number,
            login_info.status,
            UserType,
            login_info_ID
        FROM
            tblconsumer
        LEFT JOIN `login_info` ON tblconsumer.login_info_ID = login_info.ID
        LEFT JOIN `tblpurok` ON tblconsumer.Purok_ID = tblpurok.ID
        LEFT JOIN `tblbaranggay` ON tblconsumer.Brgy_ID = tblbaranggay.ID
        UNION
        SELECT
            fname,
            mname,
            lname,
            name_ex,
            username,
            password,
            Purok,
            Baranggay_Name,
            Contact_Number,
            login_info.status,
            UserType,
            login_info_ID
        FROM
            tblemployee
        LEFT JOIN `login_info` ON tblemployee.login_info_ID = login_info.ID
        LEFT JOIN `tblpurok` ON tblemployee.Purok_ID = tblpurok.ID
        LEFT JOIN `tblbaranggay` ON tblemployee.Brgy_ID = tblbaranggay.ID
        ORDER BY lname
        ');

        return $query->result_array();

    }

    public function log_details($data){
        $this->db->insert('login_info', $data);
        return $this->db->insert_id();
    }

    public function employee_log_details($data){
        $this->db->insert('login_info', $data);
        return $this->db->insert_id();
    }

    public function register($data){
        
        $this->db->insert('tblconsumer', $data);
        return $this->db->insert_id();    

    }

    public function register_employee($data){
        
        $this->db->insert('tblemployee', $data);    

    }

    public function check_exist($fname,$mname,$lname,$name_ex){
        $query = $this->db->get_where('tblconsumer', array('fname'=>$fname,'mname'=>$mname,'lname'=>$lname,'name_ex' => $name_ex));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_employee($fname,$mname,$lname,$name_ex){
        $query = $this->db->get_where('tblemployee', array('fname'=>$fname,'mname'=>$mname,'lname'=>$lname,'name_ex' => $name_ex));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_contact($contact){
        $query = $this->db->get_where('tblconsumer', array('Contact_Number'=>$contact));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_emp_contact($contact){
        $query = $this->db->get_where('tblemployee', array('Contact_Number'=>$contact));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_meter($meter){
        $query = $this->db->get_where('tblmeter', array('meter_no'=>$meter));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_meter($data){
        $this->db->insert('tblmeter',$data);
        return $this->db->insert_id();
    }

    public function view_details($param){
        $this->db->where('tblconsumer.id', $param);
        $this->db->select('tblconsumer.id,
            tblmeter.ID,
            tblreading.ID AS reading_id,
            tblmeter.meter_no,
            tblmeter.type,
            `fname`,
            `mname`,
            `lname`,
            `name_ex`,
            `Connection_date`,
            `login_info_ID,
            tblmeter.status,
            tblmeter.tag,
            tblreading.reading,
            tblbaranggay.Baranggay_Name,
            tblpurok.Purok,
            `Contact_Number`');
        $this->db->from('tblconsumer');
        $this->db->join('tblbaranggay', 'tblconsumer.Brgy_ID = tblbaranggay.ID');
        $this->db->join('tblpurok', 'tblconsumer.Purok_ID = tblpurok.ID');
        $this->db->join('tblmeter', 'tblconsumer.id = tblmeter.tblconsumer_ID', 'left');
        $this->db->join('tblreading', 'tblreading.tblmeter_ID = tblmeter.ID', 'left');
        $result = $this->db->get();
        return $result->row_array();
    }
    

    public function edit_user($param){

        $this->db->where('login_info.id', $param);
        $this->db->select('login_info.id,
            `Usertype`,
            `username`,
            `password`
            ');
        $this->db->from('login_info');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update_status($param){
        $data = array('status' => '1');
        $this->db->where('ID', $param);
        $this->db->update('login_info',$data);

    }
    
    public function approve_consumer(){
        $id = $this->input->post('id');
        $log_ID = $this->input->post('login_info_ID');
        $mname = $this->input->post('mname');
        if($mname == null){
            $mname = '';
        } else{
            $mname = ucfirst(substr($this->input->post('mname'),0,1)).'.';
        }
        $this->update_status($log_ID);
        $data =array(
            'fname'=>ucfirst($this->input->post('fname')),
            'mname'=> $mname,
            'lname'=>ucfirst($this->input->post('lname')),
            'name_ex'=>ucfirst($this->input->post('name_ex')),
            'Purok_ID'=>$this->input->post('purok'),
            'Brgy_ID'=>'1',
            'Contact_Number'=>$this->input->post('contact'),
        );
        $this->db->where('id',$id);
        $this->db->update('tblconsumer', $data);

        
    
        $meter_data = array(
            'meter_no' => $this->input->post('meter_no'),
            'type' => $this->input->post('type'),
            'status'=>$this->input->post('status'),
            'tag'=>$this->input->post('tag'),
            'Brgy_ID' => '1',
            'Purok_ID' => $this->input->post('purok'),
            'tblconsumer_ID' => $id
        );
        $this->db->insert('tblmeter', $meter_data);
        $ID = $this->db->insert_id();


        $data_reading = array(
            'tblmeter_ID'=>$ID,
            'reading'=>$this->input->post('reading')
        );

        $this->db->insert('tblreading', $data_reading);
        $reading_id = $this->db->insert_id();

    
        $data_reading2 = array(
            'tblconsumer_ID'=>$id,
            'tblmeter_ID' =>$ID,
            'tblreading_ID' =>$reading_id,
            'tblcubicrate_ID' => $this->input->post('type'),
            'present_read'=>$this->input->post('reading')
        );
        $this->db->insert('tblconsumption', $data_reading2);
    
    }

    public function update(){
        $id = $this->input->post('id');
        $data = array(
            'Contact_Number' => $this->input->post('contact')
        );

        $this->db->where('id', $id);
        $this->db->update('tblconsumer', $data);
    }
    
    public function get_log_details($log_id){
        $this->db->select('
        username,
        password
        ');
        $this->db->from('login_info');
        $this->db->where('ID',$log_id);
        $result = $this->db->get();
        return $result->row_array();
    }
    
    public function update_user(){
        $id = $this->input->post('id');
        $data =array(
            'Usertype'=>$this->input->post('Usertype'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );

        $this->db->where('id',$id);
        return $this->db->update('login_info', $data);
         
    }

    public function delete($id){
        $this->db->where('ID', $id);
        $this->db->delete('tblmeter');
    }

    public function user_delete($id){
        $this->db->where('ID', $id);
        $this->db->delete('login_info');

        $this->db->where('login_info_ID', $id);
        $this->db->delete('tblconsumer');
        
    }

    public function search($param) {
        $this->db->select('
            c.id,
            c.fname,
            c.mname,
            c.lname,
            c.name_ex,
            c.Contact_Number,
            m.ID,
            m.meter_no,
            m.type,
            m.status,
            m.tag,
            CONCAT(
                COALESCE(bg1.Baranggay_Name, bg2.Baranggay_Name), 
                ", ", 
                COALESCE(p1.Purok, p2.Purok)
            ) AS Address,
            m.tblconsumer_ID');
        $this->db->from('tblconsumer c');
        $this->db->join('tblmeter m', 'c.id = m.tblconsumer_ID');
        $this->db->join('tblpurok p1', 'm.Purok_ID = p1.ID', 'left');
        $this->db->join('tblbaranggay bg1', 'm.Brgy_ID = bg1.ID', 'left');
        $this->db->join('tblpurok p2', 'c.Purok_ID = p2.ID', 'left');
        $this->db->join('tblbaranggay bg2', 'c.Brgy_ID = bg2.ID', 'left');
        $this->db->like('c.lname', $param); // Corrected the column name for the 'lname' field
        $this->db->order_by('c.lname'); // Corrected the table alias for the 'lname' field
        $result = $this->db->get()->result_array(); // Corrected the method chaining
        return $result;
    }
    

    public function searchs($param){
        $this->db->like('lname', $param);
        $query = $this->db->query('SELECT 
            c.id,
            c.fname,
            c.mname,
            c.lname,
            c.name_ex,
            c.Contact_Number,
            m.ID,
            m.meter_no,
            m.type,
            m.status,
            m.tag,
            CONCAT(
                COALESCE(bg1.Baranggay_Name, bg2.Baranggay_Name), 
                ", ", 
                COALESCE(p1.Purok, p2.Purok)
            ) AS Address,
            m.tblconsumer_ID
        FROM
            tblconsumer c
        LEFT JOIN tblmeter m ON c.id = m.tblconsumer_ID
        LEFT JOIN tblbaranggay bg1 ON m.Brgy_ID = bg1.ID
        LEFT JOIN tblpurok p1 ON m.Purok_ID = p1.ID
        LEFT JOIN tblbaranggay bg2 ON c.Brgy_ID = bg2.ID
        LEFT JOIN tblpurok p2 ON c.Purok_ID = p2.ID
        ORDER BY c.lname
        ');
        return $query->result_array();
    }

    public function get_totalConsumer(){
        $this->db->from('tblconsumer');
        $result = $this->db->count_all_results();
        return $result;
    }

    public function get_totalPending(){
        $this->db->from('login_info');
        $this->db->where('status', '0');
        $result = $this->db->count_all_results();
        return $result;
    }

    public function daily_transaction(){
        $current_date = date('Y-m-d');
        $this->db->select('
        tblconsumer.fname,
        tblconsumer.mname,
        tblconsumer.lname,
        tblconsumer.name_ex,
        MONTHNAME(date_paid) as month,
        DAY(date_paid) as Day,
        `meter_no`,
        `Payment`
        ');
        $this->db->from('tblbilling');
        $this->db->join('tblconsumer', 'tblconsumer.id = tblbilling.tblconsumer_ID');
        $this->db->join('tblmeter','tblbilling.tblmeter_ID = tblmeter.ID');
        $this->db->where('date_paid', $current_date);
        $this->db->order_by('Day', 'DESC');
        $this->db->limit(12);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function annual_revenue(){
        $this->db->select('YEAR(date_paid) AS year, 
            MONTHNAME(date_paid) AS month, 
            SUM(Total_Payables) AS total_data');
        $this->db->from('tblbilling');
        $this->db->where('YEAR(date_paid)', 2023);
        $this->db->group_by(array('YEAR(date_paid)', 'MONTH(date_paid)'));
        $query = $this->db->get();
        return $query->result();
    }

    public function annual_data($year){
        $this->db->select('MONTH(Date) AS month_number, 
            YEAR(date) as year,
            MONTHNAME(Date) AS month_name, 
            SUM(total_data) AS total_revenue, 
            SUM(total_expenses) AS total_expenses, 
            SUM(total_consumption) AS total_consumption');
        $this->db->from('(SELECT date, 
        0 AS `total_data`, 
        SUM(amount) AS total_expenses, 
        0 AS total_consumption FROM tblexpenses WHERE YEAR(date) = ' . $year . ' GROUP BY YEAR(date), 
        MONTH(date) 
        UNION ALL SELECT date, 
        SUM(Total_Payables) AS `total_data`, 0 AS total_expenses, 
        SUM(total_consumption) AS total_consumption FROM tblbilling WHERE YEAR(date) = ' . $year . ' GROUP BY YEAR(date), MONTH(date)) AS combined_data');
        $this->db->group_by('MONTH(Date)');
        $this->db->order_by('', 'ASC'); 
        $query = $this->db->get();
        return $query->result_array();
    }  
    
    public function get_tag(){
        $this->db->select('tag, COUNT(tag) AS count');
        $this->db->from('tblmeter');
        $this->db->group_by('tag');
        $query = $this->db->get();
        return $query->result();
    }

    public function overdue_bills(){
        $one_month_ago = date('Y-m-d H:i:s', strtotime('-1 month'));

        $this->db->where('bill_status', 'Unpaid');
        $this->db->where('date <=', "DATE_SUB(NOW(), INTERVAL 1 MONTH)", false);
        $query = $this->db->get('tblbilling');
        $unpaid_bills = $query->result();

    
        if ($query->num_rows() > 0) {

            foreach ($unpaid_bills as $bills) {
                $ID = $bills->ID;
                $meter_id = $bills->tblmeter_ID;
                $data = array('bill_status' => 'Overdue');
                $this->db->where('ID', $ID);
                $this->db->update('tblbilling', $data);

                $data2 = array('tag' => '3');
                $this->db->where('ID', $meter_id);
                $this->db->update('tblmeter',$data2);
            }
        }
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

    public function set_price($data){
        $this->db->insert('tblcubicrate', $data);
    }
    
    public function get_collectibles(){
        $this->db->select("MONTHNAME(DATE) AS MONTH, COUNT(bill_status) AS Unpaid, SUM(Total_Payables) AS Total_Collectibles");
        $this->db->from("tblbilling");
        $this->db->where("bill_status", "Overdue");
        $this->db->or_where("bill_status", "Unpaid");
        $this->db->group_by("MONTH(DATE)");
        $this->db->order_by("MONTH(DATE)", "ASC");
        
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function get_status($param) {
        $this->db->select('status');
        $this->db->from('login_info');
        $this->db->where('ID', $param);
        $result = $this->db->get()->row();
        return $result->status;
    }    

    public function set_status($param) {
        $status = $this->get_status($param);
    
        if ($status == 1) {
            $data = array('status' => '2');
            $this->db->where('ID', $param);
            $this->db->update('login_info', $data);
            return true;
        } elseif ($status == 2) {
            $data = array('status' => '1');
            $this->db->where('ID', $param);
            $this->db->update('login_info', $data);
            return true;
        } else {
            return false;
        }
    }

    public function get_meter_status($param) {
        $this->db->select('status');
        $this->db->from('tblmeter');
        $this->db->where('ID', $param);
        $result = $this->db->get()->row();
        return $result->status;
    }

    public function set_meter_status($param) {
        $status = $this->get_meter_status($param);
    
        if ($status == 1) {
            $data = array('status' => '2');
            $this->db->where('ID', $param);
            $this->db->update('tblmeter', $data);
            return true;
        } elseif ($status == 2) {
            $data = array('status' => '1');
            $this->db->where('ID', $param);
            $this->db->update('tblmeter', $data);
            return true;
        } else {
            return false;
        }
    }
    
}
?>