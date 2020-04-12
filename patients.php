<?php
include "header.php";
include_once "sidebar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Patients list</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php
        if($_SESSION['message'] && $_SESSION['message']){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <div class="container-fluid">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add a Patient</button>
            <br><br>
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
                                        <th>Desease</th>
                                        <th>Blood Group</th>
                                        <th>Age</th>
                                        <th>Contact</th>
                                        <th>More</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "select * from patients where user_id=".$_SESSION['user_id'];
                                    $query = mysqli_query($link,$sql);
                                    if(mysqli_num_rows($query) > 0){
                                        $index = 1;
                                        while($data=mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $index++;?></td>
                                                <td><?php echo $data['name']?></td>
                                                <td><?php echo $data['deases']?></td>
                                                <td><?php echo $data['blood_group']?></td>
                                                <td><?php echo $data['age']?></td>
                                                <td><?php echo $data['contact']?></td>
                                                <td>
                                                    <i data-toggle="modal" data-target="#editModal" class="fa fa-edit" style="color: blue;cursor: pointer" onclick="edit_patient('<?php echo $data['id']?>')"></i>
                                                    <i class="fa fa-trash" style="color: red;cursor: pointer" onclick="delete_patient('<?php echo $data['id']?>')"></i>
                                                </td>
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

        <!-- Trigger the modal with a button -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Medicine</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div id="edit_medicine_modal" class="modal-body">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Patient</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="server.php" method="post">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Deases</label>
                                <input type="text" class="form-control" name="deases" required>
                            </div>

                            <div class="form-group">
                                <label for="">Blood Group</label>
                                <input type="text" class="form-control" name="blood_group" required>
                            </div>
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" class="form-control" name="age" required>
                            </div>

                            <div class="form-group">
                                <label for="">Contact</label>
                                <input type="text" class="form-control" name="contact" required>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="cmd" value="add_patient">
                                <input type="submit" class="btn btn-success">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <?php
        include_once "footer.php"
        ?>
        <script>
            function delete_patient(id){
                if(confirm("Are you sure you want to delete this medicine?")){
                    window.location = 'server.php?cmd=delete_patient&id='+id;
                }
            }
            function edit_patient(id) {
                let data = 'cmd=edit_patient&id='+id;
                $.post('server.php',data,function (response) {
                    $("#edit_medicine_modal").html(response)
                })
            }
        </script>



