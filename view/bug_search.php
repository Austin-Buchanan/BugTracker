<?php include './header.php'; ?>
<main>
    <h1>Search Bug</h1>
    <p>Search by Bug ID and/or Software Name</p>
    <form action="../controller/bug_search_controller.php" method="post">
        <input type="hidden" name="action" value="search_bug">
        <div class="form-group">
            <label for="bugID">Bug ID:</label>
        </div>
        <input type="number" id="bugID" name="bugID" min="0" max="999999" class="form-control">
        <div class="form-group">
            <label for="swName">Software Name:</label>
        </div>
        <input type="text" id="swName" name="swName" class="form-control"><br>
        <input type="submit" value="Search">
    </form>
</main>
<?php include './footer.php'; ?>