<?php include "include/config.php"; ?>
<?php 
  //print_r($_POST);
  //Update Book
if(isset($_POST['submit'])){
   $sql = "update book set title='".$_POST['title']."', author='".$_POST['author']."', price=".$_POST['price']." , pub_year=".$_POST['pub_year']."  where id =".$_POST['id']."  ";
   $result = mysqli_query($conn, $sql);
   if($result){
    echo "Record Updated...";
   header("location: book_list.php");
   } 
}
?>


<?php
//Get Book by ID
$id ="";
$title="";
$author ="";
$price="";
$pub_year ="";

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
if($action == 'update'){
    $result = mysqli_query($conn,"select * from book where id = ".$id);
    $row = mysqli_fetch_assoc($result);
     if(isset($row)){
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $pub_year = $row['pub_year'];
    }
}else if($action == 'delete'){
    $result = mysqli_query($conn,"delete from book where id = ".$id);    
}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD - Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Book Shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>

              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    
    <div class="container my-5">
        <h1>Edit Book</h1>
        <form method="post" action="book_edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>" placeholder="Enter Book Title">
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author"  value="<?php echo $author; ?>" placeholder="Enter Book Author">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price"  value="<?php echo $price; ?>" placeholder="Enter Book Price">
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" name="pub_year" id="pub_year"  value="<?php echo $pub_year; ?>" placeholder="Enter Book Year">
          </div>
          
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
</body>
</html>