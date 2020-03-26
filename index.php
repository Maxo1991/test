<?php
include 'functions.php';
include 'templates/header.php';
?>
<?php
$db = Database::getInstance();

$proba = new Query();

$error = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $comment = test_input($_POST['comment-area']);

    if(empty($username)){
        $error .= "<li>Username required</li>";
    }
    if(empty($email)){
        $error .= "<li>Email required</li>";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error .= "<li>Email is not valid.</li>";
    }
    if(empty($comment)){
        $error .= "<li>Comment-area required</li>";
    }
    if(empty($error)){
        $insertComment = $proba->insertComment($_POST);
        echo "<div class=\"alert alert-primary mt-5\" role=\"alert\">
                       Comment inserted.
                </div>";
    }else{
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    }
}
$limit = 9;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
if(empty($page)){
    $page = 1;
}
$start_from = ($page - 1) * $limit;
?>

    <div class="row text-center">

        <?php
        $getProducts = $proba->getProducts($start_from, $limit);
        while($result = $getProducts->fetch_object()) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="images/<?php echo $result->image; ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $result->name; ?></h4>
                        <p class="card-text"><?php echo $result->description; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $numberProducts = $proba->getNumberProducts();
            $lastPage = $numberProducts->num_rows / $limit;
            $lastPage = ceil($lastPage);
            if($page == 1){
            ?>
                <li class="page-item"><a class="page-link disable-links" href="">No Previous</a></li>
            <?php
            }else{
            ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>"><?php echo $page - 1; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
            <?php
            if($page == $lastPage) {
            ?>
            <li class="page-item"><a class="page-link disable-links" href="#">No Next</a></li>
            <?php
            }else {
            ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a></li>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <hr>
    <div class="comments">
        <?php
        $getComments = $proba->getCommentsAllowed();
        ?>
            <h2>Comments(<?= $getComments->num_rows ?>)</h2>
        <?php
        if($getComments){
            if ($getComments->num_rows > 0) {
                while ($result = $getComments->fetch_object()) {
                    ?>
                    <div class="alert alert-primary single-comment" role="alert">
                        <h4><?php echo $result->username; ?></h4>
                        <h6><?php echo $result->email; ?></h6>
                        <p><?php echo $result->comment; ?></p>
                    </div>
                    <?php
                }
                if($getComments->num_rows > 3){
                    ?>
                    <input type="button" name="load-comments" id="more-comments" class="btn btn-primary mb-4" value="More Comments">
                    <?php
                }
            } else {
                echo "Nema komentara";
            }
         }
        ?>
    </div>
    <div class="jumbotron">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail2">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comment</label>
                <textarea class="form-control" name="comment-area" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <input type="submit" value="Send Comment" name="submit" class="btn btn-primary col-lg-12 p-3">
        </form>
    </div>
</div>
<?php
include 'templates/footer.php';
