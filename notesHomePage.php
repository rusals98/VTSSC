<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
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
    button {
      text-align: right;
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
                 <a class="nav-link " href="StudyGroup.php">Study Groups<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="notesHomePage.php">Notes</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="AboutUs.html">About Us</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="teamIntro.php">Team</a>
              </li>
            </ul>
            <form class="form-inline navbar-nav ml-md-auto" action="searchpage.php">
              <input class="form-control mr-sm-2" type="text" />
              <button class="btn btn-primary my-2 my-sm-0" type="submit" >
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

        <hr class="gradient" />
    			<h2 class="text-center">
            Notes
          </h2>
        <hr class="gradient" />
        <div class="text-right">
          <button>
            <a href="uploadNotes.php">Upload Notes</a>
          </button>
        </div>
    			<h3>
    				My Favorited Notes
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


          <h3>
            Suggested For You
          </h3>

          <div class="row">
            <div class="col-md-4">
              <div class="card text-white bg-dark mb-3" style="width: 25rem;">
                <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="http://www.hunter.cuny.edu/psychology/repository/images/Graduate%20Brain%20Website%20Photo.png" height="220" width="100"/>
                <div class="card-body">
                  <h2 class="card-title"><?php
                  $con = mysqli_connect ("localhost","root","", "vtssc");
                  $q = mysqli_query ($con,"Select * from notes where id = 3");
                  while($row = mysqli_fetch_assoc($q)){
                    echo $row['name'] . "<br />";
                  }
                ?></h2>
                  <h3 class="card-subtitle mb-2 text-muted">Psychology</h3>
                  <p class="card-text">A flashcard review of Geller's lecture on memory. It is in flashcard format.</p>
                  <p>
                    <a class="btn btn-primary" href="notes/displaynotepage4.php">View Notes</a>
                  </p>
                    <p class="card-text"><small class="text-muted">Not Opened</small></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-white bg-dark mb-3" style="width: 25rem;">
                <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://shulman.ca/wp-content/uploads/2018/01/changes_to_family_law_ontario.jpg" height="220" width="100"/>
                <div class="card-body">
                  <h2 class="card-title"><?php
                  $con = mysqli_connect ("localhost","root","", "vtssc");
                  $q = mysqli_query ($con,"Select * from notes where id = 2");
                  while($row = mysqli_fetch_assoc($q)){
                    echo $row['name'] . "<br />";
                  }
                ?></h2>
                  <h3 class="card-subtitle mb-2 text-muted">Legal & Ethical Business</h3>
                  <p class="card-text">A review guide for Audra Price's exam 3 coming up.</p>
                  <p>
                    <a class="btn btn-primary" href="notes/displaynotepage5.php">View Notes</a>
                  </p>
                    <p class="card-text"><small class="text-muted">Not Opened</small></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-white bg-dark mb-3" style="width: 25rem;">
                <img class="card-img-top hoverZoomLink" alt="Bootstrap Thumbnail Second" src="https://thecosmotech.com/wp-content/uploads/2018/12/featured-1.jpg" height="220" width="100"/>
                <div class="card-body">
                  <h2 class="card-title"><?php
                  $con = mysqli_connect ("localhost","root","", "vtssc");
                  $q = mysqli_query ($con,"Select * from notes where id = 1");
                  while($row = mysqli_fetch_assoc($q)){
                    echo $row['name'] . "<br />";
                  }
                ?></h2>
                  <h3 class="card-subtitle mb-2 text-muted">Networks</h3>
                  <p class="card-text">Quizlet flashcard notes for chapter 22.</p>
                  <p>
                    <a class="btn btn-primary" href="notes/displaynotepage6.php">View Notes</a>
                  </p>
                    <p class="card-text"><small class="text-muted">Not Opened</small></p>
                </div>
            </div>
          </div>
        </div>

  		</div>
  	</div>
  </div>
</body>

</html>
