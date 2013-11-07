<?php 
/**
 * This is a Yggdrasil pagecontroller.
  */
// Include the essential config-file which also creates the $yggdrasil variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
$yggdrasil['title'] = "404";
$yggdrasil['header'] = "<h1>Wrong?</h1>";

$yggdrasil['main'] = "<p>Wrong address?</p> <a href='http://www.student.bth.se/~heoa13/oophp/kmom01/webroot/'>home</a>";


$yggdrasil['footer'] = "";
 
// Send the 404 header 
header("HTTP/1.0 404 Not Found");

// Finally, leave it all to the rendering phase of Anax.
include(YGGDRASIL_THEME_PATH); 