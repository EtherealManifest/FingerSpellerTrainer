<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerspelling Practice</title>
    <link rel="stylesheet" href = "view/css/main.css">
</head>
<nav class = "navigation">
    <div class = "test_nav">
        <a href = "index.php?action=test_letters"><button class = "nav_button"> Test Letters</button></a><br>
        <a href = "index.php?action=test_words"><button class = "nav_button"> Test Words</button></a><br>
        <a href = "index.php?action=test_strings"><button class = "nav_button">Test Strings</button></a><br>
    </div>
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
<!-- No closing tags, because the Footer will contain them,
 and php treats include statements as if the code is actually there -->