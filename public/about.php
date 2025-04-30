
<?php

//about.php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');

?>

<div class="two-col-about">
    <main class="main">
        <article class="article">
            <h1>Om kursen Webbteknologier</h1>
            <p>Denna kurs ger insikt i grundläggande webbutveckling med HTML, CSS, PHP, och SQL. Efter avslutad kurs kan
                studenten skapa databasdrivna webbplatser, förstå kärnteknikerna och effektivt använda verktyg inom
                webbutveckling.</p>
            <p>Kursen omfattar praktiska övningar, projektarbete, och avslutas med ett större projekt. Varje modul
                fokuserar på viktiga aspekter av webbutveckling, från design med HTML och CSS, till programmering med
                PHP och databashantering med SQLite.</p>
            <div class="center-link">
                <a href="//github.com/dbwebb-se/webtec">Kursrepo</a>
            </div>

        </article>

        <aside class="aside">
            Kursmoment:
            <ul>
                <li>Grundläggande webbdesign med HTML och CSS.</li>
                <li>Introduktion till PHP för dynamisk webbutveckling.</li>
                <li>Databashantering med SQLite och SQL.</li>
                <li>Avancerad PHP, inklusive användning av PDO.</li>
                <li>Avslutande projektarbete.</li>
            </ul>
        </aside>
    </main>
</div>
<?php include('../view/footer.php') ?>

