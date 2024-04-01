
<?php include("view/header.php"); ?>

<div class = "test_filter_form">
    <form action="test_index.php" method="POST" class="filter_form">
        <input type="hidden" name="action" value="test">
        <label for="volume">Number of Words to Test: </label> 
        <select required name="volume" id="volume" class = "filter_select">
            <option disabled selected value> -- select an option -- </option>
            <option value="100">100</option>
            <option value="75">75</option>
            <option value="50">50</option>
            <option value="25">25</option>
            <option value="10">10</option>
            <option value="5">5</option>

        </select>
        <br>

        <label for="filter">Filter By </label> 
        <select required class = "filter_select" name="filter" id="filter">
            <option disabled selected value> -- select an option -- </option>
            <option value="haste">Fastest</option>
            <option value="tarry">Slowest</option>
            <option value="old">Oldest</option>
            <option value="new">Newest</option>
            <option value="common">Common</option>
            <option value="rare">Rare</option>
            <option value="alpha">Alphabetical</option>
        </select>
        <br>

        <label for="type">Test:  </label>
        <select required name="type" id="type" class = "filter_select">
            <option disabled selected value> -- select an option -- </option>
            <option value="words">Words</option>
            <option value="letters">Letters</option>
            <option value="strings">Strings</option>
        </select>
        <br>
        <label for = "submit">Submit</label><br>
        <button type="submit" class="submit">SUBMIT</button>
    </form>
</div>
<div class = "preset Tests">
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "words">
        <input type="hidden" name="filter" value = "rare">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Rarest 25 Words</button>
    </form>

    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "words">
        <input type="hidden" name="filter" value = "common">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Most Common 25 Words</button>
    </form>
    
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "words">
        <input type="hidden" name="filter" value = "slowest">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Slowest 25 Words</button>
    </form>
    
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "words">
        <input type="hidden" name="filter" value = "new">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Newest 25 Words</button>
    </form>

    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "strings">
        <input type="hidden" name="filter" value = "rare">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Rarest 25 Strings</button>
    </form>
    
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "strings">
        <input type="hidden" name="filter" value = "common">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Most Common 25 Strings</button>
    </form>
    
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "strings">
        <input type="hidden" name="filter" value = "slowest">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Slowest 25 Strings</button>
    </form>
    
    <form action="test_index.php" method="POST" class="filter_fast">
        <input type="hidden" name="action" value="test">
        <input type="hidden" name="type" value = "stringss">
        <input type="hidden" name="filter" value = "new">
        <input type="hidden" name="volume" value = "25">
        <button type="submit" class="preset_test_button">Newest 25 Strings</button>
    </form>
</div>
<?php include("view/footer.php"); ?>