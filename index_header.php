<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>


<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <?php
    if (isset($_SESSION['admin_id'])){
    ?>
    <a class="navbar-brand" href="#" style="text-align: right"><?php echo $_SESSION['admin_name']; ?></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="add_programs.php" style="text-align: right">Add Programs <span
                            class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="logout.php" style="text-align: right">Log Out <span
                            class="sr-only">(current)</span></a>
            </li>

        </ul>


        <?php } else { ?>

        <a class="navbar-brand" href="#" style="text-align: right">Utshaw's Programs</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a href="login.php" style="text-align: right">Sign In</a>
                </li>
            </ul>

            <?php } ?>


        </div>
</nav>