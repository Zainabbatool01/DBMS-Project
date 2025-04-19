<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Inner Page - Hunger Hut Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+92 333 1239 123</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="logo me-auto">
        <h1><a href="index.html">Hunger Hut</a></h1>
      </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a href="#booking">Booking</a></li>
              <li><a href="#chef">Chefs</a></li>
              <li><a href="#contact">Contact Us</a></li>
              <li><a href="#events">Events</a></li>
              <li><a href="#customer">Customers</a></li>
              <li><a href="#payment">Payment</a></li>
              <li><a href="#authentication">Authentication</a></li>
            </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="zainab.html" class="book-a-table-btn scrollto">Main Menu</a>
      <button class="book-a-table-btn scrollto" type="submit" onclick="location.href='logout.php';">Logout</button>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Manage Data</h2>
          <ol>
            <li><a href="zainab.html">Home</a></li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Manage Data Section ======= -->
    <section class="inner-page">
      <div class="container">
        <!-- Table Management Forms -->
        <div class="table-responsive">
          <h3 id="booking">Bookings</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>People</th>
                <th>Message</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM booking";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phone']}</td>
                          <td>{$row['date']}</td>
                          <td>{$row['time']}</td>
                          <td>{$row['people_num']}</td>
                          <td>{$row['message']}</td>
                          <td>
                            <a href='edit_booking.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_booking.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No bookings found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>

          <!--for the table -->
          <h3 id="chef">Chefs</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Image</th>
                <th>Twitter</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Linked</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM chefs";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['specialization']}</td>
                          <td>{$row['image_url']}</td>
                          <td>{$row['twitter_url']}</td>
                          <td>{$row['facebook_url']}</td>
                          <td>{$row['instagram_url']}</td>
                          <td>{$row['linkedin_url']}</td>
                          <td>
                            <a href='edit_chefs.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_chefs.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Chef found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>

          <!-- for table contact us-->
          <h3 id="contact">Contact Us</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Customer ID</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM contact_us";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['subject']}</td>
                          <td>{$row['message']}</td>
                          <td>{$row['customer_id']}</td>
                          <td>
                            <a href='edit_contact.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_contact.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Messages found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>

          <!-- for table customers-->
          <h3 id="customer">Customers</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM customers";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phone']}</td>
                          <td>
                            <a href='edit_customers.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_customers.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Customers Found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>


          <!-- for payment table-->
          <h3 id="payment">Payment</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Payment</th>
                <th>Time</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM payment";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['payment_id']}</td>
                          <td>{$row['customer_id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['payment']}</td>
                          <td>{$row['time']}</td>
                          <td>{$row['date']}</td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Customers Found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>



          <!-- for table events-->
          <h3 id="events">Events</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Party Type</th>
                <th>Price</th>
                <th>Description</th>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM events";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['party_type']}</td>
                          <td>{$row['price']}</td>
                          <td>{$row['description']}</td>
                          <td>
                            <a href='edit_events.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_events.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Events found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>


          <!--for table testimonial-->
             <h3 id="testimonial">Testimonial</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Image URL</th>
                <th>Rating</th>
                <th>Testimonial</th>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM testimonials";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['name']}</td>
                          <td>{$row['designation']}</td>
                          <td>{$row['image_url']}</td>
                          <td>{$row['rating']}</td>
                          <td>{$row['testimonial']}</td>
                          <td>
                            <a href='edit_testimonials.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_testimonials.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Testimonials found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>   
          
          
          <!-- for users-->
           <h3 id="authentication">Authentication</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Username</th>
                <th>Password</th>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connect.php';
              $sql = "SELECT * FROM users";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['username']}</td>
                          <td>{$row['password']}</td>
                        </tr>";
                      
                }
              } else {
                echo "<tr><td colspan='9'>No Testimonials found.</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table><br>   
        </div>

      </div>
    </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Where Every Bite Tells a Story of Pakistan's Flavorful Heritage!</p>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved by Zainab Batool & Members
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
