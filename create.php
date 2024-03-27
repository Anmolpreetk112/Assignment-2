<?php
include('config.php');

$name = $description = $price = $category = '';
$name_err = $description_err = $price_err = $category_err = '';
$error_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $error_array[] = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["description"]))) {
        $error_array[] = "Please enter a description.";
    } else {
        $description = trim($_POST["description"]);
    }

    if (empty(trim($_POST["price"]))) {
        $error_array[] = "Please enter a price.";
    } else {
        $price = trim($_POST["price"]);
    }

    if (empty(trim($_POST["category"]))) {
        $error_array[] = "Please enter a category.";
    } else {
        $category = trim($_POST["category"]);
    }

    if (empty($error_array)) {
        $sql = "INSERT INTO menu_items (name, description, price, category) VALUES ('$name', '$description', '$price', '$category')";

        if(mysqli_query($conn, $sql)){
          header('Location: index.php');
        } else {
          $error_array[] = 'query error: '. mysqli_error($conn);
          session_start();
          $_SESSION['errors'] = $error_array;
          header('Location: error.php');
        }
    } else {
      session_start();
      $_SESSION['errors'] = $error_array;
      header('Location: error.php');
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu Item</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="formnav.css">
</head>
<body>
    <div class="container">
        <h2>Add New Menu Item</h2>
        <form class="create-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span><?php echo $name_err; ?></span>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description"><?php echo $description; ?></textarea>
                <span><?php echo $description_err; ?></span>
            </div>
            <div>
                <label>Price</label>
                <input type="number" name="price" value="<?php echo $price; ?>">
                <span><?php echo $price_err; ?></span>
            </div>
            <div>
                <label>Category</label>
                <input type="text" name="category" value="<?php echo $category; ?>">
                <span><?php echo $category_err; ?></span>
            </div>
            <div class="create-complaint">
                <a type="button" class="btn-secondary" href="index.php">Cancel</a>
                <input type="submit" value="Create">
            </div>
        </form>
    </div>
</body>
</html>
