<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="#">Utshaw's Programs</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Link</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#">Disabled</a>-->
<!--            </li>-->

            <li>



            </li>

        </ul>

        <form action="show_programs.php" method="post" class="form-inline my-2 my-lg-0">


            <div class="b-select-wrap">
                <select name="oj" class="b-select">
                    <?php include "ojlist.php";?>
                </select>
            </div>

            <div class="b-select-wrap">
                <select name="diff" class="b-select">
                    <option value="-1" selected>Difficulty</option>
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Hard</option>
                </select>
            </div>


            <input class="form-control mr-sm-2" type="text" name="search_tag" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" name="search_submit" type="submit">Search</button>
        </form>



    </div>
</nav>