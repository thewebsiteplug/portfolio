<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['name'])) {
        $nameError = 'Name is empty';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $emailError = 'Email is empty';
    } else {
        $email = $_POST['email'];

        // Validating the email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Invalid email';
        }
    }

    if (empty($_POST['message'])) {
        $messageError = 'Message is empty';
    } else {
        $message = $_POST['message'];
    }


    if (empty($nameError) && empty($emailError) && empty($messageError)) {
        $date = date('j, F Y h:i A');

        $emailBody = "
                <html>
                <head>
                    <title>$email is contacting you</title>
                </head>
                <body style=\"background-color: #fafafa;\">
                    <div style=\"padding: 20px; background-color: #3c3744;\">
                        <p style=\"font-size: 16px; color: #fcf7f8;\">Date: $date</p>
                        <p style=\"font-size: 16px; color: #fcf7f8;\">Name: $name</p>
                        <p style=\"font-size: 16px; color: #fcf7f8;\">Email: $email</p>
                        <p style=\"font-size: 16px; color: #fcf7f8;\">Message: $message</p>
                    </div>
                </body>
                </html>
            ";

        $headers = 'From: thewebsiteplug.co.uk Contact Form' . "\r\n" . "Reply-To: $email" . "\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=iso-8859-1\r\n";

        $recipient = "benthomas1621@gmail.com";
        $subject = "Form Submission from TheWebsitePlug";

        if (mail($recipient, $subject, $emailBody, $headers)) {
            $sent = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e757b4fe59.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>thewebsiteplug</title>
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <div class="logo">
                        <h1>TheWebsitePlug</h1>
                    </div>
                </a>
            </div>
            <div class="col-md-7 offset-md-2">
                <ul class="navbar">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Me</a></li>
                    <li><a href="#">My Work</a></li>
                    <li><a href="#">Contact Me</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid hero">
        <div class="row">
            <div class="col-md-6">
                <img src="images/wolf-background.jpg" class="img-fluid" alt="Placeholder">
            </div>
            <div class="col-md-6">
                <div class="intro">
                <h1>Hi I'm <span class="gold">Ben</span></h1>
                <h2>I design and build <span class="gold">websites</span></h2>
                <div class="scroll-down"></div>
                <h3>Scroll Down</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container about">
        <div class="row">
            <div class="col-md-12">
                <div class="profile">
                    <h3>Let me introduce <span class="gold">myself</span></h3>
                    <p>Hi, my name is Ben. I’m an experienced Web Developer with just over 3 experience within
                        the industry. I am currently working as a freelance agent, offering my services for
                        website development. I use a range of development tools to aid in my workflow, as well
                        as project management tools to keep track of my progress.</p>
                    <p>Through my time working as a Web Developer I have chosen to specialise more in the
                        front-end development side. However, I have taken a dive into the back-end experimenting
                        with Magento 2 (E-Commerce Platform) and Laravel (PHP framework). Specialising in
                        front-end development I am able to build responsive and functional, professional
                        websites. Whether it be a one-page or 5 page complex design, with my problem solving
                        abilities and creative mind each challenge I’m able to deliver projects in a set
                        timeframe.</p>
                    <a href="#" class="btn">View My CV</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container work">
        <div class="row">
            <div class="col-md-4">
                <a href="https://twp-form.netlify.app" target="_blank">
                    <div class="item">
                        <img src="images/signup-form-mockup.png" alt="Sign Up Form Mockup" class="img-fluid">
                        <span>Responsive Signup Form</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container contact">
        <div class="row">
            <div class="col-md-12">
                <div class="form">
                    <h3>Get In <span class="gold">Touch</span></h3>
                    <?php if (isset($nameError) || isset($emailError) || isset($messageError)) : ?>
                        <div id="error-message">
                            <p><?= isset($nameError) ? $nameError . '<br>' : '' ?></p>
                            <p><?= isset($emailError) ? $emailError . '<br>' : '' ?></p>
                            <p><?= isset($messageError) ? $messageError . '<br>' : '' ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($sent) && $sent === true) : ?>
                        <div id="success-message">
                            <p>Your message has been sent</p>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="index.php#contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control js-input" />
                                <label class="label" for="name">Name</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control js-input" />
                                <label class="label" for="email">Email</label>
                            </div>
                            <div class="form-group message col-md-12">
                                <textarea name="message" class="form-control js-input"></textarea>
                                <label class="label" for="message">Message</label>
                            </div>
                            <div class="form-group send col-md-12">
                                <button type="submit" class="btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</html>