<?php include 'header.php'; ?>
<?php
echo read_alpha_data('a')[0]['letter'];

?>
<?php foreach($letter_data as $letter){ ?>
    <?php foreach($letter as $attribute){ ?>
        <div id = 'stats'>
            <p id= 'letter'> <?=$attribute["letter"]?> </p>
            <p class= 'attribute'>Letter ID: <?=$attribute["letter_id"]?></p>
            <p class = 'data'>Number of Times of Signed: <?=$attribute["frequency"]?></p>
            <p class = 'data'>Fastest Time: <?=$attribute["haste"]?></p>
            <p class = 'data'>Slowest Time: <?=$attribute["tarry"]?></p>
            <p class = 'data'>Average Time: <?=$attribute["average"]?></p>
        <br>
    </div>
    <?php } ?>

<?php } ?>

<?php include 'footer.php'; ?>