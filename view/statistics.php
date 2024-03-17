<?php include 'header.php'; ?>
<?php foreach($letter_data as $letter){ ?>
    <?php foreach($letter as $attribute){ ?>
        <div id = 'stats'>
            <p class= 'attribute'>Letter ID: <?=$attribute["letter_id"]." : ".$attribute["letter"]?></p>
            <p class = 'data'>Number of Times of Signed: <?=$attribute["frequency"]?></p>
            <p class = 'data'>Fastest Time: <?=$attribute["haste"]?></p>
            <p class = 'data'>Slowest Time: <?=$attribute["tarry"]?></p>
            <p class = 'data'>Average Time: <?=$attribute["average"]?></p>
        <br>
    </div>
    <?php } ?>

<?php } ?>

<?php include 'footer.php'; ?>