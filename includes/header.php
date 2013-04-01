<?php

$names = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/acad/data/names.ini', TRUE);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="/acad/styles/main.css" />
		<title>Starfleet Academy</title>
	</head>
	<body>
		<div class="stflogo">
			<a href="http://www.star-fleet.com/"><img src="/acad/images/stf-logo.png" alt="Academy Page"/></a>
		</div>
		<div class="acadlogo">
			<a href="http://www.star-fleet.com/acad/"><img src="/acad/images/acad-logo.png" alt="Academy Page"/></a>
		</div>

		<div id="commandants">
      <h1>Starfleet Academy</h1>
      <div id="acmdt">
    		Academy Commandant<br />
    		<a class="email" href="mailto:<?php echo(strip_tags($names['acmdt']['email'])); ?>"><?php echo(strip_tags($names['acmdt']['name'])); ?></a>
      </div>
      <div id="vcmdt">
		    Academy Vice Commandant<br />
		    <a class="email" href="mailto:<?php echo(strip_tags($names['vcmdt']['email'])); ?>"><?php echo(strip_tags($names['vcmdt']['name'])); ?></a>
	    </div>
	    <div id="aflo">
		    Academy Fleet Liaison Officer<br />
		    <a class="email" href="mailto:<?php echo(strip_tags($names['aflo']['email'])); ?>"><?php echo(strip_tags($names['aflo']['name'])); ?></a>
	    </div>
    </div>
		<div class="deptlinks">
			<ul class="links">
				<li><a class="links" href="/acad/courses/">Courses</a></li>
				<li><a class="links" href="http://www.star-fleet.com/library/bookshelf/handbook/">Players' Handbook</a></li>
				<li><a class="links" href="/acad/grads/">Graduates</a></li>
				<li><a class="links" href="http://www.star-fleet.com/library/">STF Library</a></li>
				<li><a class="links" href="http://www.star-fleet.com/prez/reports/#dep">Reports</a></li>
				<li><a href="/acad/mandates/">Mandates</a></li>
        <li><a href="/acad/reports/">Submit Report</a></li>
        <li><a href="http://www.star-fleet.com/webb/project/acad">Academy Projects</a></li>
			</ul>
		</div>
		<hr class="line"/>
