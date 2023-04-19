<?php
session_start();

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
    <link rel="icon" href="../../resource/ico.svg">

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
            <a href="../about-us"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="../projects"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="#"
               class="transition-colors bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6
                    text-green-700 font-medium">
                On Sale
            </a>
            <a href="../news"
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

    <?php
    if (isset($_SESSION["id"])) {
        $first_name = explode(" ", $_SESSION["name"])[0];
        $last_name = explode(" ", $_SESSION["name"])[1];
        $email = $_SESSION["email"];

        if (isset($_POST["sign_out_action"])) {
            session_destroy();
            header("Location: ../../");
        }
        $rnd = rand(0, 1000000);

        $loggedIn = <<<HTML
    <div class="flex gap-6 items-center">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-bold text-gray-900 rounded-full"
                type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 mr-2 rounded-full"
                    src="https://api.dicebear.com/6.x/avataaars/svg?seed=$rnd%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"                 alt="user photo" height="32px" width="32px">
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
                            <img src="../../resource/icons/dashboard/settings.svg" alt="">
                        </span>
                        <span class="font-medium text-primary">Landsphere</span><span>Settings</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="../user-dashboard/account-settings" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../resource/icons/dashboard/account.svg" alt="">
                        </span>
                        <span>Manage your Account</span>
                    </a>
                </li>
                <hr>
                <li>
                    <form method="post" action="" class="flex px-4 mb-1.5 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <button name="sign_out_action" class="w-full flex gap-2 items-center text-red-600 rounded-2xl">
                            <span>
                                <img src="../../resource/icons/dashboard/cancel.svg" alt="">
                            </span>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>

        </div>
       
HTML;
        echo $loggedIn;
    } else {
        $loggedOut =
            <<<HTML
        <div class="flex gap-6 items-center">
        <button onclick="window.location.href = '../sign-in';"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = '../sign-up';"
                class="bg-primary border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem]
                pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>
        </div>
HTML;
        echo $loggedOut;
    }
    ?>


</nav>

<!-- Breadcrumb -->
<div class="group fixed w-full top-0 mt-24 flex justify-center z-50">
    <div class="flex px-5 py-2 bg-beige-dark rounded-3xl shadow-md
    justify-center group-hover:shadow-lg transition-all duration-300"
         aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1">
            <li class="inline-flex items-center">
                <a href="../../index.php"
                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <a href="#"
                       class="ml-1 text-sm font-medium text-gray-400 group-hover:text-gray-800 md:ml-2">
                        On Sale
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16
                pl-36 pr-36">

    <form id="shelf-one" class="bg-white grid grid-cols-3 p-6 mb-12 rounded-2xl shadow-sm">
        <div class="col-span-3">
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative focus:border-black">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true"
                         class="w-5 h-5 text-gray-500"
                         fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search"
                       class="block w-full p-4 pl-10 text-md text-gray-600 font-medium
                       rounded-lg bg-white hover:text-black focus:outline-none"
                       placeholder="Type keyword to search">
                <button type="submit"
                        class="text-white absolute right-2.5
                        bottom-2.5 bg-primary hover:bg-green-700 hover:shadow-lg
                        font-medium rounded-lg text-sm px-4 py-2">
                    Search
                </button>
            </div>

        </div>

        <div class="col-span-3 mt-4">
            <ul class="grid w-full gap-6 grid-cols-3">
                <li>
                    <input type="checkbox" id="residential" class="hidden peer" value="0">
                    <label for="residential" class="flex
                    items-center justify-between w-full h-full p-4 text-gray-500
                    bg-white border-2 border-gray-200 rounded-lg cursor-pointer shadow-sm
                    peer-checked:border-green-600 peer-checked:bg-gray-200 peer-checked:shadow-lg
                    hover:text-gray-600
                    peer-checked:text-gray-600 hover:bg-gray-50
                    ">
                        <span class="flex-col flex select-none">
                            <img class="pb-2 w-[32px]" src="../../resource/icons/search-cat-res.svg" alt="">
                            <span class="w-full text-lg font-semibold">Residential</span>
                            <span class="w-full text-xs">
                                Build your dream home on this perfect plot of land and make every day a staycation.
                            </span>
                        </span>
                    </label>
                </li>
                <li>
                    <input type="checkbox" id="commercial" value="" class="hidden peer">
                    <label for="commercial" class="flex
                    items-center justify-between w-full h-full p-4 text-gray-500
                    bg-white border-2 border-gray-200 rounded-lg cursor-pointer shadow-sm
                    peer-checked:border-green-600 peer-checked:bg-gray-200 peer-checked:shadow-lg
                    hover:text-gray-600
                    peer-checked:text-gray-600 hover:bg-gray-50
                    ">
                        <span class="flex-col flex select-none">
                            <img class="pb-2 w-[32px]" src="../../resource/icons/shopping-mall.svg" alt="">
                            <span class="w-full text-lg font-semibold ">Commercial</span>
                            <span class="w-full text-xs">
                                Unlock the potential of your business with this prime commercial land in a
                                thriving location.
                            </span>
                        </span>
                    </label>
                </li>
                <li>
                    <input type="checkbox" id="industrial" value="" class="hidden peer">
                    <label for="industrial" class="flex
                    items-center justify-between w-full p-4 h-full text-gray-500
                    bg-white border-2 border-gray-200 rounded-lg cursor-pointer shadow-sm
                    peer-checked:border-green-600 peer-checked:bg-gray-200 peer-checked:shadow-lg
                    hover:text-gray-600
                    peer-checked:text-gray-600 hover:bg-gray-50
                    ">
                        <span class="flex-col flex select-none">
                            <img class="pb-2 w-[32px]" src="../../resource/icons/manufacturing.svg" alt="">
                            <span class="w-full text-lg font-semibold">Industrial</span>
                            <span class="w-full text-xs">
                                Maximize your industrial potential with all these prime plot.</span>
                        </span>
                    </label>
                </li>
            </ul>

        </div>

        <div id="" class="pt-4 col-span-3">
            <ul class="grid w-full gap-6 md:grid-cols-2">
                <li>
                    <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer"
                           required>
                    <label for="hosting-small" class="flex
                    items-center justify-between w-full p-4 h-full text-gray-500
                    bg-white border-2 border-gray-200 rounded-lg cursor-pointer shadow-sm
                    peer-checked:border-green-600 peer-checked:bg-gray-200 peer-checked:shadow-lg
                    hover:text-gray-600
                    peer-checked:text-gray-600 hover:bg-gray-50">
                        <span class="flex flex-col">
                            <span class="w-full text-lg font-semibold">For Sale</span>
                            <span class="w-full text-zinc-400">Get your dream land with stunning prices</span>
                        </span>
                    </label>
                </li>
                <li>
                    <input type="radio" id="hosting-big" name="hosting" value="hosting-big" class="hidden peer">
                    <label for="hosting-big" class="flex
                    items-center justify-between w-full p-4 h-full text-gray-500
                    bg-white border-2 border-gray-200 rounded-lg cursor-pointer shadow-sm
                    peer-checked:border-green-600 peer-checked:bg-gray-200 peer-checked:shadow-lg
                    hover:text-gray-600
                    peer-checked:text-gray-600 hover:bg-gray-50">
                        <span class="flex flex-col">
                            <span class="w-full text-lg font-semibold">For Auction</span>
                            <span class="w-full text-zinc-400">Bid high, win big, and secure your slice of paradise</span>
                        </span>
                    </label>
                </li>
            </ul>

        </div>

        <div class="col-span-3">
            <hr class="w-full h-1 mx-auto my-4 bg-gray-100 border-0 rounded">
        </div>

        <div id="" class="col-span-3">
            <div class="flex gap-6">
                <div class="w-full pl-4 pr-4">
                    <label for="default-range"
                           class="block mb-2 text-md font-medium text-gray-900 text-center">Area
                        Range</label>
                    <input id="default-range" type="range" min="0" max="1000000" value="1000000"
                           class="w-full h-2 bg-gray-200 rounded-lg  cursor-pointer">
                </div>

                <div class="w-full pl-4 pr-4">
                    <label for="default-range"
                           class="block mb-2 text-md font-medium text-gray-900 text-center">Price
                        Range</label>
                    <input id="default-range" min="0" max="1000000" type="range" value="1000000"
                           class="w-full h-2 rounded-lg bg-primary cursor-pointer">

                </div>

            </div>

        </div>

    </form>

    <section class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
        <?php
        $sql = "SELECT * FROM sell_list join land l on l.land_id = sell_list.land_id";
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

                $rnd = rand(0, 1000000);

                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full h-48 object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='https://api.dicebear.com/6.x/shapes/svg?seed=" . $rnd . "'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['address'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $land_type . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $title . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $row['area'] . " sqft
        </p>
        
        <p class='mr-auto mt-1 mb-1 text-xs font-medium px-2.5 py-0.5 rounded-2xl
       ";
                if ($row['environment_point'] > 0 && $row['environment_point'] <= 2) {
                    echo " bg-green-100 text-green-500'> Ecologically Excellent ";
                } else if ($row['environment_point'] > 2 && $row['environment_point'] <= 4) {
                    echo " bg-green-100 text-green-500'> Ecologically Very Good";
                } else if ($row['environment_point'] > 4 && $row['environment_point'] <= 6) {
                    echo " bg-green-100 text-green-500'> Ecologically Good";
                } else if ($row['environment_point'] > 6 && $row['environment_point'] <= 8) {
                    echo "  bg-yellow-100 text-yellow-600'> Ecologically Fair";
                } else if ($row['environment_point'] > 8 && $row['environment_point'] <= 10) {
                    echo "  bg-red-100 text-red-500'> Ecologically Poor";
                }
                echo "
       </p>
        
        <p class='text-2xl font-black group-hover:text-green-600'>
            $" . $row['area'] * 0.3 . "
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
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300">Community </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300">Rules and Regulations </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300">Volunteers </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300">Option </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300">Opt Out </a>


            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Guides </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Office Locations </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Benefits </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> History </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="../../static/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="../../static/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="../../static/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="../../static/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Terms of Service </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Privacy Policy </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Cookie Settings </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Accessibility </a>
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
            <div class="justify-between p-4 border-b rounded-t flex items-center">
                <img src="../../resource/icons/modal-search-icon.svg" alt="">
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