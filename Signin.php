<?php


 $conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();
if(isset($_POST['LogIn'])){
 	$login=$_POST['LogIn'];
 }
 if(isset($_POST['Password'])){
 	$password=$_POST['Password'];
 }
 $k=0;
 foreach ($cursor as $obj) {
 	if($obj["login"]==$login && $obj["password"]==md5($password)){
 		$k=1;
 		$name=$obj["name"];
 	}
 }
 session_start();
 if($k==0){
 	echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Вход</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="Signin.php" method="post">
        <h2 class="form-signin-heading">Вход</h2>
        <h5 class="form-signin-heading">Неправильный логин или пароль</h5>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" name="LogIn" id="inputLogin" class="form-control" value="' . $login . '"   required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="Password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button></br>
        <a href="reg.html"><button class="btn btn-lg btn-primary btn-block" type="button">Регистрация</button></a>
        
      </form>

    </div> 


    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>';}
 else{
 	/*'<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <title>Добро пожаловать!</title>
    </head>
<body>
    <table width="100%">
    <tr>
        <td align="center"><h1>Добро пожаловать!</h1></td> 
    </tr>
    <tr >
        <td align="center"><a href="Myzametki.php"><input type="button" value="Go Заметать '. $name .'!"></a></td>
        </tr>
    </table>
    </body>
</html>';*/
$_SESSION['login']=$login;
include('Myzametki.php');

 }
 ?>