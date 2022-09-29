<?php
require 'Student.php';


$column = isset($_POST['column'])  ? $_POST['column'] : '';
$column1 = isset($_POST['column1'])  ? $_POST['column1'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$description1 = isset($_POST['description1']) ? $_POST['description1'] : '';


$key[$column]=$description;
$key[$column1]=$description1;

// if ($column){
    $students =  FindbyCategory($key);
//}


disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>Danh sách </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh sách </h1>
        <a href="student-add.php">Add new student</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Category</td>
            </tr>
                
            <tr>
                <?php foreach ($students as $item){ ?>
                <td><?php echo $item['Id']; ?></td>
                <td><?php echo $item['Name']; ?></td>
                <td><?php echo $item['Email']; ?></td>
                <td><?php echo $item['Category']; ?></td>
                <td>
                    <form method="post" action="student-delete.php">
                        <input onclick="window.location = 'student-edit.php?id=<?php echo $item['Id']; ?>'" type="button" value="edit"/>
                        <input type="hidden" name="id" value="<?php echo $item['Id']; ?>"/>
                        <input onclick="return confirm('Do you want remove this ?');" type="submit" name="delete" value="delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>