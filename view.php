<?php
// Author Zito Alessandro 
//Creation of a timetable, that has 2 tables  
//1st:   tv_series -> (id,title,channel,gemder)
//2nd    tv_series_intervals -> (id_tv_series,week_day,show_time)
// Has to show When the next series will be air based on the current date or inputted date time
// Optionally filtered 
//Generation of tables if not exists


//connection parameters
require 'dbconnection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Movie View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Movie Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        //i get the ID
                        if(isset($_GET['id']))
                        {

                            $id = mysqli_real_escape_string($connection, $_GET['id']);
                            //select all the values according to the ID
                            $query = " SELECT tv_series.id,tv_series.title,tv_series.channel,tv_series.gender,tv_series_intervals.id_tv_series,tv_series_intervals.week_day,tv_series_intervals.show_time 
                            FROM tv_series 
                            INNER JOIN tv_series_intervals 
                            ON tv_series.id=tv_series_intervals.id_tv_series;";
                            $query_run = mysqli_query($connection, $query);
                                // so if the number of rows is higher than 0...(pratically is not empty)
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                    //fetch an array with these characteristics getting 
                                $movie = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Tv_show</label>
                                        <p class="form-control">
                                            <?=$movie['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Channel</label>
                                        <p class="form-control">
                                            <?=$movie['channel'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Gender</label>
                                        <p class="form-control">
                                            <?=$movie['gender'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Week Day</label>
                                        <p class="form-control">
                                            <?=$movie['week_day'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Show Time</label>
                                        <p class="form-control">
                                            <?=$movie['show_time'];?>
                                        </p>
                                    </div>
                                  

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>