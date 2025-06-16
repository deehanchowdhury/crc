<?php
require_once 'db.php';

$name = $email = $subject = $message = "";
$successMsg = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errorMsg = "Please fill out all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message, sent_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            $successMsg = "Thank you for contacting us! We will get back to you soon.";
            // Clear form fields after successful submission
            $name = $email = $subject = $message = "";
        } else {
            $errorMsg = "Error saving your message. Please try again later.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us - CRC</title>
  <link rel="stylesheet" href="style.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
  <style>
    /* keep your existing styles here, or link your style.css */
    /* ... same as your previous styles ... */
    body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #f5f7fa;
  margin: 0;
  padding: 0;
}
header {
  background: #003366;
  color: white;
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}
header h1 {
  margin: 0;
  font-weight: 700;
  font-size: 1.5rem;
}
nav {
  margin-top: 0.5rem;
}
nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap;
}
nav ul li {
  margin: 0 1rem;
}
nav ul li a {
  color: white;
  text-decoration: none;
  font-weight: 600;
}
nav ul li a.active,
nav ul li a:hover {
  text-decoration: underline;
}
main {
  max-width: 900px;
  margin: 2rem auto;
  padding: 0 1rem;
  background: white;
  border-radius: 10px;
  box-shadow: 0 8px 16px rgb(0 0 0 / 0.1);
}
h2 {
  text-align: center;
  color: #003366;
  margin-bottom: 1.5rem;
}
.contact-info {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 1.5rem;
  margin-bottom: 2rem;
  font-size: 1.1rem;
  color: #222;
}
.info-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  flex: 1 1 250px;
  background: #e1ecf4;
  border-radius: 8px;
  padding: 1rem;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
  transition: background 0.3s ease;
}
.info-item i {
  font-size: 1.5rem;
  color: #003366;
}
.info-item:hover {
  background: #c2d4f8;
}
form {
  max-width: 600px;
  margin: 0 auto 2rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
form label {
  font-weight: 600;
  color: #003366;
}
form input,
form textarea {
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  font-family: inherit;
  resize: vertical;
  transition: border-color 0.3s ease;
}
form input:focus,
form textarea:focus {
  border-color: #003366;
  outline: none;
}
form button {
  padding: 0.75rem;
  background: #003366;
  border: none;
  color: white;
  font-weight: 700;
  font-size: 1.1rem;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s ease;
}
form button:hover {
  background: #002244;
}
@media (max-width: 600px) {
  nav ul {
    flex-direction: column;
    gap: 0.8rem;
  }
  nav ul li {
    margin: 0;
  }
  .contact-info {
    flex-direction: column;
  }
}

  </style>
</head>
<body>
  <header>
    <h1>CRC - Cultural Research Centre</h1>
    <nav>
      <button class="menu-toggle"><i class="fa fa-bars"></i></button>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="history.php">Our History</a></li>
        <li><a href="members.php">Members</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="awarded_scholars.php">Awarded Scholars</a></li>
        <li><a href="notices.php">Notices</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Contact Us</h2>

    <div class="contact-info">
      <div class="info-item">
        <i class="fa-solid fa-location-dot"></i>
        <span>123 Cultural Research Lane, Dhaka, Bangladesh</span>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-envelope"></i>
        <span>info@crc.org.bd</span>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-phone"></i>
        <span>+880 1234 567890</span>
      </div>
    </div>

    <?php if ($successMsg): ?>
      <p style="color: green; font-weight: bold; text-align:center; margin-bottom: 1rem;"><?= htmlspecialchars($successMsg) ?></p>
    <?php elseif ($errorMsg): ?>
      <p style="color: red; font-weight: bold; text-align:center; margin-bottom: 1rem;"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form action="" method="POST" onsubmit="return validateForm();">
      <label for="name"><i class="fa-solid fa-user"></i> Name</label>
      <input type="text" id="name" name="name" required placeholder="Your full name" value="<?= htmlspecialchars($name) ?>" />

      <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
      <input type="email" id="email" name="email" required placeholder="Your email address" value="<?= htmlspecialchars($email) ?>" />

      <label for="subject"><i class="fa-solid fa-tag"></i> Subject</label>
      <input type="text" id="subject" name="subject" required placeholder="Subject of your message" value="<?= htmlspecialchars($subject) ?>" />

      <label for="message"><i class="fa-solid fa-comment"></i> Message</label>
      <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."><?= htmlspecialchars($message) ?></textarea>

      <button type="submit"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
    </form>
  </main>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> Cultural Research Centre. All rights reserved.</p>
  </footer>

  <script>
    // Responsive menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');
    menuToggle.addEventListener('click', () => {
      navList.classList.toggle('active');
    });

    // Simple client-side validation
    function validateForm() {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const subject = document.getElementById('subject').value.trim();
      const message = document.getElementById('message').value.trim();

      if (!name || !email || !subject || !message) {
        alert('Please fill out all fields.');
        return false;
      }

      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/i;
      if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return false;
      }

      return true; // allow form submission
    }
  </script>
</body>
</html>
