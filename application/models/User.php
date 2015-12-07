<?php

  class User extends CI_Model
  {
    function register($user_data)
    {
      $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
      return $this->db->query($query, $user_data);
    }
  }

?>