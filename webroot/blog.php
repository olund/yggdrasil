<?php

include(__DIR__ . '/config.php');
include(__DIR__ . '/filter.php');

$db = new CDatabase($yggdrasil['database']);

//get slug and acronym
$slug = isset($_GET['slug']) ? strip_tags($_GET['slug']) : null;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;


// get the content bro
$slugSql = $slug ? 'slug = ?' : '1';
$sql = "SELECT * FROM kmom05_content 
		WHERE type = 'post' AND 
		$slugSql AND 
		published <= NOW() 
		ORDER BY updated DESC;
		";


$res = $db->Select($sql, array($slug));


// Prepare content and store it all in variables for yggdrasil container.......
$yggdrasil['title'] = 'Bloggen';
$yggdrasil['debug'] = $db->DumpSQL();
$yggdrasil['main'] = null;


// if we find first element in the sql query, its ok
if(isset($res[0])) {
	// Loop every element
	foreach ($res as $content) {
		// Sanitera content före vi använder det.
		$title = htmlentities($content->title, null, 'UTF-8');
		$data = doFilter(htmlentities($content->data, null, 'UTF-8'), $content->filter);
		
		if($slug) {
      		$yggdrasil['title'] = "$title | " . $yggdrasil['title'];
		}
		$editLink = $acronym ? "<a href='edit.php?id={$content->id}'>Uppdatera denna post</a>" : null;

		$yggdrasil['main'] .= <<<EOD
			<section>
				<article>
					<header>
						<h1><a href='blog.php?slug={$content->slug}'>{$title}</a></h1>
					</header>
					{$data}
					<footer>
						
					</footer>
				</article>
			</section>

EOD;

	}
} else if($slug) {
	$yggdrasil['main'] = 'Det finns inte en sådan bloggpost';
} else {
	$yggdrasil['main'] = 'Det finns inga bloggposter';
}










include(YGGDRASIL_THEME_PATH);