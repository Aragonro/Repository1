<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 session_start();
 $n=$_POST['name'];
 $name=$_POST['n']; 
 	$text=$_POST['text'];
    $date=date("d") . "." . date("m") . "." . date("Y");
$ar=array();
 foreach ($cursor as $obj) {
 	if($obj['login']==$_SESSION['login']){
 		$notes=$obj['notes'];

 		foreach ($notes as $obj) {
 			if($obj['name']!=$n){
 				 
 			
 				$ar->update(array("name"=>$obj["name"],"date"=>$obj["date"],"text"=>$obj["text"]));


 			}
 		}
 	}
 }
 $nw=array('$set'=>array("notes"=>$ar));
 $option=array("upsert"=>true);
 $collection->update(array("login"=>$_SESSION['login']),$nw,$option);
 	?>