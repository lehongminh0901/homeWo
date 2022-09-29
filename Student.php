<?php
global $conn;


function connect_db()
{
   
    global $conn;
   
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'student');
       
        mysqli_set_charset($conn, 'utf8');
    }
    
}


function disconnect_db()
{
   
    global $conn;
   
    if ($conn){
        mysqli_close($conn);
    }
}


function get_all_students()
{
    
    global $conn;
     
    
    connect_db();
     
    
    $sql = "SELECT * FROM infostudent";
     
    echo $sql;
    $query = mysqli_query($conn, $sql);
     
    
    $result = array();
     
   
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    
    return $result;
}


function get_student($student_id)
{
    
    global $conn;
     
    
    connect_db();
     
    
    $sql = "SELECT * from student where Id = {$student_id}";
     
    echo $sql;
    $query = mysqli_query($conn, $sql);
     
 
    $result = array();
     
 
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    
    return $result;
}


function add_student($student_id, $student_name, $student_email,$student_category)
{
    
    global $conn;
     
 
    connect_db();
     
   
    $student_id = addslashes($student_id);
    $student_name = addslashes($student_name);
    $student_email = addslashes($student_email);
    $student_category = addslashes($student_category);
     
   
    $sql = "
            INSERT INTO infostudent(Id, Name, Email,Category) VALUES
            ('$student_id','$student_name','$student_email','$student_category')
    ";
     
   
    $query = mysqli_query($conn, $sql);
     
    return $query;
}



function edit_student($student_id, $student_name, $student_email)
{
  
    global $conn;
     
   
    connect_db();
     
    
    $student_name       = addslashes($student_name);
    $student_id        = addslashes($student_id);
    $student_email   = addslashes($student_email);
     
   
    $sql = "
            UPDATE infostudent SET
            Id = '$student_id',
            Name = '$student_name',
            Email = '$student_email'
            WHERE Id = $student_id
    ";
     
   
    $query = mysqli_query($conn, $sql);
     
    return $query;
}



function delete_student($student_id)
{
    
    global $conn;
     
    
    connect_db();
     
   
    $sql = "
            DELETE FROM infostudent
            WHERE Id = '$student_id'
    ";
   
     
    
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
function FindbyCategory($key = array()){
    
    global $conn;
    connect_db();
    $sql1 = "SELECT * From infostudent Where";
    
    

    // foreach($key as $column => $description ){
    //     $description = trim($description);
    //     if($column == array_keys($key)[sizeof($key)-1])(
    //         $last = $column.' '."=".' '."'$description'" 
    //     );
    //    $sql2 = $sql1 .= $column;
    //     $sql2 = $sql1 .=' '.$column.' '.'='.' '. "'$description'" ;  
    //     $sql2 = $sql1 .=' '.$column.' '.'='.' '."$description";
    // }
    foreach ($key as $column => $description){
        $description = trim($description);

        if($column == array_keys($key)[sizeof($key)-1])(
                     $last =' '. $column.' '."=".' '."'$description'" 
                 );
        
                 else(
        $sql2 = ' '. $column.' '."=".' '."'$description'".' '.'AND'.' ');
    }
    foreach ($key as $iteam){
        echo $iteam;
    }
   $sql = $sql1.$sql2.$last;
   echo $sql;
   
    
   $query = mysqli_query($conn, $sql);
     
    
   $result = array();
    
  
   if ($query){
       while ($row = mysqli_fetch_assoc($query)){
           $result[] = $row;
       }
   }
    
   
   return $result;
    
}
?>