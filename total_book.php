<?php
// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total number of bookings
$sql = "SELECT COUNT(*) AS total_bookings FROM registrations";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalBookings = $row['total_bookings']; // Total number of bookings

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Total Bookings</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background-color: #f4f7fc; color: #333; display: flex; min-height: 100vh; }

    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      text-align: center;
      font-size: 24px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 12px;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
      margin: 8px 0;
      transition: all 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
      padding-left: 15px;
    }

    .main {
      flex: 1;
      padding: 40px;
      background-color: #ffffff;
      overflow-y: auto;
    }

    .main h1 {
      margin-bottom: 30px;
      font-size: 28px;
      color: #2c3e50;
    }

    .total-bookings {
      margin-bottom: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #28a745;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2>Admin Panel</h2>
  <a href="#"><i class="fa-solid fa-house"></i> Dashboard</a>
  <a href="#"><i class="fa-solid fa-list"></i> Category</a>
  <a href="#"><i class="fa-solid fa-handshake"></i> Manage Sponsors</a>

  <div class="dropdown">
    <a href="#"><i class="fa-solid fa-calendar-days"></i> Events <i class="fa-solid fa-caret-down" style="float: right;"></i></a>
    <div class="dropdown-content">
      <a href="create_event.php">Create Event</a>
      <a href="#">Manage Events</a>
    </div>
  </div>

  <a href="#"><i class="fa-solid fa-users"></i> Manage Users</a>
  <a href="#"><i class="fa-solid fa-envelope"></i> Manage Subscribers</a>
  <a href="#"><i class="fa-solid fa-book-open"></i> Manage Bookings</a>
  
</div>

<!-- Main content -->
<div class="main">
  <h1>Total Bookings</h1>
  
  <!-- Display Total Bookings -->
  <div class="total-bookings">
    Total Number of Bookings: <?php echo $totalBookings; ?>
  </div>
  
</div>

</body>
</html>

<?php $conn->close(); ?> 
