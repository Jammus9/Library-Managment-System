<?php
        $conn = mysqli_connect('localhost','zaid','','lms');
        if(!$conn){
            echo 'connection error:' . mysqli_connect_error();
        }
        else{
           # echo 'connection working';
        }
        ?>