<?php
session_start();
$results = isset($_SESSION['search_results']) ? $_SESSION['search_results'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel = "stylesheet" href="../style/booking.css">
  <title>HopStop - Booking Results</title>
</head>
<body>
  <header>
    <div class="container nav-container">
      <div class="logo">
        <div class="logo-circle"></div>
        <span><b>HopStop</b></span>
      </div>
      <nav>
        <ul class="nav-links">
          <li><a href="User.php">Home</a></li>
          <li><a href="About.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>

      <div class="user-profile" id="profileButton">
        <i class="fas fa-user-circle"></i>
      </div>

      <div class="profile-dropdown" id="profileDropdown">
        <div class="dropdown-item">Profile</div>
        <div class="dropdown-item">Logout</div>
      </div>
    </div>
    <script src="../js/Userlogout.js"></script>
  </header>

  <div class="header-container">
    <img src="../images/Homepage_image1.png" alt="Bus Interior" class="header-image" />
  </div>
  <div class="search-box">
    <h2>From → To travel location</h2>
  </div>

  <div class="user-container">
    <div id="trips-container">
      <?php
      if ($results && is_array($results)) {
          echo "<h2 class='trip'>Available Tickets:</h2>";
          foreach ($results as $Bus) {
              echo "<div class='trip-card'>";
              echo "<div class='trip-details'>";
              echo "<p class='trip-id'>Bus: " . htmlspecialchars($Bus['bus_template_number']) . "</p>";
              echo "<p class='trip-route'>Route: " . htmlspecialchars($Bus['location']) . " → " . htmlspecialchars($Bus['destination']) . "</p>";
              echo "<p class='trip-time'>Departure: " . htmlspecialchars($Bus['departure_time']) . "</p>";
              echo "<p class='trip-time'>Arrival: " . htmlspecialchars($Bus['arrival_time']) . "</p>";
              echo "<p class='trip-price'>Price: PHP " . htmlspecialchars($Bus['price']) . "</p>";
              echo "</div>";
              echo '<button class="book-button" onclick="window.location.href=\'User_account_book_details.php?bus_template_number=' . htmlspecialchars($Bus['bus_template_number']) . '\';">Book now</button>';
              echo "</div>";
          }
      } else {
          echo "<p>No tickets available for this route.</p>";
      }
      ?>
    </div>
  </div>
</body>
</html>
