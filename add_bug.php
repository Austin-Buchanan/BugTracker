<?php include './view/header.php'; ?>
<main>
    <h1>Add Bug</h1>
    <form action="add_bug_controller.php" method="post" id="add_bug_form">
        <input type="hidden" name="action" value="add_bug">
        <label for="softwareName">Software Name:</label>
        <input type="text" id="softwareName" name="softwareName"><br>
        <label for="urgency">Urgency:</label>
        <select id="urgency" name="urgency">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select><br>
        <label for="shortDesc">Short Description:</label>
        <input type="text" id="shortDesc" name="shortDesc"><br>
        <label for="longDesc">Description:</label><br>
        <textarea id="longDesc" name="longDesc"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</main>
<?php include './view/footer.php'; ?>