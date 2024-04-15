<?php include 'header.php'; ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <input type="hidden" name="action" value="add_word">
    <label for="new_Word">Word to Add: </label>
    <input type="text" id="new_Word" name="new_Word" required autofocus>
    <label for="new_hint">Hint: </label>
    <input type="text" id="new_hint" name="new_hint">
    <label for ="category">Category:</label>
    <select name="category" id="categories">
        <option selected disabled value ="">No Category</option> 
        <option value="household">Household</option>
        <option value="food">Food</option>
        <option value="environment">Environemnt</option>
        <option value="action">Action</option>
    </select>
    <button type="submit">Add!</button>
</form>

<?php include 'footer.php';?>