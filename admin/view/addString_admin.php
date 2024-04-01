<?php include 'header.php'; ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input type="hidden" name="action" value="add_new_string">
    <label for="new_String">String to Add: </label>
    <input type="text" id="new_string" name="new_string" required autofocus>
    <button type="submit">Add!</button>
</form>

<?php include 'footer.php';?>