<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerspelling Practice</title>
    <link rel="stylesheet" href = "view/css/main.css">
</head>
<header>
    <p class="title">HandSpeak Trainer</p>
    <p class="caption">H a n d S p e a k  - T r a i n e r</p>
</header>
<nav class = "navigation">
    <div class = "test_nav">
        <a href = "testing/test-index.php"><button class = "nav_button">Test</button></a><br>
        <a href = "index.php?"><button class = "nav_button">Home</button></a><br>
    <div class = "add_nav">
        <a href = "index.php?action=add"><button class = "nav_button">Add New Word</button></a><br>
        <a href = "index.php?action=add_string"><button class = "nav_button">Add New String</button></a><br>
    </div>
    <div class = "stats_nav">
        <a href = "index.php?action=stats"><button class = "nav_button"> Stats</button></a><br>
    </div>

</nav>
<body>
    <main class="main">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="filter_menu">
    <input type="hidden" name="action"value="<?=$action?>">
        <select class="dropdown-content" name="filter">
            <option value="haste">Fastest</option>
            <option value="tarry">Slowest</option>
            <option value="old">Oldest</option>
            <option value="new">Newest</option>
            <option value="common">Common</option>
            <option value="rare">Rare</option>
            <option value="alpha">Alphabetical</option>
        </select>
        <button class="submit">SUBMIT</button>
        </form>
        <?= get_filter();?>
<!-- No closing tags, because the Footer will contain them,
 and php treats include statements as if the code is actually there -->