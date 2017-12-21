<?php include 'database.php';?>
<?php session_start();?>
<?php

//get total
$query = "SELECT * FROM questions ";



$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total=$results->num_rows;
   


//set question number
$number = (int) $_GET['n'];

/*
get question
*/

$query = "SELECT * FROM questions WHERE question_number=$number";



$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question=$result->fetch_assoc();

//get choices

$query = "SELECT * FROM choices WHERE question_number=$number";

//get result
$choices=$mysqli->query($query) or die($mysql->error.__LINE__);

?>


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
    
    <div class="current ">Question<?php echo $question['question_number']; ?> of <?php echo $total;?></div>
    
    <div class="jumbotron">
    <p class="question"><?php echo $question['text'];?></p>
    <form method="post" action="process.php">
    <ul class="choices">
        <?php while($row=$choices->fetch_assoc()):?>
        <li><input name="choice" type="radio" value="<?php echo $row['id'] ;?>" /><?php echo $row['text']; ?></li>
        <?php endwhile; ?>
        </ul>
        <input type="submit" value="submit"/>
        <input type="hidden" name="number" value="<?php echo $number; ?>"/>
        
    
</form>
        
    </div>
    </div>
    </header>
   
    <footer>
    <div class="container">
        Copyright 2014</div></footer>
     <script src="js/bootstrap.js"></script>
    </body>
</html>