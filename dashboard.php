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
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

<!--

            add dashboard content here
-->

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

<?php
include_once "footer.php"
?>
        <script>
            function delete_medicine(id){
                if(confirm("Are you sure you want to delete this medicine?")){
                    window.location = 'server.php?cmd=delete_medicine&id='+id;
                }
            }
            function edit_medicine(id) {
                let data = 'fcmd=edit_medicine&id='+id;
                $.post('server.php',data,function (response) {
                    $("#edit_medicine_modal").html(response)
                })
            }
        </script>



