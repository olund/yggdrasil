<?php
include(__DIR__ . '/config.php');

// include the filter
include(__DIR__ . '/filter.php');


$db = new CDatabase($yggdrasil['database']);

// Fina ternary jag gjorde helt själv xD
$url = isset($_GET['url']) ? strip_tags($_GET['url']) : null;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$sql = "
SELECT * FROM kmom05_content
	WHERE 
		type = 'page' AND
		url = ? AND
		published <= NOW();
";

$res = $db->Select($sql, array($url));

// Sanitize content before using it.
if(isset($res[0])) {
	$content = $res[0];
} else {
	die('Finns inget där...');
}


$title = htmlentities($content->title, null, 'UTF-8');
$data = doFilter(htmlentities($content->data, null, 'UTF-8'), $content->filter);

$editLink = $acronym ? "<a href='edit.php?id={$content->id}'>Uppdatera denna sida</a>" : null;



$yggdrasil['title'] = 'Page';
$yggdrasil['main'] = <<<EOD
<article>
	<header>
		<h1>{$title}</h1>
	</header>

	{$data}

	<footer>
		{$editLink}
	</footer>
</article>

EOD;



include(YGGDRASIL_THEME_PATH);