<?php
  //resume the session variable on this page
  session_start();
 ?>

<!doctype html>
<html>

<head>
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
    .centered {
  position: absolute;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%);
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
  				</button> <a class="navbar-brand" href="#">VTTSC</a>
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
            <ul class="navbar-nav ml-md-auto">
            <a class="navbar-brand ml-md-auto " href="EditProfilePage.php">
              <img src="images/Profileicon.png" width="30" height="30" alt="">
            </a>
          </ul>
  				</div>
  			</nav>
        <h1 class="text-center">
      Virginia Tech Student Study Connect
    </h1>
      <hr class="gradient" />
    <div>
    <img align="center" src="images/vthomepage.jpg" style="width:100%" />
    <div class="centered"><h1>Welcome, <?php echo $_SESSION['username']?>!</h1></div>
    </div>
  			<h2 class="text-center">
  				Recent Activities
  			</h2>
          <hr class="gradient" />
  			<h3>
  				Study Groups
  			</h3>

        <div class="row">
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="width: 25rem;">
              <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://images.pexels.com/photos/7095/people-coffee-notes-tea.jpg?cs=srgb&dl=conference-learning-meeting-7095.jpg&fm=jpg" height="220" width="100"/>
              <div class="card-body">
                <?php
                  $con = mysqli_connect ("localhost","root","", "vtssc");
                  $q = mysqli_query ($con,"Select * from events where MeetDate = (select max(MeetDate) from events limit 1)");
                  while($row = mysqli_fetch_assoc($q)){
                    echo $row['EventTitle'] . "<br />";
                  $_SESSION['Card1Title'] = $row['EventTitle'];}
                ?>
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select Major from events where MeetDate = (select max(MeetDate) from events Limit 1)");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Major'] . "<br />";
                    $_SESSION['Card1Major'] = $row['Major'];}
                  ?>
                </h6>
                <p class="card-text">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select Description from events where MeetDate = (select max(MeetDate) from events Limit 1)");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Description'] . "<br />";
                      $_SESSION['Card1Description'] = $row['Description'];}
                  ?>
                </p>
                <p>
                  <a class="btn btn-primary" href="event.php">Go To Event</a>
                </p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="width: 25rem;">
              <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://images.pexels.com/photos/301920/pexels-photo-301920.jpeg?cs=srgb&dl=alphabet-blur-books-301920.jpg&fm=jpg" height="220" width="100"/>
              <div class="card-body">
                <h5 class="card-title">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 1) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['EventTitle'] . "<br />";
                    }
                  ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 1) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Major'] . "<br />";
                    }
                  ?>
                </h6>
                <p class="card-text">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 1) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Description'] . "<br />";
                    }
                  ?>
                </p>
                <p>
                  <a class="btn btn-primary" href="event.php">Go to event</a>
                </p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="width: 25rem;">
              <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://images.pexels.com/photos/7102/notes-macbook-study-conference.jpg?cs=srgb&dl=apple-class-conference-7102.jpg&fm=jpg" height="220" width="100"/>
              <div class="card-body">
                <h5 class="card-title">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 3) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['EventTitle'] . "<br />";
                    }
                  ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 3) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Major'] . "<br />";
                    }
                  ?>
                </h6>
                <p class="card-text">
                  <?php
                    $con = mysqli_connect ("localhost","root","", "vtssc");
                    $q = mysqli_query ($con,"Select * from events where MeetDate < (Select max(MeetDate - 3) from events) Order By MeetDate DESC Limit 1");
                    while($row = mysqli_fetch_assoc($q)){
                      echo $row['Description'] . "<br />";
                    }
                  ?>
                </p>
                <p>
                  <a class="btn btn-primary" href="#">Go to Event</a>
                </p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
  			<h3>
  				Notes
  			</h3>
        <div class="row">
   				<div class="col-md-4">
             <div class="card text-white bg-dark mb-3" style="width: 25rem;">
               <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://video-images.vice.com/articles/59a6c43a5ad2245ee6aad332/lede/1504102761200-Screen-Shot-2017-08-30-at-101813-AM.png?crop=1xw:0.7606xh;0xw,0.1986xh&resize=1200:*" height="220" width="100"/>
               <div class="card-body">
                 <h2 class="card-title"><?php
                 $con = mysqli_connect ("localhost","root","", "vtssc");
                 $q = mysqli_query ($con,"Select * from notes where id = 6");
                 while($row = mysqli_fetch_assoc($q)){
                   echo $row['name'] . "<br />";
                 }
               ?></h2>
                 <h3 class="card-subtitle mb-2 text-muted">Guitar</h3>
                 <p class="card-text">The guitar tabs for how to play "Blessed" by Daniel Caeser.</p>
                 <p>
                   <a class="btn btn-primary" href="notes/displayNotePage1.php">View Notes</a>
                 </p>
                   <p class="card-text"><small class="text-muted">Last opened 1 day ago</small></p>
               </div>
             </div>
   				</div>
   				<div class="col-md-4">
             <div class="card text-white bg-dark mb-3" style="width: 25rem;">
               <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROgf-Xex-1GoRm4cBjlycjYpYOtRipFT-ADJq3b5qiQwir-t9_" height="225" width="100"/>
               <div class="card-body">
                 <h2 class="card-title"><?php
                 $con = mysqli_connect ("localhost","root","", "vtssc");
                 $q = mysqli_query ($con,"Select * from notes where id = 5");
                 while($row = mysqli_fetch_assoc($q)){
                   echo $row['name'] . "<br />";
                 }
               ?></h2>
                 <h3 class="card-subtitle mb-2 text-muted">Finance</h3>
                 <p class="card-text">A great read for young investors looking for how to get started in financial literacy.</p>
                 <p>
                   <a class="btn btn-primary" href="notes/displaynotepage2.php">View Notes</a>
                 </p>
                   <p class="card-text"><small class="text-muted">Last opened 3 day ago</small></p>
               </div>
             </div>
   				</div>
   				<div class="col-md-4">
             <div class="card text-white bg-dark mb-3" style="width: 25rem;">
               <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://si.wsj.net/public/resources/images/IF-AC796_JUNKST_GR_20161103121700.jpg" height="220" width="100"/>
               <div class="card-body">
                 <h2 class="card-title"><?php
                 $con = mysqli_connect ("localhost","root","", "vtssc");
                 $q = mysqli_query ($con,"Select * from notes where id = 4");
                 while($row = mysqli_fetch_assoc($q)){
                   echo $row['name'] . "<br />";
                 }
               ?></h2>
                 <h3 class="card-subtitle mb-2 text-muted">Finance</h3>
                 <p class="card-text">A short but informative read on the basics of stock investing.</p>
                 <p>
                   <a class="btn btn-primary" href="notes/displaynotepage3.php">View Notes</a>
                 </p>
                   <p class="card-text"><small class="text-muted">Last opened 4 day ago</small></p>
               </div>
   					</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</body>

</html>
