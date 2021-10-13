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
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pure Logics</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Library Managment System</li>
                        </ol>
                        <div class="form-group">
                            <form method="post" action="validation/add_member.php">
                            <div class="col-6 form-group">
                              <label for="membername">Members Name</label>
                              <input name="membername" type="text" class="form-control" placeholder="Members Name" required="required" autofocus="autofocus">
                            </div>
                            <div class="col-6 form-group">
                                 <label for="memberaddress">Address</label>
                                  <input name="memberaddress" type="text" placeholder="Address" class="form-control" required="required">
                          </div>
                              <div class="col-6 form-group">
                                  <label for="membercontactno">Contact No</label>
                                  <input name="membercontactno" type="text" placeholder="Contact No" class="form-control" required="required">
                                </div>
                                <div class="col-6 form-group">
                                <label for="member_type">Member Type</label>
                                    <select class="form-control" id="membertype" name="membertype">
                                        <option>Admin</option>
                                        <option>Member</option>
                                    </select>
                                    </div>
                                    <div class="col-6 form-group">
                                  <label for="memberusername">Username</label>
                                  <input name="memberusername" type="text" placeholder="Username" class="form-control" required="required">
                                </div>
                                <div class="col-6 form-group">
                                  <label for="memberpassword">Password</label>
                                  <input name="memberpassword" type="password" placeholder="password" class="form-control" required="required">
                                </div>
                                  <div class="col-6 form-group">
                                    <label for="memberexpiry">Expiry Date</label>
                                    <input name="memberexpiry" type="date" placeholder="Expiry Date" class="form-control" required="required">
                                  </div>
                          <div class="col-6 form-group">		
                          <button class="btn btn-primary" type="submit" name="add_member">ADD</button>
                          </div>
                        </div>
                    </form>
                    <?php
                        $sql = 'SELECT * FROM member ORDER BY created_at';

                        $result = mysqli_query($conn, $sql);

                        $members = mysqli_fetch_all($result, MYSQL_ASSOC);

                        mysqli_free_result($result);

                        mysqli_close($conn);

                        #print_r($books);
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Member Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Member Id</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Member Type</th>
                                            <th>Expiry Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Member Id</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Member Type</th>
                                            <th>Expiry Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($members as $member){ ?>
                                        <tr>
                                            <td><?php echo($member['member_id']); ?></td>
                                            <td><?php echo($member['username']); ?></td>
                                            <td><?php echo($member['name']); ?></td>
                                            <td><?php echo($member['address']); ?></td>
                                            <td><?php echo($member['contact_no']); ?></td>
                                            <td><?php echo($member['member_type']); ?></td>
                                            <td><?php echo($member['expiry_date']); ?></td>
                                            <td><a href="modify_member.php?id=<?php echo $member['member_id']?>"><span class='fa fa-edit'></a>
                                            <a href="delete_member.php?id=<?php echo $member['member_id']?>"><span class='fa fa-trash'></a></td>

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
