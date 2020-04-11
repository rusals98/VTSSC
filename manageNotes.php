<?php
//resume the session variable on this page
session_start();
?>

<!DOCTYPE html>
<head>
    <title>My Uploaded Notes</title>
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
      form {
        text-align: center;
      }
      .upload {
        padding-top: 50px;
        text-align: center;
      }
      table, td, th {
        border: 1px solid #ddd;
        text-align: left;
      }
      tr:hover {
        background-color: rgb(200, 98, 4);
      }
      th {
        background-color: rgb(212, 117, 29);
        color: white;
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

    <div class="upload">
      <h1>Manage Uploads</h1>
    </div>


    <?php
    // Connect to the database
    $dbLink = new mysqli('localhost', 'root', '', 'vtssc');
    if(mysqli_connect_errno()) {
        die("MySQL connection failed: ". mysqli_connect_error());
    }

    // Query for a list of all existing files
    $sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `notes`';
    $result = $dbLink->query($sql);

    // Check if it was successfull
    if($result) {
        // Make sure there are some files in there
        if($result->num_rows == 0) {
            echo '<p>There are no files in the database</p>';
        }
        else {
            // Print the top of a table
            echo '<table width="100%">
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Mime</b></th>
                        <th><b>Size (bytes)</b></th>
                        <th><b>Created</b></th>
                        <th><b>Download</b></th>
                        <th><b>Delete</b></th>
                        <th><b>Update</b></th>
                    </tr>';

            // Print each file
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['mime']}</td>
                        <td>{$row['size']}</td>
                        <td>{$row['created']}</td>
                        <td><a href='downloadNotes.php?id={$row['id']}'>Download</a></td>
                        <td><a href='deleteNotes.php?id={$row['id']}'>Delete</a></td>
                        <td><a href='updateNotes.php?id={$row['id']}'>Update</a></td>
                    </tr>";
            }

            // Close table
            echo '</table>';
        }

        // Free the result
        $result->free();
    }
    else
    {
        echo 'Error! SQL query failed:';
        echo "<pre>{$dbLink->error}</pre>";
    }

    // Close the mysql connection
    $dbLink->close();
    ?>

    <form action="uploadNotes.php">
      <input type="submit" value="Go Back to Upload Notes" />
    </form>

</body>
</html>




<!DOCTYPE html>
<html>
<head>
  <title>Monthly Notes Upload History</title>
<meta charset="utf-8">
<style>

.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}
h1 {
	text-align: center;
}
.svg-div {
  display: inline-block;
  margin: 0 auto;
}
</style>
</head>
<body>
	<h1>Monthly Notes Upload History</h1>
  <div class="svg-div">
  	<svg width="960" height="500" align></svg>
  	<script src="https://d3js.org/d3.v4.min.js"></script>
  	<script>

  	var svg = d3.select("svg"),
  	    margin = {top: 20, right: 20, bottom: 30, left: 40},
  	    width = +svg.attr("width") - margin.left - margin.right,
  	    height = +svg.attr("height") - margin.top - margin.bottom;

  	var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
  	    y = d3.scaleLinear().rangeRound([height, 0]);
  	    console.log(y(3));

  	var g = svg.append("g")
  	    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  	//specify our data source
  	/*
  	d3.tsv("data.tsv", function(d) {
  	  d.frequency = +d.frequency;
  	  return d;
  	}, function(error, data) {
  	*/

  	d3.json("getData.php", function(error, data){
  	  if(error) throw error;

  	  data.forEach(function(d){
  	    d.letter = d.uploadMonth;
  	    d.frequency = +d.noteCount;
  	  })

  	  console.log(data);

  	  if (error) throw error;

  	  x.domain(data.map(function(d) { return d.letter; }));
  	  y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

  	  g.append("g")
  	      .attr("class", "axis axis--x")
  	      .attr("transform", "translate(0," + height + ")")
  	      .call(d3.axisBottom(x));

  	  g.append("g")
  	      .attr("class", "axis axis--y")
  	      .call(d3.axisLeft(y).ticks(4, "s"))
  	    .append("text")
  	      .attr("transform", "rotate(-90)")
  	      .attr("y", 6)
  	      .attr("dy", "0.71em")
  	      .attr("text-anchor", "end")
  	      .text("Frequency");

  	  g.selectAll(".bar")
  	    .data(data)
  	    .enter().append("rect")
  	      .attr("class", "bar")
  	      .attr("x", function(d) { return x(d.letter); })
  	      .attr("y", function(d) { return y(d.frequency); })
  	      .attr("width", x.bandwidth())
  	      .attr("height", function(d) { return height - y(d.frequency); });
  	});
  	</script>
  </div>

</body>
</html>
