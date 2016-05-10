<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year; ?>&v=true&add=true">
<table width='400px' border='0'>
<tr>
<td width='150px'>Event title</td>
<td width='350px' height='50px'>
	<input type="text" name="txttitle"><br>
</tr>
<tr>
<td width='150px'>Event details</td>
<td width='250px'>
	<textarea name='txtdetail'></textarea></td>
</tr>
<tr>
<td width='150px'>Event location</td>
<td width='350px' height='50px'>
	<input type="text" name="txtlocation"><br>
</tr>

<tr>
<td colspan='2' align='center'><input type='submit' name='btnadd' value='Add Event'></td>
</tr>
</table>
</form>