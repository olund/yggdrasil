<?php
/**
 * Render content to theme.
 */

// Extract the data array to cariables for easier access in the template files.
extract($yggdrasil);


// Include the template functions.
include(__DIR__ . '/functions.php');

// Include the template file.
include(__DIR__ . '/index.tpl.php');


?>