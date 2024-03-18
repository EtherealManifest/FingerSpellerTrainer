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
    $letter_num = rand(97, 122);
    $_letter_ = chr($letter_num);
    echo $_letter_;
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
            window.location.replace("index.php?letter="+letter+"&time="+time);
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
<p id= "megaLetter"><?php test()?></p>
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
