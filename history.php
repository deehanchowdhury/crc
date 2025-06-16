<?php
// history.php - History page for CRC
require_once 'db.php'; // Connect to the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our History - CRC</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Our History</h1>
        <nav>
            <button class="menu-toggle">☰</button>
            <ul class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php" class="active">Our History</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="scholars.php">Scholars</a></li>
                <li><a href="notices.php">Notices</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        $query = "SELECT section_title, section_content FROM history ORDER BY id ASC";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<section class="history-section">';
                echo '<img src="images/sample-cultural.jpg" alt="Cultural image" class="section-image">';
                echo '<div class="section-text">';
                echo '<h2>' . htmlspecialchars($row['section_title']) . '</h2>';
                echo '<p>' . nl2br(htmlspecialchars($row['section_content'])) . '</p>';
                echo '</div>';
                echo '</section>';
            }
        } else {
            echo '<section><p>No historical data available.</p></section>';
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
    </footer>
</body>
</html>
