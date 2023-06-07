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
            <li class="nav-item"> <!-- View Stock -->
                <a href="viewstock.php" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M9 13H15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M3 6.5C3 6.03534 3 5.80302 3.03843 5.60982C3.19624 4.81644 3.81644 4.19624 4.60982 4.03843C4.80302 4 5.03534 4 5.5 4H12H18.5C18.9647 4 19.197 4 19.3902 4.03843C20.1836 4.19624 20.8038 4.81644 20.9616 5.60982C21 5.80302 21 6.03534 21 6.5V6.5V6.5C21 6.96466 21 7.19698 20.9616 7.39018C20.8038 8.18356 20.1836 8.80376 19.3902 8.96157C19.197 9 18.9647 9 18.5 9H12H5.5C5.03534 9 4.80302 9 4.60982 8.96157C3.81644 8.80376 3.19624 8.18356 3.03843 7.39018C3 7.19698 3 6.96466 3 6.5V6.5V6.5Z" stroke="#000000" stroke-width="2" stroke-linejoin="round"></path>
                    <path d="M4 9V15.9999C4 17.8856 4 18.8284 4.58579 19.4142C5.17157 19.9999 6.11438 19.9999 8 19.9999H9H15H16C17.8856 19.9999 18.8284 19.9999 19.4142 19.4142C20 18.8284 20 17.8856 20 15.9999V9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
                </svg>
                    <span class="link-text">View Stock</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="ownerhome.php" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier"> 
                    <g id="User / User_02"> 
                        <path id="Vector" d="M20 21C20 18.2386 16.4183 16 12 16C7.58172 16 4 18.2386 4 21M12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path> 
                    </g>
                </g>
                </svg>
                    <span class="link-text">Manage Employees
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="ownerhome.php" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier"> 
                    <g id="User / User_02"> 
                        <path id="Vector" d="M20 21C20 18.2386 16.4183 16 12 16C7.58172 16 4 18.2386 4 21M12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path> 
                    </g>
                </g>
                </svg>
                    <span class="link-text">View Sales
                    </span>
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
                <div class="msales">
                <h2> Monthly Sales </h2>
                <h3>39,700</h3>
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