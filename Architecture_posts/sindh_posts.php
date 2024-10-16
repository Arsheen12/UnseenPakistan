<?php
include('../connections.php');

if (isset($province_id)) {
    $province_id = $province_id;
} else {
    $province_id = '1';
}

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
    <link rel="stylesheet" href="../festival.css">
    <link rel="stylesheet" href="../architectures.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="../gallerys.css">
    <link rel="stylesheet" href="../about.css">

    <link rel="icon" href="../image/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  
<header class="hero">

       
<?php
require('./components/navbar.php');
?>
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
     <img src="../image/top.svg" alt="Top">
 </div>

</header>
    <!-- User Posts Section -->
    <section id="architecture" class="architecture-section">
        <h2 class="section-title">Users' Posts </h2>
        <div class="architecture-container">
        <?php
        require('../connections.php');
$sql="SELECT user_reg.Name, user_posts.Title, user_posts.Description, user_posts.Image, provinces.Province, user_posts.Posted_Date FROM user_posts INNER JOIN user_reg ON user_posts.User_Id = user_reg.Id INNER JOIN provinces ON user_posts.Province_Id = provinces.Id WHERE provinces.Province = 'Sindh' AND Post_Status='Approved';";
$result = mysqli_query($connect, $sql);    
    while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="architecture-card" data-aos="fade-up">
          <div class="architecture-image">
              <img src="<?php echo htmlspecialchars($row['Image']) ?>" alt="<?php echo htmlspecialchars($row['Title']) ?>">
              <div class="overlay">
              <i class="fa-regular fa-image"></i>
              </div>
          </div>
          <div class="architecture-content">
              <h3><?php echo htmlspecialchars($row['Title']) ?></h3>
              <p><?php echo htmlspecialchars($row['Description']) ?></p>
              <!-- <a href="<?php //echo htmlspecialchars($row['Btn_text']) ?>" target="_blank" class="learn-more">Learn More
                  <i class="fas fa-arrow-right"></i>
              </a> -->
              <hr>
              <h5>Posted By: <?php echo htmlspecialchars($row['Name']) ?></h5>
          </div>
        </div>

        <?php
    }

?>
</div>
    </section>
<br><br>

    <!-- Footer Section -->
    <?php require('./components/footer.php'); ?>

    <script>
        // Initialize AOS
        AOS.init();
    </script>
    <script src="../script.js"></script>
</body>

</html>
