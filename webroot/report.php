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
	Jag döpte min webbmall till <a href="https://sv.wikipedia.org/wiki/Yggdrasil">Yggdrasil</a>. 
	Yggdrasil är ett världsträd i nordiskmytologi. Trädet har tre rötter, 
	den första går till människorna (Midgård) och gudarnas hemvis (Asgård), den andra går till jättnarnas hemvist (Jotunheim eller Utgård) och den tredje till underjorden (Nifelheim). 
</p>
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

<h2>Kmom02</h2>

<p>
Guiden till kursmomentet var fylld med nyttig information och man lär sig nästan allt men behöver veta om klasser. Dock tycker jag den inte beskriver hur man ska konstruera sin klasser för best practice. Som nybörjare var det svårt att inse varför klasser är bättre att använda än vanlig funktions-inriktad programmering. Dock hjälpte det mycket när man gick igenom den abstrakta CAnimal klassen. Det finns massor av olika djurraser exempelvis hund, katt och råtta men inget djur som bara är ett djur. 

Jag jobbade igenom oophp guiden rätt noggrant skrev av rätt mycket av moskällkod. 
</p>
<p>
Valde att göra tärningspelet 100 eftersom vi gjorde 
<a href="https://github.com/jasdeu/datetimeclass">månadens babe</a> i unixlabbet.
</p>
<p>När jag skapde tärningspelet var jag väldigt osäker men fick det tillslut att fungera med stor hjälp av polare. Försökte mig på att använda magiska get/set metoder och det fungerade bra. Är inte ett jätte stort fan av att ha hundratals get och set för varje variabel som man har i c++. 
</p>
<pre>
function __get(property) {
		if(property_exists(this, property)) {
			return this->property;
		} else {
			die(property . ' does not exist..');
		}
	}
</pre>
<p>
Jag skapade en klass som heter CGameRound som har metoderna: IncreaseScore, IncreaseRound, IncreaseTotal, ResetScore och ResetTotal. 
Jag använde CDiceImage som vi skapade i guiden och byggde upp ett litet spel. 
</p>
<p>
	När vi skapde måndadens babe gjorde vi en datetime klass (CDate) som använder PHP’s DateTime klass. Klassen hade metoderna: isItFriday, getObject, daysTo, getNextFriday, __call, getMonthBaby, setMonthBaby och generateMonth.
	Tyvärr ligger inte senaste uppdateringen av monthbabe.php på github.
</p>


<h2>Kmom03</h2>

<p>
Är bekant med MySQL, Microsoft Access och SQLite från htmlphp. Läst databashantering på gymnasiet och då använde vi Access (värdelöst) och på fritiden hag jag använt MySQL.
</p>
<p>
Det känns väldigt bra att jobba med MySQL eftersom jag har använt det tidigare. Har använt mycket PHPMyAdmin tidigare så jag valde att använda Terminalen och MySQL workbench mest i övningarna. Driftmiljön känns helt okej att jobba med, lite jobbigt att port 3306 inte är öppen och man måste SSH’a in först till ssh.student.bth.se istället för att gå direkt på blu-ray men det är ju ett bra säkerhetsskydd. 
</p>
<p>
Övningarna var lagom svåra. Det var enkelt ibörjan eftersom jag kunde mycket från gymnasiet. Ungefär efter hälften kom det massa nytt som jag aldrig jobbat med och det var hyffsat svårt. Jag tycker joins är fortfarande rätt svårt att skriva själv utan hjälp men det släpper nog när man jobbat med det mer. Jag gillade verkigen det här med vyer. Koden blir väldigt lättläst om man återanvänder sina vyer med exempelvis offsets (som vi gör i kmom04).  
</p>
<p>
Jag föredrar nog att jobba i terminalen över SSH. Man får 100% kontroll över tabeller jämfört när man jobbar i phpmyadmin och han spottar ut en tabell på några sekunder. Om man inte skriver koden själv är det lätt hänt att man gör något fel och exempelvis inte använder utf-8 som teckenkodning.

Jag gjorde alla övningar via studentservern, känns onödigt att jobba lokalt.
Det uppkom lite problem med MySQL workbench på min Macbook Air men löstes med hjälp av google och Mos. 
</p>



<h2>Kmom04</h2>
<p>
	Det här kursmomentet var roligt och intressant.

	Jag skapade nästan all SQL i <a href="http://puu.sh/5H7hC.png">cygwin terminalen</a> över SSH till blu-ray servern, känns bäst så när man jobbar i Windows och inte har riktiga bash. Använde även MySQL workbench för att testa andra alternativ. 
</p>
<p>
	Guiden “Kom igång med PHP PDO och MySQL” var väldigt bra och oerhört intressant. Har aldrig tänkt på att lägga in debugging-möjligheter i klassen och det är väldigt användningsbart när man exempelvis behöver skapa långa SQL satser. 
	Jag klagade lite på metodnamnen när jag följde guiden, “ExecuteSelectQueryAndFetchAll” är ett väldigt långt namn och även svårt att komma ihåg enligt mig. Jag valde därmed att döpa min till Select() och även “ExecuteQuery” döpte jag om till Query().
</p>

<p>	
	Innan jag hade gjort klassen CDatabase valde att skapa en konstant “define(‘REMOTE’, true)” för att välja om jag ville jobba lokalt eller ej. </p>
	
		<pre>
		if(REMOTE) {
		   	dsn = 'mysql:host=blu-ray.student.bth.se;dbname=heoa13';
		    login = 'heoa13';
		    password = 'if890u=R';
			options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
		} else {
		    dsn = 'mysql:host=localhost;dbname=kmom04';
		    login = 'root';
		    password = '';
			options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
		} 
		</pre>
	<p>
	Jag ändrar bara remote till false om jag arbetade lokalt. Tyckte det var en smidig lösning innan jag skapade CDatabase. Nu finns den i “config.php” istället.
</p>
<p>
	Det kändes väldigt bra att jobba med PDO. Det är ett stort steg från gamla mysql och mysqli som jag har arbetat med tidigare. 
	Det är ännu bättre nu när jag har skapat CDatabase där man enkelt kan köra enrads SQL-frågor även med debug (res = db->Select(“select * from table”);
</p>
<p>
	Känner att jag inte behärskar klassar 100% ännu, jag kan skapa och använda klasserna men vet ej hur jag ska strukturera upp dem för bästa resultat. Ska jag extenda CUser klassen så att den använder CDatabase eller ska jag skicka in ett databas objekt i konstruktorn… Jag vet inte vad som är “best practice” så jag valde att skicka in ett databas objekt.  
</p>

<p> 
	Konceptet med klasser som moduler verkar fungera väldigt bra, gillar verkligen autoloadern och Exceptionhandlern. Känns väldigt smidigt att skapa en klass som sköter exempelvis databasen. 
</p>


EOD;




/**
 * render it.
 */
include(YGGDRASIL_THEME_PATH);