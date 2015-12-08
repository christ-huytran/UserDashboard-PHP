<?php

  class Wall extends CI_Model
  {
    public function show($id)
    {
      $query = "SELECT * FROM walls where id = ?";
      $values = array($id);
      $wall = $this->db->query($query,$values)->row_array();
      return $wall;
    }

    public function create($id)
    {
      $query = 'INSERT into walls (user_id) values (?)';
      $values = array($id);
      return $this->db->query($query,$values);
    }
  }
