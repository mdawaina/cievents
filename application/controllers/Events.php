<?php defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{


    function listEvents()
    {
        $this->load->model('events_model', 'events');

        $event_data = $this->events->getEvents();

        $data = array();
        $event_html = "";
        foreach ($event_data as $event) {

            $speakers = $this->events->getListTable("speakers", array("event" => $event->id));
            $event_html = $event_html . $this->view_event($event, $speakers);
        }
        $data['eventHTML'] = $event_html;
        $this->_view('events/eventPage', $data, false);
    }

    function view_event($event, $speakers)
    {
        $data['event_item'] = $event;
        $data['speakers'] = $speakers;
        return $this->_view("events/event_item", $data, true);
    }


    function addEvent()
    {

        $this->load->library('form_validation');
        if (empty($_POST)) {
            $this->_view("events/addEvent");
        } else {

            $this->form_validation->set_rules('title', 'Event title', 'required|max_length[20]');            
            $this->form_validation->set_rules('date', 'Date', 'required|callback_event_date_check');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('about', 'About', 'required|min_length[15]'); 

            if ($this->form_validation->run() == FALSE) {
                $this->_view("events/addEvent");
            } else {

                 

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
    }


    public function event_date_check($date)
    {

            $todate = date('Y-m-d');
            if ($date < $todate)
            {
                    $this->form_validation->set_message('event_date_check', 'The {field} field can not be before today');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }


    function addSpeaker($event_id = null)
    {
        $this->load->model('events_model', 'events');
        if (empty($_POST)) {

            $data = null;
            if (isset($event_id)) {
                $data["event"] = $event_id;
                $data["speakers"] = $this->events->listEventSpeakers($event_id);
            }
            $this->_view("events/addSpeaker", $data);
        } else {

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
            $data['event'] = $this->input->post('event');
            $data['event_title'] = $this->input->post('title');

            $this->_view("events/addSpeaker", $data);
        }
    }


    function viewEvent($event_id)
    {
        $this->load->model('events_model', 'events');
        $data['event_item'] = $this->events->loadEvent($event_id);
        $data["speakers"] = $this->events->getListTable("speakers", array("event" => $event_id));

        $this->_view("events/viewEvent", $data);
    }

    function editEvent($event_id = null)
    {
        $this->load->model('events_model', 'events');
        if (empty($_POST)) {
            // retrieve data from db

            $data['event'] = $this->events->loadEvent($event_id);
            $data['speakers'] = $this->events->listEventSpeakers($event_id);
            $this->_view('events/editEvent', $data);
        } else {
            // update database
            $eventData['title'] = $this->input->post('title');
            $eventData['date'] = $this->input->post('date');
            $eventData['city'] = $this->input->post('city');
            $eventData['address'] = $this->input->post('address');
            $eventData['about'] = $this->input->post('about');

            // uploading image 

            $config['upload_path'] = './assets/uploads';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 2000;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            $this->upload->do_upload('photo');
            $data = array('upload_data' => $this->upload->data());

            if (!empty($data['upload_data']['file_name'])) {
                $eventData['photo'] = $data['upload_data']['file_name'];
            }

            $event_id = $this->input->post('event_id');

            $now = new DateTime("now", new DateTimeZone('Asia/Riyadh'));
            $eventData['createdAt'] = $now->format('Y-m-d H:i:s');

            $data = null;
            $data['event'] = $this->events->editEvent($event_id, $eventData);
            $this->viewEvent($event_id);
        }
    }

    function editSpeaker($speaker_id = null)
    {
        $this->load->model('events_model', 'events');
        if (empty($_POST)) {
            $data['speaker'] = $this->events->getSpeaker($speaker_id);
            $this->_view('events/editspeaker', $data);
        } else {
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            $this->upload->do_upload('sphoto');
            $data = array('upload_data' => $this->upload->data());

            $update['id'] = $this->input->post('speaker_id');
            $update['name'] = $this->input->post('name');
            $update['title'] = $this->input->post('title');
            $update['sphoto'] = $this->input->post('sphoto');
            $update['about'] = $this->input->post('about');
            if (!empty($data['upload_data']['file_name'])) {
                $update['sphoto'] = $data['upload_data']['file_name'];
            }
            $this->events->updateSpeaker($update);
            $this->viewEvent($this->input->post('event_id'));
        }
    }


    function deleteEvent($event_id)
    {

        $this->db->where("event", $event_id);
        $this->db->delete("speakers");
        $this->db->where("id", $event_id);
        $this->db->delete("events");
        $this->listEvents();
    }

    function deleteSpeaker($speaker_id)
    {

        $this->db->where("id", $speaker_id);
        $query = $this->db->get("speakers");
        $speaker = $query->row();
        $event_id = $speaker->event;
        $this->db->where("id", $speaker_id);
        $this->db->delete("speakers");

        $this->viewEvent($event_id);
    }

    function _view($page, $data = array(), $isHTML = false)
    {
        if ($isHTML) {
            return $this->load->view($page, $data, true);
        } else {
            $this->load->view('header');
            $this->load->view($page, $data);
            $this->load->view('footer');
        }
    }
}
