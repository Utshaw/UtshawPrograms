<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/1/2017
 * Time: 8:48 AM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "db.php";

?>


<html>

<head>
    <title>

    </title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dropdown.css" rel="stylesheet"/>

</head>


<?php

 if(isset($_SESSION['admin_id'])){ ?>

<?php include "search_header.php" ?>

<table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>OJ</th>
        <th>Category</th>
        <th>Problem Link</th>
        <th>Local Path</th>
        <th>Cloud Path</th>
        <th>Tags</th>
    </tr>
    </thead>

    <tbody>

    <?php

    $result;

//    if(isset($_POST['search_submit'])){
        $oj = $_POST['oj'];
        $diff = $_POST['diff'];
        $search_tag = $_POST['search_tag'];


        $query = "SELECT * FROM program ";

        if($oj != -1){
            $query .= "WHERE oj = '{$oj}' ";
        }
        if($diff != -1){
            if($oj != -1){
                $query .= "AND category = '{$diff}' ";
            }else{
                $query .= "WHERE category = '{$diff}' ";
            }
        }
        if($oj == -1 && $diff == -1){
            $query .= "WHERE tag LIKE '%{$search_tag}%' ";
        }else{
            $query .= "AND tag LIKE '%{$search_tag}%' ";
        }

        global $result;
        $result =  mysqli_query($connect, $query);



//    }




    while($row = mysqli_fetch_assoc($result)){
        ?>

    <tr>
        <td><?php echo $row['oj']?></td>
        <td><?php echo $row['category']?></td>
        <td><a href="<?php echo $row['problem_link']?>" target="_blank">Click Here</a> </td>
        <td><?php echo $row['local_path']?></td>
        <td><a href="<?php echo $row['cloud_path']?>" target="_blank">Click Here</a></td>
        <td><?php echo $row['tag']?></td>

    </tr>


    <?php } ?>

    </tbody>

</table>


<?php }else { ?>

     <h1 style="text-align: center;">Please Log In First</h1>

<?php } ?>





</html>
