<?php
include 'include/session.php';
include 'include/connection.php';
    if($_SESSION['lms']['member_type'] == 'Admin'){

    
        $sql = 'SELECT * FROM borrow ORDER BY created_at';
    }
    else {
        $sql = 'SELECT * FROM borrow where member_id = '.$_SESSION["lms"]["id"].' AND return_date = null ORDER BY created_at';
    }

        $result = mysqli_query($conn, $sql);

        $books = mysqli_fetch_all($result, MYSQL_ASSOC);

        mysqli_free_result($result);

        mysqli_close($conn);

        #print_r($books);
        
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Members</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!--Navigation bar-->
        <?php include 'include/navigationbar.php'; ?>
        <!--Navigation Side pan-->
        <div id="layoutSidenav">
                <?php include 'include/sidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pure Logics</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Library Managment System</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Borrow Status
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Book ID</th>
                                            <th>Member Id</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Fine</th>
                                            <th>Return</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Book ID</th>
                                            <th>Member Id</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Fine</th>
                                            <th>Return</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     <?php foreach ($books as $book){ ?>
                                        <tr>
                                            <td><?php echo($book['book_id']); ?></td>
                                            <td><?php echo($book['member_id']); ?></td>
                                            <td><?php echo($book['issue_date']); ?></td>
                                            <td><?php echo($book['return_date']); ?></td>
                                            <td><?php echo($book['fine']); ?></td>
                                            <td><a href="validation/return_book.php?id=<?php echo $book['borrow_id']?>"><span class='fa fa-share-square'></a></td>

                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
