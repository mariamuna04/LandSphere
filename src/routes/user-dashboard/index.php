<?php
ini_set('display_errors', 0);
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../sign-in");
}

if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../");
}

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$query = "SELECT * FROM owns 
          JOIN land l on l.land_id = owns.land_id 
          WHERE owns.owner_id = " . $_SESSION["id"] . ";";

$get_average_env_pts_query = "SELECT AVG(environment_point) AS 'avg_env_pts' 
                              FROM owns JOIN land l ON l.land_id = owns.land_id 
                              WHERE owns.owner_id = " . $_SESSION["id"] . ";";

$get_total_area_query = "SELECT SUM(area) AS 'total_area' 
                         FROM owns JOIN land l ON l.land_id = owns.land_id 
                         WHERE owns.owner_id = " . $_SESSION["id"] . ";";


$land_result = mysqli_query($connection, $query);
$average_env_pts_result = mysqli_query($connection, $get_average_env_pts_query);
$average_env_pts = mysqli_fetch_assoc($average_env_pts_result)["avg_env_pts"];
$total_area_result = mysqli_query($connection, $get_total_area_query);
$total_area = mysqli_fetch_assoc($total_area_result)["total_area"];

$first_name = explode(" ", $_SESSION["name"])[0];
$last_name = explode(" ", $_SESSION["name"])[1];

// Get IP address
$json_ip = file_get_contents('http://ip-api.com/json');
$json_ip = json_decode($json_ip, true);
$lat = $json_ip['lat'];
$lon = $json_ip['lon'];
$timezone = $json_ip['timezone'];

// Get current time
date_default_timezone_set($timezone);
$current_time = date('Y-m-d H:i:s');
// Extract hour
$hour = date('H', strtotime($current_time));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../resource/ico.svg">
    <title>LandSphere | Your Personal Land Manager</title>

</head>

<body class="bg-beige-default scroll-smooth">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-90
    backdrop-blur-lg items-center top-0 mb-12 z-50 transition-all">
    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
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
                On Sale</a>
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

    <div class="flex gap-6 items-center">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-bold text-gray-900 rounded-full"
                type="button">
            <?php
            $rnd = rand(0, 1000000);
            echo "<img class='w-8 h-8 mr-2 rounded-full'
                 src='https://api.dicebear.com/6.x/avataaars/svg?seed=" . $rnd . "%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9'
                 alt='user photo' height='32px' width='32px'>"
            ?>

            <?php echo $_SESSION["name"]; ?>
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
                    <?php
                    $section =
                        <<< HTML
                        $first_name <span class="text-green-600">$last_name</span>
HTML;
                    echo $section;
                    ?>
                </div>
                <div class="truncate text-sm">
                    <?php echo $_SESSION["email"]; ?>
                </div>
            </div>
            <ul class="py-2 text-sm text-gray-700"
                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                <li>
                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../resource/icons/dashboard/settings.svg" alt="">
                        </span>
                        <span class="font-medium text-primary">LandSphere</span><span>Settings</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../resource/icons/dashboard/account.svg" alt="">
                        </span>
                        <span>Manage your Account</span>
                    </a>
                </li>
                <hr>
                <li>
                    <form method="post" action=""
                          class="flex px-4 mb-1.5 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <button name="sign_out" class="w-full flex gap-2 items-center text-red-600 rounded-2xl">
                            <span>
                                <img src="../../resource/icons/dashboard/cancel.svg" alt="">
                            </span>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>

<section id="index_main-section">

    <main class="w-full h-[40rem] bg-blue-950 rounded-2xl p-4
        bg-user-dashboard-bg-image bg-cover">
        <div class="container mx-auto my-auto mt-36 pl-48 pr-48 grid grid-cols-2 gap-12">

            <div class="group h-full w-full bg-beige-light rounded-2xl backdrop-blur-lg p-6
            bg-opacity-40 hover:bg-opacity-50 transition-all duration-300 flex flex-col">
                <p class="text-white flex justify-between align-middle items-center">
                    <?php
                    $date = date("l, d F Y");
                    $printable_date = <<< HTML
                        <span class="font-bold">$date</span>
HTML;
                    echo $printable_date;

                    $json = file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lon&current_weather=true&forecast_days=1&timezone=auto");
                    $json_output = json_decode($json, true);
                    $current_weather = $json_output['current_weather'];
                    $is_day = $current_weather['is_day'];
                    $printable_temp = $current_weather['temperature'] . " °C";

                    $day = <<< HTML
                        <span class="flex gap-1 align-middle items-center">
                            <img src="../../resource/icons/dashboard/sun.svg" alt="">
                            <span class="font-bold">$printable_temp</span>
                        </span>
HTML;
                    $night = <<< HTML
                        <span class="flex gap-1 align-middle items-center">
                            <img src="../../resource/icons/dashboard/moon.svg" alt="">
                            <span class="font-bold">$printable_temp</span>
                        </span>
HTML;

                    if ($is_day) {
                        echo $day;
                    } else {
                        echo $night;
                    }

                    ?>
                </p>
                <hr class="mt-4 border-2 border-zinc-300 rounded">
                <p class="font-bold text-white text-3xl pt-4">
                    <?php
                    $morning = date("H") < 12;
                    $afternoon = date("H") < 18;
                    $evening = date("H") < 21;
                    $night = date("H") < 24;
                    if ($morning) {
                        echo "Good Morning,";
                    } else if ($afternoon) {
                        echo "Good Afternoon,";
                    } else if ($evening) {
                        echo "Good Evening,";
                    } else if ($night) {
                        echo "Have a Good Night,";
                    }
                    ?>
                </p>
                <p class="font-semibold text-white text-2xl mt-2">
                    <?php
                    echo "$first_name <span class='group-hover:text-green-800 transition-all duration-300'>$last_name</span>"
                    ?>

                </p>

                <div class="p-4 grid grid-cols-3 gap-2 bg-white bg-opacity-60 rounded-2xl mt-12">
                    <div class="flex flex-col items-center justify-between">
                        <img src="../../resource/icons/dashboard/area.svg" alt="">
                        <div class="p-2 text-center rounded-2xl text-sm font-semibold mt-2 text-blue-800">
                            <p>Total Area</p>
                            <p class="font-mono"><?php
                                if (empty($total_area) || $total_area == 0) {
                                    echo "-";
                                } else {
                                    echo $total_area;
                                }
                                ?></p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-between">
                        <img src="../../resource/icons/dashboard/leaf.svg" alt="">
                        <div class="p-2 text-center rounded-2xl text-sm font-semibold mt-2 transition-all duration-400
                        <?php
                        if ($average_env_pts >= 0 && $average_env_pts <= 4) {
                            echo "group-hover:bg-green-100 text-green-500";
                        } else if ($average_env_pts > 4 && $average_env_pts <= 8) {
                            echo "group-hover:bg-yellow-100 text-yellow-600 animate-pulse";
                        } else if ($average_env_pts > 8 && $average_env_pts <= 10) {
                            echo "group-hover:bg-red-100 text-red-500 animate-pulse";
                        }
                        ?>">
                            <p>Environment</p>
                            <p class="font-mono"><?php
                                if (empty($average_env_pts) || $average_env_pts == 0) {
                                    echo "-";
                                } else {
                                    echo $average_env_pts;
                                }
                                ?></p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-between">
                        <img src="../../resource/icons/dashboard/worth.svg" alt="">
                        <div class="p-2 text-center rounded-2xl text-sm font-semibold mt-2 text-amber-800">
                            <p>Net Worth</p>
                            <p class="font-mono"><?php
                                if ($total_area == 0 || empty($total_area)) {
                                    echo "-";
                                } else {
                                    echo "$" . $total_area * 0.7;
                                }
                                ?></p>
                        </div>
                    </div>

                </div>
            </div>


            <div class="grid grid-cols-2 gap-2">
                <a href="./owned_land"
                   class="flex flex-col justify-between bg-beige-light bg-opacity-80 hover:bg-opacity-100 shadow-md p-4 rounded-2xl
                  transform motion-safe:hover:scale-[1.02] hover:text-green-600 backdrop-blur-sm
                  transition-all hover:shadow-lg duration-300 hover:bg-white col-span-2">
                    <img class="h-12 w-12 pb-4 pt-1" src="../../resource/icons/dashboard/owned-land.svg" alt="">
                    <span class="text-lg font-bold pl-2"> Your Owned Land </span>

                </a>

                <a href="./sale_list"
                   class=" flex flex-col justify-between bg-beige-light shadow-md p-4 rounded-2xl backdrop-blur-sm
                  transform motion-safe:hover:scale-[1.02] hover:text-green-700
                  transition-all hover:shadow-lg duration-300 hover:bg-white bg-opacity-80 hover:bg-opacity-100">
                    <img class=" h-12 w-12 pb-4 pt-1" src="../../resource/icons/dashboard/for-sale.svg" alt="">
                    <span class="text-lg font-bold pt-4 pl-2"> Your Sale List </span>

                </a>


                <a href="./successors"
                   class=" flex flex-col justify-between bg-beige-light shadow-md p-4 rounded-2xl backdrop-blur-sm
                  transform motion-safe:hover:scale-[1.02] hover:text-green-600
                  transition-all hover:shadow-lg duration-300 hover:bg-white bg-opacity-80 hover:bg-opacity-100">
                    <img class=" h-12 w-12 pb-4 pt-1" src="../../resource/icons/dashboard/successor.svg" alt="">
                    <span class="text-lg font-bold pt-4 pl-2"> Your Successor </span>

                </a>
                <a href="./payment"
                   class="flex flex-col justify-between bg-beige-light shadow-md p-4 rounded-2xl backdrop-blur-sm
                  transform motion-safe:hover:scale-[1.02] hover:text-green-600
                  transition-all hover:shadow-lg duration-300 hover:bg-white bg-opacity-80 hover:bg-opacity-100">
                    <img class="h-12 w-12 pb-4 pt-1" src="../../resource/icons/dashboard/payment.svg" alt="">
                    <span class="text-lg font-bold pt-4 pl-2"> Your Payment </span>

                </a>

                <a href="./booking_land"
                   class="flex flex-col justify-between bg-beige-light shadow-md p-4 rounded-2xl backdrop-blur-sm
                  transform motion-safe:hover:scale-[1.02] hover:text-green-600
                  transition-all hover:shadow-lg duration-300 hover:bg-white bg-opacity-80 hover:bg-opacity-100">
                    <img class=" h-12 w-12 pb-4 pt-1" src="../../resource/icons/dashboard/booking.svg" alt="">
                    <span class="text-lg font-bold pt-4 pl-2"> Your Bookings </span>

                </a>
            </div>
        </div>
    </main>

    <main class="container mx-auto my-auto mt-12 mb-16 pl-36 pr-36">
        <section class="grid grid-cols-2 gap-12">
            <div id="notice-board" class="h-full w-full rounded-2xl">
                <h1 class="h-auto w-full bg-zinc-200 p-4 font-bold text-xl text-center rounded-2xl text-primary">
                    Notice
                </h1>
                <div class="h-64 flex flex-col gap-6 p-4 overflow-y-scroll no-scroll">
                    <?php
                    $notice_sql = "SELECT * FROM notice ORDER BY date DESC";
                    $notice_result = mysqli_query($connection, $notice_sql);
                    while ($notice_row = mysqli_fetch_assoc($notice_result)) {
                        $rnd = rand(1, 100000);
                        $card = <<< HTML

                        <div data-popover-target="popover-right" data-popover-placement="right" type="button"
                         class="group flex gap-4 align-middle items-center rounded-2xl bg-beige-darker p-4 
                        hover:bg-green-100 transition-all duration-300">
                            <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                                <img class="h-12 w-12 rounded-lg" src="https://api.dicebear.com/6.x/icons/svg?seed=$rnd" alt="">
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-zinc-600"> {$notice_row['date']} </span>
                                <span class="font-bold text-lg group-hover:text-primary"> {$notice_row['title']} </span>
                            </div>
                        </div>

HTML;
                        echo $card;
                    }

                    ?>
                </div>

            </div>

            <div id="news-board" class="h-full w-full rounded-2xl">
                <h1 class="h-auto w-full bg-zinc-200 p-4 font-bold text-xl text-center rounded-2xl text-primary">
                    Latest News
                </h1>
                <div class="h-64 flex flex-col gap-6 p-4 overflow-y-scroll no-scroll">
                    <?php
                    $news_sql = "SELECT * FROM news ORDER BY date DESC LIMIT 7";
                    $news_result = mysqli_query($connection, $news_sql);
                    while ($news_row = mysqli_fetch_assoc($news_result)) {
                        $rnd = rand(1, 100000);
                        $card = <<< HTML

                        <div class="group flex gap-4 align-middle items-center rounded-2xl bg-beige-darker p-4 
                        hover:bg-green-100 transition-all duration-300">
                            <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                                <img class="h-12 w-12 rounded-lg" src="https://api.dicebear.com/6.x/icons/svg?seed=$rnd" alt="">
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-zinc-600"> {$news_row['date']} </span>
                                <span class="font-bold text-lg group-hover:text-primary"> {$news_row['title']} </span>
                                <span class="text-sm"> {$news_row['subtitle']} </span>
                            </div>
                        </div>

HTML;
                        echo $card;
                    }

                    ?>
                    <a href="../news" class="p-2 text-center hover:underline text-primary">
                        See more...
                    </a>
                </div>


            </div>


        </section>
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
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Community </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Rules and Regulations </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Volunteers </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../static/error/HTTP501.html" class="hover:text-green-300"> Opt Out </a>


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
            <div class="flex justify-between p-4 border-b rounded-t items-center">
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
    // After certain amount of scrolling, the navbar will change to a different color
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 440 || document.documentElement.scrollTop > 440) {
            document.getElementById("index_navbar").classList.add("bg-opacity-60")
            document.getElementById("index_navbar").classList.remove("bg-opacity-90")
        } else {
            document.getElementById("index_navbar").classList.remove("bg-opacity-60")
            document.getElementById("index_navbar").classList.add("bg-opacity-90")
        }
    }

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