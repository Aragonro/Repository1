<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 session_start();
 echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
        <a href="index.html" style="display:inline;"><button class="btn btn-lg btn-primary btn-block">Выход</button></a></br>
        <a href="Add.html" style="display:inline;"><button class="btn btn-lg btn-primary btn-block">Добавить заметку</button></a></br>';
 foreach ($cursor as $obj) {
 	if($obj["login"]==$_SESSION['login']){
 		$notes=$obj["notes"];
 		foreach ($notes as $obj) {
 			
 			echo '<h3 class="form-signin-heading">Название: ' . $obj["name"].'</h3>';
 			echo '<h3 class="form-signin-heading">Содержимое: ' . $obj["text"]. '</h3>';
 			echo '<form class="form-signin" action="Red.php" method="post">
 			<p><textarea name="name"style="display: none;">'.$obj["name"].'</textarea></p>
 			<p><textarea style="display: none;"  name="text" >'. $obj["text"].'</textarea></p>
 			<p><input type="submit"  class="btn btn-lg btn-primary btn-block" name="OK"value="Редактировать" align="left"style="display:inline;"></p>
 			</form>';
 		
 		}
 	}
 }
 echo'</div></body>
</html>';
 ?>