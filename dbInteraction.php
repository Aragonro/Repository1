
<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 

 echo $cursor->count() . ' document(s) found. <br/>'; 
 

 foreach ($cursor as $obj) {
  echo 'username: ' . $obj['name'] . '<br/>';
  echo 'e-mail: ' . $obj['email'] . '<br/>';
  echo 'login: ' . $obj['login'] . '<br/>';
  echo 'password: ' . $obj['password'] . '<br/>';
  $notes = $obj["notes"];
  foreach ($notes as $obj) {
  	echo 'title: ' . $obj['name'] . '<br/>';
  	echo 'date of change: ' . $obj['date'] . '<br/>';
  	echo ' ' . $obj['text'] . '<br/>';
  }
  echo '<br/>';
 }
 
 $conn->close();

?>
