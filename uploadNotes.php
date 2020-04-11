<?php
  //resume the session variable on this page
  session_start();
 ?>

<!DOCTYPE html>
<head>
    <title>Upload Notes</title>
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


    <!-- file upload -->
    <div class="upload">
    <h1>Upload Notes</h1>
    <form action="notesUploadResult.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file">
        <input type="submit" value="Upload file">
    </form>
    <p>
      <a href="manageNotes.php">Manage Uploads</a>
    </p><br />
    </div>
</body>
</html>
