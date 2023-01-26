<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="text/html;" http-equiv="content-type" charset="utf-8" />
<meta name="description" content="text/html;" http-equiv="content-type" charset="utf-8" />
<title>My Photos Online</title>
<link href="http://fonts.googleapis.com/css?family=Abel|Arvo" rel="stylesheet" type="text/css" />
<link href="estilo/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="estilo/login.css" rel="stylesheet" type="text/css" media="screen" />
<link href="estilo/juqery-ui.css" rel="stylesheet" type="text/css" media="screen" />
<link href="estilo/vanadium.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="javascript/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="javascript/jquery.slidertron-1.0.js"></script>
<script type="text/javascript" src="javascript/jquery.poptrox-1.0.js"></script>
<script type="text/javascript" src="javascript/jquery-ui.js"></script>
<script type="text/javascript" src="javascript/vanadium.js"></script>
<script type="text/javascript" src="javascript/login.js"></script>
<script type="text/javascript">
	$('#menu').dropotron();
	
	$(document).ready(function() {
		$('#showlogin').click(function() {
		  $('#loginpanel').slideToggle('slow', function() {
			  $("#triangle_down").toggle(); 
			  $("#triangle_up").toggle();
		  });
		});
	 });
	 
	$(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});
</script>
<style>
 #sortable { list-style-type: none; margin-left: 40px; padding: 0; }
 #sortable li { margin: 6px; padding: 1px; float: left; width: 230px; height: 150px; font-size: 4em; text-align: center; }
</style>
</head>
