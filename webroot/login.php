<?php

include(__DIR__.'/config.php');

$yggdrasil['title'] = 'LOGIN';
//$yggdrasil['stylesheets'][] = 'css/pagination.css';

// Create new database object
$db = new CDatabase($yggdrasil['database']);
$user = new CUser($db);



if(isset($_POST['doLogin'])) {
	$user->Login($_POST['username'], $_POST['password']);
}
if($user->IsAuthenticated()) {
	$output = "Du är inloggad som: " . $user->GetName() . '<br> Acronym: ' . $user->GetAcronym();
} else {
	$output = "Du är INTE inloggad";
}


/**
 * Main Content
 */
$yggdrasil['main'] = <<<EOD

<h1>{$yggdrasil['title']}</h1>
<div class='login'>
	<fieldset>
		<form method='post'>
			<input type="text" name="username" autofocus placeholder="Username...">
			<input type="password" name="password" placeholder="Password...">
			<input type="submit" name="doLogin" value="Logga in">
		</form>
		<p>{$output}</p>
	</fieldset>
</div>
EOD;



/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);