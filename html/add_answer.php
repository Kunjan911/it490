<?php



$mydb = new mysqli('127.0.0.1','root','root','myforum');

if ($mydb->errno != 0){

        echo "Failed to connect to database: ".$mydb->error.PHP_EOL;
        exit(0);

}

echo nl2br("<br><br>			WELCOME TO MOVIE BUDDY FORUMS<br><br>");


// Get value of id that sent from hidden field 
$id=$_POST['id'];


// Find highest answer number. 
$sql = mysqli_query($mydb,"SELECT MAX(a_id) AS Maxa_id FROM fanswer WHERE question_id='$id'");
$rows=mysqli_fetch_array($sql);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$a_name=$_POST['a_name'];
$a_answer=$_POST['a_answer']; 
$datetime=date("d/m/y H:i:s"); 


// Insert answer 
$sql2 = mysqli_query($mydb, "INSERT INTO fanswer VALUES ('$id', '$Max_id', '$a_name', '$a_answer', '$datetime')");
if($sql2){
echo nl2br("Your comment has been submitted<BR>");
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$sql3 = mysqli_query($mydb, "UPDATE fquestions SET reply='$Max_id' WHERE id='$id'");
}
else {
echo nl2br("ERROR");
}
// Close connection
mysqli_close();
?>
