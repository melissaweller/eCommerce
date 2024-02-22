<!DOCTYPE html>
<html>
<head>
  <style>
    .sidenav {position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              overflow-x: hidden;
              margin-left: 20px;
    }
    .sidenav a {padding: 6px 6px 6px 32px;
                display: block;
    }
    .main {margin-left: 35 0px; 
          margin-top: 60px;
    }
  </style>
</head>

  <body>
    <div class="sidenav">
      <h1>Read Message log page</h1>
      <a href="">Landing Page</a>
      <a href="about_us.php">About Us</a>
      <a href="#">Contact Us</a>
      <a href="#">See the messages we get</a>
    </div>

    <div class="main">
      <h2>Contact Us - messages sent</h2>
      <?php
        foreach ($messages as $message) {
          $messageData = json_decode($message, true);
          echo "<p>Email: " . $messageData['email'] . "</p>";
          echo "<p>Message: " . $messageData['message'] . "</p>";
          echo "<p>IP: " . $messageData['IP'] . "</p><hr>";
        }
      ?>
    </div>
  </body>
</html> 