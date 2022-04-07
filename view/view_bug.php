<?php 
    include 'header.php';
    require_once('../controller/bug_search_controller.php');
    require_once('../controller/view_bug_controller.php');
?>
<main>
   <h1>Bug View</h1>
   <div id="bugInfoText" class="mx-auto">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h2>Bug ID: <?php echo $bug->getBugID(); ?></h2>
            <p>Software Name: <?php echo $bug->getSWName(); ?></p>
            <p>Short Description: <?php echo $bug->getShortDesc(); ?></p>
            <p>Time Created: <?php echo $bug->getTimeCreated(); ?></p>
            <p>Time Modified: <?php echo $bug->getTimeModified(); ?></p>
            <p>Urgency: <?php echo $bug->getUrgency(); ?></p>
            <div id="buttonDiv" class="container">
                <div class="row">
                        <div class="col-sm-1">
                            <form action="../controller/view_bug_controller.php" method="post" id="start_update_form" class="mx-auto">
                                <input type="hidden" name="action" value="start_update">
                                <input type="hidden" name="bugID2update" value="<?php echo $bug->getBugID(); ?>">
                                <input type="submit" value="Update">
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <form action="../controller/view_bug_controller.php" method="post" id="start_delete_form" class="mx-auto">
                                <input type="hidden" name="action" value="start_delete">
                                <input type="hidden" name="bugID2delete" value="<?php echo $bug->getBugID(); ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="p-5 mb-4 bg-secondary rounded-3 bg-opacity-25">
            <h5>Long Description:</h5>
            <p><?php echo $bug->getLongDesc(); ?></p>
            <h5>Resolution:</h5>
            <p><?php echo $bug->getResolution(); ?></p>
        </div>
        <div class="p-5 mb-4 bg-light rounded-3">
            <h4>Work Notes</h4>
            <div id="workNotesDiv" class="mx-auto">
                <?php foreach ($notes as &$note) : ?>
                    <p><?php echo $note->getUserID(); ?> at <?php echo $note->getTimeWritten(); ?>: <?php echo $note->getNoteText(); ?></p>
                <?php endforeach ?>
            </div> 
        </div>
   </div>

</main>
<?php include 'footer.php'; ?>