<?php
include 'db.php';
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
        <li><a href="#what_offer">About Us</a></li>
        <li><a href="#recommend_services">Services</a></li>
        <li><a href="#contacts">Contact Us</a></li>
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

    <?php
    $sql = "Select * from `posts` WHERE post_name='hero_section'";
    $result=mysqli_query($conn,$sql);
    if($result){
    while ($row = mysqli_fetch_assoc($result)) {
        $post_date = $row['post_date'];
        $post_title = $row['post_title'];
        $post_content = $row['post_content'];
    }}
    ?>

<div class="banner">
 
<h1 class="text-center text-warning">Welcome
        <?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>
    </h1>
    
  <main>
    <section class="post">
      <h2><?php echo $post_title; ?></h2>
      <p><?php echo $post_date; ?></p>
</br>
      <p><?php echo $post_content; ?></p>

    </section>
  </main>
  </div>
  
    <?php
    $sql = "Select * from `posts` WHERE post_name='about_us1'";
    $result=mysqli_query($conn,$sql);
    if($result){
    while ($row = mysqli_fetch_assoc($result)) {
    $post_title = $row['post_title'];
    $post_content = $row['post_content'];
    }}
    ?>

  <div class="what_offer" id="what_offer">
                <section class="what">
                <p class="services" id="services">About Us</p>
                    <h2>What we do</h2><br/>
                    <img class="about" src="images/contact.jpg" width="200" height="200"/>
                    <p><a href="#what_offer"><?php echo $post_title; ?></a></p>
                    <br/>
                    <p><span4><?php echo $post_content; ?></span4>
                    </p>
                    <br/>
                   <a href="#what_offer"><button>More</button></a>
                </section>
                <br/><br/>

                <section class="offer">
                    <h2>What we offer</h2> <br/>
            
                <section>

                <?php
                $sql = "Select * from `posts` WHERE post_name='flexible1'";
                $result=mysqli_query($conn,$sql);
                if($result){
                while ($row = mysqli_fetch_assoc($result)) {
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                }}
                ?>
                    <span7>
                    <div class="flexible1">
                        <div>
                            <p>1</p>
                        </div>
                    </div>
                    <div class="text_right10">
                    <p><a href="#"><?php echo $post_title; ?></a></p>
                    <br/><br/>
                    <p><span4><?php echo $post_content; ?></span4></p></div></span7>
                    <br/>
                </section>
            
                <section>

                <?php
                $sql = "Select * from `posts` WHERE post_name='flexible2'";
                $result=mysqli_query($conn,$sql);
                if($result){
                while ($row = mysqli_fetch_assoc($result)) {
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                }}
                ?>

                    <span7>
                <div class="flexible2">
                    <div>
                        <p>2</p>
                    </div>
                </div>
                    <div class="text_right10">
                <p><a href="#"></a><?php echo $post_title; ?></p><br/><br/>
                    <p><span4><?php echo $post_content; ?></span4></p></div></span7>
                    <br/>
                </section>
            
                    <section>

                <?php
                $sql = "Select * from `posts` WHERE post_name='flexible1'";
                $result=mysqli_query($conn,$sql);
                if($result){
                while ($row = mysqli_fetch_assoc($result)) {
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                }}
                ?>
                        <span7>
                            <div class="flexible3">
                            <div>
                                <p>3</p>
                            </div>
                        </div>
                        <div class="text_right10">
                  <p><a href="#"><?php echo $post_title; ?></a></p><br/><br/>
                  <p><span4><?php echo $post_content; ?></span4></p></div></span7>
                </section>
                    </section>

                    
            </div>

            <section class="staff">
                <h3>Our Staff</h3>
                <div class="staff_gallery">

                    <section class="mark">

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='staff1'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <img src="images/mark.jpg" width="140" height="100"/>
                        <div class="staff_mark">
                            <h4><a href="contacts.html"><?php echo $post_title; ?></a></h4>
                            <p><span4><?php echo $post_content; ?></span4></p>
                        </div>
                    </section>

                    <section class="kelly">

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='staff2'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <img src="images/kelly.jpg" width="140" height="100"/>
                        <div class="staff_mark">
                            <h4><a href="contacts.html"><?php echo $post_title; ?></a></h4>
                            <p><span4><?php echo $post_content; ?></span4></p>
                        </div>
                    </section>


                    <section class="ann">

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='staff3'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <img src="images/ann.jpg" width="140" height="100"/>
                        <div class="staff_mark">
                            <h4><a href="contacts.html"><?php echo $post_title; ?></a></h4>
                            <p><span4><?php echo $post_content; ?></span4></p>
                        </div>
                    </section>
                    </section>



                    <div class="recommend_services" id="recommend_services">

                <section class="recommended">

                <section>
                    <h2>We Recommend</h2>
                    <img class="services2" src="images/pic4.jpg" width="200" height="200" alt="a cat"/>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='recommend1'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                    <p><a href="#recommend_services"><?php echo $post_title; ?></a></p>
                    <br/>
                    <p><span4><?php echo $post_content; ?></span4></p>
                        <br/>
                        <a href="#recommend_services"><button>More</button></a>
                </section>

                <br/><br/><br/><br/>
                <section>
                    <img class="services2" src="images/pic5.jpg" width="200" height="200" alt="a dog"/>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='recommend2'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>
                
                    <p><a href="#recommend_services"><?php echo $post_title; ?></a></p>
                    <br/>
                    <p><span4><?php echo $post_content; ?></span4></p>
                        <br/>
                        <a href="#recommend_services"><button>More</button></a>
                </section>

            </section>
                <br/><br/>

                <section class="main_services">
                    <h2>Main Services</h2> <br/>

                    <section>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='service1'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <span8>
                        <div class="flexible1">
                            <div>
                                <p>1</p>
                            </div>
                        </div>
                        <div class="text_right10">
                        <p><a href="#recommend_services"><?php echo $post_title; ?></a></p>
                        <br/><br/>
                        <p><span4><?php echo $post_content; ?></span4></p></div></span8>
                        <br/>
                    </section>
                
                    <section>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='service2'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <span8>
                    <div class="flexible2">
                        <div>
                            <p>2</p>
                        </div>
                    </div>
                        <div class="text_right10">
                    <p><a href="#recommend_services"><?php echo $post_title; ?></a></p><br/>
                        <p><span4><?php echo $post_content; ?></span4></p></div></span8>
                        <br/>
                    </section>
                
                        <section>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='service3'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                            <span8>
                                <div class="flexible3">
                                <div>
                                    <p>3</p>
                                </div>
                            </div>
                            <div class="text_right10">
                      <p><a href="#recommend_services"><?php echo $post_title; ?></a></p><br/>
                      <p><span4><?php echo $post_content; ?></span4></p></div></span8><br/>
                    </section>

                    <section>

                    <?php
                    $sql = "Select * from `posts` WHERE post_name='service4'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>

                        <span8>
                    <div class="flexible2">
                        <div>
                            <p>4</p>
                        </div>
                    </div>
                        <div class="text_right10">
                    <p><a href="#recommend_services"><?php echo $post_title; ?></a></p><br/>
                        <p><span4><?php echo $post_content; ?></span4></p></div></span8>
                        <br/>
                    </section>

                    <section>
                    <?php
                    $sql = "Select * from `posts` WHERE post_name='service5'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>
                        <span8>
                            <div class="flexible3">
                            <div>
                                <p>5</p>
                            </div>
                        </div>
                        <div class="text_right10">
                  <p><a href="#recommend_services"><?php echo $post_title; ?></a></p><br/>
                  <p><span4><?php echo $post_content; ?></span4></p></div></span8>
                </section>

                <section>
                <?php
                    $sql = "Select * from `posts` WHERE post_name='service6'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    }}
                    ?>
                    <span8>
                <div class="flexible2">
                    <div>
                        <p>6</p>
                    </div>
                </div>
                    <div class="text_right10">
                <p><a href="#recommend_services"><?php echo $post_title; ?></a></p><br/>
                    <p><span4><?php echo $post_content; ?></span4></p></div></span8>
                    <br/>
                </section>
                    
                </section>

            </div>

            <div class="contacts" id="contacts">
            <section>
                <h2>Contact Info</h2>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15858.802879244815!2d3.4396305480712903!3d6.43247707635179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssaltingstein!5e0!3m2!1sen!2sng!4v1680535638652!5m2!1sen!2sng" width="470" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p>Lherha Ltd</p>
                <p>17C Moshood Olugbani Street</p>
                <p>Lagos, Nigeria.</p>
                <br/>
                <section class="jams">
                <section class="=jam">
                    <p>Freephone:</p>
                    <p>Telephone:</p>
                    <p>FAX:</p>
                </section>
                <section class="jamss">
                    
    
                    <P>+1 800 559 6580</P>
                    <p>+1 800 603 6035</p>
                    <p>+1 800 889 9898</p>
                </section>
                
            </section>
            </section>
            <br/>


        <section>
            <div class="contact_container">
            <form id="myForm" class="myForm" action="dropMessage.php" method="post">
             <h2>Contact Form</h2>
                <div class="form-control">
                <input id="nameBox" type="text" name="name" size="30" placeholder="Name:"/>
                <small>Error Message</small>
                <div id="cautionIcon"><ion-icon name="backspace"></ion-icon></div>
            </div>
                
            <div class="form-control">
                <input id="eMailBox" type="email" name="email" size="30" placeholder="E-mail:"/>
                <small>Error Message</small>
                <div id="cautionIcon"><ion-icon name="backspace"></ion-icon></div>
            </div> 
                
            <div class="form-control">
                <input id="phoneBox" type="text" name="phone" size="30" placeholder="Phone:"/>
                <small>Error Message</small>
                <div id="cautionIcon"><ion-icon name="backspace"></ion-icon></div>
            </div>
                
            <div class="form-control">
                <textarea id="textBox" name="letter" row="6" cols="60"></textarea>
                <small>Error Message</small>
                <div id="cautionIcon"><ion-icon name="backspace"></ion-icon></div>
            </div>
                

                <button type="submit" class="send">Send</button>

                
        </form>

    </div>
        </section>
            </div>

  <footer>
  <p>&copy; 2023-<?php echo date("Y"); ?> Lherha. All rights reserved.</p>
  </footer>
</body>
</html>
