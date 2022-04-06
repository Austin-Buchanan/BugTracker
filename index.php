<?php
    include './view/header.php';
?>
<main>
    <h1>Index</h1>
    <img src="assets/Papilio_troilus01.jpg" alt="Picture of Butterfly" class="img-fluid rounded mx-auto d-block">
    <div id="pageLinks" class="text-center">
        <a href='./view/add_bug.php' class="pageLink">Add Bug</a><br>
        <a href='./view/read_all_bugs.php' class="pageLink">All Bugs</a><br>
        <a href='./view/bug_search.php' class="pageLink">Search Bug</a>
    </div>

</main>

<?php include './view/footer.php';    