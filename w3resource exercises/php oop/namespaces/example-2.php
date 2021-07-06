<?php
include "example_3.php";

$table = new example_3\Table();
$table->title = "My table";
$table->numRows = 5;

$row = new example_3\Row();
$row->numCells = 3;
?>

<example_3>
<body>

<?php $table->message(); ?>
<?php $row->message(); ?>

</body>
</example_3>
