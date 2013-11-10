<?php
/**
 * Config file for yggdrasil, change settings here to affect installtion:)
 */

/**
 * Set error reporting 
 */
error_reporting(-1); // ALL
ini_set('display_errors', 1); // Display all errors
ini_set('output_buffering', 1); // Do not buffer output, write directly 


/**
 * Define yggdrasil paths.
 */
define('YGGDRASIL_INSTALL_PATH', __DIR__ .'/..');
define('YGGDRASIL_THEME_PATH', YGGDRASIL_INSTALL_PATH . '/theme/render.php');

/**
 * Include bootstrapping functions.
 */
include(YGGDRASIL_INSTALL_PATH . '/src/bootstrap.php');

/**
 * Start the session.
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();

/**
 * Create the yggdrasil variable
 */

$yggdrasil = array();

/**
 * Site wide settings
 */
$yggdrasil['lang'] = 'sv';
$yggdrasil['title_append'] = ' | Yggdrasil en webbtemplate';


/**
 * Standard Page footer & header
 */
$yggdrasil['header'] = <<<EOD
<img class='sitelogo' src='img/anax.png' alt='Anax Logo'/>
<span class='sitetitle'>Yggdrasil</span>
<span class='siteslogan'>"If it ain't broke, don't fix it"</span>
EOD;


$yggdrasil['footer'] = <<<EOD
<footer><span class='sitefooter'>@Henrik Ölund (henke.olund@gmail.com) | <a href='https://github.com/olund/yggdrasil'>Yggdrasil på GitHub</a> 
(this is a modified version of <a href='https://github.com/mosbth/Anax-base/'>ANAX</a>) | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

/**
 * Menubar array
 */

$yggdrasil['navbar'] = array(
	'class' => '',
	'items' => array(
		'hem' => array('text' => 'Hem', 'url' => 'index.php'),
		'redovisning' => array('text' => 'Redovsning', 'url'=> 'report.php'),
		'source' => array('text' => 'Källkod', 'url' => 'source.php'),
	),
	'callback_selected' => function($url) {
		if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
			return true;
		}
	}
);


$yggdrasil['stylesheets'] = array();

/**
 * Theme related settings.
 */
$yggdrasil['stylesheets'][] = 'css/style.css';
 
$yggdrasil['favicon']    = 'favicon.ico';


/**
 * Settings for JavaScript
 */
$yggdrasil['modernizr'] = 'js/modernizr.js';
$yggdrasil['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery

$yggdrasil['javascript_include'] = array();
//$yggdrasil['javascript_include'] = array('js/main.js'); // To add extra javascript files
$yggdrasil['javascript_include'][] = 'js/main.js'; 



/**
 * Google analytics.
 */
//$yggdrasil['google_analytics'] = 'UA-22093351-1';
$yggdrasil['google_analytics'] = null;

