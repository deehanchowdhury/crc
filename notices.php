<?php
// notices.php - Display upcoming and recent notices
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notices - CRC</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header>
    <h1>Important Notices</h1>
    <nav>
      <button class="menu-toggle"><i class="fa fa-bars"></i></button>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="history.php">Our History</a></li>
        <li><a href="members.php">Members</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="awarded_scholars.php">Awarded Scholars</a></li>
        <li><a href="notices.php" class="active">Notices</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="notice-section">
      <?php
      $sql = "SELECT title, content, event_date, created_at FROM notices ORDER BY event_date DESC";
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="notice-card">';
          echo '<h3><i class="fa-solid fa-bullhorn"></i> ' . htmlspecialchars($row['title']) . '</h3>';
          echo '<p><i class="fa-regular fa-calendar-days"></i> Event Date: ' . htmlspecialchars($row['event_date']) . '</p>';
          echo '<p><i class="fa-regular fa-clock"></i> Posted on: ' . date("F j, Y", strtotime($row['created_at'])) . '</p>';
          echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
          echo '</div>';
        }
      } else {
        echo '<p>No notices found at the moment.</p>';
      }
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
  </footer>
</body>
</html>
