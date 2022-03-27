<?php
    include './view/header.php';
    require('read_all_controller.php');
?>
<main>
<h1>All Bugs</h1>
<table class="table table-striped table-bordered table-hover">
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
            <td><?php echo $bug->getBugID() ?></td>
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
<?php include './view/footer.php';  