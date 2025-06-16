<?php
// events.php - Events page for CRC
require_once 'db.php'; // Connect to database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - CRC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script.js" defer></script>
    <style>
        .event-filters {
            text-align: center;
            margin: 20px 0;
        }
        .event-filters button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #003366;
            color: white;
            cursor: pointer;
        }
        .event-filters button:hover {
            background-color: #005599;
        }
        .register-button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .register-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>Our Events</h1>
        <nav>
            <button class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php">Our History</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="events.php" class="active">Events</a></li>
                <li><a href="scholars.php">Scholars</a></li>
                <li><a href="notices.php">Notices</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="events-section">
            <h2>Upcoming and Past Events</h2>
            <div class="event-filters">
                <button onclick="filterEvents('upcoming')"><i class="fa fa-forward"></i> Upcoming Events</button>
                <button onclick="filterEvents('past')"><i class="fa fa-history"></i> Past Events</button>
                <button onclick="filterEvents('all')"><i class="fa fa-list"></i> All Events</button>
            </div>

            <div class="event-list">
                <?php
                $query = "SELECT title, description, event_date, location, image FROM events ORDER BY event_date DESC";
                $result = mysqli_query($conn, $query);

                $today = date('Y-m-d');

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $eventDate = $row['event_date'];
                        $eventType = ($eventDate >= $today) ? 'upcoming' : 'past';

                        echo '<div class="event-card" data-event-type="' . $eventType . '">';
                        echo '<img src="images/events/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                        echo '<div class="event-content">';
                        echo '<h3><i class="fa-solid fa-calendar-days"></i> ' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p class="event-date"><i class="fa-regular fa-clock"></i> ' . date('F j, Y', strtotime($row['event_date'])) . '</p>';
                        echo '<p class="event-location"><i class="fa-solid fa-location-dot"></i> ' . htmlspecialchars($row['location']) . '</p>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        if ($eventType === 'upcoming') {
                            echo '<a href="#" class="register-button"><i class="fa fa-pen"></i> Register Now</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No events found at this time.</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cultural Research Centre. All rights reserved.</p>
    </footer>

    <script>
    function filterEvents(type) {
        const cards = document.querySelectorAll('.event-card');
        cards.forEach(card => {
            if (type === 'all' || card.getAttribute('data-event-type') === type) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    </script>
</body>
</html>
