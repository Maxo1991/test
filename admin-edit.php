<?php
include 'functions.php';
include 'templates/header.php';
if(!isset($_SESSION['id'])){
    die(header("location: index.php"));
}
$db = Database::getInstance();

$proba = new Query();

$updatedProduct = $_GET["updateProduct"];
if(isset($updatedProduct)){
     $getData = $proba->getProduct($updatedProduct);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($updatedProduct)) {
    while ($result = $getData->fetch_object()) {
        $id = $result->id;
        $name = $result->name;
        $description = $result->description;
        $image = $result->image;
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $getData = $proba->updateProduct($_POST, $id, $_FILES);
}
?>
        <div id="edit-product">
            <form id="admin-edit-product" action="#" method="POST" enctype="multipart/form-data" style="text-align: center;">
                <h3 align="center">Edit product</h3>
                <input type="text" name="product_name" class="form-control" placeholder="<?= $name; ?>">
                <br>
                <textarea name="product_description" rows="4" cols="50" placeholder="<?= $description; ?>"></textarea><br>
                Select image to upload:
                <input type="file" name="image" id="fileToUpload"><br>
                <img src="/test/images/<?= $image; ?>" width="60" height="60" alt="Image">
                <br>
                <input type="submit" value="Edit product" name="submit" class="btn btn-primary" style="width: 30%;">
            </form>
        </div>
<?php
include 'templates/footer.php';
?>