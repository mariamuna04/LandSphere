<?php
session_start();

include "../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../../static/error/HTTP521.html');
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

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
                On Sale
            </a>
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
                        <button name="sign_out_action" class="w-full flex gap-2 items-center text-red-600 rounded-2xl">
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
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class=" flex flex-col">
            <?php
            $sql = "SELECT * FROM SELL_LIST join LAND on SELL_LIST.land_id=LAND.land_id WHERE user_id = " . $_SESSION["id"];
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='flex flex-col gap-2'>";
                echo "<div class='flex gap-2'>";
                echo "<div class='flex flex-col gap-2'>";
                echo "<p class='font-bold'>Land Name: " . $row["title"] . "</p>";
                echo "<p class='font-bold'>Land Area: " . $row["area"] . "</p>";
                echo "<p class='font-bold'>Land Location: " . $row["address"] . "</p>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                echo "<p class='font-bold'>Land Type: " . $row["land_type"] . "</p>";
                echo "<p class='font-bold'>Land Description: " . $row["place_details"] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "<div class='flex gap-2'>";
                echo "<div class='flex flex-col gap-2'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
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
</body>
</html>
