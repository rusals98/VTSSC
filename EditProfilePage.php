<?php
//gathers previous profile data
  session_start();
  $fname="";
  $lname="";
  $class="";
  $major="";
  $email="";

  require_once("db.php");
  $sql= "Select FirstName, LastName, p.Email, Class, Major, ProfilePic FROM profiles p, login l Where p.Email = l.email AND p.Email = '{$_SESSION['email']}' ";
  $result = $mydb->query($sql);
  while($row= mysqli_fetch_array($result)){
    $fname=$row["FirstName"];
    $lname=$row["LastName"];
    $email=$row["Email"];
    $major=$row["Major"];
    $class=$row["Class"];
  }
  //To update the profile
  $fnameupdate="";
  $lnameupdate="";
  $emailupdate="";
  $majorupdate="";
  $classupdate="";
  $err=false;
  if(isset($_POST["submit"])) {
    if(isset($_POST["FirstNametxt"])) $fnameupdate=$_POST["FirstNametxt"];
    if(isset($_POST["LastNametxt"])) $lnameupdate=$_POST["LastNametxt"];
    if(isset($_POST["Emailtxt"])) $emailupdate=$_POST["Emailtxt"];
    if(isset($_POST["Majortxt"])) $majorupdate=$_POST["Majortxt"];
    if(isset($_POST["Classdrop"])) $classupdate=$_POST["Classdrop"];
    if(!empty($fnameupdate) && !empty($lnameupdate) && !empty($emailupdate) && !empty($majorupdate) && !empty($classupdate)){
      require_once("db.php");
      $sql1= "Update profiles Set FirstName='$fnameupdate', LastName='$lnameupdate', Email='$emailupdate', Class='$classupdate', Major='$majorupdate', ProfilePic='dd' Where Email='{$_SESSION['email']}'";
      $result = $mydb->query($sql1);
      $sql2= "Update login Set email='$emailupdate' Where email='{$_SESSION['email']}'";
      $result = $mydb->query($sql2);

    } else {
      $err = true;
    }

    if(isset($_POST["delete"])) {
    require_once("db.php");
    $sql1= "Delete From profiles Where Email='{$_SESSION['email']}'";
    $result = $mydb->query($sql1);
    $sql2= "Delete From login Where email='{$_SESSION['email']}'";
    $result = $mydb->query($sql2);
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
    #updateLogin {
      align-items: center;
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

        <h1 align="center">Edit Profile</h1>
        <form method="post" action="EditProfilePage.php" align="center" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
          <img src="images/ProfilePic.png" class="rounded-circle"/><br />
          <input type="file" name="Filename"><br />
          First Name: <input name="FirstNametxt" type="text" value="<?php echo $fname; ?>"/> <br />
          Last Name: <input name="LastNametxt" type="text" value="<?php echo $lname; ?>"/> <br />
          Email: <input name="Emailtxt" type="email" placeholder="student@email.com" value="<?php echo $email; ?>"/> <br />
          Major: <input name="Majortxt"type="text" value="<?php echo $major; ?>"/><br />
          Class: <select name="Classdrop">
            <option value="N/A" <?php if($class = "N/A") echo "selected"; ?>>N/A</option>
            <option value="Freshmen" <?php if($class == "Freshmen") echo "selected"; ?>>Freshmen</option>
            <option value="Sophomore" <?php if($class == "Sophomore") echo "selected"; ?>>Sophomore</option>
            <option value="Junior" <?php if($class == "Junior") echo "selected"; ?>>Junior</option>
            <option value="Senior" <?php if($class == "Senior") echo "selected"; ?>>Senior</option>
          </select><br />
          <input name="submit" type="submit" value="Update Info" />

        </form>
        <form method="post" align="center" action="login.php">
          <input name="delete" type="submit" value="Delete Profile"/>
        </form>

        <form align="center" action="login.php">
          <button>Log Out</button>
        </form>

        <div class="text-right">
          <p>
            <a href="updateLogin.php">Update Login</a>
          </p>
        </div>

    </div>
</div>
</body>
</html>
