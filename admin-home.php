<?php
include 'functions.php';
include 'templates/header.php';
if(!isset($_SESSION['id'])){
    die(header("location: index.php"));
}

$db = Database::getInstance();

$proba = new Query();
$error = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $name = test_input($_POST['product_name']);
    $description = test_input($_POST['product_description']);
    $image = $_FILES['image']['name'];
//    var_dump($name, $description, $image);
    if(empty($name)){
        $error .= "<li>Name required</li>";
    }
    if(empty($description)){
        $error .= "<li>Description required</li>";
    }
    if(empty($image)){
        $error .= "<li>Image required</li>";
    }
    if(empty($error)){
        $insertProduct = $proba->insertNewProduct($_POST);
        echo "<div class=\"alert alert-primary mt-5\" role=\"alert\">
                       Product inserted.
                </div>";
    }else{
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    }
}else{

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteComment = $proba->deleteCommentById($id);
}
if(isset($_GET['accept'])){
    $id = $_GET['accept'];
    $acceptComment = $proba->allowCommentById($id);
}
if(isset($_GET['deleteProduct'])){
    $id = $_GET['deleteProduct'];
    $deleteProduct = $proba->deleteProductById($id);
}
?>
<div class="container">
    <div id="list-product">
        <input type="submit" value="Show all product" id="show-list-product" class="btn btn-primary">
        <input type="submit" value="Hidden all product" id="hidden-list-product" class="btn btn-secondary">
        <table id="table-list-products" class="table">
            <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">IMAGE</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $getProducts = $proba->getNumberProducts();
                if($getProducts) {
                    while ($result = $getProducts->fetch_object()) {
                        ?>
                        <tr>
                            <td><?= $result->name; ?></td>
                            <td><?= $result->description ?></td>
                            <td><img src="/test/images/<?= $result->image ?>" alt="" style="height: 50px;"></td>
                            <td><button type="button" class="btn btn-danger"><a href="?deleteProduct=<?= $result->id ?>">DELETE</a></button></td>
                            <td><button type="button" class="btn btn-info"><a href="/test/admin-edit.php?updateProduct=<?= $result->id ?>">EDIT</a></button></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <div id="list-accepted-comments">
        <h3>List comments for accept</h3>
        <?php
         $getNotAllowedComments  = $proba->getCommentsNotAllowed();
         if($getNotAllowedComments == false){
         ?>
             <p>No comments for accept.</p>
         <?php
         }
         if($getNotAllowedComments){
             while($result = $getNotAllowedComments->fetch_object()) {
            ?>
            <div class="alert alert-primary" role="alert">
                <h4><?php echo $result->username; ?></h4>
                <h6><?php echo $result->email; ?></h6>
                <p><?php echo $result->comment; ?></p>
                <button type="button" class="btn btn-success"><a href="?accept=<?= $result->id ?>" style="color: white;">Accept</a></button>
                <button type="button" class="btn btn-danger"><a href="?delete=<?= $result->id ?>" style="color: white;">Danger</a></button>
            </div>
            <?php
            }
        }
        ?>
    </div>
    <div id="create-product">
        <form id="admin-create-product" action="" method="POST" enctype="multipart/form-data" style="text-align: center;">
            <h3 align="center">Create product</h3>
            <input type="text" name="product_name" class="form-control" placeholder="Name of product">
            <br>
            <textarea name="product_description" rows="4" cols="50" placeholder="Description of product"></textarea><br>
            Select image to upload:
            <input type="file" name="image" id="fileToUpload"><br><br>
            <input type="submit" value="Create product" name="submit" class="btn btn-primary" style="width: 30%;">
        </form>
    </div>
</div>
<?php
include 'templates/footer.php';
?>