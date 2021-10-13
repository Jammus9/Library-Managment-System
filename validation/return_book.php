<?php 
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
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            $borrow_id = $_GET['id'];
            // $SQLString = "UPDATE books (title, year, genre, author_name, publisher_name, no_of_copies) VALUES ('$booktitle','$bookyear', '$bookgenre', '$bookauthor', '$bookpublisher','$bookcopies') WHERE books['book_id'] = $bookid";

            $queryborrow = "UPDATE borrow SET return_date = '".date('Y-m-d')."' where borrow_id = ".$borrow_id;
            
            if(mysqli_query($conn,$queryborrow)){
                $querybook = "SELECT book_id FROM borrow where borrow_id =".$borrow_id;
                $result = mysqli_query($conn,$querybook);
                $row = mysqli_fetch_assoc($result);
                $bookid = $row['book_id'];
                $SQLString = "UPDATE books SET 
                no_of_copies = '$bookcopies+1'
                WHERE book_id = ".$bookid;

                //echo $SQLString;
                if(mysqli_query($conn, $SQLString)){
                    
                    header('Location: ../borrowed_books.php');

                } else{
                    echo 'query error: '  . mysqli_error($conn); 
                }   
            }
            
        }
    }
?>