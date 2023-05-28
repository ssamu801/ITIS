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
                <a href="#" class="nav-link">
                    <span class="link-text">Restoran</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item"> <!-- Input Stock Purchased -->
                <a href="#" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                </svg>
                    <span class="link-text">Input Stocks Purchased</span>
                </a>
            </li>
            <li class="nav-item"> <!-- Input Manual Stock Count -->
                <a href="#" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 64H288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM64 416c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM192 256a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM288 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64z"/>
                </svg>
                    <span class="link-text">Input Manual Stock Count</span>
                </a>
            </li>
            <li class="nav-item"> <!-- View Stock -->
                <a href="#" class="nav-link">
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
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec lectus interdum, faucibus ante commodo, auctor nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed scelerisque tellus sit amet turpis elementum viverra. Vestibulum placerat purus lacus, eget luctus nisi accumsan in. Donec id sapien ut mi consequat vehicula vel eu mi. Nam bibendum nibh dolor, eu porta sem bibendum vel. Vivamus eu sapien ultrices mi accumsan vulputate. Maecenas efficitur facilisis lacus, ac mollis mauris varius non. In non ipsum eget lorem porttitor vestibulum. Nunc dapibus tincidunt elit eget molestie. Curabitur tortor mi, convallis nec maximus ut, pretium ut nulla. Curabitur sed elit nec est condimentum vulputate. Ut iaculis luctus neque, ut euismod libero. Etiam quis elit aliquet, accumsan ante non, varius sapien.

            Vivamus dictum, massa convallis eleifend molestie, magna metus rhoncus purus, eget semper nunc dui at felis. Pellentesque bibendum nec dui at varius. Cras vestibulum faucibus sapien, a efficitur quam ornare eget. Donec massa nibh, egestas in finibus rutrum, tristique eget nunc. Suspendisse sodales lacus vitae libero congue condimentum. Vestibulum et dui ante. Sed at dolor vitae augue finibus dapibus eget iaculis sem. Sed non nisl consequat, bibendum lacus id, ullamcorper velit. Cras tincidunt purus eu lorem rutrum sagittis.

            Donec tempor arcu libero, at dictum sapien ornare vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris nisl leo, porta et nibh sit amet, faucibus rutrum augue. Nullam ornare leo sed lacus finibus, eu auctor nulla venenatis. Nulla vel pulvinar nibh, vitae aliquam felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean feugiat mi lacus, nec laoreet enim blandit sit amet. Praesent hendrerit auctor enim, vitae dapibus justo posuere in. Praesent sagittis ultricies ligula id gravida.

            Sed imperdiet lorem dolor, eget molestie sem maximus viverra. Phasellus dolor augue, gravida sit amet sem vel, consequat dictum dolor. Phasellus fringilla maximus justo ut sodales. In hac habitasse platea dictumst. Sed a rhoncus enim. Fusce eget nisi id ex placerat rhoncus id nec est. Ut mi sem, facilisis at efficitur pharetra, consequat pellentesque mauris. Vivamus erat urna, bibendum eget orci nec, ultricies volutpat metus. Nullam suscipit massa vel lacus finibus, eu semper velit efficitur. Donec ut neque vitae leo porttitor euismod sed ac turpis.

            Cras augue mauris, sollicitudin at consequat ac, consequat tincidunt justo. Ut bibendum leo nec lectus bibendum pretium. Quisque dignissim accumsan turpis ac eleifend. Nullam neque eros, dapibus id condimentum sed, aliquam sit amet quam. Pellentesque lacinia diam quis varius posuere. Nam mollis ipsum eu dui bibendum, ut sagittis justo efficitur. In egestas lectus eu massa ornare tempus. Aliquam quam odio, eleifend eget fermentum quis, gravida sit amet arcu. Pellentesque vehicula ex sapien, sit amet malesuada neque aliquet eget. Etiam dapibus, nisi ut placerat consequat, augue felis volutpat tellus, eget aliquam tellus diam ac urna. Curabitur vel facilisis turpis. Integer interdum, orci et ullamcorper tempor, velit mi ornare enim, eget cursus justo est in orci. Nam dapibus aliquet turpis, quis molestie tellus egestas vel. Nam pulvinar vitae lectus sed vestibulum. Nulla nec dolor non arcu mollis tristique. Mauris faucibus maximus erat nec convallis.

            Ut pharetra vulputate mauris nec dignissim. Donec laoreet faucibus ex molestie ultrices. Ut id sagittis orci. Morbi pellentesque metus sapien, id sagittis leo mattis id. Mauris arcu augue, rutrum et ultrices nec, pulvinar sed justo. Aliquam maximus risus ut elit vulputate aliquam. Aliquam rutrum nunc ac consequat luctus. Pellentesque mollis dignissim efficitur. Nunc ultricies volutpat velit, iaculis congue eros viverra sollicitudin. Integer dictum tellus eget mattis condimentum.

            Aliquam pretium odio enim, nec egestas leo auctor eu. Integer sit amet tincidunt sapien, quis vehicula turpis. Vivamus sed dignissim lectus. Sed eu blandit velit. Suspendisse ornare imperdiet eros eget dictum. Donec suscipit, ipsum sit amet euismod molestie, justo eros porta nisi, vitae aliquet sem nisl vitae nunc. In ultricies pharetra lectus, eget ullamcorper eros venenatis eget. Nullam scelerisque nibh ut lobortis aliquet. Ut eu hendrerit odio. Fusce dictum urna est, eu sodales dolor suscipit quis. Fusce dictum, nibh lacinia auctor ullamcorper, magna justo aliquet mauris, nec sodales urna lacus aliquam dui.

            Nullam vehicula efficitur eros, eget venenatis magna rutrum viverra. Nam aliquam vitae nunc quis sagittis. Suspendisse in porta arcu, sed venenatis nulla. In non maximus leo. Aliquam diam ante, vestibulum eu faucibus ac, sagittis eu mauris. Nam quis mauris egestas, lobortis purus et, efficitur sem. Sed tristique turpis ut molestie vehicula.

            Nam sit amet sagittis nisl, vitae maximus dui. Phasellus pharetra pretium velit, eu convallis purus venenatis in. Pellentesque tempus ligula sapien. Aliquam erat volutpat. Nunc sit amet dapibus risus. Vestibulum eu feugiat massa. Pellentesque ipsum metus, hendrerit quis laoreet ut, suscipit sit amet metus. Integer eget hendrerit orci. Fusce ultricies elit nec purus cursus ultrices. Praesent mattis vehicula magna nec mattis. Mauris id nisi eget odio iaculis tempor sed quis lectus. Donec dui ante, suscipit ac dapibus eu, dignissim a nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet neque eu est bibendum mattis.

            Aliquam vel arcu eu lacus mollis placerat non hendrerit ipsum. Nunc dictum ultricies felis, in vulputate neque consequat ac. Nam a lectus eu neque volutpat scelerisque. Nam non consectetur arcu. Vestibulum scelerisque pharetra tincidunt. Quisque luctus molestie metus, quis gravida est efficitur quis. Suspendisse dignissim congue erat vehicula facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras commodo erat odio, ut tristique nulla tempor eget. Nullam vel urna convallis augue laoreet laoreet. Nam nulla purus, sagittis sed dapibus nec, tincidunt sed ex. Praesent consectetur massa leo, eu pellentesque dui mollis eget. Donec vulputate est non libero pulvinar, a pellentesque nunc scelerisque. Praesent commodo mi auctor est imperdiet luctus. Phasellus lobortis vel nulla vitae varius.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec lectus interdum, faucibus ante commodo, auctor nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed scelerisque tellus sit amet turpis elementum viverra. Vestibulum placerat purus lacus, eget luctus nisi accumsan in. Donec id sapien ut mi consequat vehicula vel eu mi. Nam bibendum nibh dolor, eu porta sem bibendum vel. Vivamus eu sapien ultrices mi accumsan vulputate. Maecenas efficitur facilisis lacus, ac mollis mauris varius non. In non ipsum eget lorem porttitor vestibulum. Nunc dapibus tincidunt elit eget molestie. Curabitur tortor mi, convallis nec maximus ut, pretium ut nulla. Curabitur sed elit nec est condimentum vulputate. Ut iaculis luctus neque, ut euismod libero. Etiam quis elit aliquet, accumsan ante non, varius sapien.

Vivamus dictum, massa convallis eleifend molestie, magna metus rhoncus purus, eget semper nunc dui at felis. Pellentesque bibendum nec dui at varius. Cras vestibulum faucibus sapien, a efficitur quam ornare eget. Donec massa nibh, egestas in finibus rutrum, tristique eget nunc. Suspendisse sodales lacus vitae libero congue condimentum. Vestibulum et dui ante. Sed at dolor vitae augue finibus dapibus eget iaculis sem. Sed non nisl consequat, bibendum lacus id, ullamcorper velit. Cras tincidunt purus eu lorem rutrum sagittis.

Donec tempor arcu libero, at dictum sapien ornare vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris nisl leo, porta et nibh sit amet, faucibus rutrum augue. Nullam ornare leo sed lacus finibus, eu auctor nulla venenatis. Nulla vel pulvinar nibh, vitae aliquam felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean feugiat mi lacus, nec laoreet enim blandit sit amet. Praesent hendrerit auctor enim, vitae dapibus justo posuere in. Praesent sagittis ultricies ligula id gravida.

Sed imperdiet lorem dolor, eget molestie sem maximus viverra. Phasellus dolor augue, gravida sit amet sem vel, consequat dictum dolor. Phasellus fringilla maximus justo ut sodales. In hac habitasse platea dictumst. Sed a rhoncus enim. Fusce eget nisi id ex placerat rhoncus id nec est. Ut mi sem, facilisis at efficitur pharetra, consequat pellentesque mauris. Vivamus erat urna, bibendum eget orci nec, ultricies volutpat metus. Nullam suscipit massa vel lacus finibus, eu semper velit efficitur. Donec ut neque vitae leo porttitor euismod sed ac turpis.

Cras augue mauris, sollicitudin at consequat ac, consequat tincidunt justo. Ut bibendum leo nec lectus bibendum pretium. Quisque dignissim accumsan turpis ac eleifend. Nullam neque eros, dapibus id condimentum sed, aliquam sit amet quam. Pellentesque lacinia diam quis varius posuere. Nam mollis ipsum eu dui bibendum, ut sagittis justo efficitur. In egestas lectus eu massa ornare tempus. Aliquam quam odio, eleifend eget fermentum quis, gravida sit amet arcu. Pellentesque vehicula ex sapien, sit amet malesuada neque aliquet eget. Etiam dapibus, nisi ut placerat consequat, augue felis volutpat tellus, eget aliquam tellus diam ac urna. Curabitur vel facilisis turpis. Integer interdum, orci et ullamcorper tempor, velit mi ornare enim, eget cursus justo est in orci. Nam dapibus aliquet turpis, quis molestie tellus egestas vel. Nam pulvinar vitae lectus sed vestibulum. Nulla nec dolor non arcu mollis tristique. Mauris faucibus maximus erat nec convallis.

Ut pharetra vulputate mauris nec dignissim. Donec laoreet faucibus ex molestie ultrices. Ut id sagittis orci. Morbi pellentesque metus sapien, id sagittis leo mattis id. Mauris arcu augue, rutrum et ultrices nec, pulvinar sed justo. Aliquam maximus risus ut elit vulputate aliquam. Aliquam rutrum nunc ac consequat luctus. Pellentesque mollis dignissim efficitur. Nunc ultricies volutpat velit, iaculis congue eros viverra sollicitudin. Integer dictum tellus eget mattis condimentum.

Aliquam pretium odio enim, nec egestas leo auctor eu. Integer sit amet tincidunt sapien, quis vehicula turpis. Vivamus sed dignissim lectus. Sed eu blandit velit. Suspendisse ornare imperdiet eros eget dictum. Donec suscipit, ipsum sit amet euismod molestie, justo eros porta nisi, vitae aliquet sem nisl vitae nunc. In ultricies pharetra lectus, eget ullamcorper eros venenatis eget. Nullam scelerisque nibh ut lobortis aliquet. Ut eu hendrerit odio. Fusce dictum urna est, eu sodales dolor suscipit quis. Fusce dictum, nibh lacinia auctor ullamcorper, magna justo aliquet mauris, nec sodales urna lacus aliquam dui.

Nullam vehicula efficitur eros, eget venenatis magna rutrum viverra. Nam aliquam vitae nunc quis sagittis. Suspendisse in porta arcu, sed venenatis nulla. In non maximus leo. Aliquam diam ante, vestibulum eu faucibus ac, sagittis eu mauris. Nam quis mauris egestas, lobortis purus et, efficitur sem. Sed tristique turpis ut molestie vehicula.

Nam sit amet sagittis nisl, vitae maximus dui. Phasellus pharetra pretium velit, eu convallis purus venenatis in. Pellentesque tempus ligula sapien. Aliquam erat volutpat. Nunc sit amet dapibus risus. Vestibulum eu feugiat massa. Pellentesque ipsum metus, hendrerit quis laoreet ut, suscipit sit amet metus. Integer eget hendrerit orci. Fusce ultricies elit nec purus cursus ultrices. Praesent mattis vehicula magna nec mattis. Mauris id nisi eget odio iaculis tempor sed quis lectus. Donec dui ante, suscipit ac dapibus eu, dignissim a nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet neque eu est bibendum mattis.

Aliquam vel arcu eu lacus mollis placerat non hendrerit ipsum. Nunc dictum ultricies felis, in vulputate neque consequat ac. Nam a lectus eu neque volutpat scelerisque. Nam non consectetur arcu. Vestibulum scelerisque pharetra tincidunt. Quisque luctus molestie metus, quis gravida est efficitur quis. Suspendisse dignissim congue erat vehicula facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras commodo erat odio, ut tristique nulla tempor eget. Nullam vel urna convallis augue laoreet laoreet. Nam nulla purus, sagittis sed dapibus nec, tincidunt sed ex. Praesent consectetur massa leo, eu pellentesque dui mollis eget. Donec vulputate est non libero pulvinar, a pellentesque nunc scelerisque. Praesent commodo mi auctor est imperdiet luctus. Phasellus lobortis vel nulla vitae varius.
            </p>
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