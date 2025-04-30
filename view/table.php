<?php
//table.php
$res = $res ?? [];

?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<p>Your resultset contains
    <?= count($res) ?> rows.
</p>
<table>
    <tr>
        <th>Id</th>
        <th>Namn</th>
        <th>Datum</th>
        <th>Namnlängd</th>
    </tr>

    <?php foreach ($res as $row) : ?>
        <tr>
            <td>
                <?= $row['rowid'] ?>
            </td>
            <td>
                <?= $row['namn'] ?>
            </td>
            <td>
                <?= $row['datum'] ?>
            </td>
            <td>
                <?= $row['namnlangd'] ?>
            </td>
            </td>
        </tr>
    <?php endforeach ?>

