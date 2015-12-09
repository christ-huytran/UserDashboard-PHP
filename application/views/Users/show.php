<h4><?= $user['first_name']." ".$user['last_name'] ?></h4>
<h5>Registered on: <?= $user['created_at'] ?> </h5>
<h5>User_id: <?= $user['id'] ?></h5>
<h5>Email Address:<?= $user['email'] ?> </h5>
<form id = 'messages_new' action = '/messages/create' method='POST'>
  <input type = "hidden" name = 'user_id' value = <?= $user['id'] ?> >
  <input type = "hidden" name = 'wall_id' value = <?= $wall['id'] ?> >
  <textarea name = 'message_content'></textarea>
  <input type = 'submit' value = 'submit'>
</form>
<?php foreach($messages as $message)
{ ?>
<p>Message form: <?= $message['first_name']." ".$message['last_name'] ?></p>
<p><?=$message['message_content']?></p>
<p><?=$message['comment_content']?></p>

<form id = 'comments_new' action = '/comments/create' method='POST'>
  <input type = "hidden" name = 'user_id' value = <?= $user['id'] ?> >
  <input type = "hidden" name = 'message_id' value = <?= $message['id'] ?> >
  <textarea name = 'comment_content'></textarea>
  <input type = 'submit' value = 'submit'>
</form>
<?php

}
?>
