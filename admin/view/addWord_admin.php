<?php include 'header.php'; ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input type="hidden" name="action" value="add_word">
    <label for="new_Word">Word to Add: </label>
    <input type="text" id="new_Word" name="new_Word" required autofocus>
    <label for="new_hint">Hint: </label>
    <input type="text" id="new_hint" name="new_hint">
    <button type="submit">Add!</button>
</form>

<?php include 'footer.php';?>