<?php
// gallery.php - Display image gallery for CRC
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery - CRC</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .gallery-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 15px;
      padding: 20px;
      background: #f9f9f9;
    }
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .gallery-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      transition: transform 0.3s ease, filter 0.3s ease;
    }
    .gallery-item:hover img {
      transform: scale(1.05);
      filter: brightness(0.85);
    }
    .gallery-caption {
      position: absolute;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      width: 100%;
      padding: 10px;
      font-size: 0.95rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <h1>Gallery</h1>
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
    <div class="gallery-container">
      <?php
      $sql = "SELECT image_url, caption FROM gallery ORDER BY uploaded_at DESC";
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="gallery-item">';
          echo '<img src="images/gallery/' . htmlspecialchars($row['image_url']) . '" alt="Gallery Image">';
          echo '<div class="gallery-caption">' . htmlspecialchars($row['caption']) . '</div>';
          echo '</div>';
        }
      } else {
        echo '<p style="text-align:center">No images uploaded yet. Check back soon!</p>';
      }
      ?>
    </div>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
  </footer>
</body>
</html>
