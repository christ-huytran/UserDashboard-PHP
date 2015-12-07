<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function index()
  {
    $this->load->view('index');
  }

  public function register()
  {
    // $this->output->enable_profiler(TRUE);
    $this->load->model('User');
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

}
