<?php
/**
 * This is a yggdrasil pagecontroller
 */

// Include the essential config-file which also creates the $yggdrasil variable with its defaults.
include (__DIR__ . '/config.php');


// Do it and store it all in variables in the yggdrasil container
$yggdrasil['title'] = 'Hello World';

$yggdrasil['header'] = <<<EOD
<img class='sitelogo' src='img/anax.png' alt='Anax Logo'/>
<span class='sitetitle'>Yggdrasil webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$yggdrasil['main'] = <<<EOD

EOD;


 
$yggdrasil['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Anax-base'>Anax på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

// Finally, leave it all to the rendering phase of Anax.
include(YGGDRASIL_THEME_PATH);