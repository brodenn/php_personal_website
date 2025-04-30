<!-- views/resultView.php -->
<h2>Detaljer om namn:
    <?= htmlspecialchars($query) ?>
</h2>

<?php if (!empty($results1)) : ?>
    <h3>Resultat från namnlista</h3>
    <?php foreach ($results1 as $result) : ?>
        <div>
            <p>Namn:
                <?= htmlspecialchars($result['namn']) ?>
            </p>
            <p>Datum:
                <?= htmlspecialchars($result['datum']) ?>
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($results2)) : ?>
    <h3>Resultat från namnbetydelse</h3>
    <?php foreach ($results2 as $result) : ?>
        <div>
            <p>Namn:
                <?= htmlspecialchars($result['namn']) ?>
            </p>
            <p>Betydelse:
                <?= htmlspecialchars($result['betydelse']) ?>
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

