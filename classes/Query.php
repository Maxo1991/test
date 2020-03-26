<?php

class Query{
    private $_connection;

    public function __construct(){
        $this->_connection = Database::getInstance();
    }

//    Get All Users
    public function getUsers(){
        $query = "SELECT id, name FROM users";
        $getUsers = $this->_connection->select($query);
        return $getUsers;
    }

//    Get Products for index page(Only 9)
    public function getProducts($start_from, $limit){
        $query = "SELECT id, name, description, image FROM products LIMIT $start_from, $limit ";
        $getProduct = $this->_connection->select($query);
        return $getProduct;
    }

//    Get All Products
    public function getNumberProducts(){
        $query = "SELECT * FROM products";
        $getNumberProduct = $this->_connection->select($query);
        return $getNumberProduct;
    }

//    Get Product by ID
    public function getProduct($id){
        $query = "SELECT * FROM products WHERE id = $id";
        $getProduct = $this->_connection->select($query);
        return $getProduct;
    }

//    Admin insert Product
    public function insertNewProduct($post){
        $name = mysqli_real_escape_string($this->_connection->link, $post['product_name']);
        $description = mysqli_real_escape_string($this->_connection->link, $post['product_description']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $uploaded_image = __DIR__ . "/../images/".$image;
        move_uploaded_file($image_tmp, $uploaded_image);

        $query = "INSERT INTO products(name, description, image) VALUES ('$name', '$description', '$image')";
        $insert = $this->_connection->insert($query);
    }

//    Admin delete product
    public function deleteProductById($id){
        $query1 = "SELECT image FROM products WHERE id = '$id'";
        $getImage = $this->_connection->select($query1);
        if($getImage) {
            while ($delImage = $getImage->fetch_assoc()) {
                $delLink = $delImage['image'];
                unlink(__DIR__ . "/../images/".$delLink);
            }
        }

        $query = "DELETE FROM products WHERE id = '$id'";
        $delPost = $this->_connection->delete($query);
    }

//    Admin can edit product
    public function updateProduct($post, $id, $file){
        $name = mysqli_real_escape_string($this->_connection->link, $post['product_name']);
        $description = mysqli_real_escape_string($this->_connection->link, $post['product_description']);
        $image = $file['image']['name'];
        $image_tmp = $file['image']['tmp_name'];

        move_uploaded_file($image_tmp, __DIR__."/../../test/images/".$image);

        $query = "UPDATE products SET id = '$id', name = '$name', description = '$description', image = '$image' WHERE id = '$id'";
        $update = $this->_connection->update($query);
    }

//    List all allowed comments
    public function getCommentsAllowed(){
        $query = "SELECT id, username, email, comment FROM comments WHERE is_allow = 1 ORDER BY id DESC";
        $getComments = $this->_connection->select($query);
        return $getComments;
    }

//    Insert commment
    public function insertComment($post){
        $username = mysqli_real_escape_string($this->_connection->link, $post['username']);
        $email = mysqli_real_escape_string($this->_connection->link, $post['email']);
        $comment = mysqli_real_escape_string($this->_connection->link, $post['comment-area']);

        $query = "INSERT INTO comments(username, email, comment, is_allow) VALUES ('$username', '$email', '$comment', 0)";
        $insert = $this->_connection->insert($query);
    }

//    Admin view all not allowed comments
    public function getCommentsNotAllowed(){
        $query = "SELECT id, username, email, comment FROM comments WHERE is_allow = 0";
        $getComments = $this->_connection->select($query);
        return $getComments;
    }

//    Admin use for delete comment
    public function deleteCommentById($id){
        $query = "DELETE FROM comments WHERE id = '$id'";
        $deleteComment = $this->_connection->delete($query);
    }

//    Admin use for accept comment
    public function allowCommentById($id){
        $query = "UPDATE comments SET is_allow = 1 WHERE id = '$id'";
        $update =  $this->_connection->update($query);
    }
}