<?php
session_start();
if (!isset($_SESSION["id"])) {
    $_SESSION['redirect_url'] = "http" .
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') .
        "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];
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

$owner_has_land_sql = "SELECT * FROM owns WHERE owner_id = {$_SESSION["id"]}";
$owner_has_land_result = mysqli_query($connection, $owner_has_land_sql);
$owner_has_land = mysqli_num_rows($owner_has_land_result) > 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../../resource/ico.svg">
    <title>LandSphere | Your Personal Land Manager</title>
</head>

<body class="bg-beige-default">
<nav id="navbar"
     class="bg-beige-dark flex gap-6 justify-between pl-24
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
    $full_name = $_SESSION["name"];
    // count how many words in the name
    $name_count = str_word_count($full_name);
    // if the name has more than one word
    if ($name_count > 1) {
        $first_name = explode(" ", $_SESSION["name"])[0];
        $last_name = explode(" ", $_SESSION["name"])[1];
    } else {
        $first_name = $_SESSION["name"];
        $last_name = "";
    }
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
               <div class="truncate text-sm font-mono font-bold text-gray-500">
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
                    <a href="../account-settings" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
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

<div id="breadcrumb"
     class="group fixed w-full top-0 mt-24 flex justify-center z-50">
    <div class="flex px-5 py-2 bg-beige-dark rounded-3xl shadow-md
    justify-center group-hover:shadow-lg transition-all duration-300"
         aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1">
            <li class="inline-flex items-center">
                <a href="../../../index.php"
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
                        Your Owned Lands
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section id="main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">
    <p class="text-3xl pb-4 font-medium leading-relaxed">
        Manage your <span class="text-primary">lands.</span>
        <span class="text-gray-500">
            Everything's at your fingertips.
        </span>
        <?php
        if (!$owner_has_land) {
            echo <<< HTML
                    <span class='text-gray-900'> But, You don't own any land yet.</span>
                 
                    <span class='text-gray-500'> 
                        You can buy land from our website. 
                    </span>
                    <span class='text-gray-900'>
                        Head to the
                            <a href='../../on-sale' class='text-primary transition-all duration-300 bg-green-200 p-1 hover:bg-green-400 hover:text-green-800 rounded-xl'>On Sale</a> 
                        section to learn more...</span>
                    <br>
                    <div class="py-8 text-green-500 text-3xl pb-12 font-medium">
                    We are looking forward to get you joined into our world of 
                    <span class="text-green-700"> Green</span>
                    </div>
                HTML;


        }


        ?>
    </p>


    <main class="w-full rounded-3xl p-4 flex justify-between">
        <section class="w-full flex-col p-4 flex gap-6">


            <?php
            if ($owner_has_land) {
                $get_lands_sql = "SELECT * FROM owns 
                  JOIN land l on l.land_id = owns.land_id 
                  JOIN land_cost_info lci on l.land_id = lci.land_id 
                  JOIN land_docs ld on l.land_id = ld.land_id 
                  WHERE owns.owner_id = " . $_SESSION["id"] . " ORDER BY title;";
                $get_lands_result = mysqli_query($connection, $get_lands_sql);

                $lands = mysqli_fetch_assoc($get_lands_result);

                while ($lands) {
                    // Primary Land Information
                    $land_id = $lands["land_id"];
                    $land_title = $lands["title"];
                    $land_area = $lands["area"];
                    $land_address = $lands["address"];
                    $land_environment_points = $lands["environment_point"];
                    $land_demand_points = $lands["demand"];
                    $land_previous_owner = $lands["previous_owner"];
                    $land_details = $lands["place_details"];
                    $_land_type = $lands["land_type"];

                    $land_type = null;

                    if ($_land_type == 0) {
                        $land_type = "Residential";
                        $style = " bg-green-100 text-green-600 ";
                    } else if ($_land_type == 1) {
                        $land_type = "Commercial";
                        $style = " bg-blue-100 text-blue-600 ";
                    } else {
                        $land_type = "Industrial";
                        $style = " bg-yellow-100 text-yellow-600 ";
                    }

                    // Land Cost Information
                    $land_cp_sqft = $lands["cost_per_sqft"];
                    $land_rcv = $lands["relative_cost_value"];
                    $land_acquire_date = $lands["acquire_date"];
                    // Convert to date format full date (e.g. 07th January, 2021)
                    $land_acquire_date = date("jS F, Y", strtotime($land_acquire_date));

                    // Land Document Information
                    $registration_document = $lands["registration_paper"];
                    $government_permit = $lands["government_permit"];
                    $agreement_document = $lands["agreement"];
                    $sale_deed = $lands["sale_deed"];
                    $tax_payment = $lands["tax_pay_receipt"];
                    $map_property = $lands["map_property"];

                    $environment_status = "";
                    if ($land_environment_points > 0 && $land_environment_points <= 2) {
                        $environment_status = ' bg-green-100 text-green-500"> Ecologically Excellent ';
                    } else if ($land_environment_points > 2 && $land_environment_points <= 4) {
                        $environment_status = ' bg-green-100 text-green-500"> Ecologically Very Good ';
                    } else if ($land_environment_points > 4 && $land_environment_points <= 6) {
                        $environment_status = ' bg-green-100 text-green-500"> Ecologically Good ';
                    } else if ($land_environment_points > 6 && $land_environment_points <= 8) {
                        $environment_status = '  bg-yellow-100 text-yellow-600"> Ecologically Fair ';
                    } else if ($land_environment_points > 8 && $land_environment_points <= 10) {
                        $environment_status = '  bg-red-100 text-red-500"> Ecologically Poor ';
                    }

                    echo <<< HTML
                    <a href="./my-land/?land_id=$land_id" class="group flex flex-col bg-beige-dark p-6 rounded-xl align-middle hover:shadow-lg 
                                transition-all duration-300 transform motion-safe:hover:scale-[1.02]">
                        <div class="flex justify-between">
                            <div class="flex gap-4">  
                                <div class="bg-beige-darkest text-zinc-600 font-mono align-middle p-1 rounded-xl font-sm px-3">$land_id</div>
                                <h1 class="text-2xl font-extrabold group-hover:text-primary transition-all duration-300">$land_title</h1>
                            </div>
                            <div class="font-bold font-mono text-md px-3 rounded-xl p-1 $style "> $land_type </div>
                        </div>
                        
                        <div class="mt-3 flex justify-between items-center align-middle">
                            <p class="p-1 rounded-xl bg-beige-light px-3 text-zinc-400 font-bold font-mono">$land_address</p> 
                            <p class="font-bold text-xl">$land_area sqft</p> 
                        </div>
                        
                        <div class="mt-2 flex justify-between items-center">
                            <p class="py-1">$land_details</p> 
                            <p class="w-fit text-md font-medium px-2.5 rounded-2xl" $environment_status </p>
                        </div>
                        
                        <div class="mt-2 w-full  flex justify-around">       
                            <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-beige-light flex-col flex">
                                <h1 class="font-bold text-green-800">Cost Per SQFT</h1>
                                <h1 class="font-mono">$$land_cp_sqft </h1>
                            </div>
                            <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-beige-light flex-col flex">
                                <h1 class="font-bold text-green-800">Relative Cost</h1>
                                <h1 class="font-mono">$$land_rcv </h1>
                            </div>   
                             <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-beige-light flex-col flex">
                                <h1 class="font-bold text-green-800">Acquire Date</h1>
                                <h1 class="font-mono text-sm text-zinc-500">$land_acquire_date </h1>
                            </div>                          
                        </div>
                       
                       <div class="mt-4 w-full flex justify-around gap-4">
                HTML;
                    if ($registration_document != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800">Registration Document</h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm">Registration Document</h1>
                        </div>
                    HTML;
                    }

                    if ($government_permit != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800">Government <br> Permit</h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm">Government <br> Permit</h1>
                        </div>
                    HTML;
                    }

                    if ($agreement_document != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800">Agreement <br> Document </h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm">Agreement <br> Document</h1>
                        </div>
                    HTML;
                    }

                    if ($sale_deed != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800"> Sale <br> Deed </h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm">Sale <br> Deed </h1>
                        </div>
                    HTML;
                    }
                    if ($tax_payment != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800"> Tax <br> Payment </h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm"> Tax <br> Payment </h1>
                        </div>
                    HTML;
                    }

                    if ($map_property != null) {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-green-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_available.svg" alt="" class="w-6 h-6 mx-auto">
                            <h1 class="font-bold text-green-800"> Map <br> Property </h1>
                        </div>
                    HTML;
                    } else {
                        echo <<< HTML
                        <div class="w-[20%] p-2 text-center text-md font-medium px-2.5 rounded-2xl bg-red-200 flex-col flex justify-around">
                            <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="" class="w-8 h-8 mx-auto">
                            <h1 class="mt-2 font-bold text-red-800 text-sm">  Map <br> Property </h1>
                        </div>
                    HTML;
                    }


                    echo "</div></a>";
                    $lands = mysqli_fetch_assoc($get_lands_result);
                }
            }
            ?>
        </section>

    </main>


</section>


<footer id="index_footer"
        class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12
                                 pb-12 drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Community </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Rules and Regulations </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Volunteers </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Opt Out </a>


            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Guides </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Office Locations </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Benefits </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> History </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="../../../static/error/HTTP501.html">
                <img src="../../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="../../../static/error/HTTP501.html">
                <img src="../../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="../../../static/error/HTTP501.html">
                <img src="../../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="../../../static/error/HTTP501.html">
                <img src="../../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Terms of Service </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Privacy Policy </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Cookie Settings </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300"> Accessibility </a>
            </div>

        </div>

    </div>

</footer>

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