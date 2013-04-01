<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: grads/index.php
	Last Modified: 08 Jul 2008

\*****************************************************************/

	$title = 'Graduates List';

	include('../includes/header.php');
	include('../includes/dbconnect.php');
	
	dbConnect();
	
	//$names is previously picked up in header.php
	//Check to see if the subject is valid.
	
	$subject = $_GET['Subject'];
	
	if(isset($names[$subject]['subject']))
	{
		echo('<h2>'.strip_tags($names[$subject]['subject']).' Graduates List</h2>');
	
		if(isset($names[$subject]['tutor']))
		{
			echo('<p>This class is currently taught by '.strip_tags($names[$subject]['tutor']).'. If you have any questions about the '.strip_tags($names[$subject]['subject']).', you can reach '.strip_tags($names[$subject]['tutor']).' at: <a class="email" href="mailto:'.strip_tags($names[$subject]['email']).'">'.strip_tags($names[$subject]['email']).'</a>.</p>');
		}
		
		echo('<p>If you have any questions about the Graduates List, please contact the Commandant, '.strip_tags($names['acmdt']['name']).', at: <a class="email" href="mailto:'.strip_tags($names['acmdt']['email']).'">'.strip_tags($names['acmdt']['email']).'</a>.</p>');
		echo('<p><strong>Please note:</strong> All graduates are listed in alphabetical order by surname, not by the date of their graduation.</p>');
		
		$sql = "SELECT * FROM acadgrads_grads WHERE `Grad".mysql_escape_string($subject)."` >= 1 ORDER BY GradLastName";
		if(!$result = mysql_unbuffered_query($sql))
		{
			echo('<p>A database error occured</p>');
		}
		else 
		{
			$set = array();
			
			while ($record = mysql_fetch_object($result)) 
			{
				if($subject == 'Ship')
				{
					$set[$record->GradShip][] = $record;
				}
				else
				{
					$set[] = $record;
				}
			}
			
			mysql_free_result($result);
			
			if($subject == 'Ship')
			{
				echo('<h3>USS Apollo<br/></h3>');
				PrintTable($set[4]);
				  echo('<h3>USS Challenger<br/></h3>');
				PrintTable($set[1]);
				echo('<h3>USS Columbia<br/></h3>');
				PrintTable($set[2]);
				echo('<h3>USS Discovery<br/></h3>');
				PrintTable($set[3]);
				echo('<h3>USS Endeavour<br/></h3>');
				PrintTable($set[5]);
			}
			else
			{
				PrintTable($set);
			}

		}
	}
	else 
	{
		echo('<h2>Graduates List</h2>');
		
		echo('<p>Welcome to the records section of the Academy. This is the place where you can find out who has passed an Academy course and when they passed it. The graduates list has been broken down into individual pages for each course. Just follow the links below to get to the lists.</p>');
		
		echo('<ul class="gradlinks">');
		
		foreach($names as $key => $name)
		{
			if(isset($name['subject']))
			{
				echo('<li><a class="links" href="/acad/grads/'.strip_tags($key).'/">'.strip_tags($name['subject']).' Graduates List</a></li>');
			}
		}
		
		echo('</ul>');
		
	}
	
	include('../includes/footer.php');
	
	function PrintTable($set = array())
	{
		$midpoint =ceil(count($set) / 2);
		
		echo('<div style="float:left; width:49%; padding-top: 1em;">');
		echo('<table class="formatted"><tr><th>Student Name</th><th>Date of Graduation</th></tr>');
		
		
		for($i=0; $i < $midpoint; $i++)
		{
			echo('<tr>');
			PrintCells($set[$i]);
			echo('</tr>');
		}
		
		echo('</table></div>');
		
		echo('<div style="float:right; width:49%; padding-top: 1em;">');
		echo('<table class="formatted"><tr><th>Student Name</th><th>Date of Graduation</th></tr>');
		
		
		for($i=$midpoint; $i < count($set); $i++)
		{
			echo('<tr>');
			PrintCells($set[$i]);
			echo('</tr>');
		}
		
		//Do this to ignore last cell if empty
		//This is new to me - print works here, but not echo.
		(count($set) % 2) ? print('<tr><td>&nbsp;</td><td></td></tr>') : '';
		
		echo('</table></div><div style="clear: both;"><br/></div>');
	}
	
	function PrintCells($result)
	{
		$date_field = 'Grad'.$_GET['Subject'].'Date';
		echo('<td>'.strip_tags($result->GradLastName).', '.strip_tags($result->GradFirstName).'</td><td>'.date('d F Y', strip_tags($result->$date_field)).'</td>');
	}