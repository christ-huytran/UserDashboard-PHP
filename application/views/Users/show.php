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
