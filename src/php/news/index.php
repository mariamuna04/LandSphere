<?php

session_start();

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

try {
    $connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
} catch (Exception $e) {
    $db_connection_error = true;
    header('Location: ../../html/error/HTTP521.html');
}

$sql = "SELECT * FROM news ORDER BY date DESC";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>Contact Us</title>
    <script src="../../js/utility.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

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
            <a href="../on-sale"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                On Sale
            </a>
            <a href="#"
               class="transition-colors bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6
                    text-green-700 font-medium">
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

        $loggedIn = <<<HTML
    <div class="flex gap-6 items-center">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-medium text-gray-900 rounded-full"
                type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 mr-2 rounded-full"
                 src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80"
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
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-64">
            <div class="px-4 py-3 text-lg text-gray-900 bg-beige-dark rounded-lg">
                <div class="font-semibold">$first_name <span class="text-green-600">$last_name</span>

    </div>
    <div class="truncate text-sm">
        {$_SESSION["email"]}
    </div>
    </div>
    <ul class="py-2 text-sm text-gray-700"
        aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
        </li>
    </ul>
    <form method="post" action=""  class="py-2 w-full font-semibold">
        <button name="sign_out_action" class="px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white w-full">
            Sign out
        </button>
    </form>
    </div>
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
                        News
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section class="container mx-auto my-auto mt-48 mb-24 pl-16 pr-16">
    <p class="text-4xl pb-12 font-bold">
        Take a <span class="text-primary">peek</span>
        <span class="text-gray-500 font-semibold">of what's happening in the world of <span
                class="text-primary font-bold">Green</span>!
    </p>

    <div class="grid grid-cols-2 gap-6">
        <?php
        while ($news_row = mysqli_fetch_assoc($result)) {
            $rnd = rand(1, 100000);
            $card = <<< HTML
                        
<a href="#" class="group flex items-center bg-white rounded-lg flex-row max-w-xl shadow-lg transform motion-safe:hover:scale-[1.02] hover:text-green-600
                  transition-all hover:shadow-lg duration-300">
    <img class="object-cover rounded-lg h-full w-32" src="https://api.dicebear.com/6.x/shapes/svg?seed={$rnd}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 font-bold tracking-tight text-gray-900">{$news_row['date']}</h5>
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 group-hover:text-primary transition-all duration-300">{$news_row['title']}</h5>
        <h5 class="mb-2 text-md font-bold tracking-tight text-gray-600">{$news_row['subtitle']}</h5>
        <p class="mb-3 text-sm text-gray-700">{$news_row['body']}</p>
    </div>
</a>


HTML;
            echo $card;
        }
        ?>
    </div>

</section>


<footer class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12 pb-12
drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>

            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="../../html/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="../../html/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="../../html/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="../../html/error/HTTP501.html">
                <img src="../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Terms of Service </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Privacy Policy </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Cookie Settings </a>
                <a href="../../html/error/HTTP501.html" class="hover:text-green-300"> Accessibility </a>
            </div>

        </div>

    </div>

</footer>
</body>

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
