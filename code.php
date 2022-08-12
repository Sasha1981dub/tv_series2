<?php
// Author Zito Alessandro 
//Creation of a timetable, that has 2 tables  
//1st:   tv_series -> (id,title,channel,gemder)
//2nd    tv_series_intervals -> (id_tv_series,week_day,show_time)
// Has to show When the next series will be air based on the current date or inputted date time
// Optionally filtered 
//Generation of tables if not exists


// I will treat each button as a SUBMIT button so when they are called from the index page each of them will have a different function





//requires the Db in order to connect to the DB
require 'dbconnection.php';

 

// Save movie ...if pressed
if(isset($_POST['save_movie']))

// i get all vars in order to store them

{
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $channel = mysqli_real_escape_string($connection, $_POST['channel']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $week_day = mysqli_real_escape_string($connection, $_POST['week_day']);
    $show_time = mysqli_real_escape_string($connection, $_POST['show_time']);
   
// I insert them into the tables
    $query = "INSERT INTO tv_series (title,gender,channel) VALUES ('$title','$channel','$gender');";
   
    $query .= "INSERT INTO tv_series_intervals (week_day, show_time) VALUES ('$week_day', '$show_time')";
    
    
    

    $query_run = mysqli_multi_query($connection, $query);
    

    if($query_run)
    {
        $_SESSION['message'] = "Movie Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Movie Not Created";
        header("Location: create.php");
        exit(0);
    }
}

?>