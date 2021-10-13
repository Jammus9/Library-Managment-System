<?php include 'include/session.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Book</title>
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
                    <?php   
                    include('include/connection.php');

                    ?>
                     <form method="post" action="validation/return_book.php">
                     <?php
                     if (isset($_GET['id'])){
                        $id = mysqli_real_escape_string($conn, $_GET['id']);

                        $sql = "SELECT * FROM borrow b
                        left join books bk ON bk.book_id = b.book_id
                        WHERE b.borrow_id = $id";

                        $result = mysqli_query($conn, $sql);

                        $book = mysqli_fetch_assoc($result);
                        
                        //print_r($book);
                    }
                    ?>
                            <div class="col-6 form-group">
                                 <label for="bookid"></label>
                                  <input name="bookid" type="hidden" placeholder="Title" class="form-control" value="<?php echo $book['book_id']?>" required="required">
                          </div>
                            <div class="col-6 form-group">
                                 <label for="booktitle">Title</label>
                                  <input name="booktitle" type="text" readonly="readonly"  placeholder="Title" class="form-control" value="<?php echo $book['title']?>" required="required">
                          </div>
                          <div class="col-6 form-group">
                                 <label for="bookyear">Year</label>
                                  <input name="bookyear" type="number" readonly="readonly" placeholder="Year" class="form-control" value="<?php echo $book['year']?>"  required="required">
                          </div>
                          <div class="col-6 form-group">
                                 <label for="bookgenre">Genre</label>
                                  <input name="bookgenre" type="text" readonly="readonly" placeholder="Genre" class="form-control" value="<?php echo $book['genre']?>"  required="required">
                          </div>
                              <div class="col-6 form-group">
                                  <label for="bookauthor">Author</label>
                                  <input name="bookauthor" type="text" readonly="readonly" placeholder="Author" class="form-control" value="<?php echo $book['author_name']?>"  required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="bookpublisher">Publisher</label>
                                    <input name="bookpublisher" type="text" readonly="readonly" placeholder="Publisher" class="form-control" value="<?php echo $book['publisher_name']?>"  required="required">
                                  </div>
                                  <div class="col-6 form-group">
                                    <label for="bookcopies">No of copies</label>
                                    <input name="bookcopies" type="number" readonly="readonly" placeholder="No of copies" class="form-control" value="<?php echo $book['no_of_copies']?>"  required="required">
                                  </div>
                                  <div class="col-6 form-group">
                                      <p>Please Double check your Book</p>
                                  </div>
                          <div class="col-6 form-group">		
                          <button class="btn btn-primary" type="submit" name="return_book">return</button>
                          </div>
                        </div>
                    </form>

                
                </main>
            </div>
        </div>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

