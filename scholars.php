<?php
// awarded_scholars.php - Show list of awarded scholars
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Awarded Scholars - CRC</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header>
    <h1>Awarded Scholars</h1>
    <nav>
      <button class="menu-toggle"><i class="fa fa-bars"></i></button>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="history.php">Our History</a></li>
        <li><a href="members.php">Members</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="awarded_scholars.php" class="active">Awarded Scholars</a></li>
        <li><a href="notices.php">Notices</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="scholar-list">
      <?php
      $query = "SELECT name, expertise_area, profile_picture, work_summary, publications FROM scholars ORDER BY name ASC";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="scholar-card">';
          echo '<img src="images/scholars/' . htmlspecialchars($row['profile_picture']) . '" alt="' . htmlspecialchars($row['name']) . '">';
          echo '<div class="scholar-info">';
          echo '<h3><i class="fa-solid fa-user"></i> ' . htmlspecialchars($row['name']) . '</h3>';
          echo '<p><i class="fa-solid fa-book"></i> Expertise: ' . htmlspecialchars($row['expertise_area']) . '</p>';
          echo '<p>' . htmlspecialchars($row['work_summary']) . '</p>';
          echo '<p><strong>Publications:</strong><br>' . nl2br(htmlspecialchars($row['publications'])) . '</p>';
          echo '</div></div>';
        }
      } else {
        echo '<p>No scholars found.</p>';
      }
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
  </footer>
</body>
</html>
