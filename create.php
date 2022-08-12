<?php
// Author Zito Alessandro 
//Creation of a timetable, that has 2 tables  
//1st:   tv_series -> (id,title,channel,gemder)
//2nd    tv_series_intervals -> (id_tv_series,week_day,show_time)
// Has to show When the next series will be air based on the current date or inputted date time
// Optionally filtered 
//Generation of tables if not exists


//requires the Db in order to connect to the DB
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

    <title>Movie Calendar</title>
</head>
<body>
  
    <div class="container mt-5">

      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add a TV_Series
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>TV-Series</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Channel</label>
                                <input type="text" name="channel" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control">
                            </div><div class="mb-3">
                                <label>Week Day</label>
                                <!-- I use a Select in order to get the weekday accordind to the test specs "week_day" just a day, so no PHP or SQL function  -->
                               
                                <select id="week_day" name="week_day">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                 </select>
                            </div>
                            
                            <div class="mb-3">
                                <!-- Show time in time format -->

                                <label>Show Time</label>
                                <input type="time" name="show_time" class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <button type="submit" name="save_movie" class="btn btn-primary">Save Series</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>