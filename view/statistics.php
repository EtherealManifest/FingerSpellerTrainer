<?php include 'header.php'; ?>
<table>
    <tr>
        <th>ID</th>
        <th>LETTER</th>
        <th>Times Signed</th>
        <th>Haste</th>
        <th>Tarry</th>
        <th>Average</th>
    </tr>
<?php foreach($letter_data as $letter){ ?>
    <tr>
    <?php foreach($letter as $attribute){ ?>
            <td class= 'attribute'><?=$attribute["letter_id"]?></td>
            <td class = 'letter'><?=$attribute["letter"]?> </td>
            <td class = 'data'><?=$attribute["frequency"]?></td>
            <td class = 'data'><?=$attribute["haste"]?></td>
            <td class = 'data'><?=$attribute["tarry"]?></td>
            <td class = 'data'><?=$attribute["average"]?></td>
    <?php } ?>
    </tr>
<?php } ?>
    </table>


    <table>
    <tr>
        <th>ID</th>
        <th>String</th>
        <th>Length</th>
        <th>Times Signed</th>
        <th>Haste</th>
        <th>Tarry</th>
        <th>Average</th>
    </tr>
<?php foreach($string_data as $attribute){ ?>
    <tr>
            <td class= 'attribute'><?=$attribute["ID"]?></td>
            <td class = 'letter'><?=$attribute["string"]?> </td>
            <td class = 'letter'><?=$attribute["length"]?> </td>
            <td class = 'data'><?=$attribute["frequency"]?></td>
            <td class = 'data'><?=$attribute["haste"]?></td>
            <td class = 'data'><?=$attribute["tarry"]?></td>
            <td class = 'data'><?=$attribute["average"]?></td>
    </tr>
<?php } ?>
    </table>

<table>
    <tr>
        <th>ID</th>
        <th>Word</th>
        <th>Times Signed</th>
        <th>Haste</th>
        <th>Tarry</th>
        <th>Average</th>
    </tr>
<?php foreach($word_data as $attribute){ ?>
    <tr>
            <td class= 'attribute'><?=$attribute["ID"]?></td>
            <td class = 'letter'><?=$attribute["word"]?> </td>
            <td class = 'data'><?=$attribute["frequency"]?></td>
            <td class = 'data'><?=$attribute["haste"]?></td>
            <td class = 'data'><?=$attribute["tarry"]?></td>
            <td class = 'data'><?=$attribute["average"]?></td>
    </tr>
<?php } ?>
    </table>
<?php include 'footer.php'; ?>