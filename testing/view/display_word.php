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
    global $word_data;
    $word = $word_data[random_int(0, count($word_data)-1)];
    return $word;
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
            var $Word = document.getElementById('megaWord').innerHTML;
            var time = document.getElementById('timer').innerHTML;
            window.location.replace("test_index.php?word="+$Word+"&time="+time * 1000);
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
    $this_word = test();
    ?>
    <p class = "token_id">#<?=$this_word["ID"]?></p>
    <p class = "token_frequency"><?=$this_word["frequency"]?></p>
    <p class = "token_average"><?=$this_word["average"]?></p>
    <p id= "megaWord"><?=$this_word["word"]?></p>
    <p id = "hint_text"><?=$this_word["hint"]?></p>  
    <p>
            <a id = "hint_link" href = 
                "https://lifeprint.com/asl101/pages-signs/<?php echo mb_substr($this_word["word"], 0, 1)."/".$this_word["word"]?>.htm" target = "_blank">
                Need a hint for "<?=$this_word["word"]?>"?</a>
            </p> 
    <!--This toggles the hint text on and off-->
        <script>
        hint = document.getElementById("hint_text");
        hint.addEventListener("click", function(e) {
            if(hint.style.color == "black"){
                hint.style.color = 'white';
            }
            else if(hint.style.color == 'white'){
                hint.style.color = 'black';
            }
            else{
                hint.style.color = "white";
            }
        });
        </script>  
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