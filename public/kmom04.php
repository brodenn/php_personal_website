<?php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');
?>
<main>
    <article class="article">
        <h1>Redovisning kmom04</h1>
        <p>Att jobba med datastrukturer i arrayer kändes ganska naturligt och bekant, då jag har tidigare erfarenhet av
            att använda dem i olika programmeringsspråk. Det var dock användbart att fräscha upp mina kunskaper och se
            hur PHP specifikt hanterar arrayer.</p>
        <p>När det kommer till funktioner så har jag alltid haft en benägenhet att strukturera min kod på ett sätt som
            gör den lättläst och återanvändbar. Under detta kursmoment hittade jag flera delar av koden som jag valde
            att strukturera om och placera i funktioner. Detta gjorde koden mer organiserad och minskade risken för
            upprepning. </p>
        <p>Jag kan tydligt se skillnaden mellan HTML-formulär med GET och POST. GET används vanligtvis för att hämta
            data från servern och visa den i URL:en, medan POST används för att skicka data till servern på ett mer dolt
            sätt. Jag har förstått att valet mellan GET och POST beror på vilken typ av data som skickas och syftet med
            förfrågan.</p>
        <p>Arbetet med SESSION gick bra, även om det var en ny erfarenhet för mig. Jag fann det intressant att lära mig
            hur man kan lagra data över flera sidor och använda sessioner för att hålla användarens tillstånd. Jag
            stötte på några problem i början, särskilt med att hantera sessionens tillstånd och livslängd, men jag
            lyckades lösa dem genom att konsultera PHP-dokumentationen och andra källor.</p>
        <p>Jag löste uppgiften genom att följa stegen i övningsinstruktionerna och gradvis bygga upp webbapplikationen.
            Jag är nöjd med resultatet, och jag försökte också att implementera några av de extrauppgifterna. Jag
            inkluderade namnsdagar i kalendern och gav ledtrådar med bokstäver från namnen i gissningsspelet.</p>
        <p>Min "TIL" (Today I Learned) för detta kursmoment är att arbeta med SESSION i PHP och hur man kan använda det
            för att lagra användarens data och tillstånd över flera sidor i en webbapplikation. Det var en värdefull
            inlärningsupplevelse och jag känner mig mer säker på att använda SESSION i framtida projekt.</p>
    </article>
</main>

<?php include('../view/footer.php') ?>
