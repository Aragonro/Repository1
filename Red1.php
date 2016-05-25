<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 session_start();
 $n=$_POST['name'];
 $name=$_POST['n']; 
 	$text=$_POST['text'];
 	$text1=$_POST['text1'];
    $date=date("d") . "." . date("m") . "." . date("Y");
    if(isset($_POST['Del'])){
$ar=array();

 foreach ($cursor as $obj) {
 	if($obj['login']==$_SESSION['login']){
 		$notes=$obj['notes'];

 		foreach ($notes as $obj) {
 			if($obj['name']!=$n || $obj['text']!=$text1){
 				 
 			
 				array_push($ar,array("name"=>$obj["name"],"date"=>$obj["date"],"text"=>$obj["text"]));


 			}
 		}
 	}
 }
 $nw=array('$set'=>array("notes"=>$ar));
 $option=array("upsert"=>true);
 $collection->update(array("login"=>$_SESSION['login']),$nw,$option);
 include('Myzametki.php');
}
 if(isset($_POST['OK'])){
 	$ar=array();
$t=array("name"=>$name,"date"=>$date,"text"=>$text);
 foreach ($cursor as $obj) {
 	if($obj['login']==$_SESSION['login']){
 		$notes=$obj['notes'];

 		foreach ($notes as $obj) {
 			if($obj['name']){
 			if($obj['name']!=$n || $obj['text']!=$text1){
 				 
 			
 				array_push($ar,array("name"=>$obj["name"],"date"=>$obj["date"],"text"=>$obj["text"]));


 			}
 			else{
 				array_push($ar,$t);
 			}
 		}
 		}
 	}
 }
 $nw=array('$set'=>array("notes"=>$ar));
 $option=array("upsert"=>true);
 $collection->update(array("login"=>$_SESSION['login']),$nw);
 include('Myzametki.php');
}
 	?>