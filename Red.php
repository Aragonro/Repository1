<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
 session_start();
 $name=$_POST['name']; 
 	$text=$_POST['text'];
 echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Редактирование</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
    <body>
    <div class="container">
        <form class="form-signin" action="Red1.php" method="post">
        <textarea name="name" style="display: none;">'.$name.'</textarea>
        <textarea name="text1" style="display: none;">'.$text.'</textarea>
        <textarea name="n"  class="form-control" required>' . $name . '</textarea>
        <textarea name="text" class="form-control" required >'. $text .'</textarea>
        <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">OK</button>
        <button type="submit" name="Del" class="btn btn-lg btn-primary btn-block">Удалить</button></br>
        <a href="Myzametki.php"><button type="button"  class="btn btn-lg btn-primary btn-block">Назад</button></a>
        </form>
    </div>
        </body>
        </html>';
        ?>