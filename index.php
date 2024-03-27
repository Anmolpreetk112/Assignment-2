<?php
include('config.php');

$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
$menu_items = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amritsar Haveli Group- Amritsar</title><!--Anmolpreet Kaur-202105761-->
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="formnav.css">
</head>

<body style="width: 100%;">
    <header>
        <div class="home" id="home">
            <img src="anmolimg/Amritsar-PNG.png">
        </div>
        
        <?php include 'nav.php'; ?>
    </header>
    <div id="content">
        <marquee behavior="scroll" direction="down">   
            <center>
                <h2 style="color:darkgoldenrod"><b><i>Welcome to</i></h2><h1 style="color:brown">AMRITSAR<br> HAVELI</b></h1>
            </center>
        </marquee>
    </div>

    <center>
        <div class="menu" id="menu">
            <h2>MENU</h2>
        </div>
    </center>
            
        <div class="breakfast">
            <div class="content-right mt-20">
                <a href="create.php" type="button" class="btn">New MenuItem</a>
            </div>
            <?php if(count($menu_items) == 0){ ?>
                <center>
                    <h2>No Items in the menu</h2>
                    <h4 class="mt-20">Please add items in the menu first</h4>
                </center>
            <?php } else { ?>
                <?php foreach($menu_items as $item) { ?>
                    <div class="row">
                        <div class="menu-item">
                            <div class="card">
                                <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;"><?php echo $item['category']; ?></h3>
                                <ul>
                                    <li><strong>Name:</strong> <?php echo $item['name']; ?></li>
                                    <li><strong>Description:</strong> <?php echo $item['description']; ?></li>
                                    <li><strong>Price:</strong> <?php echo $item['price']; ?></li>
                                </ul>
                                <div class="content-right">
                                    <a class="btn" href="read.php?id=<?php echo $item['id'] ?>">Show</a>
                                    <a class="btn" href="update.php?id=<?php echo $item['id'] ?>">Update</a>
                                    <a class="btn" href="delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="about" id="about">
            <hr style="width:150">
            <h1 class="1" style="color:orange" >OUR STORY</h1>
            <p style="color:white">
                
                
                <img src="anmolimg/IMG_5265.jpg">
                
                Amritsar Haveli Cuisines Pvt. Ltd. is a Traditional Punjabi Restaurant Chain serves Pure Veg under Brand “Amritsar Haveli” and both Veg and Non Veg under Brand “Amritsari Haveli” established in 2018 by entrepreneurs Dr. Rubjeet Singh (Founder & Managing Director) and Mrs. Meeta Baweja (Ceo & Director) to serve delicious and hygienic Best Punjabi Food.
                
                Our aim is “Serve Pure Eat Pure”. We serve freshly prepared food in our kitchens in a Traditional Punjabi way. We have an obsession with high quality, inspired by the Punjabi culture & food. We believe in the pleasure of taste, that’s why freshness and best ingredients are so important to us. Our experienced chefs have mastered few recipes like Amritsari Special Kulcha, Dal Makhani, Haveli Special Paneer, Sarso Ka Saag with Makki Di Roti, Haveli Chicken Tikka, Butter Chicken, Mutton Rogan Josh, Mutton Nalli Nihari etc, for which we are well known and feel proud for our specialities with 100% customer satisfaction.
                
                Our team works hard for maintaining quality and consistency with a mindset of cooking with love and delivering the Best.
            </p>
            <hr style="width: 150px;">
        </div>
    </div>     
</body>
</html>