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
                        <h4>Advanced search</h4>

                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                        <form action="" method="GET"> 

                            <div class="mb-3">
                             
                                <input type="text" name="tosearch" value="<?php if(isset($_GET['tosearch'])){echo $_GET['tosearch'];} ?>"form-control" placeholder="Advanced Search">
                                <p>You can write in the box, time, name, channel, gender....everything will be filtered
                                    </p>
                                </p>
                                <button type="submit" class="btn btn-primary">SEARCH</button>
                            </div>
                           
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">

    <div class="card mt-4">

    <div class="card-body>">

    <table class="table table-bordered">

    <thead>

    <tr>
        <th>ID</th>
        <th>Series Name</th>
        <th>Channel</th>
        <th>Gender</th>
        <th>week_day</th>
        <th>Show_time</th>

    </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php
if(isset($_GET['tosearch']))
{
    $filtervalues = $_GET['tosearch'];
    $query = "SELECT * FROM tv_series t1
    JOIN tv_series_intervals t2
    ON t1.id=t2.id_tv_series
    WHERE CONCAT (id,title,channel,gender,week_day,show_time)  LIKE '%$filtervalues%'";

   
   
   
       
    $query_run =  mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $items)
        {

            ?>
 <tr>
        
        <td><?= $items['id'];?></td>
        <td><?= $items['title'];?></td>
        <td><?= $items['channel'];?></td>
        <td><?= $items['gender'];?></td>
        <td><?= $items['week_day'];?></td>
        <td><?= $items['show_time'];?></td>
 
</tr>
            <?php
        }}


else 
{ 
    ?>
    <tr>
        
               <td colspan="4">  No record found</td>
        
    </tr>
<?php
    }
}
                ?>

            </td>
        </tr>

    </tbody>


    </table>
</div>


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>