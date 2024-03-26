
<?php include("view/header.php"); ?>

<div>
    <form action="test_index.php" method="POST">
        <input type="hidden" name="action" value="test">
        <label for="volume">Number of Words to Test: </label> 
        <select required name="volume" id="volume">
            <option disabled selected value> -- select an option -- </option>
            <option value="100">100 words</option>
            <option value="75">75 words</option>
            <option value="50">50 words</option>
            <option value="25">25 words</option>
        </select>
        <br>

        <label for="filter">Filter By </label> 
        <select required class="test_index_filter" name="filter" id="filter">
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
        <select required name="type" id="type">
            <option disabled selected value> -- select an option -- </option>
            <option value="words">Words</option>
            <option value="letters">Letters</option>
            <option value="strings">Strings</option>
        </select>
        <br>

        <button class="submit">SUBMIT</button>
    </form>
</div>

<?php include("view/footer.php"); ?>