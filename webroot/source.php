<?php
/**
 * Include config
 */

include(__DIR__.'/config.php');

/**
 * Set title
 */
$yggdrasil['stylesheets'][] = 'css/source.css';
$yggdrasil['title'] = 'Me';

$CSource = new CSource();

/**
 * Main Content
 */
$yggdrasil['main'] = $CSource->View();


/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);