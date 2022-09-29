
<?php
require '\homeW\Student.php';
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    delete_student($id);
}

header("location: student-list.php");
