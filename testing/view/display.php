<?php include 'header.php'; ?>
<!-- Here is the arrangement of the $letter_data: it is a 3- deep array, called to with
    $letter_data[i][j][k]
    [i] is the letter of the alphabet, a-z. is can hold values 0-25
    [j] must always be 0, it is a gate for access
    [k] is the attribute to access: it can hold values 0,1,2,3,4,5, or an attribute name
        [0] or 'letter_id'
        [1] or 'frequency'
        [2] or 'hasste'
        [3] or 'tarry'
        [4] or 'average'
        [6] or 'letter'
    EX to access the fastes time for signing the letter n, you would access $letter_data[13][0]['haste']
-->
<!-- Now we need to run the main loop. This needs to display the letter to sign to the screen,
for all to see. right before the letter is displayed, start the timer to log how long the user 
takes to sign it, then display it, and immediatley begin listening for the user to hit the spacebar.
-->
<!-- Choose a random letter between 97 and 122 and display it-->
<?php function test(){ ?>
    <?php 
    global $letter_data;
    $letter_num = rand(0, min(get_volume()-1, 24));
    $letter = chr($letter_num);
    $_letter_ = $letter_data[$letter_num];
    return $_letter_;
}
?>
<script>
    //send out the time elapsed for this letter on the post line, along with the letter itself,
    //then reload the page. 
    window.addEventListener("keyup", function(e) {
  if (e.key == " " ||
      e.code == "Space" ||      
      e.keyCode == 32      
        ) {
             var letter = document.getElementById('megaLetter').innerHTML;
             var time = document.getElementById('timer').innerHTML;
            window.location.replace("test_index.php?letter="+letter+"&time="+time);
        }
    }
    )
</script>
<!-- Start of the page display -->
<!--This adds a listener to change the values on the page as needed -->

<script>
   function startWatch(){
        start = Date.now();
        return start;
    }
    function stopWatch(){
        stop = Date.now();
        return stop;
    }
    function elapsedTime(begin, end){
        return end-begin;
    }</script>

<!--Start the timer, stored in begin -->
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input type="hidden" name="handMode" value="handMode">
    <input type="hidden" name="action" value="test">
    <input type="hidden" name="type" value="letters">
    <button type="submit">Toggle Hand Mode</button>
</form>

<script> var begin = startWatch(); </script>
<div class="token_sector">
    <?php 
    $this_letter = test();
    ?>
    <p class = "token_id">#<?=$this_letter["ID"]?></p>
    <p class = "token_frequency"><?=$this_letter["frequency"]?></p>
    <p class = "token_average"><?=$this_letter["average"]?></p>
    <?php
    if (get_handMode_set()[0][0]){?>
        <p id= "megaLetter" class = "megaLetterHand"><?=$this_letter["letter"]?></p>
    <?php } else { ?>
    <p id= "megaLetter" class = "megaLetter"><?=$this_letter["letter"]?></p>
    <?php } ?>
    </div>
<p id= "timer"></p>
<script>
    setInterval(timer, 1);
    function timer(){
        var end = stopWatch(); 
        timetaken= elapsedTime(begin, end);
        document.getElementById("timer").innerHTML = timetaken;
    }
</script>
<?php include 'footer.php'; ?>
