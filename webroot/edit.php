<?php

include(__DIR__ . '/config.php');
$yggdrasil['stylesheets'][] = 'css/textbox.css';

$db = new CDatabase($yggdrasil['database']);

// idk about ternary operators... too hard to read imo
if(isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];
}

// TAKE CARE OF POST AND GET
// Idk about ternary operators but if MOS uses them i should also... They are kinda hard to read though.
$id = isset($_POST['id']) ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null); // If post/get id är satt.
$title = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$slug = isset($_POST['slug']) ? strip_tags($_POST['slug']) : null;
$url = isset($_POST['url']) ? strip_tags($_POST['url']) : null;
$type = isset($_POST['type']) ? strip_tags($_POST['type']) : null;
$data = isset($_POST['data']) ? strip_tags($_POST['data']) : null;
$filter = isset($_POST['filter']) ? strip_tags($_POST['filter']) : null;
$published = isset($_POST['published']) ? strip_tags($_POST['published']) : null;

// Om man tryckt på uppdatera
$doUpdate = isset($_POST['doUpdate']) ? true : false;
// Användarens akronym
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

// If id is negativ, die
is_numeric($id) or die('ID must be numeric and over 0.');
// if we are logged in.
isset($acronym) or die('You must login to edit.');


// IF form was submitted
$output = null;
if($doUpdate) {
	
	$sql = '
    UPDATE kmom05_content SET
      title   = ?,
      slug    = ?,
      url     = ?,
      data    = ?,
      type    = ?,
      filter  = ?,
      published = ?,
      updated = NOW()
    WHERE 
      id = ?
  ';

	// För att man inte ska få 'Duplicate entry for key "url" '.
  	$url = empty($url) ? null : $url;
	// parameters into sql
  	$params = array($title, $slug, $url, $data, $type, $filter, $published, $id);
	// Execute sql
  $res = $db->Query($sql, $params);

	if($res) {
		$output = "<p style='color:green'>Informationen sparades!</p>";
	} else {
		$output = "<p style='color:red'>Något gick snett, INTE SPARAD.</p>";
	}
}


// SQL TO SHOW EVERYTHING
$sql = "SELECT * FROM kmom05_content where id=?";
$res = $db->Select($sql, array($id));

if(isset($res[0])) {
	$content = $res[0];
} else {
	die('Misslyckades, det finns inget innehåll med sådant id..');
}

// Sanitize content before using it.

$title = htmlentities($content->title, null, 'UTF-8');
$url = htmlentities($content->url, null, 'UTF-8');
$type = htmlentities($content->type, null, 'UTF-8');
$data = htmlentities($content->data, null, 'UTF-8');
$slug = htmlentities($content->slug, null, 'UTF-8');
$filter = htmlentities($content->filter, null, 'UTF-8');
$published = htmlentities($content->published, null, 'UTF-8');


$yggdrasil['title'] = "UPPDATERA INNEHÅLLET!";

$yggdrasil['main'] = <<<EOD

<h1>{$yggdrasil['title']}</h1>

<div class='updateContent'> 
	<form method='post'>
		<fieldset>
			<legend>Uppdatera content</legend>
			 <input type='hidden' name='id' value='{$id}'/>
			<p><label>Title: <br><input type='text' value='{$title}' name='title' autofocus placeholder='Title...'></label></p>
			<p><label>Slug: <br><input type='text' value='{$slug}' name='slug' placeholder='Slug...'></label></p>
			<p><label>Url: <br><input type='text' value='{$url}' name='url' placeholder='Url...'></label></p>
			<p><label>Content: <br><textarea name='data' cols='100' rows='15'>{$data}</textarea></label></p>
			<p><label>Type: <br><input type='text' value='{$type}' name='type' placeholder='Type...'></label></p>
			<p><label>Filter: <br><input type='text' value='{$filter}' name='filter' placeholder='Filter...'></label></p>
			<p><label>Published date: <br><input type='text' value='{$published}' name='published'></label></p>
			<p><input type='submit' name='doUpdate' value='Uppdatera'>
			<p><input type='reset' name='reset' value='Återställ'>
		</fieldset>
	</form>
	{$output}

</div>

{$db->DumpSQL()}

<p><a href="view.php">Visa alla</a></p>

EOD;

include(YGGDRASIL_THEME_PATH);

