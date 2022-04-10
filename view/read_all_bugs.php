<?php
    include 'header.php';
    require_once('../controller/read_all_controller.php');
?>
<main>
<h1>All Bugs</h1>
<table class="table table-striped table-bordered table-hover mx-auto">
    <tr>
      <th>Bug ID</th>
      <th>User ID</th>
      <th>Software Name</th>
      <th>Urgency</th>
      <th>Short Desc</th>
      <th>Time Created</th>
      <th>Time Modified</th>
      <th>Resolution</th>  
    </tr>
    <?php foreach ($bugs as &$bug) : ?>
        <tr>
            <td>
                <form action="../controller/read_all_controller.php" method="post">
                    <input type="hidden" name="action" value="view_bug">
                    <input type="hidden" name="bugID2view" value="<?php echo $bug->getBugID() ?>">
                    <input type="submit" value="<?php echo $bug->getBugID() ?>">
                </form>
            </td>
            <td><?php echo $bug->getUserID() ?></td>
            <td><?php echo $bug->getSWName() ?></td>
            <td><?php echo $bug->getUrgency() ?></td>
            <td><?php echo $bug->getShortDesc() ?></td>
            <td><?php echo $bug->getTimeCreated() ?></td>
            <td><?php echo $bug->getTimeModified() ?></td>
            <td>
                <?php 
                    if ($bug->getResolution() != NULL) {
                        echo $bug->getResolution();
                    } else {
                        echo "";
                    }
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>
</main>
<?php include 'footer.php';  