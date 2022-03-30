<?php include './header.php'; ?>
<main>
    <h1>Update Bug</h1>
    <form action="" method="post" id="update_bug_form">
        <input type="hidden" name="action" value="update_bug">
        <div class="form-group">
            <label for="softwareName">Software Name:</label>
        </div>    
        <input type="text" id="softwareName" name="softwareName" class="form-control"><br>
        <div class="form-group">
            <label for="urgency">Urgency:</label>
        </div>
        <select id="urgency" name="urgency" class="form-control">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select><br>
        <div class="form-group">
            <label for="shortDesc">Short Description:</label>
        </div>    
        <input type="text" id="shortDesc" name="shortDesc" class="form-control"><br>
        <div class="form-group">
            <label for="longDesc">Description:</label><br>
        </div>
        <textarea id="longDesc" name="longDesc" class="form-control"></textarea><br>
        <div class="form-group">
            <label for="resolution">Resolution:</label><br>
        </div>
        <textarea id="resolution" name="resolution" class="form-control"></textarea><br>
        <input type="submit" value="Update">
    </form>
</main>
<?php include './footer.php'; ?>