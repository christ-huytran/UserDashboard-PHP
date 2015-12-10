<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
    $this->load->view('index');
  }

  public function register()
  {
    // $this->output->enable_profiler(TRUE);
    $user_input = $this->input->post(NULL, TRUE);

    if ($user_input)
    {
      $user_data = array(
        $user_input['first_name'],
        $user_input['last_name'],
        $user_input['email'],
        password_hash($user_input['password'], PASSWORD_DEFAULT)
      );
      $this->User->register($user_data);
      redirect('/');
    }
    else
    {
      $this->load->view('Users/register');
    }
  }

  public function login()
  {
    $user_input = $this->input->post(NULL, TRUE);
    $user = $this->User->login($user_input);

    if ($user)
    {
      redirect('/users/show/'.$user['id']);
    }
    else
    {
      redirect('/');
    }

  }

  public function show($id){
    $user = $this->User->show($id);
    $wall = $this->Wall->show($id);
    if ($wall == NULL){
      $this->Wall->create($id);
    }
    $wall = $this->Wall->show($id);

    $messages = $this->Message->index_wall_messages($wall['id']);
    $comments = [];
    // message 1
      //a comment 1
      //b comment 2
      //c comment 3
    // message 2
    // message 3
      //a comment 1
      //b comment 2
      //c comment 3
    foreach ($messages as $message){
      $comments[] = $this->Comment->index_comments($message['id']);
    }

    $this->load->view('Users/show', array("user" => $user, "wall" => $wall, "messages" => $messages, "comments" => $comments));
  }

}
