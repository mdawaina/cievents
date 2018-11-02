
<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Events_model extends CI_Model {


    public function getEvents(){

       // "select col1, col2 , col3 from table1 where cond1"
       $this->db->select("*");
       $this->db->from("events");
       //$this->db->where(array());
       $this->db->limit(3);
       $query = $this->db->get();
       //print_r($query);

       return $query->result();

    }


}

?>