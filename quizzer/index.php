<?php include 'database.php'; ?>
<?php 

/*
get question
*/

$query = "SELECT * FROM questions ";



$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total=$results->num_rows;

?>



<html>
<head>
<meta charset="utf-8" />
<title>QUIZZER</title>

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<header>
<div class="container">
  <h1>Quizzer</h1>
    </div>
    </header>
    <main>
    <div class="container jumbotron">
        <h2>Test your knowledge</h2>
        <ul>
        <li><strong>
            Number of questions : </strong><?php echo $total; ?></li>
        <li><strong>
            type : </strong>mutiple choice </li>
        <li><strong>
            estimated time : </strong><?php echo $total * .5; ?>minutes</li></ul>
        <a class="btn btn-default start" href="questions.php?n=1" role="button">Start quiz</a>
        </div></main>
    <footer>
    <div class="container jumbotron">
        Copyright 2014</div></footer>
    <script src="js/bootstrap.js"></script>
    </body>
</html>