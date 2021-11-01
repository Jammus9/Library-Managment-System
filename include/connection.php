<?php
        $conn = mysqli_connect('localhost','root','','lms');
        if(!$conn){
            echo 'connection error:' . mysqli_connect_error();
        }
        else{
           # echo 'connection working';
        }
        ?>