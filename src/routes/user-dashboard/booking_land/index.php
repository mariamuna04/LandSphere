<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../../sign-in");
}

include "../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../../");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../../resource/ico.svg">
    <title>LandSphere | Your Personal Land Manager</title


</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="../../../index.php" class="flex select-none">
            <img alt="" src="../../../resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="../../about-us"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="../../projects"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="../../on-sale"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                On Sale</a>
            <a href="../../news"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="../../contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Contact</a>
        </div>
    </div>

    <button id="search_button" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-3 pr-3
                    flex gap-12 items-center">
        <span class="flex items-center gap-2">
            <img src="../../../resource/icons/search-navbar.svg" alt=" ">
            <span class="text-xs font-medium text-gray-800">Search</span>
        </span>
        <span class="flex gap-1 select-none">
            <kbd id="keyboard_shortcut" class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">⌘</kbd><kbd class="px-2 py-1 text-xs font-medium text-gray-800 bg-gray-100
                rounded-lg">K</kbd>
        </span>
    </button>

    <?php
    $first_name = explode(" ", $_SESSION["name"])[0];
    $last_name = explode(" ", $_SESSION["name"])[1];
    $email = $_SESSION["email"];

    $rnd = rand(0, 1000000);
    $loggedIn = <<<HTML
    <div class="flex gap-6 items-center">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-bold text-gray-900 rounded-full"
                type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 mr-2 rounded-full"
                 src="https://api.dicebear.com/6.x/avataaars/svg?seed={$rnd}%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"
                 alt="user photo" height="32px" width="32px">
                    {$_SESSION["name"]}
            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Dropdown menu -->
<div id="dropdownAvatarName"
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-2xl shadow w-64">
            <div class="px-4 py-3 text-lg text-gray-900 bg-beige-dark rounded-t-2xl">
                <div class="font-semibold">
                        $first_name <span class="text-green-600">$last_name</span>
                </div>
                <div class="truncate text-sm">
                    {$_SESSION["email"]}
                </div>
            </div>
            <ul class="py-2 text-sm text-gray-700"
                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                <li>
                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../../resource/icons/dashboard/settings.svg" alt="">
                        </span>
                        <span class="font-medium text-primary">Landsphere</span><span>Settings</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../../resource/icons/dashboard/account.svg" alt="">
                        </span>
                        <span>Manage your Account</span>
                    </a>
                </li>
                <hr>
                <li>
                    <form method="post" action="" class="flex px-4 mb-1.5 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <button name="sign_out" class="w-full flex gap-2 items-center text-red-600 rounded-2xl">
                            <span>
                                <img src="../../../resource/icons/dashboard/cancel.svg" alt="">
                            </span>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>

        </div>
HTML;
    echo $loggedIn;
    ?>


</nav>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">

    <div>Your land that booked people</div>
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
            <?php
            $sql = "SELECT * FROM booked_land_purchase 
                    JOIN LAND on LAND.land_id = booked_land_purchase.land_id 
                    WHERE booked_land_purchase.owner_id != " . $_SESSION["id"];

            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_land_type = $row['land_type'];

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }


                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['title'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $row['area'] . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $row['address'] . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $land_type . "
        </p>
        
    </div>
</a>";
            }
            ?>
        </div>
    </main>


    <div>The lands you booked</div>
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
            <?php
            $sql = "SELECT * FROM booked_land_purchase 
                    JOIN LAND L on L.land_id = booked_land_purchase.land_id 
                    WHERE potential_buyer_id = " . $_SESSION["id"];

            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_land_type = $row['land_type'];

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }


                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['title'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $row['area'] . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $row['address'] . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $land_type . "
        </p>
        
    </div>
</a>";
            }
            ?>
        </div>
    </main>


    <div>Available for booking</div>
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
            <?php
            $sql = "SELECT * FROM LAND join OWNS on LAND.land_id= OWNS.land_id WHERE owner_id != " . $_SESSION["id"];
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_land_type = $row['land_type'];

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }


                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['title'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $row['area'] . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $row['address'] . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $land_type . "
        </p>
        
    </div>
</a>";
            }
            ?>
        </div>
    </main>
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
                <img src="../../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-youtube.svg" alt="">
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
            <div class="flex justify-between p-4 border-b rounded-t items-center">
                <img src="../../../resource/icons/modal-search-icon.svg" alt="">
                <input type="text"
                       name="search_box"
                       id="search_text-field"
                       placeholder="Type anything to search"
                       class="w-full rounded-md
                               bg-white px-3 text-base font-medium text-[#6B7280]
                               outline-none"
                />
                <label for="search_text-field"></label>
                <button type="button"
                        class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
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
