<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Wall');
    $this->load->model('Message');
    $this->load->model('Comment');
  }
  public function index()
  {
    $this->load->view('Dashboards/index');
  }

  public function create_messages()
  {
    $this->Message->create($this->input->post());
    redirect('/users/show/'.$this->input->post('user_id'));
  }

  public function create_comments()
  {
    $this->Comment->create($this->input->post());
    redirect('/users/show/'.$this->input->post('user_id'));
  }

}
