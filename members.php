<?php
// members.php - Members page for CRC
require_once 'db.php'; // Connect to database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Members - CRC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Our Members</h1>
        <nav>
            <button class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php">Our History</a></li>
                <li><a href="members.php" class="active">Members</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="scholars.php">Scholars</a></li>
                <li><a href="notices.php">Notices</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="members-section">
            <h2>Executive Board & Members</h2>
            <div class="member-grid">
                <?php
                $query = "SELECT name, designation, bio, photo_url FROM members";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="member-card">';
                        echo '<img src="images/members/' . htmlspecialchars($row['photo_url']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p class="position">' . htmlspecialchars($row['designation']) . '</p>';
                        echo '<p class="bio">' . htmlspecialchars($row['bio']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No members found at this time.</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
    </footer>
</body>
</html>
