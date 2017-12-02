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
        Search Programs
    </title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dropdown.css" rel="stylesheet"/>
    <link href="css/vertical.css" rel="stylesheet"/>

</head>


<?php

if (isset($_SESSION['admin_id'])) { ?>

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
        $oj = -1;
        $diff = -1;
        $search_tag = '';


        if (isset($_GET['oj'])) {
            $oj = $_GET['oj'];
        }
        if (isset($_GET['diff'])) {
            $diff = $_GET['diff'];
        }
        if (isset($_GET['search_tag'])) {
            $search_tag = $_GET['search_tag'];
        }


        $query = "SELECT * FROM program ";

        if ($oj != -1) {
            $query .= "WHERE oj = '{$oj}' ";
        }
        if ($diff != -1) {
            if ($oj != -1) {
                $query .= "AND category = '{$diff}' ";
            } else {
                $query .= "WHERE category = '{$diff}' ";
            }
        }
        if ($oj == -1 && $diff == -1) {
            $query .= "WHERE tag LIKE '%{$search_tag}%' ";
        } else {
            $query .= "AND tag LIKE '%{$search_tag}%' ";
        }


        global $result;
        $result = mysqli_query($connect, $query);


        //    }


        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row['oj'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><a href="<?php echo $row['problem_link'] ?>" target="_blank">Click Here</a></td>
                <td><?php echo $row['local_path'] ?></td>
                <td><a href="<?php echo $row['cloud_path'] ?>" target="_blank">Click Here</a></td>

                <td>
                    <?php
                    $arr = explode(",", $row['tag']);

                    foreach ($arr as $value) {
                        $link = "?search_tag=" . $value ?>


                        <a href="<?php echo $link ?>"><?php echo $value ?></a>

                    <?php } ?>


                </td>

            </tr>


        <?php } ?>

        </tbody>

    </table>


<?php } else { ?>

    <?php include "index_header.php"; ?>
    <h1 style="text-align: center;">Please Log In First</h1>

<?php } ?>


</html>
