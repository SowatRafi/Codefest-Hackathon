<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>
        
                <div id="main">
					<h3>Statistics</h3>
               	  <table>
                  <?php
				  	$result=mysqli_query($server,"SELECT COUNT(pat_id) FROM patients");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(bed_id) FROM beds");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id>0");
					$row3=mysqli_fetch_row($result3);
					
					$result4=mysqli_query($server,"SELECT COUNT(bed_id) FROM pat_to_bed WHERE bed_id>0");
					$row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id=0 AND bed_id!='none'");
					$row5=mysqli_fetch_row($result5);
					
					$row6[0] = $row2[0] - $row4[0];
					
					$result7=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id='none'");
					$row7=mysqli_fetch_row($result7); 
					
					
					
  							echo"<tr>
    							<td align=center valign=middle><b>Patients</b></td>
    							<td align=center valign=middle><b>Beds</b></td>
  							</tr>
  							<tr>
    							<td align=center valign=middle>Total - $row[0]</td>
    							<td align=center valign=middle>Total - $row2[0]</td>
							</tr>
  							<tr>
    							<td align=center valign=middle>Admitted - $row3[0]</td>
    							<td align=center valign=middle>Occupied - $row4[0]</td>
							</tr>
  							<tr>
   		 						<td align=center valign=middle>Discharged - $row5[0]</td>
    							<td align=center valign=middle>Vacant - $row6[0]</td>
							</tr>
  							<tr>
   							  <td align=center valign=middle>Unassigned to bed - $row7[0]</td>
    							<td align=center valign=middle>&nbsp;</td>
							</tr>";
					?>
				  </table>
                        <br /><br />

						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29219.67393959969!2d90.37551866062464!3d23.73099745124738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf418bf0392f%3A0x474422666587b971!2sBangladesh%20Medical%20College%20Hospital!5e0!3m2!1sen!2sbd!4v1639673837394!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <!-- // #main -->
   