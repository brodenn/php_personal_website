<?php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');
?>
<main>
    <article class="article">
        <h1>Redovisningstext för projekt NVM</h1>
        <h2>Kodstruktur</h2>
        <p>I utvecklingen av webbplatsen för Nättraby Vägmuseum har jag noggrant övervägt och implementerat en kodstruktur som inte bara underlättar underhåll och utveckling men också främjar en ren och modulär design. Genom att dela upp webbplatsens komponenter i specifika kataloger, har jag kunnat skapa en klar separation mellan presentation, logik och data, vilket är en grundpelare i modern webbutveckling.</p>
        <p>Den övergripande strukturen av webbplatsen är organiserad i flera kärnkataloger: config/, css/, db/, img/, public/, src/, och view/. Varje katalog har ett tydligt syfte och innehåller filer som är relaterade till dess funktion inom webbplatsens arkitektur. Denna organisation underlättar navigeringen genom projektet för utvecklare och bidrar till en mer underhållsvänlig kodbas.</p>
        <p>I config/ katalogen återfinns konfigurationsfiler som config.php, vilket är navet för webbplatsens konfiguration, inklusive databasanslutningar. Denna centralisering av konfigurationsinställningar gör det enklare att hantera ändringar som påverkar hela applikationen, vilket är särskilt viktigt för skalbarhet och säkerhet.</p>
        <p>css/ katalogen speglar webbplatsens designaspekter, med stilark uppdelade efter funktion och användningsområde, som base.css för grundläggande stilar, layout.css för sidlayouter, och components.css för återanvändbara komponenter. Denna uppdelning möjliggör en smidig hantering och uppdatering av webbplatsens utseende.</p>
        <p>Databasen, som är kritisk för webbplatsens dynamiska innehåll, hanteras genom filerna placerade i db/ katalogen. Genom att isolera databasfilerna från applikationslogiken förenklas dataskyddet och möjliggör enkel tillgång till uppdatering och underhåll av databasens struktur och innehåll.</p>
        <p>img/ katalogen organiserar webbplatsens multimediaresurser, vilket förenklar hanteringen av bilder och stöder en effektiv inladdning av media på webbplatsen. Detta bidrar till en förbättrad användarupplevelse genom snabbare sidinladdningar och optimerad visuell presentation.</p>
        <p>Den public/ katalogen innehåller alla sidkontroller som användarna direkt interagerar med, som home.php, about.php, articles.php, och roads.php. Genom att tydligt separera dessa publika skript från resten av applikationen stärks webbplatsens säkerhet och struktur.</p>
        <p>I src/ katalogen återfinns återanvändbara PHP-funktioner och bibliotek som hanterar databasinteraktioner, generering av HTML-innehåll, och användarautentisering. Detta stödjer en effektiv kodåteranvändning och minimerar upprepning genom hela projektet.</p>
        <p>Slutligen, view/ katalogen innehåller återanvändbara vyer som header.php, footer.php, och navbar.php, vilket förenklar skapandet av nya sidor och bidrar till en enhetlig och konsistent design genom hela webbplatsen.</p>
        <p>Denna genomtänkta struktur och organisation av webbplatsen för Nättraby Vägmuseum har lagt en solid grund för en skalbar, underhållsvänlig och säker webbapplikation. Genom att följa bästa praxis inom webbutveckling har jag strävat efter att skapa en lösning som inte bara möter dagens krav utan också är förberedd för framtida expansion och förbättringar.</p>

        <h2>Responsivitet</h2>
        <p>Att skapa en responsiv webbplats för Nättraby Vägmuseum var ett centralt mål för att säkerställa en optimal användarupplevelse över en mängd olika enheter. Jag implementerade responsiv design genom att använda CSS media queries och flexbox-layouter, vilket gjorde att webbplatsens innehåll dynamiskt kunde anpassa sig till skärmstorleken på användarens enhet. Detta inkluderade anpassning av textstorlekar, bildskalning och navigationsmenyernas layout för att säkerställa läsbarhet och tillgänglighet även på mindre skärmar. Vidare utformades navbaren för att vara intuitiv och lättanvänd på pekskärmar, genom att införa en hamburgermeny på mobila enheter för att spara utrymme och förbättra navigeringen. </p>

        <h2>Artikel- och vägsidan</h2>
        <p>På artikelsidan presenteras besökarna för en lista av djupgående artiklar som utforskar olika teman och historier relaterade till vägmuseet och dess samlingar. När en besökare väljer en artikel, laddas artikelns fullständiga innehåll dynamiskt, inklusive text, bilder och andra multimediaelement som berikar läsupplevelsen. Sidan erbjuder också sidonavigering som tillåter användare att enkelt bläddra mellan olika artiklar utan att behöva återvända till huvudlistan. Detta uppmuntrar till utforskning och ger en smidig användarupplevelse.</p>
        <p>Vägsidan fungerar på ett liknande sätt och ger besökarna möjlighet att utforska museets olika vägutställningar. Båda dessa sidor är integrerade med webbplatsens övergripande design och navigationssystem, vilket säkerställer en konsistent och inbjudande användarupplevelse. Genom att använda PHP och databasteknik för att dynamiskt ladda innehåll, kan webbplatsen enkelt uppdateras och utvidgas med nytt material, vilket gör den till en levande resurs för både forskning och allmänbildning.</p>

        <h2>Gallerisidan</h2>
        <p>När besökare navigerar till gallerisidan möts de av en välorganiserad layout som visar en serie mindre bildförhandsvisningar, även kända som thumbnails. Dessa bilder är snyggt arrangerade i ett rutnät och varje bild kan klickas på för att visa en större version. Detta interaktiva element inbjuder besökarna att utforska och uppleva de historiska bilderna i större detalj.</p>
        <p>För att underlätta navigering genom det stora antalet bilder, implementeras en pagineringsfunktion som delar upp samlingen i hanterbara delar. Användare kan enkelt bläddra mellan sidorna med bilder genom att använda 'Föregående' och 'Nästa'-länkarna, vilket möjliggör en smidig upplevelse utan att överväldiga med information. Denna funktion säkerställer att galleriet förblir överskådligt och lätt att navigera, även när bildsamlingen växer.</p>
        <p>Bakom kulisserna använder skriptet PHP för att dynamiskt generera sidinnehåll från bildfiler lagrade i en specifik mapp. Detta innebär att uppdatering av galleriet är så enkelt som att lägga till eller ta bort bilder i mappen, vilket gör det lätt för museets personal att underhålla och uppdatera galleriet med nya fotografier.</p>

        <h2>Sök</h2>
        <p>När användaren ankommer till söksidan möts de av ett rent och tydligt gränssnitt med en sökruta, där de kan ange sin sökterm. Efter att ha skickat in sin förfrågan, bearbetar ett PHP-skript söktermen och genomför en databasförfrågan som söker igenom både 'Roads' och 'Articles' tabellerna för relevanta träffar. Det här tillvägagångssättet säkerställer att sökningen är omfattande och tar hänsyn till allt tillgängligt innehåll relaterat till användarens förfrågan.</p>
        <p>Resultaten av sökningen presenteras sedan på sidan i form av en lista, där varje träff visar titeln och författaren. Dessa resultat är interaktiva och klickbara, vilket leder användaren direkt till den fullständiga sidan för den väg eller artikel som valts. Detta flyt skapar en smidig och användarvänlig upplevelse, som uppmuntrar till vidare utforskning av museets digitala innehåll.</p>

        <h2>Adminpanelen</h2>
        <p>Adminpanelen är tillgänglig enbart för autentiserade användare, vilket garanterar att endast behörig personal kan åtkomma och utföra ändringar på webbplatsens innehåll. Inloggningssidan är skyddad med användarnamn och lösenord, och användare omdirigeras automatiskt till inloggningssidan om de försöker åtkomma adminfunktionerna utan att vara inloggade. Detta skikt av säkerhet skyddar webbplatsens integritet och förhindrar obehörig åtkomst.</p>
        <p>En viktig funktion i adminpanelen är möjligheten att återställa databasen från en säkerhetskopia. Denna funktion är särskilt värdefull för att snabbt kunna återställa webbplatsens ursprungliga tillstånd i händelse av oavsiktliga ändringar eller skador på databasen. Användarna får en prompt för bekräftelse innan återställningen genomförs, vilket minskar risken för oavsiktlig dataförlust.</p>

        <h2>Databashantering</h2>
        <p>Databashanteringssidan ger en översikt över alla tabeller i databasen och tillåter administratören att direkt lägga till nya poster eller redigera befintliga data. Varje tabell, vare sig det gäller vägar eller artiklar, kan hanteras individuellt, vilket ger en flexibel och effektiv metod för att uppdatera webbplatsens innehåll.</p>
        <p>Interfacet för databashantering är designat för att vara intuitivt och lättanvänt. Administratören kan enkelt välja en tabell, se dess nuvarande innehåll och genomföra nödvändiga åtgärder, såsom att lägga till, redigera eller ta bort poster. Denna funktionalitet säkerställer att webbplatsen kan hållas aktuell och relevant för dess besökare.</p>

        <h2>Responsiv Feedback och Felhantering</h2>
        <p>Genom att integrera omedelbar feedback och detaljerad felhantering har jag säkerställt att användarna kontinuerligt är informerade om resultatet av deras interaktioner, vare sig det gäller att navigera på sidan, utföra sökningar, eller hantera data via adminpanelen. Varje åtgärd som utförs på webbplatsen åtföljs av klara meddelanden som bekräftar framgång eller, vid fel, tillhandahåller tydlig information om vad som gick fel och möjliga lösningar. Detta system tillåter inte bara en smidigare användarupplevelse men bidrar även till att snabbt identifiera och åtgärda problem.</p>

        <h2>Utmaningar och Lärdomar</h2>
        <p>Att ta sig an Nättraby Vägmuseums webbprojekt var en resa som började med osäkerhet, speciellt kring integrationen av databasen och hur allt skulle struktureras på ett funktionellt sätt. Inledningsvis kändes projektet som en stor utmaning, där den största frågan var hur databasen bäst skulle integreras med webbplatsens olika delar för att skapa en sammanhängande och interaktiv användarupplevelse.</p>
        <p>Trots den kluriga starten, visade sig basen av projektet vara en stark grund att bygga vidare på. När den initiala strukturen och databasintegrationen väl var på plats, började projektet ta form på ett mer flytande sätt. Med varje steg framåt, väcktes nya idéer till liv; vad som från början var oklart blev plötsligt tydligt, och vägen framåt blev allt mer självklar. </p>
        <p>Tidsåtgången för projektet är svår att kvantifiera exakt, men jag har definitivt investerat minst de rekommenderade 60 timmarna som uppskattades för projektet. Denna tid har gått till allt från planering och utveckling till testning och förfining av webbplatsen. Projektet visade sig vara ett utmärkt första steg i att förstå och praktisera webbutveckling. Det krävde en grundläggande men ändå omfattande tillämpning av de kunskaper och tekniker vi lärt oss under kursen, utan att för den delen överväldiga med komplicerade designkrav eller avancerade visuella effekter.
</p>
        <p>Jag anser att projektet var väl anpassat för kursen, där fokus låg på att bygga en funktionell och innehållsrik webbplats. Det gav möjlighet att utforska och integrera olika funktioner på ett sätt som balanserade teknisk utveckling med användarcentrerad design. Projektets omfattning och inriktning motiverade till en djupare förståelse för webbutvecklingens grundläggande principer samtidigt som det erbjöd utrymme för kreativitet och personlig utveckling.
</p>

        <h2>Reflektioner och Feedback</h2>
        <p>Kursen i webbprogrammering har varit en givande och utbildande upplevelse som har breddat min förståelse för webbutvecklingens grundläggande principer. Materialet har varit välstrukturerat och omfattande, vilket har möjliggjort en djupare insikt i både teori och praktik. Handledningarna har varit stödjande och informativa, vilket har underlättat inlärningsprocessen och bidragit till en positiv kursupplevelse. Om jag skulle föreslå en förbättring, skulle det vara att inkludera fler praktiska exempel och case studies för att ytterligare förankra teorin i verkliga scenarier. Jag är mycket nöjd med kursen och skulle definitivt rekommendera den till både vänner och kollegor som är intresserade av webbutveckling. På en skala från 1 till 10 ger jag kursen en stark 9, tack vare dess relevans, kvaliteten på undervisningsmaterialet, och den stödjande undervisningspersonalen. Framförallt har kursen lagt en solid grund för framtida studier och yrkesmässig utveckling inom webbprogrammering.</p>

   </article>
</main>

<?php include('../view/footer.php') ?>

