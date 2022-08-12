<?php
// Author Zito Alessandro 
//Creation of a timetable, that has 2 tables  
//1st:   tv_series -> (id,title,channel,gemder)
//2nd    tv_series_intervals -> (id_tv_series,week_day,show_time)
// Has to show When the next series will be air based on the current date or inputted date time
// Optionally filtered 
//Generation of tables if not exists
    

//connectrion params in order to connect to DB
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

    <title>tv_series</title>
</head>
<body>
  
    <div class="container mt-4">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>TV-Series (by Zito Alessandro)
                            <a href="create.php" class="btn btn-primary mr-1" >Add a TV_Series</a>  
                             <a href="filters.php" class="btn btn-primary mr-1" >Advanced filters</a>  
                           
                           

                        </h4>
                    </div>
                    
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TV Show</th>
                                    <th>Channel</th>
                                    <th>Gender</th>
                                    <th>On AIR</th>
                                    <th>At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query =" SELECT tv_series.id,tv_series.title,tv_series.channel,tv_series.gender,tv_series_intervals.id_tv_series,tv_series_intervals.week_day,tv_series_intervals.show_time 
                                    FROM tv_series 
                                    INNER JOIN tv_series_intervals 
                                    ON tv_series.id=tv_series_intervals.id_tv_series";


                                    $query_run = mysqli_query($connection, $query);

                                    if (empty($query_run)) {

                                        $query_run =  "CREATE TABLE IF NOT EXISTS tv_series (
                                            id INT AUTO_INCREMENT PRIMARY KEY,
                                            title VARCHAR(255) NOT NULL,
                                            channel VARCHAR(255) NOT NULL,
                                            gender VARCHAR(255) NOT NULL,
                                            PRIMARY KEY  (id),
                                            ENGINE = InnoDB,
                                            
                          )";
                           "CREATE TABLE IF NOT EXISTS tv_series_intervals (
                            id_tv_series INT AUTO_INCREMENT PRIMARY KEY,
                            week_day VARCHAR(255) NOT NULL,
                            show_time VARCHAR(255) NOT NULL,
                            PRIMARY KEY  (id_tv_series),
                            ENGINE = InnoDB,)";
                                          
                                    }

                                    if(mysqli_num_rows($query_run) > 0)
                                        //if i find more than 0 rows so it's not empty
                                    {


                                        foreach($query_run as $movie)
                                        {
                                            // for each iteration of the query i  set a variable called $movie and get the parameter from html
                                            ?>
                                            <tr>
                                                <td><?= $movie['id']; ?></td>
                                               

                                                <td><?= $movie['title']; ?></td>
                                                <td><?= $movie['channel']; ?></td>
                                                <td><?= $movie['gender']; ?></td>
                                                <td><?= $movie['week_day']; ?></td>
                                                <td><?= $movie['show_time']; ?></td>
                                                
                                                <td>
                                                <a href="view.php?id=<?= $movie['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                
                                               
                                                  
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>