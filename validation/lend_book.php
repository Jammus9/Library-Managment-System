<?php
session_start();
include '..\include\connection.php';

    //  echo '<pre>';
    //  var_dump($_POST['bookid']);
    //  var_dump($_POST['booktitle']);
    //  var_dump($_POST['bookyear']);
    //  var_dump($_POST['bookgenre']);
    //  var_dump($_POST['bookauthor']);
    //  var_dump($_POST['bookpublisher']);
    //  var_dump($_POST['bookcopies']);
    //  die();
    if(isset($_POST['bookid']) && isset($_POST['booktitle']) &&isset($_POST['bookyear']) &&isset($_POST['bookgenre']) && isset($_POST['bookauthor']) && isset($_POST['bookpublisher']) && isset($_POST['bookcopies'])){
        if(!empty($_POST['bookid']) && !empty($_POST['booktitle']) && !empty($_POST['bookauthor']) && !empty($_POST['bookpublisher']) && !empty($_POST['bookcopies'])){
            $bookid = $_POST['bookid'];
            $booktitle = $_POST['booktitle'];
            $bookyear = $_POST['bookyear'];
            $bookgenre = $_POST['bookgenre'];
            $bookauthor = $_POST['bookauthor'];
            $bookpublisher = $_POST['bookpublisher'];
            $bookcopies = $_POST['bookcopies'];
            if($bookcopies > 0){
                $bookcopies =$bookcopies -"1";
            }
            else{
                $bookcopies = '000'; 
            }
            // $SQLString = "UPDATE books (title, year, genre, author_name, publisher_name, no_of_copies) VALUES ('$booktitle','$bookyear', '$bookgenre', '$bookauthor', '$bookpublisher','$bookcopies') WHERE books['book_id'] = $bookid";
            $borrowquery = "INSERT INTO borrow (`book_id`, `member_id`, `issue_date`) VALUES ('".$bookid."','".$_SESSION['lms']['id']."','".Date('Y-m-d')."')";
            $insetborrow = mysqli_query($conn,$borrowquery);
            if($insetborrow){
            $SQLString = "UPDATE books SET
                            title = '$booktitle', 
                            year = '$bookyear', 
                            genre = '$bookgenre', 
                            author_name = '$bookauthor', 
                            publisher_name = '$bookpublisher', 
                            no_of_copies = '$bookcopies'
                            WHERE book_id = ".$bookid;

            //echo $SQLString;
            if(mysqli_query($conn, $SQLString)){
                
                header('Location: ../lend_books.php');

            } else{
                echo 'query error: '  . mysqli_error($conn); 
            }
        }
            
        }
    }
?>