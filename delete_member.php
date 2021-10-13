<?php
include 'include/session.php';

?><!DOCTYPE html>
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
                     <form method="post" action="validation/delete_member.php">
                     <?php
                     if (isset($_GET['id'])){
                        $id = mysqli_real_escape_string($conn, $_GET['id']);

                        $sql = "SELECT * FROM member WHERE member_id = $id";

                        $result = mysqli_query($conn, $sql);

                        $member = mysqli_fetch_assoc($result);
                        
                        //print_r($book);
                    }
                    ?>
                           <form method="post" action="validation/delete_members.php">
                           <div class="col-6 form-group">
                              <label for="memberid"></label>
                              <input name="memberid" type="hidden" class="form-control" placeholder="Members Name" value="<?php echo $member['member_id']?>" required="required" autofocus="autofocus">
                            </div>
                            <div class="col-6 form-group">
                              <label for="membername">Members Name</label>
                              <input name="membername" type="text" readonly="readonly" class="form-control" placeholder="Members Name" value="<?php echo $member['name']?>" required="required" autofocus="autofocus">
                            </div>
                            <div class="col-6 form-group">
                                 <label for="memberaddress">Address</label>
                                  <input name="memberaddress" type="text"readonly="readonly" placeholder="Address" value="<?php echo $member['address']?>" class="form-control" required="required">
                          </div>
                              <div class="col-6 form-group">
                                  <label for="membercontactno">Contact No</label>
                                  <input name="membercontactno" type="text" readonly="readonly" placeholder="Contact No" value="<?php echo $member['contact_no']?>" class="form-control" required="required">
                                </div>
                                <div class="col-6 form-group">
                                <label for="member_type">Member Type</label>
                                    <select class="form-control" id="membertype" readonly="readonly" value="<?php echo $member['member_type']?>" name="membertype">
                                        <option>Admin</option>
                                        <option>Member</option>
                                    </select>
                                    </div>
                                  <div class="col-6 form-group">
                                    <label for="memberexpiry">Expiry Date</label>
                                    <input name="memberexpiry" type="date" readonly="readonly" placeholder="Expiry Date" value="<?php echo $member['expiry_date']?>" class="form-control" required="required">
                                  </div>
                                  <div class="col-6 form-group">
                                    <h2> Are You Sure You Wish to Delete Member</h2>
                                </div>

                          <div class="col-6 form-group">		
                          <button class="btn btn-primary" type="submit" name="delete_member">Delete</button>
                          <button class="btn btn-secondary" href="../members.php" type="submit" >Cancel</button>
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

