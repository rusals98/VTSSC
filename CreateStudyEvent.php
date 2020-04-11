<?php
  $eTitle = "";
  $maj = "";
  $mDate = "";
  $loc = "";
  $desc = "";
  $err = false;

  if (isset($_POST["submit"])) {
      if(isset($_POST["EventTitle"])) $eTitle=$_POST["EventTitle"];
      if(isset($_POST["Major"])) $maj=$_POST["Major"];
      if(isset($_POST["MeetDate"])) $mDate=$_POST["MeetDate"];
      if(isset($_POST["Location"])) $loc=$_POST["Location"];
      if(isset($_POST["Description"])) $desc=$_POST["Description"];
        //header("HTTP/1.1 307 Temprary Redirect"); //
        //header("Location: input.php");
        require_once("db.php");

        
        $sql = "insert into events(EventTitle, Major, MeetDate, Location, Description) values('$eTitle', '$maj', '$mDate', '$loc', '$desc' )";
  
        $result=$mydb->query($sql);
        
          $sql="update events set Major='$maj', MeetDate='$mDate', Location='$loc', Description='$desc' where EventTitle='$eTitle'";
          $result=$mydb->query($sql);
  }


  if (isset($_POST["update"])) {
    if(isset($_POST["EventTitle"])) $eTitle=$_POST["EventTitle"];
    if(isset($_POST["Major"])) $maj=$_POST["Major"];
    if(isset($_POST["MeetDate"])) $mDate=$_POST["MeetDate"];
    if(isset($_POST["Location"])) $loc=$_POST["Location"];
    if(isset($_POST["Description"])) $desc=$_POST["Description"];
      //header("HTTP/1.1 307 Temprary Redirect"); //
      //header("Location: input.php");
      require_once("db.php");

  $sql="update events set Major='$maj', MeetDate='$mDate', Location='$loc', Description='$desc' where EventTitle='$eTitle'";
  $result=$mydb->query($sql);
  }
  if (isset($_POST["delete"])) {
    if(isset($_POST["EventTitle"])) $eTitle=$_POST["EventTitle"];
    if(isset($_POST["Major"])) $maj=$_POST["Major"];
    if(isset($_POST["MeetDate"])) $mDate=$_POST["MeetDate"];
    if(isset($_POST["Location"])) $loc=$_POST["Location"];
    if(isset($_POST["Description"])) $desc=$_POST["Description"];
      //header("HTTP/1.1 307 Temprary Redirect"); //
      //header("Location: input.php");
      require_once("db.php");

  $sql="DELETE FROM events WHERE EventTitle='$eTitle'";
  $result=$mydb->query($sql);
  }

 ?>
<!DOCTYPE html>
<html>

<head>
    <title>MySQL file upload example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jia Kang Ju" />
    <meta name="keywords" content="study, group, hokie, tutor" />
    <title>Virginia Tech Student Study Connect</title>
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
      .upload {
        padding-top: 100px;
        text-align: center;
      }
    </style>
</head>
<body>
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
          <li class="nav-item">
             <a class="nav-link" href="teamIntro.php">Team</a>
          </li>
        </ul>
        <form class="form-inline navbar-nav ml-md-auto">
          <input class="form-control mr-sm-2" type="text" />
          <button class="btn btn-primary my-2 my-sm-0" type="submit" action="SearchPage.html">
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
    <div>
    <div class="container">
      <h1 class="text-center">
        Virginia Tech Student Study Connect
      </h1>
      <h2 class="text-center">Create a Group Study Event</h2>
      <p class="text-center">Please fill in this form to create an account.</p>
      <hr>
      <form class="text-center" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" style="border:1px solid #ccc">
      <label for="EventTitle"><b>Event Title</b></label><br />
      <input type="text" placeholder="Enter Event Title" name="EventTitle" value="<?php echo $eTitle; ?>" ><br /> <label for="Major"><b>Major</b></label><br />
      <input type="text" placeholder="Enter Major" name="Major" value="<?php echo $maj; ?>"><br />

      <label for="MeetDate"><b>Meet Date</b></label><br />
      <input type="date"  name="MeetDate"
       value="<?php echo $mDate; ?>"><br />
        <label for="Location"><b>Location</b></label><br />
      <input type="text" placeholder="Enter Location" name="Location" value="<?php echo $loc; ?>"><br /> <label for="Description"><b>Description of Event</b></label><br />
      <input type="text" placeholder="Enter Description" name="Description" value="<?php echo $desc; ?>"><br />



      <input type="submit" name="submit" value="Submit" />
      <input type="submit" name="update" value="Update" />
      <input type="submit" name="delete" value="Delete" />
    </div>
  </form>

</body>
</html>


