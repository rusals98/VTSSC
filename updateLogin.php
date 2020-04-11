<?php
//gathers previous profile data
  session_start();
  $username="";
  $password="";


  require_once("db.php");
  $sql= "Select username, password FROM profiles p, login l Where p.Email = l.email AND p.Email = '{$_SESSION['email']}' ";
  $result = $mydb->query($sql);
  while($row= mysqli_fetch_array($result)){
    $username=$row["username"];
    $password=$row["password"];
  }
  //To update the profile
  $usernameupdate="";
  $passwordupdate="";
  $err=false;
  if(isset($_POST["submit"])) {
    if(isset($_POST["Usernametxt"])) $usernameupdate=$_POST["Usernametxt"];
    if(isset($_POST["Passwordtxt"])) $passwordupdate=$_POST["Passwordtxt"];
    if(!empty($usernameupdate) && !empty($passwordupdate)){
      require_once("db.php");
      $sql1= "Update login Set username='$usernameupdate', password='$passwordupdate' Where email='{$_SESSION['email']}'";
      $result = $mydb->query($sql1);

    } else {
      $err = true;
    }

}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Jia Kang Ju" />
  <meta name="keywords" content="study, group, hokie, tutor" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
  <title>Profile</title>
  <style>
    body{
      background-color: rgb(98, 3, 6) ;
      font-family: 'Karla';
      font-size: 22px;
      color: white;
      text-shadow: 1px 1px 2px black;
    }
    hr.gradient {
      height: 1px;
      border: 0;
      background: #333;
      background-image: -webkit-linear-gradient(left, #e1e1e1, #777, #e1e1e1);
      background-image: -moz-linear-gradient(left, #e1e1e1, #777, #e1e1e1);
      background-image: -ms-linear-gradient(left, #e1e1e1, #777, #e1e1e1);
      background-image: -o-linear-gradient(left, #e1e1e1, #777, #e1e1e1);
    }
    p{
      font-size: 17px;
    }

  </style>
</head>
<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  					<span class="navbar-toggler-icon"></span>
  				</button> <a class="navbar-brand" href="mainPage.php">VTTSC</a>
  				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  					<ul class="navbar-nav">
  						<li class="nav-item ">
  							 <a class="nav-link" href="StudyGroup.php">Study Groups<span class="sr-only">(current)</span></a>
  						</li>
  						<li class="nav-item">
  							 <a class="nav-link" href="notesHomePage.php">Notes</a>
  						</li>
              <li class="nav-item">
                 <a class="nav-link" href="AboutUs.html">About Us</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="teamIntro.php">Team</a>
              </li>
  					</ul>
  					<form class="form-inline navbar-nav ml-md-auto" action="searchpage.php" method="post">
  						<input class="form-control mr-sm-2" type="text" />
  						<button class="btn btn-primary my-2 my-sm-0" type="submit">
  							Search
  						</button>
  					</form>
  				</div>
  			</nav>

        <h1 align="center">Update Login</h1>
        <form method="post" action="updateLogin.php" align="center" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
          Username: <input name="Usernametxt" type="text" value="<?php echo $username; ?>"/> <br />
          Password: <input name="Passwordtxt" type="text" value="<?php echo $password; ?>"/> <br />
          <br />
          <input name="submit" type="submit" value="Update Info" />
        </form>






    </div>
</div>
</body>
</html>
