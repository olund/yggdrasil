<!doctype html>
<html class='no-js' lang='<?=$lang?>'>

<head>
<meta charset='utf-8'/>
	<title><?=get_title($title)?></title>
	<?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
	<?php if(isset($stylesheets)) { foreach ($stylesheets as $value) {
			echo "<link rel='stylesheet' type='text/css' href='{$value}'/>";
	}} ?>

	<script src='<?=$modernizr?>'></script>

</head>

<body>
  <div id='wrapper'>
    <div id='header'><?=$header?></div>
    <div id='menu'>
    	<div class='menu-items'><?=isset($navbar) ? get_navbar($navbar) : null ?></div>
    </div>
    <div id='main'><?=$main?></div>
    <div id='footer'><?=$footer?></div>
  </div>
  <!--jquery-->
 	<?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>

  <?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
		<script src='<?=$val?>'></script>
	<?php endforeach; endif; ?>

	<?php if(isset($google_analytics)): ?>
	<script>
	  var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
	  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	  s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<?php endif; ?>

</body>
</html>