<?php
session_start();

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
    <style>
        .outlined-text {
            color: #1F2937;
            text-shadow: -1px -1px 0 #FFF, 1px -1px 0 #FFF, -1px 1px 0 #FFF, 1px 1px 0 #FFF;
        }
    </style>
</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="../../index.php" class="flex select-none">
            <img alt="" src="../../resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="#"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="#"
               class="transition-colors bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6
                    text-green-700 font-medium">
                On Sale
            </a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="../contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Contact</a>
        </div>
    </div>

    <button id="search_button" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-3 pr-3
                    flex gap-12 items-center">
        <span class="flex items-center gap-2">
            <img src="../../resource/icons/search-navbar.svg" alt=" ">
            <span class="text-xs font-medium text-gray-800">Search</span>
        </span>
        <span class="flex gap-1 select-none">
            <kbd id="keyboard_shortcut" class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">⌘</kbd><kbd class="px-2 py-1 text-xs font-medium text-gray-800 bg-gray-100
                rounded-lg">K</kbd>
        </span>
    </button>

    <div class="flex gap-6 items-center">
        <button onclick="window.location.href = '../sign-in';"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = '../sign-up';"
                class="bg-green-600 border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem]
                pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>
    </div>
</nav>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16
                pl-36 pr-36">

    <header id="shelf-one" class="flex justify-between items-center pb-24">

    </header>

    <section class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
        <?php
        $sql = "SELECT * FROM Land";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $_land_type = $row['land_type'];
                
                // HTML variables
                $land_type = null;
                
                

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }
                
                
                echo

"<a href='#' class='bg-white rounded-2xl w-full block shadow-md 
                    transform motion-safe:hover:scale-[1.02]
                    transition-all hover:shadow-lg'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5'>
            ". $row['address'] ."
        </p>
        
        <div class='flex align-middle justify-between items-center'>
         <p class='text-xs font-extrabold opacity-75 text-gray-600 py-0.5'>
            " . $land_type . "
        </p>
        
        <p class='mr-auto text-xs font-medium px-2.5 py-0.5 rounded-2xl
                ";
                if ($row['environment_point'] > 0 && $row['environment_point'] <= 20) {
                    echo " bg-green-100 text-green-500'> Ecologically Excellent ";
                } else if ($row['environment_point'] > 20 && $row['environment_point'] <= 40) {
                    echo " bg-green-100 text-green-500'> Ecologically Very Good";
                } else if ($row['environment_point'] > 40 && $row['environment_point'] <= 60) {
                    echo " bg-green-100 text-green-500'> Ecologically Good";
                } else if ($row['environment_point'] > 60 && $row['environment_point'] <= 80) {
                    echo "  bg-yellow-100 text-yellow-600'> Ecologically Fair";
                } else if ($row['environment_point'] > 80 && $row['environment_point'] <= 100) {
                    echo "  bg-red-100 text-red-500'> Ecologically Poor";
                }

                echo "
        </p>
        
</div>
        
        

       
        
        <p class='font-bold text-green-600 text-xl'>
            " . $title . " 
        </p>
        
        <p class='text-sm text-gray-500 pb-2'>
            ". $row['place_details'] ."
        </p>
        
        <p class='text-lg text-gray-500 pb-2'>
            ". $row['area'] ." sqft
        </p>
        
        <p class='text-2xl text-green-600 font-black'>
            $". $row['area'] * 0.3  ."
        </p> 
       
    </div>
</a>";
            }
        } else {
            echo
            
"<div class='text-2xl text-center text-red-400 col-span-3 flex-col flex items-center'>
   <span class='font-bold text-red-500'> No results found.</span> Try a different search or contact us for help.
</div>";

        }
        ?>
    </section>


</section>

<footer id="index_footer" class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12
                                 pb-12 drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>

            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Help and Support </a>
                <a href="#" class="hover:text-green-300"> Blog </a>
                <a href="#" class="hover:text-green-300"> Careers </a>
                <a href="#" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> About Us </a>
                <a href="#" class="hover:text-green-300"> Leadership </a>
                <a href="#" class="hover:text-green-300"> Careers </a>
                <a href="#" class="hover:text-green-300"> Press </a>
                <a href="#" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="#">
                <img src="../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="#" class="hover:text-green-300"> Terms of Service </a>
                <a href="#" class="hover:text-green-300"> Privacy Policy </a>
                <a href="#" class="hover:text-green-300"> Cookie Settings </a>
                <a href="#" class="hover:text-green-300"> Accessibility </a>
            </div>

        </div>

    </div>

</footer>

<!-- Search modal -->
<div id="defaultModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto
     md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-60 bg-beige-light
    backdrop-blur-md transition-all">


    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t flex items-center">
                <img src="../../resource/icons/modal-search-icon.svg" alt="">
                <input type="text"
                       name="search_box"
                       id="search_text-field"
                       placeholder="Type anything to search"
                       class="w-full rounded-md
                               bg-white px-3 text-base font-medium text-[#6B7280]
                               outline-none text-lg"
                />
                <label for="search_text-field"></label>
                <button type="button"
                        class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                    <kbd class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">Esc</kbd>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
            </div>
        </div>
    </div>

</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script>
    const card_privacy = document.getElementById("privacy");
    const hidden_bullet = document.getElementById("hidden_bullet");
    const visible_bullet = document.getElementById("visible_bullet");

    card_privacy.addEventListener("mouseover", () => {
        hidden_bullet.style.display = "none";
        visible_bullet.style.display = "inline";
    });

    card_privacy.addEventListener("mouseout", () => {
        hidden_bullet.style.display = "inline";
        visible_bullet.style.display = "none";
    });

    document.addEventListener('keydown', function (event) {
        if (event.metaKey && event.keyCode === 75) {
            document.getElementById('search_button').click();
        }
        if (event.ctrlKey && event.keyCode === 75) {
            document.getElementById('search_button').click();
        }
    });

    const os = navigator.platform;
    if (os === "Win32" || os === "Win64" || os === "Windows" || os === "WinCE") {
        document.getElementById('keyboard_shortcut').innerHTML = "Ctrl";
    }
</script>
</html>