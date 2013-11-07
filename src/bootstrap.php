<?php
/**
 * Bootstrapping functions, essential and needed for Yggdrasil to work together with some common helpers. 
 *
 */
 
/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
	echo "Yggdrasil: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}

set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes
 */

function myAutoLoader($class) {
	$path = YGGDRASIL_INSTALL_PATH . "/src/{$class}/{$class}.php";
	if(is_file($path)) {
		include($path);
	} else {
		throw new Exception("Classfile '{$class}' does not exist.");
	}
}

spl_autoload_register('myAutoLoader');

