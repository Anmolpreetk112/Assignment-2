<!DOCTYPE html>
<html>
<head>
  <title>Make a Reservation - Amritsar Haveli</title>
  <link rel="stylesheet" href="formnav.css">
  
</head>
<body>
  <?php include 'nav.php'; ?>
  <div class="container">
    <div class="reservation-form">
      <form action="#" method="post">
      
        <label for="fname"><b>First Name:</b></label>
        <input type="text" id="name" name="name" required >
        <label for="lname"><b>Last name:</b></label>
        <input type="text" id="lname" name="lname" required>

        <label for="email"><b>Email:</b></label>
        <input type="email" id="email" name="email" required>
        <label for="phone"><b>Phone:</b></label>
        <input type="phone" id="phone" name="phone" required>
        <label for="date"><b>Date:</b></label>
        <input type="date" id="date" name="date" required>
        <label for="time"><b>Time:</b></label>
        <input type="time" id="time" name="time" required>
        <label for="quantity"><b>Numer of Guests:</b></label>
        <input type="number" id="quantity" name="quantity" min="1" max="50">

        </select>
        <label for="special-requests"><b>Special Requests:</b></label>
        <textarea id="special-requests" name="special-requests" rows="4"></textarea>
        <input type="submit" value="Make Reservation">
      </form>
    </div>
  </div>
 
  
</body>
</html>
