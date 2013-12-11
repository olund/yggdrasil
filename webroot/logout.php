<?php

include(__DIR__.'/config.php');

$yggdrasil['title'] = 'LOGIN';

// database object
$db = new CDatabase($yggdrasil['database']);
// user object
$user = new CUser($db);


if($user->IsAuthenticated()) {
	$output = "Du är inloggad som: " . $user->GetName();
} else {
	$output = "Du är INTE inloggad";
}

if(isset($_POST['doLogout'])) {
	$user->Logout();
}

/**
 * Main Content
 */
$yggdrasil['main'] = <<<EOD

<h1>{$yggdrasil['title']}</h1>
<div class='login'>
	<fieldset>
		<form method='post'>
			<input type="submit" name="doLogout" value="Logga ut">
		</form>
		<p>{$output}</p>
	</fieldset>
</div>
EOD;



/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);