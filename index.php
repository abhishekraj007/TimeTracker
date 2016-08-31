<?php include('functions.php') ?>

<!DOCTYPE html>

<html>

<head>
    <title>How Much Time</title>

    <!-- Bootstrap CSS -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" type="text/css" />



    <style type="text/css">

    </style>

</head>


<body>


    <!--header-->
    <!--<header class="container">-->

    <!--Navbar-->
    <nav class="navbar navbar-dark bg-success navbar-fixed-top">

        <div class="container">
            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
                    <i class="fa fa-bars"></i>
                </button>

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">

                <!--Link-->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a data-mode="restore" id="btn-mode" href="#" class="btn btn-success">Swith to <span id="lbl-mode">Restore</span> Mode</a>
                        <!--<a class="nav-link" href="#">Features</a>-->
                    </li>
                </ul>
                <div class=" nav navbar-nav pull-right">
                    <div class="total-time">
                        <strong>Time Spent: </strong> <span id="totaltime"></span>
                    </div>
                </div>

            </div>
            <!--/.Collapse content-->
        </div>
    </nav>
    <!--/.Navbar-->

    <!--add task input container-->
    <div class="container form-container">
        <div class="row  md-form">
            <form id="new-form">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input id="task" name="task" class="form-control validate" placeholder="  Add your new task..." />
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-block"><?php echo icon('play') ?></button>
                    </div>
                    <!-- col -->
                </div>
                <!-- form-group-->
            </form>
            <!-- form -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->

    <hr>
    <!--table container-->
    <div class="container">
        <table class="table table-bordered">


            <thead>
                <th>Task Name</th>
                <th>Started At</th>
                <th>Ended At</th>
                <th>Time Elasped</th>
                <th colspan="2">Controls</th>

            </thead>
            <!--loading data dynamically from script file as a row-->
            <tbody id="log"></tbody>

        </table>
    </div>





    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <!--Custom script-->
    <script src="script.js"></script>

</body>

</html>