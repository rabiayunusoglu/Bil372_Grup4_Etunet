<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
  margin: 0;
  padding: 0;
  background: #fff;

  color: #fff;
  font-family: Arial;
  font-size: 12px;
}

.body{
  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
  background-size: cover;
  -webkit-filter: blur(5px);
  z-index: 0;
}

.grad{
  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
  z-index: 1;
  opacity: 0.7;
}

.header{
  position: absolute;
  top: calc(50% - 35px);
  left: calc(50% - 255px);
  z-index: 2;
}

.header div{
  float: left;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 35px;
  font-weight: 200;
}

.header div span{
  color: #5379fa !important;
}

.login{
  position: absolute;
  top: calc(50% - 75px);
  left: calc(50% - 50px);
  height: 150px;
  width: 350px;
  padding: 10px;
  z-index: 2;
}

.login input[type=text]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: 2px;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
}

.login input[type=password]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: 2px;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
  margin-top: 10px;
}

.login input[type=button]{
  width: 260px;
  height: 35px;
  background: #fff;
  border: 1px solid #fff;
  cursor: pointer;
  border-radius: 2px;
  color: #a18d6c;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 6px;
  margin-top: 10px;
}

.login input[type=button]:hover{
  opacity: 0.8;
}

.login input[type=button]:active{
  opacity: 0.6;
}

.login input[type=text]:focus{
  outline: none;
  border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
  outline: none;
  border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
  outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
      <div>Etu<span>Net</span></div>
    </div>
    <br>
    <div class="login">
    <?php if($this->session->flashdata('error') != ""){ ?>
      <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span>
        <?php echo $this->session->flashdata('error'); ?> </span>
      </div>
    <?php } ?>
      <form class="login-form" action="http://localhost/Bil372_Grup4_Etunet/index.php/enterence" method="post">
        <input type="text" placeholder="User mail" name="mail"><br>
        <input type="password" placeholder="password" name="password"><br>
  
        <input type="radio" id="huey" name="drone" value="stu"
         checked>
        <label for="huey">Student</label>

        <input type="radio" id="dewey" name="drone" value="teach">
        <label for="dewey">Teacher</label>

        <input type="Submit" value="Login" style="margin-top: 5px;">
      </form>
      <label for="stu1">Student</label>
      <form class="login-form" action="http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_student/" method="post">
          <input type="submit" value="Sign Up"/>
      </form>
      <label for="tch">Teacher</label>
      <form class="login-form" action="http://localhost/Bil372_Grup4_Etunet/index.php/Enterence/signup_teacher/" method="post">
          <input type="submit" value="Sign Up"/>
      </form>
    </div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>