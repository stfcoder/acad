<?

$pagetitle='Academy Adminstration';
include("../../includes/header.php");
include("../../includes/dbconnect.php");
dbConnect();

$remote_address = getenv("REMOTE_ADDR");
$remote_host = getenv("REMOTE_HOST");
$server_name = getenv("SERVER_NAME");
$browser_accept = getenv("HTTP_ACCEPT");
$browser_agent = getenv("HTTP_USER_AGENT");

?>

<table width="770" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
  <tbody>
	<tr>
	  <td width="286" colspan="2" valign="top" class="body">
	  <table width="751" border="0" cellpadding="0" cellspacing="0">
		<tbody>
		  <tr>
			<td width="190" valign="top" class="body">
			<table border="0" cellpadding="3" cellspacing="3">
			  <tbody>
				<tr>
				  <td>
				  
				  <p class="subtitle">Academy Links</p>
				  
				  <a class="pages" href="../../courses.php">Academy Courses</a><br>
				  Want to take an Academy course? Follow this link to find out more.<br><br>
				  
				  <a class="pages" href="../../grad.php">Graduate Lists</a><br>
				  Want to know who has passed a course? What to know when they passed it? The graduate list can tell you all.<br><br>
				  
				  <a class="pages" href="../../handbook/index.php">Player's Handbook</a><br>
				  A look inside of STF. Contains all you need to know about STF.<br><br>
				  
				  <a class="pages" href="../../library/library.php">Academy Library</a><br>
				  This is a repository for articles and essays written by STF players for STF players.<br><br>
  
				  <a class="pages" href="http://www.star-fleet.com/prez/reports/#dep">Academy Reports</a><br>
				  This is a repository for all of STF's reports, including the Academy's.<br><br>
				  
				  <a class="pages" href="../../acadadmin/">Academy Admin</a><br>
				  The login page for Academy staff.
				  
				  </td>
				</tr>
			  </tbody>
			</table>
			</td>
			<td width="10" valign="top" class="body">&nbsp;</td>
			<td valign="top" class="body">
			<table cellpadding="5" cellspacing="5" border="0" width="100%">
			  <tbody>
				<tr align="left">
				 <td valign="top" height="250"> 
				 
					<p class="subtitle">Lost Password</p><br />
					<?
					if(isset($_POST['email']))
					{
					
						if($result = mysql_query("SELECT * FROM acadgrads_logins WHERE Email='".mysql_escape_string($_POST['email'])."' LIMIT 1"))
						{
							$row = mysql_fetch_assoc($result);
							$uID = ($row["uID"]);
							
							if(mysql_num_rows($result) == 0)
							{
								echo('<p>Your email address was not recognised. Please try again or contact the <a class="email" href="$ACmdtEm">Academy Commandant</a>.</p>');
								formcode();
							}
							else
							{
								$to_address = $row["FirstName"]." ".$row["LastName"]." <".$row["Email"].">";
					
								$username = strip_tags($row["Username"]);
								$password = rand(1000000, 9999999);
								
								$update = mysql_query("UPDATE acadgrads_logins SET `Password`= '".MD5($password)."' WHERE `uID`='".$uID."' LIMIT 1");
								
								$subject = "Academy Admin Account";
								
								$headers = "From: Academy Commandant <$ACmdtEm>\r\n";
								$headers .= "Reply-To: Academy Commandant <$ACmdtEm>\r\n"; 
								$headers .= "MIME-Version: 1.0\r\n"; 
								$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
								$headers .= "Content-transfer-encoding: 8bit\r\n";
								$headers .= "Date: ".date('r')."\r\n";
								$headers .= "X-Priority: 3\r\n";
								$headers .= "X-MSMail-Priority: Normal\r\n";
								$headers .= "X-Mailer: PHP\r\n";
								$headers .= "X-MimeOLE: Starfleet Academy Admin User Details\r\n";
								
								$msg = "Automated email sent from STF Academy.<br><br>";
								$msg .= "You have requested a new password for you to access the Academy Admin pages.<br>";
								$msg .= "These pages can be located at http://www.star-fleet.com/acad/acadadmin/ <br><br>";
								$msg .= "Your username = $username <br>";
								$msg .= "Your new password = $password <br><br>";
								$msg .= "It is recommended you change your password as soon as possible.<br>";
								$msg .= "Any questions, please contact the Commandant.<br><br>";
								$msg .= "Thank you.<br><br>";
								$msg .= "____________________________________<br><br>";
								$msg .= "DETAILS OF REQUEST:<br><br>";
								$msg .= "Remote Address: \t$remote_address <br>";
								$msg .= "Remote Host: \t$remote_host <br>";
								$msg .= "Browser Agent: \t$browser_agent <br>";
								$msg .= "Browser Accept: \t$browser_accept <br>";
								$msg .= "Server Name: \t$server_name <br>";
											
								mail($to_address, $subject, strip_tags($msg), $headers);
								
								echo("<p>Dear ".$row['FirstName'].",</p>
								<p>Your login details have been reset, and emailed to you at ".$row['Email'].". It may take a few minutes for the email to arrive.</p>");
							}
						}
					}
					
					else
					{
						formcode();
					}
					?>
				  </td>
			   </tr>
				<tr>
				  <td>&nbsp;
				  </td>
				</tr>
			  </tbody>
			</table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  </td>
	</tr>
  </tbody>
</table>

<?
include("../../footer.php");

function formcode()
{
	?>
	Please insert your email address. A new password will be emailed to you:<br /><br />
	<form action="pass.php" method="post">
	<table>
	<tr><td>Email:</td><td><input name="email" type="text" size="50"></td></tr>
	</table><br>
	<input type="submit" value="Send request">
	</form>
	<?
}