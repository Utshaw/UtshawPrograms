<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/1/2017
 * Time: 6:23 AM
 */
include "db.php";




?>


<html>

<head>
    <title>Utshaw's Programs Corner</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dropdown.css" rel="stylesheet"/>


    <style type="text/css">
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>

</head>

<body>

<?php
//    if(isset($_SESSION['admin_id'])){
//        ?>
<!--        <a href="" style="text-align: right">--><?php //echo $_SESSION['admin_name']; ?><!--</a>-->
<!---->
<!--        <br>-->
<!---->
<!--        <a href="add_programs.php" style="text-align: right">Add Programs</a>-->
<!---->
<!--        <br>-->
<!---->
<!---->
<!--        <a href="logout.php" style="text-align: right">Log Out</a>-->
<!---->
<!---->
<!---->
<!---->
<?php //} else {?>
<!--        <a href="login.php" style="text-align: right">Sign In First</a>-->
<!---->
<?php //} ?>

<?php include "index_header.php";



?>


<div class="vertical-center">

    <div class="row">

        <div class="container">
            <h1 style="text-align: center"><a href="https://github.com/Utshaw">Utshaw</a>'s Program Search</h1>
        </div>

        <div class="container">
            <form action="show_programs.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" style="font-weight: bold">Search Here</label>
                    <input type="search" name="search_tag" class="form-control" placeholder="Search">
                </div>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="b-select-wrap">


                            <select name="oj" class="b-select">
                                <?php include "ojlist.php";?>

<!--                                --><?php
//                                $query = "SELECT DISTINCT oj FROM program;";
//                                $rslt = mysqli_query($connect, $query);
//                                while($row = mysqli_fetch_assoc($rslt)){
//                                    $oj_name = $row['oj'];
//                                    echo "<option>$oj_name</option>";
//                                }
//                                ?>
                            </select>
                        </div>

                    </div>
                        <div class="col-sm-4">
                        <div class="b-select-wrap">
                            <select name="diff" class="b-select">
                                <option value="-1" selected>Difficulty</option>
                                <option>Easy</option>
                                <option>Medium</option>
                                <option>Hard</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div style="text-align:center;">

                            <input class="btn btn-primary btn-block" style="-moz-border-radius: 20px;
                                                                            -webkit-border-radius: 20px;
                                                                            border-radius: 20px;" type="submit" name="search_submit" value="Search">
                        </div>
                    </div>


                </div>
            </form>

        </div>
    </div>


</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>


</body>
</html>
