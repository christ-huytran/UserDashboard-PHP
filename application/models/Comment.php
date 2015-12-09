<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model{
  public function create($data) //data is an array
  {
    $query = "INSERT into comments (comment_content, message_id, user_id, updated_at, created_at) values (?,?,?, now(), now())";
    $values = array($data['comment_content'], $data['message_id'], $data['user_id']);
    $this->db->query($query,$values);
    return true;
  }
  // public function show($index_by_message){
  public function index_comments($message_id){
    $query = "SELECT comments.comment_content, users.first_name, users.last_name, comments.created_at from messages left join comments on messages.id = comments.user_id left join users on users.id = comments.user_id where messages.id = ?";
    $values = array($message_id);
    return $this->db->query($query, $values)->result_array();
  }

}
