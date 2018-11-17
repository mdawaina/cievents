<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{


    function listEvents(){
        $this->load->model('events_model', 'events');

        $event_data = $this->events->getEvents();

        $data = array();
        $event_html = "";
        foreach($event_data as $event ){

         $speakers = $this->events->getListTable("speakers", array("event"=> $event->id));
         $event_html = $event_html . $this->view_event($event, $speakers);
        }
        $data['eventHTML'] = $event_html;
        $this->_view('events/eventPage', $data, false);
    }

    function view_event($event, $speakers){
        $data['event_item'] = $event;
        $data['speakers'] = $speakers;
        return $this->_view("events/event_item",$data, true);
    }


    function addEvent(){
        if(empty($_POST)){
            $this->_view("events/addEvent");
        }
        else {
            $this->load->model('events_model', 'events');
            $eventDate['title'] = $this->input->post('title');

            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            $this->upload->do_upload('photo');
            $data = array('upload_data' => $this->upload->data());

           
           
            $eventDate['photo'] = $data['upload_data']['file_name'];
            $eventDate['city'] = $this->input->post('city');
            $eventDate['date'] = $this->input->post('date');
            $eventDate['address'] = $this->input->post('address');
            $eventDate['about'] = $this->input->post('about');
            
            $now = new DateTime("now", new DateTimeZone('Asia/Riyadh')); 
            $eventDate['createdAt'] = $now->format('Y-m-d H:i:s');
            
            $data = null;
            $data['event'] = $this->events->insertEvent($eventDate);
            $data['event_title'] = $this->input->post('title');

            $this->_view("events/addspeaker", $data);

        }
    }


    function addSpeaker(){
          if(empty($_POST)){
            $this->_view("events/addSpeaker");
        }
        else {
            $this->load->model('events_model', 'events');
             $speakerData['name'] = $this->input->post('name');
             $speakerData['title'] = $this->input->post('title');
             $speakerData['about'] = $this->input->post('about');
             $now = new DateTime("now", new DateTimeZone('Asia/Riyadh')); 
            $speakerData['createdAt'] = $now->format('Y-m-d H:i:s');
             $speakerData['event'] = $this->input->post('event');

              $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            $this->upload->do_upload('sphoto');
            $data = array('upload_data' => $this->upload->data());
            $speakerData['sphoto'] = $data['upload_data']['file_name'];

            

             $data = null;
            $data['speakers'] = $this->events->insertSpeaker($speakerData);
             $data['event'] =$this->input->post('event');
            $data['event_title'] = $this->input->post('title');

            $this->_view("events/addSpeaker", $data);


        }
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