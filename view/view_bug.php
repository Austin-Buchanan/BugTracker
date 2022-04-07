<?php 
    include 'header.php';
    require_once('../controller/bug_search_controller.php');
    require_once('../controller/view_bug_controller.php');
?>
<main>
   <h1>Bug View</h1>
   <form action="../controller/view_bug_controller.php" method="post" id="start_update_form" class="mx-auto">
        <input type="hidden" name="action" value="start_update">
        <input type="hidden" name="bugID2update" value="<?php echo $bug->getBugID(); ?>">
        <input type="submit" value="Update">
   </form>
   <form action="../controller/view_bug_controller.php" method="post" id="start_delete_form" class="mx-auto">
       <input type="hidden" name="action" value="start_delete">
       <input type="hidden" name="bugID2delete" value="<?php echo $bug->getBugID(); ?>">
       <input type="submit" value="Delete">
   </form>
   <div id="bugInfoText" class="mx-auto">
        <p>Bug ID: <?php echo $bug->getBugID(); ?></p>
        <p>Software Name: <?php echo $bug->getSWName(); ?></p>
        <p>Urgency: <?php echo $bug->getUrgency(); ?></p>
        <p>Short Description: <?php echo $bug->getShortDesc(); ?></p>
        <p>Long Description: <?php echo $bug->getLongDesc(); ?></p>
        <p>Time Created: <?php echo $bug->getTimeCreated(); ?></p>
        <p>Time Modified: <?php echo $bug->getTimeModified(); ?></p>
        <p>Resolution: <?php echo $bug->getResolution(); ?></p>
        <p><em>Work Notes</em></p>
        <div id="workNotesDiv" class="mx-auto">
            <?php foreach ($notes as &$note) : ?>
                <p><?php echo $note->getUserID(); ?> at <?php echo $note->getTimeWritten(); ?>: <?php echo $note->getNoteText(); ?></p>
            <?php endforeach ?>
        </div> 
   </div>

</main>
<?php include 'footer.php'; ?>