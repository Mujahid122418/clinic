<?php
error_reporting(0);
include_once "database.php";
session_start();
$cmd = $_REQUEST['cmd'];

switch ($cmd){
    case"login":{
        $sql = "select * from users where email='".$_REQUEST['email']."' and password='".$_REQUEST['password']."'";
        $query = mysqli_query($link,$sql);
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['user_id']=$data['id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name']=$data['last_name'];
            $_SESSION['type']= $data['type'];
            header("location: dashboard.php");
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! Not Valid credentials please try again</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    break;
    case"register":{
        if($_REQUEST['password'] == $_REQUEST['confirm_password']){
            $sql = "select * from users where email='".$_REQUEST['email']."'";
            $query = mysqli_query($link,$sql);
            if(mysqli_num_rows($query) == 0) {
                $sql = "insert into users
                            (
                                first_name,
                                last_name,
                                email,
                                password
                            )
                            values 
                            (
                                '".$_REQUEST['first_name']."',
                                '".$_REQUEST['last_name']."',
                                '".$_REQUEST['email']."',
                                '".$_REQUEST['password']."'
                            )";
                $query = mysqli_query($link,$sql);
                if($query){
                    $_SESSION['message']='<div class="alert alert-success">Success! Sign up is completed</div>';
                    header("location: index.php");
                }
            }else{
                $_SESSION['message']='<div class="alert alert-danger">Failed! Email already registered</div>';
                header("location: ".$_SERVER['HTTP_REFERER']);
            }
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! password not matching</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    break;
    case"add_medicine":{
        $sql = "insert into medicine
                                    (
                                        name,
                                        type,
                                        deases,
                                        description,
                                        expiry_date,
                                        price,
                                        user_id
                                    )
                                    values
                                    (
                                        '".$_REQUEST['name']."',
                                        '".$_REQUEST['type']."',
                                        '".$_REQUEST['deases']."',
                                        '".$_REQUEST['description']."',
                                        '".$_REQUEST['expiry_date']."',
                                        '".$_REQUEST['price']."',
                                        '".$_SESSION['user_id']."'
                                    )";
        $query = mysqli_query($link,$sql) or die(mysqli_error($link));
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Medicine added successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in adding medicine</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    break;
    case"delete_medicine":{
        $sql = "delete from medicine where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql);
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Medicine deleted successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in deleting medicine</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    break;
    case"edit_medicine":{
        $sql = "select * from medicine where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql);
        if($query){
            $data =mysqli_fetch_assoc($query);
            ?>
                <form action="server.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="<?php echo $data['name']?>" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" class="form-control" value="<?php echo $data['type']?>"  name="type" required>
                    </div>

                    <div class="form-group">
                        <label for="">Deases</label>
                        <input type="text" class="form-control"  value="<?php echo $data['deases']?>" name="deases" required>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" value="<?php echo $data['description']?>" name="description" required>
                    </div>

                    <div class="form-group">
                        <label for="">Expiry Date</label>
                        <input type="text" class="form-control" value="<?php echo $data['expiry_date']?>" name="expiry_date" required>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" value="<?php echo $data['price']?>" name="price" required>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cmd" value="update_medicine">
                        <input type="hidden" name="id" value="<?php echo $data['id']?>">
                        <input type="submit" value="Update" class="btn btn-success">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
    <?php    }
    }
    break;
    case"update_medicine":{
        $sql = "update medicine set
                            name='".$_REQUEST['name']."',
                            type='".$_REQUEST['type']."',
                            deases='".$_REQUEST['deases']."',
                            description='".$_REQUEST['description']."',
                            expiry_date='".$_REQUEST['expiry_date']."',
                            price='".$_REQUEST['price']."'
                            where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql);
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Medicine update successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in updating medicine</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    break;
    case"add_patient":{
        $sql = "insert into patients
                                    (
                                        name,
                                        deases,
                                        blood_group,
                                        age,
                                        contact,
                                        user_id
                                    )
                                    values
                                    (
                                        '".$_REQUEST['name']."',
                                        '".$_REQUEST['deases']."',
                                        '".$_REQUEST['blood_group']."',
                                        '".$_REQUEST['age']."',
                                        '".$_REQUEST['contact']."',
                                        '".$_SESSION['user_id']."'
                                    )";
        $query = mysqli_query($link,$sql) or die(mysqli_error($link));
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Patient added successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in adding patient</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
        break;
    case"edit_patient":
    {
        $sql = "select * from patients where id=" . $_REQUEST['id'];
        $query = mysqli_query($link, $sql);
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            ?>
            <form action="server.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="name" required>
                </div>

                <div class="form-group">
                    <label for="">Deases</label>
                    <input type="text" class="form-control" value="<?php echo $data['deases'] ?>" name="deases" required>
                </div>

                <div class="form-group">
                    <label for="">Blood Group</label>
                    <input type="text" class="form-control" value="<?php echo $data['blood_group'] ?>" name="blood_group"
                           required>
                </div>

                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" class="form-control" value="<?php echo $data['age'] ?>" name="age"
                           required>
                </div>

                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" class="form-control" value="<?php echo $data['contact'] ?>" name="contact"
                           required>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cmd" value="update_patient">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="submit" value="Update" class="btn btn-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
            <?php
        }
    }
    break;
    case"delete_patient":{
        $sql = "delete from patients where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql);
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Patient deleted successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in deleting patient</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }break;
    case"update_patient":{
        $sql = "update patients set
                            name='".$_REQUEST['name']."',
                            deases='".$_REQUEST['deases']."',
                            blood_group='".$_REQUEST['blood_group']."',
                            age='".$_REQUEST['age']."',
                            contact='".$_REQUEST['contact']."'
                            where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql) or die(mysqli_error($link));
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Patient  update successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in updating patient</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
        break;
    case"add_doctor":{
        $sql = "insert into doctors
                                    (
                                        name,
                                        qualification,
                                        specialization,
                                        age,
                                        contact,
                                        salary
                                    )
                                    values
                                    (
                                        '".$_REQUEST['name']."',
                                        '".$_REQUEST['qualification']."',
                                        '".$_REQUEST['specialization']."',
                                        '".$_REQUEST['age']."',
                                        '".$_REQUEST['contact']."',
                                        '".$_REQUEST['salary']."'
                                    )";
        $query = mysqli_query($link,$sql) or die(mysqli_error($link));
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Doctor added successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in adding doctor</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
        break;
    case"edit_doctor":
        {
            $sql = "select * from doctors where id=" . $_REQUEST['id'];
            $query = mysqli_query($link, $sql);
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_assoc($query);
                ?>
                <form action="server.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="">Qualification</label>
                        <input type="text" class="form-control" value="<?php echo $data['qualification'] ?>" name="qualification" required>
                    </div>

                    <div class="form-group">
                        <label for="">Specialization</label>
                        <input type="text" class="form-control" value="<?php echo $data['specialization'] ?>" name="specialization"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="text" class="form-control" value="<?php echo $data['age'] ?>" name="age"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" value="<?php echo $data['contact'] ?>" name="contact"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="">Salary</label>
                        <input type="text" class="form-control" value="<?php echo $data['salary'] ?>" name="salary"
                               required>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cmd" value="update_doctor">
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <input type="submit" value="Update" class="btn btn-success">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
                <?php
            }
        }
        break;
    case"delete_doctor":{
        $sql = "delete from doctors where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql);
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Doctor deleted successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in deleting doctor</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }break;
    case"update_doctor":{
        $sql = "update doctors set
                            name='".$_REQUEST['name']."',
                            qualification='".$_REQUEST['qualification']."',
                            specialization='".$_REQUEST['specialization']."',
                            age='".$_REQUEST['age']."',
                            contact='".$_REQUEST['contact']."',
                            salary='".$_REQUEST['salary']."'
                            where id=".$_REQUEST['id'];
        $query = mysqli_query($link,$sql) or die(mysqli_error($link));
        if($query){
            $_SESSION['message']='<div class="alert alert-success">Success! Doctor  update successfully</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['message']='<div class="alert alert-danger">Failed! An error occured in updating patient</div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }
        break;
    case"logout":{
        unset($_SESSION['user_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['type']);
        $_SESSION['message'] = '<div class="alert alert-success">Success! You are successfully logged out </div>';
        header("location: index.php");
    }

}