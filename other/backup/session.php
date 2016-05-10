<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$events="";
$abc="";

// Echo session variables that were set on previous page
echo "</br>Event on " . $_SESSION["idcalendar"] . ".</br>";
?>

</br>
<?php 
echo "<li>".$_POST["name"]."</li>";

$_POST["name"]=$abc;

$_SESSION["name"]=$abc;
echo "asdfasdfasdf";

?>




<textarea rows="10" cols="62" name="name" ></textarea>



<br>
<br>


<input type="submit" value="Submit"> 






</body>
</html>