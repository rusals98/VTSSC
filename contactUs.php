<?php
  $fName = "";
  $lName = "";
  $mDate = "";
  $em = "";
  $mess = "";
  $err = false;

  if (isset($_POST["submit"])) {
      if(isset($_POST["FirstName"])) $fName=$_POST["FirstName"];
      if(isset($_POST["LastName"])) $lName=$_POST["LastName"];
      if(isset($_POST["Email"])) $mDate=$_POST["Email"];
      if(isset($_POST["Subject"])) $em=$_POST["Subject"];
      if(isset($_POST["Message"])) $mess=$_POST["Message"];
        //header("HTTP/1.1 307 Temprary Redirect"); //
        //header("Subject: input.php");
        require_once("db.php");


        $sql = "insert into messages(FirstName, LastName, Email, Subject, Message) values('$fName', '$lName', '$mDate', '$em', '$mess' )";

        $result=$mydb->query($sql);
  }
 ?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta name="author" content="Jia Kang Ju" />
  <meta name="keywords" content="study, group, hokie, tutor" />
  <title>Contact Us</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
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

  </style>
</head>

<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
        <!-- navbar -->
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
    <li class="nav-item active">
       <a class="nav-link" href="teamIntro.php">Team</a>
    </li>
  </ul>
  <form class="form-inline navbar-nav ml-md-auto">
    <input class="form-control mr-sm-2" type="text" />
    <button class="btn btn-primary my-2 my-sm-0" type="submit" action="searchpage.php">
      Search
    </button>
  </form>
  <ul class="navbar-nav ml-md-auto">
  <a class="navbar-brand ml-md-auto " href="EditProfilePage.php">
    <img src="images/Profileicon.png" width="30" height="30" alt="">
  </a>
</ul>
</div>
</nav>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" style="border:1px solid #ccc">
    <div class="container">
      <h1 class="text-center">
        Virginia Tech Student Study Connect
      </h1>
      <h2 class="text-center">Contact Us</h2>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" style="border:1px solid #ccc">
      <label for="FirstName"><b>First Name</b></label><br />
      <input type="text" placeholder="Enter First Name" name="FirstName" value="<?php echo $fName; ?>" ><br /> <label for="LastName"><b>Last Name</b></label><br />
      <input type="text" placeholder="Enter Last Name" name="LastName" value="<?php echo $lName; ?>"><br />

      <label for="Email"><b>Email</b></label><br />
      <input type="text" placeholder="Enter Email" name="Email"
       value="<?php echo $mDate; ?>"><br />
        <label for="Subject"><b>Subject</b></label><br />
      <input type="text" placeholder="Enter Subject" name="Subject" value="<?php echo $em; ?>"><br /> <label for="Message"><b>Message of Event</b></label><br />
      <textarea rows="4" cols="50" placeholder="Enter Message" name="Message" value="<?php echo $mess; ?>"></textarea><br />



      <input type="submit" name="submit" value="Submit" />
    </div>
  </form>

</body>

</html>
