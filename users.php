<?php include_once "header.php";
include_once "sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="adduser.html" class="link"><button type="button" class="btn bg-gradient-secondary btn-lg">Add user</button></a><br><br>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select * from users where id!=".$_SESSION['user_id'];
                                        $query = mysqli_query($link,$sql) or die(mysqli_error($link));

                                        if(mysqli_num_rows($query) > 0){
                                            $index=1;
                                              while($data = mysqli_fetch_assoc($query)){?>
                                                  <tr>
                                                      <td><?php echo $index++?></td>
                                                      <td><?php echo $data['first_name'].' '.$data['last_name']?></td>
                                                      <td><?php echo "Standard User"?></td>
                                                      <td><?php echo $data['email']?></td>
                                                  </tr>
                                        <?php  }
                                        }else{ ?>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <a href="#" class="link"><button type="button" class="btn bg-gradient-secondary btn-sm" >Print</button></a>

                    </div>
                    <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

<?php include_once "footer.php"?>
