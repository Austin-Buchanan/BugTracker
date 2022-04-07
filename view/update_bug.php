<?php
    include 'header.php'; 
    require_once('../controller/view_bug_controller.php');
?>
<main>
    <h1>Update Bug</h1>
    <form action="../controller/update_bug_controller.php" method="post" id="update_bug_form" class="mx-auto">
        <input type="hidden" name="action" value="update_bug">
        <input type="hidden" name="bugID2update" value="<?php echo $bug_old->getBugID(); ?>"
        <div class="form-group">
            <label for="softwareName">Software Name:</label>
        </div>    
        <input type="text" id="softwareName" name="softwareName" class="form-control" value="<?php echo $bug_old->getSWName(); ?>"><br>
        <div class="form-group">
            <label for="urgency">Urgency:</label>
        </div>
        <select id="urgency" name="urgency" class="form-control">
            <option value="low" <?php if ($urgency_set == "low") { echo "selected"; } ?>>Low</option>
            <option value="medium" <?php if ($urgency_set == "medium") { echo "selected"; } ?>>Medium</option>
            <option value="high" <?php if ($urgency_set == "high") { echo "selected"; } ?>>High</option>
        </select><br>
        <div class="form-group">
            <label for="shortDesc">Short Description:</label>
        </div>    
        <input type="text" id="shortDesc" name="shortDesc" class="form-control" value="<?php echo $bug_old->getShortDesc(); ?>"><br>
        <div class="form-group">
            <label for="longDesc">Description:</label><br>
        </div>
        <textarea id="longDesc" name="longDesc" class="form-control"><?php echo $bug_old->getLongDesc(); ?></textarea><br>
        <div class="form-group">
            <label for="resolution">Resolution:</label><br>
        </div>
        <textarea id="resolution" name="resolution" class="form-control"><?php echo $bug_old->getResolution(); ?></textarea><br>
        <div class="form-group">
            <label for="workNote">New Work Note:</label><br>
        </div>
        <textarea id="workNote" name="workNote" class="form-control"></textarea>
        <input type="submit" value="Update">
    </form>
</main>
<?php include 'footer.php'; ?>