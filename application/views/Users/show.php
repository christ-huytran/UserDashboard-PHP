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
<?php for ($i = 0; $i < count($messages); $i ++)
{ ?>

<p>Message from: <?= $messages[$i]['first_name']." ".$messages[$i]['last_name'] ?></p>
<p><?=$messages[$i]['message_content']?></p>

<?php foreach($comments[$i] as $comment)
{ ?>
  <p>Comment from: <?= $comment['first_name']." ".$comment['last_name'] ?></p>
  <p><?=$comment['comment_content']?></p>
  <?php
}?>
<form id = 'comments_new' action = '/comments/create' method='POST'>
  <input type = "hidden" name = 'user_id' value = <?= $user['id'] ?> >
  <input type = "hidden" name = 'message_id' value = <?= $messages[$i]['id'] ?> >
  <textarea name = 'comment_content'></textarea>
  <input type = 'submit' value = 'submit'>
</form>
<?php

}
?>
