<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website interface</title>

    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/sidebar.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php include_once "components/sidebar.php"; ?>
        </div>
        <div class="main-content">

            <h1><i class="fas fa-leaf"></i>EcoHarbor Database</h1>
            <p>Your Gateway to Ecological Knowledge</p>

            <h2>Explore and Contribute to the EcoHarbor Database</h2>

            <p>Welcome to EcoHarbor, where we strive to create a centralized hub for ecological information, fostering collaboration, research, and environmental awareness. Our database is designed to be a comprehensive repository for ecological data, educational resources, and research collaborations.</p>

            <div class="features">
                <div class="feature">
                    <i class="fas fa-database fa-3x"></i>
                    <h3>Centralized Storage</h3>
                    <p>Store and access a vast amount of ecological information in one place.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-globe fa-3x"></i>
                    <h3>Promote Sustainability</h3>
                    <p>Contribute to sustainability and conservation efforts through your data.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-users fa-3x"></i>
                    <h3>Collaborate with Others</h3>
                    <p>Connect with researchers and enthusiasts to collaborate on ecological projects.</p>
                </div>
            </div>
            <p>Curious to know more about us? Check out the <a class="about-link" href="">About Us</a> section!</p>
        </div>
    </div>
</body>
</html>