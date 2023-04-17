<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../sign-in");
}

if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../");
}

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM owns 
          JOIN land l on l.land_id = owns.land_id 
          WHERE owns.owner_id = " . $_SESSION["id"] . ";";


$land_result = mysqli_query($connection, $query);

$first_name = explode(" ", $_SESSION["name"])[0];
$last_name = explode(" ", $_SESSION["name"])[1];

if (isset($_POST["sign_out_action"])) {
    session_destroy();
    header("Location: ../../");
}

// Get current time
date_default_timezone_set('Asia/Dhaka');
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
    <title>LandSphere | Your Personal Land Manager</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
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

    <div class="flex gap-6 items-center">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-medium text-gray-900 rounded-full"
                type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 mr-2 rounded-full"
                 src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80"
                 alt="user photo" height="32px" width="32px">
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
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-64">
            <div class="px-4 py-3 text-lg text-gray-900 bg-beige-dark rounded-lg">
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
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                </li>

                <li>
                    <form method="post" action="" class="py-2 w-full font-semibold">
                        <button name="sign_out_action"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white w-full">
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
            bg-opacity-40 hover:bg-opacity-60 transition-all duration-300 flex flex-col">
                <p class="text-white flex justify-between">
                    <?php
                    $date = date("l, d F Y");
                    $printable_date = <<< HTML
                        <span class="font-bold text-zinc-200">{$date}</span>
HTML;
                    echo $printable_date;

                    $json = file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=23.73&longitude=90.41&current_weather=true&forecast_days=1&timezone=auto");
                    $json_output = json_decode($json, true);
                    $current_weather = $json_output['current_weather'];
                    $is_day = $current_weather['is_day'];
                    $printable_temp = $current_weather['temperature'] . " °C";

                    $day = <<< HTML
                        <span class="flex gap-1 align-middle items-center">
                            <img src="../../resource/icons/dashboard/sun.svg">
                            <span class="font-bold">{$printable_temp}</span>
                        </span>
HTML;
                    $night = <<< HTML
                        <span class="flex gap-1 align-middle items-center">
                            <img src="../../resource/icons/dashboard/moon.svg">
                            <span class="font-bold">{$printable_temp}</span>
                        </span>
HTML;

                    if ($is_day) {
                        echo $day;
                    } else {
                        echo $night;
                    }

                    ?>
                </p>
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
                        echo "Have a good night,";
                    }
                    ?>
                </p>
                <p class="font-semibold text-white text-2xl">
                    <?php
                    echo "$first_name <span class='group-hover:text-green-950 transition-all duration-300'>$last_name</span>"
                    ?>

                </p>

                <div class=" hidden h-full w-full mt-6 p-4 bg-zinc-100 rounded-2xl bg-opacity-60 shadow-inner">

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
            <div id="notice-board" class="h-full w-full rounded-2xl bg-beige-dark">
                <h1 class="h-auto w-full bg-zinc-200 p-4 font-bold text-xl text-center rounded-2xl">
                    Notice
                </h1>
                <div class="h-64 flex flex-col gap-2 p-2 overflow-y-scroll">
                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 1 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>


                </div>

            </div>

            <div id="news-board" class="h-full w-full rounded-2xl bg-beige-dark">
                <h1 class="h-auto w-full bg-zinc-200 p-4 font-bold text-xl text-center rounded-2xl">
                    Latest News
                </h1>
                <div class="h-64 flex flex-col gap-2 p-2 overflow-y-scroll">
                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 1 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-2">
                        <div class="h-12 w-12 bg-zinc-200 rounded-2xl">
                            <img class="h-12 w-12" src="../../resource/icons/dashboard/notice.svg" alt="">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-lg"> Notice 4 </span>
                            <span class="text-sm"> 2021-09-09 </span>
                        </div>
                    </div>


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
</script>
</html>