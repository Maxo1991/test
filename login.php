<?php
include 'templates/header.php';
?>
<?php
if(count($_POST)>0) {
    $con = mysqli_connect('localhost','root','Drv0B0nsa123','test') or die('Unable To connect');
    $result = mysqli_query($con,"SELECT * FROM users WHERE name ='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."' and is_admin = 1");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["is_admin"] = $row['is_admin'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if(isset($_SESSION["id"])) {
    header("Location:admin-home.php");
}
?>
    <div id="login">
        <form name="login-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" align="center">
            <h3 align="center">Login form</h3>
            Name:<br>
            <input type="text" name="user_name" class="form-control">
            <br>
            Password:<br>
            <input type="password" name="password" class="form-control">
            <br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width: 250px;">
        </form>
    </div>
<?php
include 'templates/footer.php';
?>