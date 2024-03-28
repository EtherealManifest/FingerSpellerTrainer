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
    global $string_data;
    $string = $string_data[random_int(0, count($string_data)-1)];
    return $string;
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
             var $string = document.getElementById('megaString').innerHTML;
             var time = document.getElementById('timer').innerHTML;
            window.location.replace("test_index.php?string="+$string+"&time="+time * 1000);
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
<script> var begin = startWatch(); </script>
<div class="token_sector">
    <?php 
    $this_string = test();
    ?>
    <p class = "token_id">#<?=$this_string["ID"]?></p>
    <p class = "token_frequency"><?=$this_string["frequency"]?></p>
    <p class = "token_average"><?=$this_string["average"]?></p>
    <p id= "megaString"><?=$this_string["string"]?></p>
</div>
<p id= "timer"></p>
<script>
    setInterval(timer, 1);
    function timer(){
        var end = stopWatch(); 
        timetaken= elapsedTime(begin, end);
        document.getElementById("timer").innerHTML = timetaken/1000;
    }
</script>
<?php include 'footer.php'; ?>