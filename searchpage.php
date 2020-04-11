<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Jia Kang Ju" />
  <meta name="keywords" content="study, group, hokie, tutor" />
  <title>Search</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    body{
      background-color: rgb(98, 3, 6) ;
      font-family: 'Karla';
      font-size: 22px;
      color: white;
      text-shadow: 1px 1px 2px black;
    }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
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
              <li class="nav-item">
                 <a class="nav-link" href="teamIntro.php">Team</a>
              </li>
  					</ul>

            <ul class="navbar-nav ml-md-auto">
            <a class="navbar-brand ml-md-auto " href="EditProfilePage.php">
              <img src="images/Profileicon.png" width="30" height="30" alt="">
            </a>
          </ul>
  				</div>
  			</nav>
        <form method="GET" action="search.php" align="center">
        <input type="text" name="search"/>
        <input type="submit" value="search">
    <br /><label>Sort by:</label><br />
      <input name="subjectfilter" type="radio" value="All"/>All
    <input name="subjectfilter" type="radio" value="Notes"/>Notes
    <input name="subjectfilter" type="radio" value="StudyGroups"/>Study Groups
    <input name="subjectfilter" type="radio" value="Events"/>Events
    <input name="subjectfilter" type="radio" value="Notes"/>Users<br />
    <select>
      <option></option>
      <option value="ASC">Ascending</option>
      <option value="DESC">Descending</option>
      <option value="Recent">Most Recent</option>
      <option value="Old">Oldest</option>
    </select>

  </form>
</div>
</div>

</div>
</body>
</html>
