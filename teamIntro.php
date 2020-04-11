<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Team Introduction Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
    <style>
        body {
          text-align: center;
          background-color: rgb(98, 3, 6) ;
          font-family: 'Karla';
          font-size: 22px;
          color: white;
          text-shadow: 1px 1px 2px black;
        }

        .column {
          float: left;
          width: 20%;
          margin-bottom: 16px;
          /* padding: 0 8px; */
          border: 5px solid black;
          display: inline-block;
        }

        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: rgb(232, 124, 12);
        }

        .container {
          padding: 0 16px;
          text-align: left;
          display: inline-block;
        }

        .container::after, .row::after {
          content: "";
          clear: both;
          display: table;
        }

        .title {
          color: grey;
        }

        .button {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
        }

        .button:hover {
          background-color: #555;
        }

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
        #contact {
          width: 200px;
        }
    </style>
  </head>

  <body>
    <?php
      //resume the session variable on this page
      session_start();
     ?>
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
      Meet Our Team
    </h1>
    <div class="row justify-content-center">
      <div class="column">
        <div class="card">
          <img src="images/rusalshrestha.png" height="300" alt="Rusal" style="width:100%">
          <div class="container">
            <h2>Rusal Shrestha</h2>
            <p class="title">Creater & Designer</p>
            <p>Senior majoring in BIT.</p>
            <p>rusals98@vt.edu</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="images/mattkissinger.jpg" height="300" alt="Matt" style="width:100%">
          <div class="container">
            <h2>Matt Kissinger</h2>
            <p class="title">Creater & Designer</p>
            <p>Senior majoring in BIT.</p>
            <p>mkiss99@vt.edu</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="images/jiakang.jpg" height="300" alt="Jia" style="width:100%">
          <div class="container">
            <h2>Jia Kang<br /> Ju</h2>
            <p class="title">Creater & Designer</p>
            <p>Senior majoring in BIT.</p>
            <p>jiakang1@vt.edu</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="images/brandoneng.png" height="300" alt="Brandon" style="width:100%">
          <div class="container">
            <h2>Brandon<br /> Eng</h2>
            <p class="title">Creater & Designer</p>
            <p>Senior majoring in BIT.</p>
            <p>Bman1234@vt.edu</p>
          </div>
        </div>
      </div>
    </div>
    <div>
      <p><a href="contactUs.php"><button class="button" id="contact">Contact Us</button></a></p>
    </div>
  </body>
  </html>
