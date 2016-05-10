<html>
<body background="bg.png">
<?php
session_start();

class Calendar

{
	var $events;
	var $cal;

	function Calendar($date){

		if(empty($date)) $date = time();
		define('NUM_OF_DAYS', date('t',$date));
		define('CURRENT_DAY', date('j',$date));
		define('CURRENT_MONTH_A', date('F',$date));
		define('CURRENT_MONTH_N', date('n',$date));
		define('CURRENT_YEAR', date('Y',$date));
		define('START_DAY', (int) date('N', mktime(0,0,0,CURRENT_MONTH_N,1, CURRENT_YEAR)) - 1);
		define('COLUMNS', 7);
		define('PREV_MONTH', $this->prev_month());
		define('NEXT_MONTH', $this->next_month());
		$this->events = array();
	}

	function prev_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1),
				(checkdate((CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), CURRENT_DAY, (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR));
	}
	
	function next_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1),
				(checkdate((CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1) , CURRENT_DAY ,(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR));
	}
	
	function getEvent($timestamp)
	{
		$event = NULL;
		if(array_key_exists($timestamp, $this->events))
			$event = $this->events[$timestamp];
		return $event;
	}
	
	function addEvent($event, $day = CURRENT_DAY, $month = CURRENT_MONTH_N, $year = CURRENT_YEAR)
	{
		$timestamp = mktime(0, 0, 0, $month, $day, $year);
		if(array_key_exists($timestamp, $this->events))
			array_push($this->events[$timestamp], $event);
		else
			$this->events[$timestamp] = array($event);
	}
	
	function makeEvents()
	{
		if($events = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, CURRENT_DAY, CURRENT_YEAR)))
			foreach($events as $event) echo $event.'<br />';

	}
	
	function makeCalendar()
	{	
		
	
		echo '<center>';
		echo '<h1>Personal Calendar</h1>';
		echo '<table border="5" cellspacing="10"><tr>';
		
		echo '<a href="?date='.PREV_MONTH.'">&lt;&lt;</a>';

		echo '<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .CURRENT_MONTH_A .' - ' . CURRENT_YEAR.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';

		echo '<a href="?date='.NEXT_MONTH.'">&gt;&gt;</a>';
		
		echo "</br>";
		echo "</br>";
		echo '</tr><tr>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Mon</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Tue</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Wed</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Thu</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Fri</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Sat</center></b></td>';
		echo '<td style="background-color: #99CCFF" width="100"><b><center>Sun</center></b></td>';
		echo '</tr><tr>';
		echo '</center>';
		echo str_repeat('<td>&nbsp;</td>', START_DAY);
				
		$rows = 1;
		
		for($i = 1; $i <= NUM_OF_DAYS; $i++)
		{
			if($i == CURRENT_DAY){
				echo '<td style="background-color: #C0C0C0"><strong>'.$i.'</strong></td>';
				$abc=mktime(0,0,0,CURRENT_MONTH_N,$i,CURRENT_YEAR);
				$_SESSION["idcalendar"]=$abc;
				echo "session id is " . $_SESSION["idcalendar"] . ".";
				

}

			else if($event = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, $i, CURRENT_YEAR)))
				echo '<td style="background-color: #99CCFF"><a href="?date='.mktime(0 ,0 ,0, CURRENT_MONTH_N, $i, CURRENT_YEAR).'">'.$i.'</a></td>';
			

				else
				echo '<td><a href="?date='.mktime(0 ,0 ,0, CURRENT_MONTH_N, $i, CURRENT_YEAR).'">'.$i.'</a></td>';
				
			if((($i + START_DAY) % COLUMNS) == 0 && $i != NUM_OF_DAYS)
			{
				echo '</tr><tr>';
				$rows++;
			}
		}
		echo str_repeat('<td>&nbsp;</td>', (COLUMNS * $rows) - (NUM_OF_DAYS + START_DAY)).'</tr></table>';
		echo $_SESSION["eventlist"];


				
}
}				

echo "</br></br></br></br></br>";
$cal = new Calendar($_GET['date']);
$cal->makeCalendar();
$cal->makeEvents();



?>
</body>
</html>
