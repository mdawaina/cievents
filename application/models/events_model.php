
<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Events_model extends CI_Model {


    public function getEvents(){

       // "select col1, col2 , col3 from table1 where cond1"
       $this->db->select("*");
       $this->db->from("events");
       //$this->db->where(array());
       $this->db->limit(6);
       $query = $this->db->get();
       //print_r($query);

       return $query->result();

    }

     function getListTable($table, $cond = array()) {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where($cond);
        $query = $this->db->get();

        return $result = $query->result();

    }


    function insertEvent($data){
       $this->db->insert('events', $data);
       return $this->db->insert_id();
    }

    function insertSpeaker($data) {
        $this->db->insert('speakers', $data);

        $event_id = $data['event'];

        $seapker_data = $this->db->get_where('speakers', array('event' => $event_id));
        return $seapker_data->result();
    }


}

?>