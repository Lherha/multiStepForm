<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <title>Lherha</title>
</head>
<body>
<?php
  if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> ' . $_SESSION['success_message'] . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    unset($_SESSION['success_message']);
  }
?>
  <header>
    <h1>Lherha</h1>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

 
<h1 class="text-center text-warning mt-5">Welcome
        <?php echo $_SESSION['email']; ?>
    </h1>
  
  <main>
    <section class="post">
      <h2>New Blog Post Title</h2>
      <p>Posted on: August 9, 2023</p>
      <p>We offer a platform where customers in any part of Nigeria can find and shop for all they need in one online store and that platform is the MyDealZone.</p>
    </section>
  </main>

  <div class="container">
    <a href="logout.php" class="btn btn-primary mt-5">Logout</a>
    </div>
</br>
  
  <footer>
    <p>&copy; 2023 Lherha. All rights reserved.</p>
  </footer>
</body>
</html>
