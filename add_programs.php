<?php include "db.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dropdown.css" rel="stylesheet"/>
    <link href="css/vertical.css" rel="stylesheet"/>


</head>


<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (isset($_POST['add_program'])) {


    $oj = $_POST['oj'];
    $oj = mysqli_real_escape_string($connect, $oj);


    $difficulty = $_POST['diff'];
    $difficulty = mysqli_real_escape_string($connect, $difficulty);

    $prob_link = $_POST['prob_link'];
    $prob_link = mysqli_real_escape_string($connect, $prob_link);

    $cloud_path = $_POST['cloud_path'];
    $cloud_path = mysqli_real_escape_string($connect, $cloud_path);

    $local_file_query = "SELECT local_path FROM oj WHERE name = '{$oj}';";
    $local_file_result = mysqli_query($connect, $local_file_query);
    $local_file_row = mysqli_fetch_assoc($local_file_result);

    $local_file_path = $local_file_row['local_path'];

    $local_file_name = $_FILES['local_file_name']['name'];
    $local_file_name = mysqli_real_escape_string($connect, $local_file_name);

    if($oj === 'CodeForces'){

        $path_parts = pathinfo($local_file_name); // https://stackoverflow.com/questions/2183486/php-get-file-name-without-file-extension

        $codeforces_category =  substr($path_parts['filename'], -1); // $path_parts['filename'] returns filename without extension

        $local_file_full_location =  $local_file_path . "\\" . $codeforces_category . "\\" . $local_file_name;

    }else{
        $local_file_full_location =  $local_file_path . "\\" . $local_file_name;
    }

    $local_file_full_location = mysqli_real_escape_string($connect, $local_file_full_location);


//    echo $local_file_full_location;


    $tags = $_POST['tag'];
    $tags = mysqli_real_escape_string($connect, $tags);


    if(isset($_SESSION['admin_id'])){
        $query = "INSERT INTO `program` ";
        $query .= "(oj, category, problem_link, local_path, cloud_path, tag) ";
        $query .= "VALUES('{$oj}', '{$difficulty}', '{$prob_link}', '{$local_file_full_location}', '{$cloud_path}', '{$tags}') ;";

//        echo $query;

        $rslt = mysqli_query($connect,$query);
        if(!$rslt){
            die("FAILED " . mysqli_error($connect));
        }
    }else{
        echo "You don't have admin privilege to insert data. ";
    }







}


?>


<?php include "index_header.php"; ?>

<?php

if(isset($_SESSION['admin_id'])){

?>


<div class="vertical-center">
<div class="container" style="margin-top: 10px">

    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <div class="b-select-wrap">


                <select required name="oj" class="b-select">
                    <option value="-1" selected>OJ</option>
                    <option>ProjectEuler</option>
                    <option>CodeForces</option>


<!--                    --><?php
//                    $query = "SELECT DISTINCT oj FROM program;";
//                    $rslt = mysqli_query($connect, $query);
//                    while ($row = mysqli_fetch_assoc($rslt)) {
//                        $oj_name = $row['oj'];
//                        echo "<option>$oj_name</option>";
//                    }
//                    ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="b-select-wrap">


                <select required name="diff" class="b-select">
                    <option value="-1" selected>Difficulty</option>
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Hard</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="cat_title">Problem Link</label>
            <input required="" type="text" class="form-control" name="prob_link" placeholder="Link To Problem">
        </div>

<!--        <div class="form-group">-->
<!--            <div class="b-select-wrap">-->
<!--                -->
<!--                <select required name="diff" class="b-select">-->
<!--                    <option value="-1" selected>Difficulty</option>-->
<!--                    <option>Easy</option>-->
<!--                    <option>Medium</option>-->
<!--                    <option>Hard</option>-->
<!--                </select>-->
<!--                -->
<!--            </div>-->
<!--        </div>-->

        <div class="form-group">
            <label for="local_path"></label>
            <input required="" type="file" name="local_file_name">
        </div>


        <div class="form-group">
            <label for="cat_title">Cloud Path</label>
            <input required="" type="text" class="form-control" name="cloud_path" placeholder="Enter GitHub repository link here">
        </div>


        <div class="form-group">
            <label for="cat_title">Tags</label>
            <input required="" type="text" class="form-control" name="tag" placeholder="Enter tags separated by commas">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_program" value="Add Program">
        </div>


    </form>
</div>
</div>

<?php }else{  ?>

    <h1 style="text-align: center;">Please Log In First</h1>


<?php  } ?>
</body>


</html>

