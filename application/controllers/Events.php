<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{


    function listEvents(){
        $this->load->model('events_model', 'events');

        $event_data = $this->events->getEvents();

        $data = array();
        $event_html = "";
        foreach($event_data as $event ){
         $event_html = $event_html . $this->view_event($event);
        }
        $data['eventHTML'] = $event_html;
        $this->_view('events/eventPage', $data, false);
    }

    function view_event($event){
        $data['event_item'] = $event;
        return $this->_view("events/event_item",$data, true);
    }


    function _view($page, $data = array(), $isHTML = false){
        if($isHTML) {
            return $this->load->view($page,$data,true);
        } else {
            $this->load->view('header');       
            $this->load->view($page, $data);       
            $this->load->view('footer');    
        }
    }
}