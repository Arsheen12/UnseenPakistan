<?php
include('connections.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakistan - Unity in Diversity</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Stylesheets -->
    <link rel="icon" href="./image/icon.png">
    <link rel="stylesheet" href="./architectures.css">
    <link rel="stylesheet" href="./cultures.css">
    <link rel="stylesheet" href="gallerys.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="festival.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="./styles.css?v=1.0.1">
    <link rel="stylesheet" href="./navbar.css">
   


    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
        <!-- End -->
</head>

<body>
    <!-- Header Start -->
    <header class="hero">

       
   
<nav class="navbar">
    <div class="logo"><a href="">Unseen Pakistan</a></div>

    <div class="nav-toggle" id="navToggle">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#culture">Culture</a></li>
        <li class="dropdown">
            <a href="#">Architecture</a>
            <ul class="dropdown-menu">
                <li><a href="Architecture_posts/Punjab.php">Punjab</a></li>
                <li><a href="Architecture_posts/Sindh.php">Sindh</a></li>
                <li><a href="Architecture_posts/Balochistan.php">Balochistan</a></li>

                <li><a href="Architecture_posts/Gilgit.php">Gilgit</a></li>
                <li><a href="Architecture_posts/Kpk.php">Kpk</a></li>
                <li><a href="Architecture_posts/Kashmir.php">Kashmir</a></li>
            </ul>
        </li>
        <li><a href="#contact">Contact Us</a></li>
    </ul>
</nav>


        <div class="hero-content">

            <?php
          $sql = "SELECT * FROM header_section";
         $result = mysqli_query($connect, $sql);

           if (mysqli_num_rows($result) > 0) {
           echo '<div class="hero-content">'; 
            while ($row = mysqli_fetch_assoc($result)) {
         ?>

            <h1 class="title"><?= $row['Heading'] ?></h1>
            <p class="subtitle">"<?= $row['Text'] ?>"</p>
            <a href="#architecture" class="cta-button"><?= $row['Btn_text'] ?></a>
         </div>
         <?php
           }
             echo '</div>'; 
                  } else {
                echo "0 results";
               }
               ?>

        <div class="hero-background">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="star star-1"></div>
            <div class="star star-2"></div>
            <div class="star star-3"></div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse"></div>
        </div>

        <div id="top" class="top" onclick="window.scrollTo(0,0)">
            <img src="./image/top.svg" alt="Top">
        </div>

    </header>
    <!-- About section -->
     <section class="about-section" id="about" data-aos="fade-up">
        <h2 class="section-title about-title">About Us</h2>
        <div class="about-container">
           <div class="about-text">
            <h1>Our Passion for Discovery</h1>
            <p>Welcome to <b >Unseen Pakistan</b>, your ultimate guide to discovering the hidden gems of <b>Pakistan</b>! Our mission is to uncover and showcase the rare and breathtaking places in Pakistan that often go unnoticed. From secluded mountain valleys to uncharted coastal paradises, we bring you closer to the beauty and diversity that this incredible country has to offer.

                That's why we focus on off-the-beaten-path destinations, ensuring that our readers can connect with the untouched beauty and rich cultural heritage of <b>Pakistan</b>. 
                Join us as we embark on this adventure to discover Pakistan's rarest and most beautiful places.
                
               <br> <b >Let's explore the unexplored together!</b></p>
             <br>
             <a href="#contact" class="about-btn">Contact Us</a>
            
           </div>
           <div class="about-image">
               <img src="./image/about1.jpg" alt="aboutus" class="about1"/>
               <img src="./image/about2.jpg" alt="aboutus" class="about2" />

           </div>
        </div>
     </section>
    <!-- Architecture Section -->
    <section id="architecture" class="architecture-section">
        <h2 class="section-title">Architecture</h2>
        <div class="architecture-container">
        <?php
                     $sql = "SELECT * FROM architecture_section";
           $result = mysqli_query($connect, $sql);

                  if (mysqli_num_rows($result) > 0) {
                          echo '<div class="architecture-container">'; 
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
             <div class="architecture-card" data-aos="fade-up">
          <div class="architecture-image">
        <img src="<?= $row['Image'] ?>" alt="<?= htmlspecialchars($row['Heading']) ?>">
        <div class="overlay">
            <i class="<?= htmlspecialchars($row['icon']) ?>"></i>
        </div>
              </div>
              <div class="architecture-content">
                <h3><?= htmlspecialchars($row['Heading']) ?></h3>
             <p><?= htmlspecialchars($row['Text']) ?></p>
          <a href="<?= htmlspecialchars($row['Btn_text'])?>" target="_blank" class="learn-more">Learn More
             <i class="fas fa-arrow-right"></i>
            </a>
            </div>
                 
        </div>

                   <?php
            }
            echo '</div>'; 
                   } else {
              echo "0 results";
                  }
                ?>

</div>

        <!-- Heritage section -->
        <div class="architecture-stats">
    <h3>Pakistan's Architectural Heritage</h3>
    <div class="stats-container">
        <?php
        $sql = "SELECT * FROM heritage_section";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="stat-item" data-aos="fade-up">
                    <span class="stat-number"><?= $row['Number'] ?></span>
                    <span class="stat-text"><?= $row['Heading'] ?></span>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    </div> </div>


    </section>

<!-- Gallery Section -->
<h2 class="section-title" data-aos="fade-up" id="gallery">Gallery</h2>

<?php
$query = "SELECT * FROM gallery_section LIMIT 4";
$result = mysqli_query($connect, $query);
?>

<div class="gallery-container" data-aos="fade-up" data-aos-delay="200">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="gallery-item" data-aos="fade-up">       
            <img src="<?php echo $row['Image']; ?>" alt="Gallery Image" class="gallery-image">
        </div>
    <?php } ?>
</div>

<div id="modal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-image">
</div>



    <!-- Culture Section -->
    <section id="culture" class="culture-section">
        <h2 class="section-title" data-aos="fade-up">Culture</h2>

        <div class="culture-grid">
        <?php
$sql = "SELECT * FROM culture";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="culture-grid">'; 
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="culture-item" data-aos="fade-up" data-aos-delay="100">
                <div class="culture-icon">
                    <i class="<?=$row['Icon']?>"></i>
                </div>
                <h3></h3>
                <p><?=$row['Description']?></p>
            </div>
            <?php
                }
    echo '</div>';
} else {
    echo "No Data Stored";
}
?>
        </div>
<!-- Diverse Cultures Section -->
        
        <?php
$sql = "SELECT * FROM diverseculture";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="culture-showcase" data-aos="fade-up" data-aos-delay="500">'; 
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

<div class="culture-image">
<img src="<?php echo $row['Image']; ?>" alt="Culture Showcase Image" >
</div>
    <div class="culture-quote">
        <blockquote>
        <?=$row['culturetext']?>
        </blockquote>
            </div>
        </div>
            <?php
                }
    echo '</div>';
} else {
    echo "No Data Stored";
}
          ?>

        <!-- Regional Culture Section -->
        <?php
$sql = "SELECT * FROM regions";
$result = $connect->query($sql);
$regions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $regions[$row['id']] = $row;
    }
}
?>
<div class="culture-interactive" data-aos="fade-up" data-aos-delay="600">
    <h3>Explore Regional Cultures</h3>
    <div class="region-selector">
        <?php foreach ($regions as $id => $region): ?>
            <button class="region-btn" data-region-id="<?php echo htmlspecialchars($id); ?>">
                <?php echo htmlspecialchars($region['name']); ?>
            </button>
        <?php endforeach; ?>
    </div>
    <div class="region-info-container">
        <div class="region-image">
            <img src="" width="100px" alt="Region Image" id="region-image">
        </div>
        <div class="region-info">
            <h4 id="region-name"></h4>
            <p id="region-description"></p>
            <ul class="region-highlights">
                <li><strong>Capital:</strong> <span id="region-capital"></span></li>
                <li><strong>Famous Landmark:</strong> <span id="region-landmark"></span></li>
                <li><strong>Traditional Dress:</strong> <span id="region-dress"></span></li>
                <li><strong>Popular Festival:</strong> <span id="region-festival"></span></li>
            </ul>
        </div>
    </div>
    <div class="region-facts">
        <h5>Did You Know?</h5>
        <p id="region-fact"></p>
    </div>
</div>
<script type="application/json" id="regions-data">
    <?php echo json_encode($regions); ?>
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const regionsData = JSON.parse(document.getElementById('regions-data').textContent);
    const regionButtons = document.querySelectorAll('.region-btn');
    
    function updateRegionInfo(regionId) {
        const region = regionsData[regionId];
        if (region) {
            document.getElementById('region-image').src = region.image || '';
            document.getElementById('region-name').textContent = region.name || '';
            document.getElementById('region-description').textContent = region.description || '';
            document.getElementById('region-capital').textContent = region.capital || '';
            document.getElementById('region-landmark').textContent = region.landmark || '';
            document.getElementById('region-dress').textContent = region.dress || '';
            document.getElementById('region-festival').textContent = region.festival || '';
            document.getElementById('region-fact').textContent = region.fact || '';
        }
    }

    function handleButtonClick(event) {
        const clickedButton = event.currentTarget;
        const regionId = clickedButton.getAttribute('data-region-id');
        
        regionButtons.forEach(button => button.classList.remove('active'));
        clickedButton.classList.add('active');
        updateRegionInfo(regionId);
    }

    regionButtons.forEach(button => {
        button.addEventListener('click', handleButtonClick);
    });

    if (regionButtons.length > 0) {
        regionButtons[0].click();
    }
});
</script>

       
    </section>
<!-- Contact Us -->
<h2 class="contact-title aos-init aos-animate" id="contact-us">Contact Us</h2>
<section id="contact" class="contact">
<?php
 if(isset($_POST['f_btn'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $query = "INSERT INTO user_feedback(Name,Contact_Number,Email,Feedback)VALUES('$name','$contact','$email','$feedback');";
    $run = mysqli_query($connect,$query);
    if($run){
        ?>
        <script>
            alert('Feedback sended succesfully.');
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Error sending feedback.');
        </script>
        <?php
    }
 }

 ?>

<div class="contact-section"  data-aos="fade-up" data-aos-delay="600">

<div class="contact contact-us">

<div class="contact-image">
  <img src="image/Contact-us.png" alt="">
</div>
<div class="contact-content">
    <form action="index.php" method="post">
       <label for="" class="form-label">Name</label>
     <div class="mb-3">
     <input
    type="text"
    class="form-control"
    name="name"
     />
    </div>
    <label for="" class="form-label">Contact Number</label>
     <div class="mb-3">

               <input
    type="text"
    class="form-control"
    name="contact" value="+92"
/>
  </div>
  <label for="" class="form-label">Email</label>
   <div class="mb-3">

<input
    type="email"
    class="form-control"
    name="email"
/>
    </div>  
    <label for="" class="form-label">Provide your Feedback:</label>
    <div class="mb-3">
  
   <textarea class="form-control" name="feedback" rows="3"></textarea>
  </div>
  <input type="submit" value="Submit"  class="btn btn-primary btn-submit" name="f_btn">
 
</div>
</form>
</div>
</div>
</section>
<br>
<br>


    <!-- Footer Section -->
    <link rel="stylesheet" href="index.css">
<footer class="footer" id="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h3>Unseen Pakistan</h3>
                <p>We are a dynamic duo passionate about Undiscovering <br>
                    Pakistan's best-kept secrets and off-the-beaten-path destinations.</p>
                    <br>
                <div class="contact-info">
                    <a href="mailto:muteebabaloch08@gmail.com">
                        <p><i class="fas fa-envelope"></i>Muteebabaloch08@gmail.com</p>
                        <p><i class="fas fa-envelope"></i>Arsheen.khan2009@gmail.com</p>
                    </a>
                </div>
                <div class="socials">
                <a href="./user/authentication-login.php" > <span class="box">Sign In</span></a>
               <a href="./user/authentication-register.php" > <span class="box">Sign Up</span></a>
                    
                </div>
            </div>

            <div class="footer-section team">
                <h2>Our Team</h2>

                <div class="team-member">
                    <img src="./image/User-Image.png" alt="Muteeba Ijaz">
                    <div class="member-info">
                        <h4>Muteeba Ijaz</h4>
                        <p>Frontend Developer</p>
                       
                    </div>
                </div>

                <div class="team-member">
                    <img src="./image/User-Image.png" alt="Arsheen Khan">
                    <div class="member-info">
                        <h4>Arsheen Khan</h4>
                        <p>Frontend Developer</p>
                        
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 ArsheenMuteeba. All rights reserved.</p>
            <p>Designed with <i class="fas fa-heart"></i> by Muteeba Ijaz and Arsheen Khan</p>
        </div>
    </footer>


    <script src="script.js"></script>
</body>

</html>