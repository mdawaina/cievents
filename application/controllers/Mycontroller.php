<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycontroller extends CI_Controller {

    function index(){
        $this->load->view('header');       
        $this->load->view('calendar');       
        $this->load->view('footer');       
    }

}