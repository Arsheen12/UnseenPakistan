<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require('../connections.php');

if(isset($_SESSION['admin'])){
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:login_data.php');
        exit();
    }

    // Handle the reply action if the reply ID is set
    $replyid = isset($_GET['reply']) ? intval($_GET['reply']) : null;

    if(!$replyid) {
        echo 'Invalid Reply ID';
        exit();
    }

    if(isset($_POST['send'])){
        // Fetch the posted data
        $subject = $_POST['sub'];
        $msg = $_POST['reply'];

        // Load Composer's autoloader
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/SMTP.php';
        require 'PHPMailer/PHPMailer.php';

        $mail = new PHPMailer(true);

        try {
            // Fetch user's email from the feedback table based on the reply ID
            $query = "SELECT user_feedback.Id, user_feedback.Name, user_feedback.Email FROM user_feedback WHERE Id='$replyid'";
            $execute = mysqli_query($connect, $query);
            $fetch = mysqli_fetch_assoc($execute);
            if (!$fetch) {
                throw new Exception('No feedback found for the provided ID.');
            }

            $userEmail = $fetch['Email'];
            $userName = $fetch['Name'];

            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'arsheen.khan2009@gmail.com'; // Your SMTP username
            $mail->Password = 'uwir hjmk iezx yozp'; // Your SMTP password (consider using app-specific password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('arsheen.khan2009@gmail.com', 'UnseenPakistan');
            $mail->addAddress($userEmail, $userName); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $msg;

            $mail->send();
            $_SESSION['message'] = "Message has been sent successfully";
            $_SESSION['message_type'] = "success"; // Bootstrap alert-success class for success messages
        } catch (Exception $e) {
            $_SESSION['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $_SESSION['message_type'] = "danger"; // Bootstrap alert-danger class for errors
        }
    }
} else {
    header('location:authentication-login.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unseen Pakistan</title>
    <link rel="icon" href="../image/icon.png">
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="assets/css/index1.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical">
        <?php require('components/sidebar.php'); ?>
        <div class="body-wrapper">
            <?php require('components/navbar.php'); ?>
            <div class="container-fluid">
                <div class="row"> 
                  
                    <!-- Ensure the form action retains the reply ID -->
                    <form action="userfeedback_reply.php?reply=<?php echo htmlspecialchars($replyid); ?>" method="post">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo htmlspecialchars($_SESSION['message_type']); ?> alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars($_SESSION['message']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); // Clear the message after displaying ?>
                    <?php endif; ?>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($replyid); ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" class="form-control" name="sub" required/>
                        </div>
                        
                        <div class="mb-3">
                            <label for="reply" class="form-label">Reply</label>
                            <textarea id="reply" class="form-control" name="reply" rows="3" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary buttons" name="send">Submit</button>
                    </form>
                </div>
            </div>
            <?php require('components/footer.php'); ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>
