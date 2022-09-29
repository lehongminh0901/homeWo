<?php
require 'Student.php';
$students = get_all_students();


if (!empty($_POST['FindbyCategory']))
{
   
   
    
    $data['Column'] = isset($_POST['column'] ) ? $_POST['column']: '';
    $data['Description'] = isset($_POST['description']) ? $_POST['description'] : '';
    
    
     
 
   // $errors = array();
    
    // if (!$errors){
    //     FindbyEmail( $data['Email']);
        
    //     header("location: student-list.php");
    // }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
                    
                    <form method="post" action="Search.php">
                    <td>
                    <td>1</td>
                    <input type="text" name="column" value="<?php echo !empty($data['Column']) ? $data['Column'] : ''; ?>"/>
                        <?php if (!empty($errors['Column'])) echo $errors['Column']; ?>
                        <td>1b</td>
                    <input type="text" name="description" value="<?php echo !empty($data['Description']) ? $data['Description'] : ''; ?>"/>
                        <?php if (!empty($errors['Description'])) echo $errors['Description']; ?>
                        <td>2</td>
                        <input type="text" name="column1" value="<?php echo !empty($data['Column']) ? $data['Column'] : ''; ?>"/>
                        <?php if (!empty($errors['Column'])) echo $errors['Column']; ?>
                        <td>2B</td>
                    <input type="text" name="description1" value="<?php echo !empty($data['Description']) ? $data['Description'] : ''; ?>"/>
                        <?php if (!empty($errors['Description'])) echo $errors['Description']; ?>
                        
                    
                    
                    <input type="submit" name="FindbyCategory" value="Save"/>
                        
                    </td>
                    </form>
                    
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
            <?php foreach ($students as $item){ ?>
            <tr>
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