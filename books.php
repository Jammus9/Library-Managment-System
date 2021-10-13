<?php
include 'include/session.php';

?>
<!DOCTYPE html>
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
                <?php include 'include/connection.php'; ?>
                <?php
                        $sql = 'SELECT * FROM books ORDER BY created_at';

                        $result = mysqli_query($conn, $sql);

                        $books = mysqli_fetch_all($result, MYSQL_ASSOC);

                        mysqli_free_result($result);

                        mysqli_close($conn);

                        #print_r($books);
                        ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pure Logics</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Library Managment System</li>
                        </ol>
                        <div class="form-group">
                            <form method="post" action="validation/add_book.php">
                            
                            <div class="col-6 form-group">
                                 <label for="booktitle">Title</label>
                                  <input name="booktitle" type="text" placeholder="Title" class="form-control" required="required">
                          </div>
                          <div class="col-6 form-group">
                                 <label for="bookyear">Year</label>
                                  <input name="bookyear" type="number" placeholder="Year" class="form-control" required="required">
                          </div>
                          <div class="col-6 form-group">
                                 <label for="bookgenre">Genre</label>
                                  <input name="bookgenre" type="text" placeholder="Genre" class="form-control" required="required">
                          </div>
                              <div class="col-6 form-group">
                                  <label for="bookauthor">Author</label>
                                  <input name="bookauthor" type="text" placeholder="Author" class="form-control" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="bookpublisher">Publisher</label>
                                    <input name="bookpublisher" type="text" placeholder="Publisher" class="form-control" required="required">
                                  </div>
                                  <div class="col-6 form-group">
                                    <label for="bookcopies">No of copies</label>
                                    <input name="bookcopies" type="number" placeholder="No of copies" class="form-control" required="required">
                                  </div>
                          <div class="col-6 form-group">		
                          <button class="btn btn-primary" type="submit" name="add_book">ADD BOOK</button>
                          </div>
                        </div>
                    </form>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Book Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Book Id</th>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Year</th>
                                            <th>No of Copies</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Book Id</th>
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
                                            <td><?php echo($book['book_id']);?></td>
                                            <td><?php echo($book['title']); ?></td>
                                            <td><?php echo($book['author_name']); ?></td>
                                            <td><?php echo($book['publisher_name']); ?></td>
                                            <td><?php echo($book['year']); ?></td>
                                            <td><?php echo($book['no_of_copies']); ?></td>
                                            <td><a href="modify_book.php?id=<?php echo $book['book_id']?>"><span class='fa fa-edit'></a>
                                            <a href="delete_book.php?id=<?php echo $book['book_id']?>"><span class='fa fa-trash'></a></td>
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
