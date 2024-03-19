<?php include 'header.php'; ?>
<table>
    <tr>
        <th>LETTER</th>
        <th>ID</th>
        <th>Times Signed</th>
        <th>Haste</th>
        <th>Tarry</th>
        <th>Average</th>
    </tr>
<?php foreach($letter_data as $letter){ ?>
    <tr>
    <?php foreach($letter as $attribute){ ?>
            <td class = 'letter'><?=$attribute["letter"]?> </td>
            <td class= 'attribute'><?=$attribute["letter_id"]?></td>
            <td class = 'data'><?=$attribute["frequency"]?></td>
            <td class = 'data'><?=$attribute["haste"]?></td>
            <td class = 'data'><?=$attribute["tarry"]?></td>
            <td class = 'data'><?=$attribute["average"]?></td>
    <?php } ?>
    </tr>
<?php } ?>
    </table>
<?php include 'footer.php'; ?>