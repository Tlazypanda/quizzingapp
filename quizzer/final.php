<?php session_start();?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8" />
<title>QUIZZER</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body>
<header>
<div class="container">
  <h1>Quizzer</h1>
    </div>
    </header>
    <main>
    <div class="container jumbotron">
     <p>Congrats you have completed the test!</p>
        <p>Your final score : <?php echo $_SESSION['score']; ?></p>
        <?php $_SESSION['score']=0; ?>
        <a href="questions.php?n=1" class="start">Start quiz</a>
        </div></main>
    <footer>
    <div class="container">
        Copyright 2014</div></footer>
     <script src="js/bootstrap.js"></script>
    </body>
</html>