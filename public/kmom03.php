<?php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');
?>
<main>
    <article class="article">
        <h1>Redovisning kmom03</h1>
        <p>När jag först introducerades till PHP var jag nyfiken men samtidigt osäker på hur det skulle stapla sig mot
            andra programmeringsspråk jag kände till. Det var en ny utmaning att bygga en webbplats med strukturen av
            sidkontroller och vyer, men det gav mig en bättre insikt i hur dynamiska webbplatser fungerar bakom
            kulisserna. Grundläggande koncept i PHP, som variabler och loopar, var bekanta för mig, men jag stötte på
            nya utmaningar när jag började arbeta med formulärhantering, särskilt med GET-metoden och användningen av
            querysträngen. Att skicka data via URL:en och sedan hantera den på servern var ett spännande koncept som jag
            inte tidigare utforskat i så stor detalj. Dessutom lärde jag mig mycket om $_SERVER-variabeln, ett
            kraftfullt verktyg för att hämta information om servermiljön och den begärande användarens session.
        </p>
        <p>För att lösa uppgifterna förlitade jag mig på mina tidigare erfarenheter från andra programmeringsprojekt.
            Kursmaterialet och övningarna var också till stor hjälp. När jag stötte på svårigheter eller osäkerhet,
            vände jag mig till ChatGPT, som var ett ovärderligt verktyg för att klara mig genom komplicerade passager.
        </p>
        <p>Jag var särskilt nöjd med hur jag hanterade extrauppgifterna: att markera det valda värdet i navbaren och att
            presentera statistik om resurser som används. Dessa krävde en kombination av teknisk skicklighet och kreativ
            problemlösning, och jag kände mig stolt över de lösningar jag kom fram till.</p>
        <p>Detta kursmoment har lärt mig mycket om webbprogrammering och hur man bygger dynamiska webbplatser med PHP.
            Min största "Today I Learned" (TIL) från detta kursmoment var hur kraftfullt det kan vara att använda
            GET-metoden i kombination med querysträngen för att skicka data mellan sidor i PHP. Jag insåg att detta kan
            ge webbplatsanvändare en direkt länk till en specifik datavisning.</p>
    </article>
</main>

<?php include('../view/footer.php') ?>

