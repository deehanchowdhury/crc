<?php
// index.php - Homepage for CRC
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CRC</title>
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<header>
  <a href="index.php" class="logo-link" title="CRC Home">
    <img src="images/logo.png" alt="CRC Logo" class="logo">
  </a>
  <h1>Welcome to Cultural Research Center (CRC)</h1>
  <nav>
    <button class="menu-toggle"><i class="fa fa-bars"></i></button>
    <ul class="nav-list">
      <li><a href="index.php">Home</a></li>
      <li><a href="history.php">Our History</a></li>
      <li><a href="members.php">Members</a></li>
      <li><a href="events.php">Events</a></li>
      <li><a href="awarded_scholars.php">Awarded Scholars</a></li>
      <li><a href="notices.php">Notices</a></li>
      <li><a href="gallery.php" class="active">Gallery</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>
</header>


    <main>
        <div class="slider">
            <div class="slides">
                <img src="images/slide1.jpg" class="slide" alt="Slide 1">
                <img src="images/slide2.jpeg" class="slide" alt="Slide 2">
                <img src="images/slide3.jpeg" class="slide" alt="Slide 3">
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>

        <section>
            <h2>About CRC</h2>
            <p>The Cultural Research Centre (CRC) is a hub for cultural dialogue, literary advancement, and scholarly excellence.</p>
        </section>

        <section class="upcoming-events">
    <h2>Upcoming Events</h2>
    <?php
    $today = date('Y-m-d');
    $eventQuery = "SELECT title, event_date, description, event_type, location 
                   FROM events 
                   WHERE event_date >= '$today'
                   ORDER BY event_date ASC
                   LIMIT 5";
    $eventResult = mysqli_query($conn, $eventQuery);

    if ($eventResult && mysqli_num_rows($eventResult) > 0) {
        echo '<ul class="event-list">';
        while ($event = mysqli_fetch_assoc($eventResult)) {
            echo '<li class="event-item">';
            echo '<h3><i class="fa-solid fa-calendar-check"></i> ' . htmlspecialchars($event['title']) . '</h3>';
            echo '<div class="event-meta">';
            echo '<span><i class="fa-regular fa-clock"></i> ' . date('F j, Y', strtotime($event['event_date'])) . '</span>';
            echo '<span><i class="fa-solid fa-tag"></i> ' . htmlspecialchars($event['event_type']) . '</span>';
            echo '<span><i class="fa-solid fa-location-dot"></i> ' . htmlspecialchars($event['location']) . '</span>';
            echo '</div>';
            echo '<p>' . htmlspecialchars($event['description']) . '</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No upcoming events at the moment. Please check back later!</p>';
    }
    ?>
</section>
<section class="contact-info">
    <h2>Contact & Location</h2>
    <div class="contact-grid">
        <div class="contact-item">
            <i class="fa-solid fa-location-dot"></i>
            <h3>Our Location</h3>
            <p>CRC Cultural Research Centre,<br>House #15, Road #3, Dhanmondi R/A, Dhaka 1205, Bangladesh</p>
        </div>
        <div class="contact-item">
            <i class="fa-solid fa-envelope"></i>
            <h3>Email</h3>
            <p><a href="mailto:info@crc.org.bd">info@crc.org.bd</a></p>
        </div>
        <div class="contact-item">
            <i class="fa-solid fa-phone"></i>
            <h3>Call Us</h3>
            <p><a href="tel:+880123456789">+880 1234 567 89</a></p>
        </div>
    </div>
</section>
<section class="map-section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.703776149697!2d90.38363531543144!3d23.75638729427352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf579ec7e355%3A0x761b88c52cb9eeec!2sDhanmondi%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1686748653940!5m2!1sen!2sbd"
        width="100%"
        height="300"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>



    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
    </footer>
</body>
</html>
