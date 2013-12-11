<?php

include(__DIR__ . '/config.php');

// $db object to CDatabase (php pdo wrapper)
$db = new CDatabase($yggdrasil['database']);

/**
 * Create a link to the content, based on its type
 * @param  [object] $content [a blog or a page]
 * @return [string]          [string with url to display content]
 */
function getUrlToContent($content) {
	switch ($content->type) {
		case 'page':
			return "page.php?url={$content->url}";
			break;
		case 'post':
			return "blog.php?slug={$content->slug}";
		default:
			return null;
			break;
	}
}

$sql = "SELECT *, (published <= NOW()) AS available FROM kmom05_content";
$res = $db->Select($sql);

$li = null;

foreach ($res as $key => $value) {
	$li .= "<li>{$value->type} (" . (!$value->available ? 'inte' : null) . "publicerad): " . htmlentities($value->title, null, 'UTF-8') . " (<a href='edit.php?id={$value->id}'>editera</a> <a href='" . getUrlToContent($value) . "'>Visa</a>)</li>\n";
}


$yggdrasil['title'] = "Visa allt";

$yggdrasil['main'] = <<<EOD


<h1>{$yggdrasil['title']}</h1>
<p>Här är en lista på allt innehåll i databasen</p>


<ul>
{$li}
</ul>


<p><a href='blog.php'>Visa alla bloggposter</a></p>

EOD;

include(YGGDRASIL_THEME_PATH);

