<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Wall');
    $this->load->model('Message');
  }
  public function index()
  {
    $this->load->view('Dashboards/index');
  }

  public function create_messages()
  {
    var_dump($this->input->post());
    die('create_messages');
    $redirect('/users/show/1');
  }

}
