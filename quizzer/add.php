<?php include 'database.php';?>
<?php

if(isset($_POST['submit'])){
    //get post varaibles
    
    $question_number=$_POST['question_number'];
    $question_text=$_POST['question_text'];
    $correct_choice=$_POST['choice_correct'];
    //choices array
    $choices=array();
    $choices[1]=$_POST['choice1'];
    $choices[2]=$_POST['choice2'];
    $choices[3]=$_POST['choice3'];
    $choices[4]=$_POST['choice4'];
    
    
    //question query
    $query="INSERT INTO questions(question_number,text) VALUES('$question_number','$question_text')";
    
    //run query
    $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
    
    //validate insert
    if($insert_row){
        foreach($choices as $choice => $value){
            if($value !=''){
                if($correct_choice == $choice){
                    $is_correct=1;
                }
                else{
                    $is_correct=0;
                }
                
                //choice query
                $query="INSERT INTO choices(question_number,is_correct,text) VALUES('$question_number','$is_correct','$value')";
                
                //run query
                $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
                
                //validate insert
                if($insert_row)
                {
                    continue;
                }else{
                    die('Error : ('.$mysqli->errno.')'.$mysqli->error);
                }
            }
                
        }
      $msg="question has been added";  
    }
        

    
}


//get total
$query = "SELECT * FROM questions ";



$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total=$results->num_rows;
$next=$total+1;
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>QUIZZER</title>
<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css"  />
</head>
<body>
<header>
<div class="container jumbotron">
  <h1>Quizzer</h1>
    <?php 
    if(isset($msg)){
        echo '<p>'.$msg.'</p>';
    }
    ?>
    
    
    
    
    <form method="post" action="add.php">
    <p>
        <label>Question Number: </label>
        <input type="number" value="<?php echo $next; ?>" name="question_number"/>
        <label>Question : </label>
        <input type="text" name="question_text"/>
        </p>
        <p>
        <label>Choice 1: </label>
        <input type="text" name="choice1"/>
            <label>Choice 2: </label>
        <input type="text" name="choice2"/>
            <label>Choice 3: </label>
        <input type="text" name="choice3"/>
            <label>Choice 4: </label>
        <input type="text" name="choice4"/>
             <label>Correct Choice number : </label>
        <input type="number" name="choice_correct"/>
        </p>
        <input type="submit" name="submit" value="submit"/>
     
        
    
</form>
    </div>
    </header>
   
    <footer>
    <div class="container">
        Copyright 2014</div></footer>
     <script src="js/bootstrap.js"></script>
    </body>
</html>