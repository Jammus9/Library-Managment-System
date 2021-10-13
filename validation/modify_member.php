<?php
include '..\include\connection.php';
//  echo '<pre>';
//      var_dump($_POST['membername']);
//      var_dump($_POST['memberaddress']);
//      var_dump($_POST['membercontactno']);
//      var_dump($_POST['membertype']);
//      var_dump($_POST['memberusername']);
//      var_dump($_POST['memberpassword']);
//      var_dump($_POST['memberexpiry']);
//      die();
     if(isset($_POST['memberid']) && isset($_POST['membername']) &&isset($_POST['memberaddress']) &&isset($_POST['membercontactno']) && isset($_POST['membertype']) && isset($_POST['memberusername'])  && isset($_POST['memberexpiry'])){
        if(!empty($_POST['memberid']) && !empty($_POST['membername']) &&!empty($_POST['memberaddress']) &&!empty($_POST['membercontactno']) && !empty($_POST['membertype']) && !empty($_POST['memberusername']) && !empty($_POST['memberpassword']) && !empty($_POST['memberexpiry'])){
            $memberid = $_POST['memberid'];
            $membername = $_POST['membername'];
            $memberaddress = $_POST['memberaddress'];
            $membercontactno = $_POST['membercontactno'];
            $membertype = $_POST['membertype'];
            $memberusername = $_POST['memberusername'];
            $memberpassword = $_POST['memberpassword'];
            $memberexpiry = $_POST['memberexpiry'];
            //$SQLString = "INSERT INTO member (name, address, contact_no, member_type, expiry_date) VALUES ('$membername','$memberaddress', '$membercontactno', '$membertype', '$memberexpiry')";
            
            $SQLString = "UPDATE member SET
            name = '$membername', 
            address = '$memberaddress', 
            contact_no = '$membercontactno', 
            member_type = '$membertype', 
            username = '$memberusername',
            password = '$memberpassword',
            expiry_date = '$memberexpiry'
            WHERE member_id = ".$memberid;
           echo $SQLString;
            if(mysqli_query($conn, $SQLString)){
                
                header('Location: ../members.php');

            } else{
                echo 'query error: '  . mysqli_error($conn); 
            }
            
        }
    }
?>