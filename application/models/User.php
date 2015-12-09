<?php

  class User extends CI_Model
  {
    function register($user_data)
    {
      $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
      return $this->db->query($query, $user_data);
    }

    function login($user_data)
    {
      $query = "SELECT * FROM users WHERE email = ?";
      $user = $this->db->query($query, $user_data['email'])->row_array();

      if (password_verify($user_data['password'], $user['password']))
      {
        return $user;
      }
      else
      {
        return null;
      }

    }
    function show($id)
    {
      // get user from db
      $query = "SELECT * FROM users WHERE id = ?";
      $user = $this->db->query($query, $id)->row_array();
      
      // returns that user as a row
      return $user;

    }
  }

?>
