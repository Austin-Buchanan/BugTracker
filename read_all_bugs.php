<?php
    include './view/header.php';
    require('read_all_controller.php');
?>
<main>
<h1>All Bugs</h1>
<table>
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
</table>
</main>
<?php include './view/footer.php';    