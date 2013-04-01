<?php
session_start();

if ($_SESSION['Myvalid'] == "Yes")
{

$pagetitle='Academy Adminstration';
include("../../header.php");

$accesserror = 'Sorry, but you do not access to this page. Please contact the <a class="email" href="mailto:<?php echo $ACmdtEm?>">Academy Commandant</a> for further assistance.'

?>

<table width="770" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
  <tbody>
    <tr>
      <td width="286" colspan="2" valign="top" class="body">
      <table width="751" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <?php include("../navigation.php"); ?>
            <td width="10" valign="top" class="body">&nbsp;</td>
            <td valign="top" class="body">
            <table cellpadding="5" cellspacing="5" border="0" width="100%">
              <tbody>
                <tr align="left">
                 <td valign="top" height="250"> 
				 
					
					<p class="subtitle">Account Admin</p>
					
					<?php
					
					if(($_SESSION['MyAdmin'] == '1') or ($_SESSION['MyCmdt'] == '1'))
					{
						
						if($_POST['data'] == '1')
						{
							
							$sql = "UPDATE `acadgrads_names` SET 
							`ACmdtEm` = '".mysql_escape_string(stripslashes($_POST["ACmdtEm"]))."', 
							`ACmdtID` = '".mysql_escape_string(stripslashes($_POST["ACmdtID"]))."',
							`VCmdtEm` = '".mysql_escape_string(stripslashes($_POST["VCmdtEm"]))."',
							`VCmdtID` = '".mysql_escape_string(stripslashes($_POST["VCmdtID"]))."', 
							
							`ADMINTutor` = '".mysql_escape_string(stripslashes($_POST["ADMINTutor"]))."', 
							`ADMINTutorShortName` = '".mysql_escape_string(stripslashes($_POST["ADMINTutorShortName"]))."', 
							`ADMINTutorEmail` = '".mysql_escape_string(stripslashes($_POST["ADMINTutorEmail"]))."', 
							`ADMINAuthor` = '".mysql_escape_string(stripslashes($_POST["ADMINAuthor"]))."', 
							`ADMINAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["ADMINAuthorShortName"]))."', 
							`ADMINAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["ADMINAuthorEmail"]))."', 
							
							`CNSTutor` = '".mysql_escape_string(stripslashes($_POST["CNSTutor"]))."', 
							`CNSTutorShortName` = '".mysql_escape_string(stripslashes($_POST["CNSTutorShortName"]))."', 
							`CNSTutorEmail` = '".mysql_escape_string(stripslashes($_POST["CNSTutorEmail"]))."', 
							`CNSAuthor` = '".mysql_escape_string(stripslashes($_POST["CNSAuthor"]))."', 
							`CNSAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["CNSAuthorShortName"]))."', 
							`CNSAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["CNSAuthorEmail"]))."', 
							
							`ENGTutor` = '".mysql_escape_string(stripslashes($_POST["ENGTutor"]))."', 
							`ENGTutorShortName` = '".mysql_escape_string(stripslashes($_POST["ENGTutorShortName"]))."', 
							`ENGTutorEmail` = '".mysql_escape_string(stripslashes($_POST["ENGTutorEmail"]))."', 
							`ENGAuthor` = '".mysql_escape_string(stripslashes($_POST["ENGAuthor"]))."', 
							`ENGAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["ENGAuthorShortName"]))."', 
							`ENGAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["ENGAuthorEmail"]))."', 
							
							`GMTutor` = '".mysql_escape_string(stripslashes($_POST["GMTutor"]))."', 
							`GMTutorShortName` = '".mysql_escape_string(stripslashes($_POST["GMTutorShortName"]))."', 
							`GMTutorEmail` = '".mysql_escape_string(stripslashes($_POST["GMTutorEmail"]))."', 
							`GMAuthor` = '".mysql_escape_string(stripslashes($_POST["GMAuthor"]))."', 
							`GMAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["GMAuthorShortName"]))."', 
							`GMAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["GMAuthorEmail"]))."', 
							
							`MEDTutor` = '".mysql_escape_string(stripslashes($_POST["MEDTutor"]))."', 
							`MEDTutorShortName` = '".mysql_escape_string(stripslashes($_POST["MEDTutorShortName"]))."', 
							`MEDTutorEmail` = '".mysql_escape_string(stripslashes($_POST["MEDTutorEmail"]))."', 
							`MEDAuthor` = '".mysql_escape_string(stripslashes($_POST["MEDAuthor"]))."', 
							`MEDAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["MEDAuthorShortName"]))."', 
							`MEDAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["MEDAuthorEmail"]))."', 
							
							`SCITutor` = '".mysql_escape_string(stripslashes($_POST["SCITutor"]))."', 
							`SCITutorShortName` = '".mysql_escape_string(stripslashes($_POST["SCITutorShortName"]))."', 
							`SCITutorEmail` = '".mysql_escape_string(stripslashes($_POST["SCITutorEmail"]))."', 
							`SCIAuthor` = '".mysql_escape_string(stripslashes($_POST["SCIAuthor"]))."', 
							`SCIAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["SCIAuthorShortName"]))."', 
							`SCIAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["SCIAuthorEmail"]))."', 
							
							`SECTutor` = '".mysql_escape_string(stripslashes($_POST["SECTutor"]))."', 
							`SECTutorShortName` = '".mysql_escape_string(stripslashes($_POST["SECTutorShortName"]))."', 
							`SECTutorEmail` = '".mysql_escape_string(stripslashes($_POST["SECTutorEmail"]))."', 
							`SECAuthor` = '".mysql_escape_string(stripslashes($_POST["SECAuthor"]))."', 
							`SECAuthorShortName` = '".mysql_escape_string(stripslashes($_POST["SECAuthorShortName"]))."', 
							`SECAuthorEmail` = '".mysql_escape_string(stripslashes($_POST["SECAuthorEmail"]))."' WHERE `RowID` = '0'";
							
							$result = mysql_query($sql) or die(mysql_error());
							
							
							
							echo("Commandants and course tutor names saved.");
							
						}
				
					}
				
					else 
					{
						echo($accesserror);
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

<?php
include("../../footer.php");

}
  
else {
header("Location:".$PageRoot."acadadmin/main/index.php?Error=Session"); exit;
}?>
