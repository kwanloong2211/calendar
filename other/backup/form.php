<!doctype html> 

<html>

<body> 


<center>QUIZ<br><br><br></center>

<center>Form</center><br>


<form action="form.php" method="post"> 


<center>Name: <input type="text" name="name">

<br></center>


<center>E-mail: <input type="text" name="email"><br></center> 

<center><input type="submit" value="Submit"></center> 
<br><br><br>
Output:<br><br> 


</form> 
Welcome <?php echo $_POST["name"]; ?>
<br> 
Your email address is <?php echo $_POST["email"]; ?>


</body>

</html> 
