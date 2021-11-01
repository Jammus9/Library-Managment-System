<?php 
    include 'include/session.php';
    include 'include/connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Index</title>
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
            <!--Button Selection-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pure Logics </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Library Managment System</li>
                        </ol>
                        <?php echo $_SESSION['lms']['member_type'] == 'Admin' ? '
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"></i>Members</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="members.php" > Add Members</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Books</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="books.php">Add new Books</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Borrowed Items</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="borrowed_books.php">Borrowed Books</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Membership Status</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="member_status.php">Check Membership Status</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>' : ''; ?>
                        <!--Table-->
                        <?php
                        $sql = 'SELECT * FROM books ORDER BY created_at';

                        $result = mysqli_query($conn, $sql);

                        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        mysqli_free_result($result);

                        mysqli_close($conn);

                        #print_r($books);
                        ?>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Books Search
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                   
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Year</th>
                                            <th>No of Copies</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Year</th>
                                            <th>No of Copies</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($books as $book){ ?>
                                        <tr>
                                            <td><?php echo($book['title']); ?></td>
                                            <td><?php echo($book['author_name']); ?></td>
                                            <td><?php echo($book['publisher_name']); ?></td>
                                            <td><?php echo($book['year']); ?></td>
                                            <td><?php echo($book['no_of_copies']); ?></td>

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
