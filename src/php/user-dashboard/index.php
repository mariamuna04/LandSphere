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

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
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
                class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
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
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-64 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-lg text-gray-900 dark:text-white">
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
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
            </ul>
            <form method="post" action=""  class="py-2 w-full font-semibold">
                <button name="sign_out_action" class="px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white w-full">
                    Sign out
                </button>
            </form>
        </div>
    </div>
</nav>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">

    <main class="w-full h-72 bg-blue-950 rounded-3xl p-4 bg-user-dashboard-bg-image bg-cover bg-center">
        <h1 class="text-3xl text-black"> Dashboard </h1>
    </main>

    <main class="bg-white h-72 rounded-3xl overflow-y-auto mt-[-40px]">

    </main>

    <main class="grid grid-cols-5 gap-3 pb-12 h-36 mb-10 pt-12">
<!--        <h1 class="col-span-5 text-2xl font-bold">Features</h1>-->
<!--        <a href="./owned_land" class="flex flex-col bg-white shadow-lg p-3 rounded-2xl-->
<!--                transform motion-safe:hover:scale-[1.02]-->
<!--            transition-all hover:shadow-lg duration-300">-->
<!--            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">-->
<!--            <span class="  text-lg font-bold pt-4"> Owned Land </span>-->
<!--        </a>-->

        <a href="./owned_land"
           class="flex flex-col justify-between bg-beige-light shadow-md p-4 rounded-2xl
                  transform motion-safe:hover:scale-[1.02] hover:text-green-600
                  transition-all hover:shadow-lg duration-300 ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">
            <span class="  text-lg font-medium pt-4"> Owned Land </span>

        </a>


        <a href="./sale_list" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">
            <span class="  text-lg font-bold pt-4"> List for Sale </span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">
            <span class="  text-lg font-bold pt-4"> Successors</span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">
            <span class="  text-lg font-bold pt-4"> Payment </span>
        </a>
        <a href="./booking_land" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png" alt="">
            <span class="  text-lg font-bold pt-4"> Bookings </span>
        </a>

    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        Registered Lan
    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        NOTICE
    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        NEWS
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
</body>
</html>