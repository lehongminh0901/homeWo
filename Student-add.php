<?php

require 'Student.php';


if (!empty($_POST['add_student']))
{
   
    $data['Id']        = isset($_POST['id']) ? $_POST['id'] : '';
    $data['Name']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['Email']    = isset($_POST['email']) ? $_POST['email'] : '';
    $data['Category']    = isset($_POST['category']) ? $_POST['category'] : '';
     
 
    $errors = array();
    
    if (!$errors){
        add_student($data['Id'], $data['Name'], $data['Email'], $data['Category']);
        
        header("location: student-list.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm sinh vien </h1>
        <a href="student-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="student-add.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Id</td>
                    <td>
                    <input type="text" name="id" value="<?php echo !empty($data['Id']) ? $data['Id'] : ''; ?>"/>
                        <?php if (!empty($errors['Id'])) echo $errors['Id']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['Name']) ? $data['Name'] : ''; ?>"/>
                        <?php if (!empty($errors['Name'])) echo $errors['Name']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo !empty($data['Email']) ? $data['Email'] : ''; ?>"/>
                        <?php if (!empty($errors['Email'])) echo $errors['Email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <input type="text" name="category" value="<?php echo !empty($data['Category']) ? $data['Category'] : ''; ?>"/>
                        <?php if (!empty($errors['Category'])) echo $errors['Category']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_student" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>