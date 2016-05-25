<?php
$conn = new MongoClient('localhost');

 $db = $conn->admin;
 
 
 $collection = $db->users;
 
 $cursor = $collection->find();

 	$name=$_POST['username'];
 	$login=$_POST['login']; 
 	$password=$_POST['password'];
 	$rpassword=$_POST['rpassword'];
 	$email=$_POST['email'];
 
 $error=0;
 if(strlen($login)<6 || strlen($login)>12){
 	$error=1;
 	echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
                    <h5 class="form-signin-heading">Длина логина от 6 до 12 символов</h5>
        <input type="text" name="login"class="form-control" placeholder="Логин" value='. $login .' required autofocus></br>
                    <input type="password" name="password"  class="form-control" placeholder="Пароль" required autofocus>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
 }
 if($error==0){
     foreach ($cursor as $obj) {
        if($obj['login']==$login){
            $error=1;
            echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
                    <h5 class="form-signin-heading">Логин занят</h5>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' required autofocus></br>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
        }
     }
 }
 if($error==0){
 	for($i=0;$i<strlen($login);$i++){
 		if($login[i]<'0' || ($login[i]>'9'&&'login'<'a') || ($login[i]>'z' && $login[i]<'A')||($login[i]>'Z')){
 			if($login[i]!='_'){
 			$error=1;
 		}}
 	}
 	if($error==1){
 		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
                    <h5 class="form-signin-heading">Логин содержит только 0-9, a-Z, и "_"</h5>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' required autofocus></br>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
 	}
 }
 if($error==0){
 	if(strlen($password)<7 || strlen($password)>16){
 		$error=1;
 		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
        <h5 class="form-signin-heading">Длина пароля от 7 до 16</h5>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required autofocus>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';

 	}
 }
 if($error==0){
 	for($i=0;$i<strlen($password);$i++){
 		if($password[i]<'0' || ($password[i]>'9'&&'login'<'a') || ($password[i]>'z' && $password[i]<'A')||($password[i]>'Z')){
 			
 			$error=1;
 		}
 	}
 	if($error==1){
 		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
        <h5 class="form-signin-heading">Пароль может содержать 0-9, a-Z</h5>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required autofocus>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
 	}
 }
if($error==0){
	$up=0;
	$down=0;
	$zifri=0;
	for($i=0;$i<strlen($password);$i+=1){
		if($password[$i]>='0' && $password[$i]<='9'){
			$zifri+=1;
		}
		if($password[$i]>='a' && $password[$i]<='z'){
			$down+=1;
		}
		if($password[$i]>='A' && $password[$i]<='Z'){
			$up+=1;
		}
	}
	if($up==0 || $down==0 || $zifri==0){
		$error=1;
		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
        <h5 class="form-signin-heading">Пароль долже иметь хотя бы 1 заглавную букву, 1 маленькую букву и 1 цифру'. $up . $zifri . $down.'</h5>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required autofocus>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
	}

}
if($error==0){
	if($password!=$rpassword){
		$error=1;
		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
        <h5 class="form-signin-heading">Пароли не совпадают</h5>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required autofocus>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';

	}
}
if($error==0){
    foreach ($cursor as $obj) {
        if($obj['email']==$email){
            $error=1;
            echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
                    <h5 class="form-signin-heading">E-mail уже используется</h5>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required autofocus></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
        }
    }
}
if($error==0){
	$dog=0;
	$dot=0;
	$bad_dog=0;
	$bad_dot=0;
	for($i=0;$i<strlen($email);$i++){
		if($email[$i]=='@' && $i<strlen($email)-3 && $i!=0){
			$dog+=1;
		}
		if($email[$i]=='.'&& $dog==1 && $i<strlen($email)-1){
			$dot+=1;
		}
		if($email[$i]=='.' && ($i==strlen($email)-1 || $i==0 || $email[$i-1]=='@')){
			$bad_dot=1;
			$bad_dog=1;
		}
		if($email[$i]=='@' && ($i>=strlen($email)|| $i==0)){
			$bad_dog=1;
		}
	}
	if($dog!=1 || $dot==0 || $bad_dog==1 || $bad_dot==1){
		$error=1;
		echo '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text ;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Регистрация</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>
    <div class="container">
                <form class="form-signin" action="reg.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Имя" value='. $name . '  required ></br>
        <input type="text" name="login" class="form-control" placeholder="Логин" value='.  $login.' ></br>
                    <input type="password" name="password" class="form-control" placeholder="Пароль"required>
                    <input type="password" name="rpassword" class="form-control" placeholder="Повторите пароль" required>
                    <h5 class="form-signin-heading">E-mail должен иметь вид:Priner@primer.pr</h5>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value='. $email .' required autofocus></br>
                    <button type="submit" name="OK" class="btn btn-lg btn-primary btn-block">Готово</button>
                </form>
    </div>     
    </body>
</html>';
	}
}
 if($error==0){
 $t=array();
 $ins=array("name"=>$name,"email"=>$email,"login"=>$login,"password"=>md5($password),"notes"=>$t);
 $collection->insert($ins);
 include('index.html');
}
?>