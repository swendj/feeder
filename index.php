<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="refresh" content="5" URL="index.php">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<title>Feeder</title>
<style type="text/css" media="screen">
body { background: #efefe7; font-family: Verdana, sans-serif; font-size: 13pt; }
#page { background: #ffffff; margin: 25px; border: 2px solid #c0c0c0; padding: 10px; }
#header { background: #339966; border: 0px; text-align: center; padding: 10px; color: #ffffff; }
#header h1 { color: #ffffff; }
#body { padding: 10px; text-align: center; }
span.tt { font-family: monospace; }
span.bold { font-weight: bold; }
a:link { text-decoration: none; font-weight: bold; color: #C00; }
img { max-width : 80%; }
button{
	width:114px;
	height:58px;
	display:inline-block;
	margin:12px;
	text-decoration:none;
	font-family:Arial;
	font-size:17px;
	border:1px solid #fff;
	border-radius:16px;
	color:#fec;
	background-color:#7B97B1;
	padding:2px 11px;
	font-weight:bold;
	box-shadow:3px 3px 4px #8CA0B2;
	text-shadow:1px 1px 2px #6E91B2;
}
button:hover{
	background-color:#887CB0;
}


</style>
</head>
<body>

<?php
if ($_POST["switch"])
 {
  $switch=$_POST["switch"];
  if ($switch==1)
   {
   //Schacht 1 oeffnen und Bild aufnehmen
   $handle = fopen ("action.txt", "w");
   fwrite ($handle, "1");
   fclose ($handle);
   }
  if ($switch==2)
   {
   //Schacht 2 oeffnen und Bild aufnehmen
   $handle = fopen ("action.txt", "w");
   fwrite ($handle, "2");
   fclose ($handle);
   }
  if ($switch==3)
   {
   //Neues Bild aufnehmen ohne Fuetterung
   $handle = fopen ("action.txt", "w");
   fwrite ($handle, "3");
   fclose ($handle);
   }
 }
?>

<div id="page">
 <div id="header">
 <h1>Futterautomat</h1>
 </div>
 <div id="body">

  <h3>Letztes Fütterungsbild</h3>

  <a href="./view.jpg"><img src="view.jpg" width="400"></a>

<p></p>
<form method="post" action="index.php">
<button type="submit" name="switch" value="1">Schacht 1</button>
<button type="submit" name="switch" value="3">Aufnahme</button>
<button type="submit" name="switch" value="2">Schacht 2</button>
</form>
<p></p>

Es werden Futterschacht 1 oder 2 geöffnet oder eine neue Aufnahme erzeugt.

 </div>
</div>
</body>
</html>
