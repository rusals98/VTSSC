<?php
  //resume the session variable on this page
  session_start();
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
  </body>
</html>
<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'vtssc');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);

        // Create the SQL query
        $query = "
            INSERT INTO notes (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";

        // Execute the query
        $result = $dbLink->query($query);

        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }

    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}

// Echo a link back to the main page
echo '<p>Click <a href="uploadNotes.php">here</a> to go back</p>';
?>
