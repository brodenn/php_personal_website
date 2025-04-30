<!-- views/searchResults.php -->
<h2>Sökresultat för:
    <?= htmlspecialchars($query) ?>
</h2>

<?php if (!empty($results1) || !empty($results2)) : ?>
    <ul>
        <?php
        foreach (array_merge($results1, $results2) as $result) :
            $name = htmlspecialchars($result['namn']);
            ?>
            <li>
                <a href="name.php?query=<?= $name ?>">
                    <?= $name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Ingen information om namnet kunde hittas.</p>
<?php endif; ?>

