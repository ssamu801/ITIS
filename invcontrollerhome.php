<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']))
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Owner Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo"> <!-- Logo -->
                <a href="<?php echo "ownerhome.php"; ?>" class="nav-link">
                    <span class="link-text">Restoran</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item"> <!-- Input Stock Purchased -->
                <a href="<?php echo "stockpurchased.php"; ?>" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                </svg>
                    <span class="link-text">Input Stocks Purchased</span>
                </a>
            </li>
            <li class="nav-item"> <!-- Input Manual Stock Count -->
                <a href="<?php echo "manstockcount.php"; ?>" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 64H288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM64 416c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM192 256a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM288 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64z"/>
                </svg>
                    <span class="link-text">Input Manual Stock Count</span>
                </a>
            </li>
            <li class="nav-item"> <!-- View Stock -->
                <a href="viewstock.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path d="M0 488V171.3c0-26.2 15.9-49.7 40.2-59.4L308.1 4.8c7.6-3.1 16.1-3.1 23.8 0L599.8 111.9c24.3 9.7 40.2 33.3 40.2 59.4V488c0 13.3-10.7 24-24 24H568c-13.3 0-24-10.7-24-24V224c0-17.7-14.3-32-32-32H128c-17.7 0-32 14.3-32 32V488c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zm488 24l-336 0c-13.3 0-24-10.7-24-24V432H512l0 56c0 13.3-10.7 24-24 24zM128 400V336H512v64H128zm0-96V224H512l0 80H128z"/>
                </svg>
                    <span class="link-text">View Stock</span>
                </a>
            </li>
            <li class="nav-item"> <!-- Logout -->
                <a href="logout.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                </svg>
                    <span class="link-text">Log Out
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <main>
                <div class="notifications">
                    <h2>Notifications</h2>
                    <ul>
                        <li>Tomato Sauce Out of Stock Tomato Sauce Out of Stock Tomato Sauce Out of Stock Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                    </ul>
                </div>
            <div class="restocklog">
            <h2> Restock Logs </h2>
                <div class="table">
                    <ul class="name">
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                    </ul>
                    <ul class="date">
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                    </ul>
                    <ul class="date">
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                    </ul>         
                </div>
            </div>
    </main>
    </body>
    </html>

<?php
}

else{
    header("Location: index.php");
    exit();
}
?>