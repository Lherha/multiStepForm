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
        <?php
        if (isset($_SESSION['email'])) {
          echo '<li><a href="logout.php">Logout</a></li>';
        } else {
          echo '<li><a href="login.php">Login</a></li>';
        }
      ?>
      </ul>
    </nav>
  </header>

 
<h1 class="text-center text-warning mt-5">Welcome
        <?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>
    </h1>
  
  <main>
    <section class="post">
      <h2>New Blog Post Title</h2>
      <p>Posted on: August 10, 2023</p>
</br>
      <p>We offer a platform where customers in any part of Nigeria can find and shop for all they need in one online store and that platform is the MyDealZone.</p>
    </section>
  </main>
  <p class="services">Our Services</p>
  <div class="what_offer">
                <section class="what">
                    <h2>What we do</h2><br/>
                    <img class="about" src="images/contact.jpg" width="200" height="200"/>
                    <p><a href="#">Nunc fringilla diam sit amet adipi scing bibendum turpis velit feugiat urna etlort pharetra neque nisi ac nunc.</a></p>
                    <br/>
                    <p><span4>Vivamus est quam dapibus ullamcolot rperolty hoki. Hibh ullamcorper accufogy msan sem lectus ut sapien. Donecjoilih venenatis posuere eli a convallis.
                        Praesent quis orci eget diam viverra consequat. Fusce sagittis quam in pulvinar sollicitudin velit velit cursus nibh ullamcorper accumsan sem lectus ut sapien. 
                        Donec venenatis posuere velit aty convallis neque ullamcorper quis. Integer posuere ipsum eu risus sollicitudin nec varius eratylo luctus. 
                        Fusce fringilla erat ac urna pe llentesque congue. Nunc fringilla diam sit amet adipi scing bibendum turpis velit feugiat urna et pharetra neque nisi ac nunc. 
                        Vivamus est quam dapibuslok. ..ullamco rper imperdiet nec euismod ut arcu. Nulla facilisi. Etiam mauris lorem pulvinar vel con sequat ut pretium ac erat. 
                        Morbi facilisis elit eu nisl blandit ac blandit enim faucibu.</span4>
                    </p>
                    <br/>
                   <a href="#"><button>More</button></a>
                </section>
                <br/><br/>

                <section class="offer">
                    <h2>What we offer</h2> <br/>
            
                <section>
                    <span7>
                    <div class="flexible1">
                        <div>
                            <p>1</p>
                        </div>
                    </div>
                    <div class="text_right10">
                    <p><a href="#">Huis posuere consectetur pellent</a></p>
                    <br/><br/>
                    <p><span4>Eed nisi turpis pellentesque at ultriceso in dapibus in magna. Nunc easi diamyu risulacerat ut scelerisque et suscipit.</span4></p></div></span7>
                    <br/>
                </section>
            
                <section>
                    <span7>
                <div class="flexible2">
                    <div>
                        <p>2</p>
                    </div>
                </div>
                    <div class="text_right10">
                <p><a href="#">Luuis posuere consectetur pellente</a></p><br/><br/>
                    <p><span4>Ged nisi turpis pellentesque at ultricesyt in dapibus in magna. Ounc easi diamyu risulacerat ut scelerisque et suscipi.</span4></p></div></span7>
                    <br/>
                </section>
            
                    <section>
                        <span7>
                            <div class="flexible3">
                            <div>
                                <p>3</p>
                            </div>
                        </div>
                        <div class="text_right10">
                  <p><a href="#">Opuis posuere honsectetur pellentes</a></p><br/><br/>
                  <p><span4>Koed nisi turpis, pellentesque at ultrkoty ices in dapibus in magna. Aunc easigoli diam risujo placerat ut scelerisque.</span4></p></div></span7>
                </section>
                    </section>
            </div>

  
</br>
  
  <footer>
  <p>&copy; 2023-<?php echo date("Y"); ?> Lherha. All rights reserved.</p>
  </footer>
</body>
</html>
