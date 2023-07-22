<?php if($_SESSION['role'] == "Inventory"): ?>
    <nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo"> <!-- Logo -->
            <a href="<?php echo "invcontrollerhome.php"; ?>" class="nav-link">
                <span class="link-text">Restoran</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/>
                </svg>
            </a>
        </li>
        <li class="nav-item"> <!-- Input Stock Purchased -->
            <a href="<?php echo "stockpurchased.php"; ?>" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1C0.447715 1 0 1.44772 0 2C0 2.55228 0.447715 3 1 3H3.20647L5.98522 14.9089C6.39883 16.6816 7.95486 17.9464 9.76471 17.9983V18H17.5874C19.5362 18 21.2014 16.5956 21.5301 14.6747L22.7857 7.33734C22.9947 6.11571 22.0537 5 20.8143 5H5.72686L4.97384 1.77277C4.86824 1.32018 4.46475 1 4 1H1ZM6.19353 7L7.9329 14.4545C8.14411 15.3596 8.95109 16 9.88058 16H17.5874C18.5618 16 19.3944 15.2978 19.5588 14.3373L20.8143 7H6.19353Z" fill="#000000"></path>
                <path d="M8 23C9.10457 23 10 22.1046 10 21C10 19.8954 9.10457 19 8 19C6.89543 19 6 19.8954 6 21C6 22.1046 6.89543 23 8 23Z" fill="#000000"></path>
                <path d="M19 23C20.1046 23 21 22.1046 21 21C21 19.8954 20.1046 19 19 19C17.8954 19 17 19.8954 17 21C17 22.1046 17.8954 23 19 23Z" fill="#000000"></path>
            </g>
            </svg>
                <span class="link-text">Input Stocks Purchased</span>
            </a>
        </li>
        <li class="nav-item"> <!-- Input Expired Ingredient -->
            <a href="<?php echo "expiredstock.php"; ?>" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                <path d="M416 398.9c58.5-41.1 96-104.1 96-174.9C512 100.3 397.4 0 256 0S0 100.3 0 224c0 70.7 37.5 133.8 96 174.9c0 .4 0 .7 0 1.1v64c0 26.5 21.5 48 48 48h48V464c0-8.8 7.2-16 16-16s16 7.2 16 16v48h64V464c0-8.8 7.2-16 16-16s16 7.2 16 16v48h48c26.5 0 48-21.5 48-48V400c0-.4 0-.7 0-1.1zM96 256a64 64 0 1 1 128 0A64 64 0 1 1 96 256zm256-64a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                <span class="link-text">Input Expired Ingredient</span>
            </a>
        </li>
        <li class="nav-item"> <!-- Input Manual Stock Count -->
            <a href="<?php echo "manstockcount.php"; ?>" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier"> <path d="M9 7H15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M15 17V14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M15 11H15.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 11H12.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9 11H9.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9 14H9.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 14H12.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 17H12.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9 17H9.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M5 7C5 5.11438 5 4.17157 5.58579 3.58579C6.17157 3 7.11438 3 9 3H12H15C16.8856 3 17.8284 3 18.4142 3.58579C19 4.17157 19 5.11438 19 7V12V17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21H12H9C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17V12V7Z" stroke="#000000" stroke-width="2" stroke-linejoin="round"></path> 
                </g>
            </svg>
            <span class="link-text">Input Manual Count</span>
            </a>
        </li>
        <li class="nav-item"> <!-- Input Measurement -->
            <a href="<?php echo "measurement.php"; ?>" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                <path d="M177.9 494.1c-18.7 18.7-49.1 18.7-67.9 0L17.9 401.9c-18.7-18.7-18.7-49.1 0-67.9l50.7-50.7 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 50.7-50.7c18.7-18.7 49.1-18.7 67.9 0l92.1 92.1c18.7 18.7 18.7 49.1 0 67.9L177.9 494.1z"/></svg>
            <span class="link-text">New Measurement</span>
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
        <li class="nav-item"> <!-- Logout -->
            <a href="../logout.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
            </svg>
                <span class="link-text">Log Out
                </span>
            </a>
        </li>
    </ul>
</nav>
<!-- Owner Navbar -->
<?php elseif($_SESSION['role'] == "Owner"): ?>
    <nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo"> <!-- Logo -->
            <a href="ownerhome.php" class="nav-link">
                <span class="link-text">Restoran</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/>
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a href="signup_owner.php" class="nav-link">
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
                <span class="link-text">Create User
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="role_management.php" class="nav-link">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" 
                width="800px" height="800px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
            <path d="M44,63.3c0-3.4,1.1-7.2,2.9-10.2c2.1-3.7,4.5-5.2,6.4-8c3.1-4.6,3.7-11.2,1.7-16.2c-2-5.1-6.7-8.1-12.2-8 
                s-10,3.5-11.7,8.6c-2,5.6-1.1,12.4,3.4,16.6c1.9,1.7,3.6,4.5,2.6,7.1c-0.9,2.5-3.9,3.6-6,4.6c-4.9,2.1-10.7,5.1-11.7,10.9
                c-1,4.7,2.2,9.6,7.4,9.6h21.2c1,0,1.6-1.2,1-2C45.8,72.7,44,68.1,44,63.3z M64,48.3c-8.2,0-15,6.7-15,15s6.7,15,15,15s15-6.7,15-15
                S72.3,48.3,64,48.3z M66.6,64.7c-0.4,0-0.9-0.1-1.2-0.2l-5.7,5.7c-0.4,0.4-0.9,0.5-1.2,0.5c-0.5,0-0.9-0.1-1.2-0.5
                c-0.6-0.6-0.6-1.7,0-2.5l5.7-5.7c-0.1-0.4-0.2-0.7-0.2-1.2c-0.2-2.6,1.9-5,4.5-5c0.4,0,0.9,0.1,1.2,0.2c0.2,0,0.2,0.2,0.1,0.4
                L66,58.9c-0.2,0.1-0.2,0.5,0,0.6l1.7,1.7c0.2,0.2,0.5,0.2,0.7,0l2.5-2.5c0.1-0.1,0.4-0.1,0.4,0.1c0.1,0.4,0.2,0.9,0.2,1.2
                C71.6,62.8,69.4,64.9,66.6,64.7z"/>
            </svg>
                <span class="link-text">Manage Users
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="approvedish.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg>
                <span class="link-text"> Approve Dish
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="approvedisparity.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg>
                <span class="link-text"> Approve Manual Count
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="generatereports.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 36 36">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <rect x="6.48" y="18" width="5.76" height="11.52" rx="1" ry="1"></rect>
                <rect x="15.12" y="6.48" width="5.76" height="23.04" rx="1" ry="1"></rect>
                <rect x="23.76" y="14.16" width="5.76" height="15.36" rx="1" ry="1"></rect>
            </g>
            </svg>
                <span class="link-text"> Generate Reports
                </span>
            </a>
        </li>
        <li class="nav-item"> <!-- Logout -->
            <a href="../logout.php" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier"> <path d="M21 12L13 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path> 
                </g>
            </svg>
                <span class="link-text">Log Out
                </span>
            </a>
        </li>
    </ul>
</nav>
<?php elseif($_SESSION['role'] == "Chef"): ?>
<nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo"> <!-- Logo -->
                <a href="chefhome.php" class="nav-link">
                    <span class="link-text">Restoran</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="addDish.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <span class="link-text">View Recipe</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="addDish.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    <span class="link-text"> New Recipe </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="editDish.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg>
                    <span class="link-text"> Edit Recipe </span>
                </a>
            </li>
            <li class="nav-item"> <!-- Logout -->
                <a href="../logout.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                </svg>
                    <span class="link-text">Log Out
                    </span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>