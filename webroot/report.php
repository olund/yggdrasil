<?php
/**
 * Include config
 */

include(__DIR__.'/config.php');

/**
 * Set title
 */

$yggdrasil['title'] = 'Redovisningar';

/**
 * Main Content
 */
$yggdrasil['main'] = <<<EOD

<h1>Redovisningar</h1>
<h2>Kmom01</h2>
<p> 
	Trevligt kursmoment, roligt att äntligen få lite struktur på arbetet och börja lite smått med objekt orienterat. Känns som denna strukturen fungerar väldigt bra tills vi arbetar med MVC kursen.  
</p>
<p>
	Väldigt intressant att följa guiden till ANAX, först gjorde jag en git clone på hela projektet men insåg att man inte lär sig något på det viset. Jag bestämde mig för att skriva av hela projektet för att se vad som händer hela tiden och för att lära mig mer.
	Det var roligt att börja med lite mer avancerade saker som en egen exception handler och en autoloader. Har aldrig använt det förut med ser definitivt användningområden för dom.
</p>


<p> 
	<b>Mit utvecklings miljö består av:</b> Sublime Text, FlashFXP/Filezilla, Terminalen/Putty och <a href="http://livereload.com">LiveReload</a>.
	Jag använder Sublime Text 2 i Windows, Manjaro och OS x. Sublimes SFTP lugin används för att ladda upp filer till studentservern. Mitt val av webbläsare är Chrome, Safari och Firefox.  
</p>
<p> Guiden för att komma igång med PHP behövdes ej i detta kursmoment.</p>

<p>
	Jag döpte min webbmall till <a href="https://sv.wikipedia.org/wiki/Yggdrasil">Yggdrasil</a>. Yggdrasil är ett världsträd i nordiskmytologi. Trädet har tre rötter, den första går till människorna (Midgård) och gudarnas hemvis (Asgård), den andra går till jättnarnas hemvist (Jotunheim eller Utgård) och den tredje till underjorden (Nifelheim). 
<p/>
<p>	
Tycket nordiskmytologi är ett intressant ämne och valde Yggdrasil som namn.
Fick det från <a href="https://sv.wikipedia.org/wiki/Unleashed">Unleased</a> som är ett Svenskt Death Metal band och deras låt <a href="https://www.youtube.com/watch?v=PnYPK2B7bc8">As Yggdrasil Trembles</a>
</p>

<p> 
	Strukturen var bra, enkelt att följa med vad som händer. Jag gjorde inte några förbättringar.
</p>
<p>
	Source var enkelt att inkludera som en modul.
</p>
<p> Uppgiften ligger på <a href="https://github.com/olund/yggdrasil">github</a> </p>

EOD;




/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);