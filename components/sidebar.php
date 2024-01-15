<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidebar</title>

    <link rel="stylesheet" href="../styles/sidebar.css">
    <script src="https://kit.fontawesome.com/f5b71e78d1.js" crossorigin="anonymous"></script>
</head>


<body>
<div class="sidebar">
    <div class="logo">
    <a href="" id="logo_link">
       <header><i class="fa-solid fa-leaf" style="color: #00a3d7;"></i>EcoHarbor</header>
    </a>
    </div>
    <div class="content">
        <ul>
            <li><a href="" id="create_link"><i class="fa-solid fa-circle-plus"></i>Create Record</a></li>
            <li><a href="" id="display_link"><i class="fa-solid fa-eye"></i>Display Records</a></li>
            <li><a href="" id="update_link"><i class="fa-solid fa-pen-to-square"></i>Update Records</a></li>
            <li><a href="" id="delete_link"><i class="fa-solid fa-trash"></i>Delete Records</a></li>
            <li><a href="" id="execute_link"><i class="fa-solid fa-person-running"></i>Execute Query</a></li>
            <li><a href="" id="about_link"><i class="fa-solid fa-address-card"></i>About</a></li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let url = window.location.href;
        let create_link = document.getElementById('create_link');
        let display_link = document.getElementById('display_link');
        let update_link = document.getElementById('update_link');
        let delete_link = document.getElementById('delete_link');
        let about_link = document.getElementById('about_link');
        let logo_link = document.getElementById('logo_link');
        let execute_link = document.getElementById('execute_link');

        if (url.includes('pages')) {
            create_link.href = 'add.php';
            display_link.href = 'display.php';
            update_link.href = 'update.php';
            delete_link.href = 'delete.php';
            about_link.href = 'about.php';
            logo_link.href = '../index.php';
            execute_link.href = 'execute.php';
        } else {
            create_link.href = 'pages/add.php';
            display_link.href = 'pages/display.php';
            update_link.href = 'pages/update.php';
            delete_link.href = 'pages/delete.php';
            about_link.href = 'pages/about.php';
            logo_link.href = 'index.php';
            execute_link.href = 'pages/execute.php';
        }
    }, false);
</script>
</body>
</html>