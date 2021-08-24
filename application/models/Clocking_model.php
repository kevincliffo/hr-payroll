<?php
    class Clocking_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        public function userHasClockedIn($empId)
        {
            $sql = "SELECT clock_in_date FROM clocking WHERE emp_id = '$empId' AND clock_in_date = '".date('Y-m-d')."'";
            $query = $this->db->query($sql);
            $result = $query->result();
            $recordsCount = count($result);
            return $recordsCount > 0; 
        }

        public function userHasClockedOut($empId)
        {
            $sql = "SELECT * FROM clocking WHERE emp_id = '$empId' AND clock_out_date = '".date('Y-m-d')."'";
            $query = $this->db->query($sql);
            $result = $query->result();
            $recordsCount = count($result);
            return $recordsCount > 0; 
        }

        public function clockInUser($empId)
        {
            $date = date('Y-m-d');
            $time = date('Y-m-d H:i:s');
            
            $sql = "INSERT INTO clocking(emp_id, clock_in_date, clock_in_time) "
                 . " VALUES('$empId', '$date', '$time')";
                 
            $query = $this->db->query($sql);
            return $query;
        }

        public function getClockInTimeAndDate($emp_id)
        {
            $date = date('Y-m-d');
            $sql = "SELECT clock_in_date, clock_in_time FROM clocking WHERE emp_id='$emp_id' AND "
                 . " clock_in_date = '$date'";

            $query = $this->db->query($sql);
            return $query->result();
        }

        public function clockOutUser($emp_id)
        {
            $date = date('Y-m-d');
            $clock_out_time = date('Y-m-d H:i:s');
            $durationMinutes = 0;
            $durationHours = 0;
            
            $res = $this->getClockInTimeAndDate($emp_id);
            $clock_in_time = $res[0]->clock_in_time;
            $clock_in_date = $res[0]->clock_in_date;
            
            $clock_in = new DateTime($clock_in_time);
            $clock_out = new DateTime($clock_out_time);
            $since_start = $clock_in->diff($clock_out);
            
            $sql = "UPDATE clocking SET clock_out_date='$date', clock_out_time='$clock_out_time', "
                 . " duration_minutes='$since_start->i', duration_hours='$since_start->h'"
                 . " WHERE emp_id='$emp_id' AND clock_in_date='$clock_in_date'";
                 
            $query = $this->db->query($sql);
            return $query;     
        }
    }
?>