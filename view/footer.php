<footer class="footer">
    <div class="row">
        <div class="col3 box">
            <p>Validering:</p>
            <ul>
                <li><a href="http://validator.w3.org/check/referer" rel="noopener noreferrer" target="_blank">HTML</a>
                </li>
                <li><a href="http://jigsaw.w3.org/css-validator/check/referer" rel="noopener noreferrer"
                        target="_blank">CSS</a></li>
                <li><a href="https://validator.w3.org/checklink" rel="noopener noreferrer" target="_blank">Link
                        checker</a></li>
            </ul>
        </div>

        <div class="col3 box">
            <p>Manualer:</p>
            <ul>
                <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Reference" rel="noopener noreferrer"
                        target="_blank">MDN: HTML</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS/Reference" rel="noopener noreferrer"
                        target="_blank">MDN: CSS</a></li>
                <li><a href="https://html.spec.whatwg.org/multipage/" rel="noopener noreferrer" target="_blank">HTML
                        Standard</a></li>
            </ul>
        </div>

        <div class="col3 box">
            <p>More Resources:</p>
            <ul>
                <li><a href="https://www.w3.org/2009/cheatsheet/" rel="noopener noreferrer" target="_blank">Cheat
                        Sheet</a></li>
                <li><a href="https://www.php.net/manual/en/" rel="noopener noreferrer" target="_blank">PHP</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col1 final">
            <p>Denna sidan är Copyright &copy; av mig.</p>
        </div>
    </div>

    <!-- Performance Information -->
    <div class="row">
        <div class="col1 performance">
            <?php
            // Räkna ut laddningstid
            $end_time = microtime(true);
            $execution_time = ($end_time - $start_time) * 1000; // multiply by 1000 to get ms
            // Visa prestanda information
            echo "<p>Sidan laddades på " . number_format($execution_time, 2) . " ms.</p>";
            echo "<p>Totalt inkluderade filer: " . count(get_included_files()) . "</p>";
            echo "<p>Minne som används: " . round(memory_get_peak_usage(false) / 1024 / 1024, 2) . " MB.</p>";
            ?>
        </div>
    </div>
</footer>
</body>