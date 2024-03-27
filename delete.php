<?php
include('config.php');

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"]) && !empty(trim($_POST["id"]))){
        $id = trim($_POST["id"]);
        $sql = "DELETE FROM menu_items WHERE id = '$id'";
    
        if(mysqli_query($conn, $sql)){
          header('Location: index.php');
        } else {
          $error_array[] = 'query error: '. mysqli_error($conn);
          session_start();
          $_SESSION['errors'] = $error_array;
          header('Location: error.php');
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Menu Item</title>
  <link rel="stylesheet" href="nav.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="formnav.css">
</head>
<body>
  <div class="container">
    <h2>Delete Menu Item</h2>
    <p>Are you sure you want to delete this menu item?</p><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="create-menu-item">
      <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
      <div class="content-right">
        <a href="index.php" class="btn-second">Cancel</a>
        <input type="submit" value="Yes, Delete">
      </div>
    </form>
  </div>
</body>
</html>
