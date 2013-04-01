<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: courses.php
	Last Modified: 11 Feb 2007

\*****************************************************************/

	$title = 'Academy Courses';

	include('../includes/header.php');
	
	?>
	
	<h2>List of courses<h2>
	<h3>Counseling Course</h3>
	<p>Errr Whats up Doc?. This course is designed to give you the dos and don'ts to crawl through somebodies, make that somethings mind. Bring a flashlight and bag of breadcrumbs so you don't get lost, it's a mess in there.<p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-counseling.html">The Counseling Course can be found here</a>. It is taught by <?php echo(strip_tags($names['CNS']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['CNS']['email'])); ?>"><?php echo(strip_tags($names['CNS']['email'])); ?></a></p>
				 
	<h3>Engineering Course</h3>
	<p>Possibly not for the faint hearted, but probably a must for those starship designer wannabes. This course delves into real physics, Star Trek physics, starship design, and hints on how to roleplay an engineer in STF.<p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-engineering.html">The Engineering Course can be found here</a>. It is taught by <?php echo(strip_tags($names['Eng']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['Eng']['email'])); ?>"><?php echo(strip_tags($names['Eng']['email'])); ?></a></p> 
				 
	<h3>Medical Course</h3>
	<p>Is there a doctor in the house? The goal of the course is to give you a better understanding on how to roleplay an STF medical character, you don't just have to play a doctor. Its also here to give you hints and tips such as lists of medical equipment, diseases and conditions, and medicines known to the Star Trek era.</p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-medical.html">The Medical Course can be found here</a>. It is taught by <?php echo(strip_tags($names['Med']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['Med']['email'])); ?>"><?php echo(strip_tags($names['Med']['email'])); ?></a></p>
				 
	<h3>Science Course</h3>
	<p>Ok, so this course won't bring you up to the level needed for a PhD, but it will give you the basic insight into several of the various sciences such as astronomy, biology, and chemistry. There are also some handy hints as to how to roleplay an STF science officer.</p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-science.html">The Science Course can be found here</a>. It is taught by <?php echo(strip_tags($names['Sci']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['Sci']['email'])); ?>"><?php echo(strip_tags($names['Sci']['email'])); ?></a></p>
				 
	<h3>Security Course</h3>
	<p>To shoot or not to shoot. That is the question? Still unsure, then this course is for you. It is an informative guide as to how to and how not to be an STF security officer. This course will inform you about weapons, the tactical station, and other helpful pointers.</p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-security.html">The Security Course can be found here</a>. It is taught by <?php echo(strip_tags($names['Sec']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['Sec']['email'])); ?>"><?php echo(strip_tags($names['Sec']['email'])); ?></a></p>
	
	<h3>Gamemaster Course</h3>
	<p>So, you want to be a gamemaster? Can you can handle it? Well, this is a sure way of finding out. The course gives you good information about different GMing styles, and scenarios. This course is a requirement should you want to participate in the Star-Fleet GM training programs, run by the GM Department.</p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-gamemaster.html">The Gamemaster Course can be found here</a>. It is taught by <?php echo(strip_tags($names['GM']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['GM']['email'])); ?>"><?php echo(strip_tags($names['GM']['email'])); ?></a></p>
	
	<h3>Command Courses</h3>
	<p>You have been covertly eyeing up that centre chair. You want power and glory. You want to send NE Redshirt constantly to their deaths! Well step this way, we have the courses for you. For your first steps into leadership as a DH, progressing through to XO and finally that big chair, these courses will help give you an understanding of leadership, how to cope with situations in STF and an insight into how to be a good CO. Are you good enough? Take the courses and find out!</p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-command-co.html">The Commanding Officer Command Course can be found here</a>. It is taught by <?php echo(strip_tags($names['CO']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['CO']['email'])); ?>"><?php echo(strip_tags($names['CO']['email'])); ?></a></p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-command-xo.html">The Executive Officer Command Course can be found here</a>. It is taught by <?php echo(strip_tags($names['XO']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['XO']['email'])); ?>"><?php echo(strip_tags($names['XO']['email'])); ?></a></p>
	<p class="left"><a class="links" href="http://www.star-fleet.com/library/bookshelf/textbook/textbook-command-dh.html">The Department Head Command Course can be found here</a>. It is taught by <?php echo(strip_tags($names['DH']['tutor'])); ?> who can be contacted at <a class="email" href="mailto:<?php echo(strip_tags($names['DH']['email'])); ?>"><?php echo(strip_tags($names['DH']['email'])); ?></a></p>
	
	<?
	include('../includes/footer.php');
	?>