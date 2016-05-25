<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 if(isset($_POST['OK'])){
 	$zametka=$_POST['zametka']; 
 	$text=$_POST['text'];
 
 $date=date("d") . "." . date("m") . "." . date("Y");
 session_start();
 $t=array("name"=>$zametka,"date"=>$date,"text"=>$text);
 $collection->update(array("login"=>$_SESSION['login']),array('$addToSet'=>array("notes"=>$t)));
include('Myzametki.php');
}

 ?>