<?php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');
?>
<main>
    <article class="article">
        <h1>Redovisning kmom06</h1>
        <p> I detta kursmoment var fokus satt på CRUD och inloggning, och jag måste erkänna att det inledningsvis var en tuff nöt att knäcka. Det tog ett tag innan jag fullt ut förstod hur formulär kunde skapas och hanteras för de olika CRUD-operationerna. 
            Till en början såg jag dessa som mest teoretiska koncept, men jag förstod snabbt hur viktiga de är i praktiken för att interagera med en databas på en webbplats.Det var särskilt utmanande att lösa hur dessa formulär skulle knytas till databasen, men efter mycket slit och några felmeddelanden kom jag fram till en lösning som fungerade.</p>
        <p>När det kom till inloggning var det inte enbart att skapa en databas för användarinformation som var utmaningen. 
            Det handlade också om att implementera sessioner och se till att webbplatsen var säker. 
            Det tog lite tid att förstå hur navbaren skulle ändras beroende på om en användare var inloggad eller inte. Till slut fick jag det att fungera och det kändes som en stor seger.</p>
        <p>Vi hade också en uppgift att skapa en sida där den inloggade användaren kunde se alla sina detaljer. Här fick jag chansen att implementera funktioner för att ändra användarens information. 
            Jag lärde mig även hur viktigt det är att organisera koden för att göra den återanvändbar, vilket var en ovärderlig lärdom för framtida projekt. 
            För att förbättra användarupplevelsen implementerade jag flash-meddelanden som gav direkt feedback till användaren, något som verkligen lyfte hela webbplatsens användarvänlighet. </p>
        <p>Som en extra utmaning, och för att få en djupare förståelse för både CRUD och inloggningsmekanismer, valde jag att också implementera en admin-roll med möjligheten att administrera alla användare på webbplatsen. 
            Detta blev pricken över i:et i mitt arbete med detta kursmoment.</p>
        <p>Sammanfattningsvis har detta kursmoment varit mycket lärorikt. Jag har stött på problem och utmaningar, men också funnit lösningar och lärt mig mycket som kommer vara användbart i framtida webbprojekt.
        Det jag tar med mig mest från detta är vikten av att organisera sin kod väl och att alltid tänka på användarupplevelsen. </p>
    </article>
</main>

<?php include('../view/footer.php') ?>

