<?php
include('config.php');

$id = $name = $description = $price = $category = '';

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $menu_item_id = trim($_GET["id"]);
    $sql = "SELECT * FROM menu_items WHERE id = '$menu_item_id'";  
    $result = mysqli_query($conn, $sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $name = $row["name"];
        $description = $row["description"];
        $price = $row["price"];
        $category = $row["category"];
    } else{
        $error_array[] = "Record can not be found by given ID = '$menu_item_id'";
        session_start();
        $_SESSION['errors'] = $error_array;
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Menu Item</title>
  <link rel="stylesheet" href="nav.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="formnav.css">
  <style>
    p {
      width: 100%;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container" style="height: 70vh;">
    <a href="index.php" class="btn">Return to Menu</a>
    <h2 style="display: flex; justify-content: center;" class="mt-20">Menu Item Details</h2>
    <div>
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Description:</strong> <?php echo $description; ?></p>
      <p><strong>Price:</strong> <?php echo $price; ?> INR</p>
      <p><strong>Category:</strong> <?php echo $category; ?></p>
    </div>
  </div>
</body>
</html>
