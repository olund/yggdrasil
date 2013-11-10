<?php
/**
 * Include config
 */

include(__DIR__.'/config.php');

/**
 * Set title
 */

$yggdrasil['title'] = 'Me';

/**
 * Main Content
 */
$yggdrasil['main'] = <<<EOD

<h1>Hello World</h1>
<p>Mitt namn är Henrik Ölund, studerar just nu på BTH och läser webbprogrammering! 
     Mitt största intresse är datorer och allt som finns till. På fritiden sitter jag vid min kära dator och lyssnar på <a href="http://open.spotify.com/user/1116512582/playlist/4NQHhg8PQbL1I5SySMTWy4">musik</a>, kodar i php, c++ och kollar på tv-serier</p> 
EOD;



/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);