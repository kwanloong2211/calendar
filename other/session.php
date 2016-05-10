<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$eventlist="";

$_SESSION["eventlist"]=$_POST["name"];
echo "session id is " . $_SESSION["idcalendar"] . ".";

?>

</br>
<?php 
echo "<li>".$_POST["name"]."</li>";


?>

<form action="session.php" method="post"> 

<textarea rows="10" cols="62" name="name" ></textarea>

<br>
<br>


<input type="submit" value="Submit"> 


</form>



</body>
</html>