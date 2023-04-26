<?php
session_start();
if (!isset($_GET['land_id'])) {
    header('Location: ../../../static/error/HTTP404.html');
    die();
}
$land_id = $_GET['land_id'];
$user_id = $_SESSION['id'];

include "../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$ensure_land_id_sql = "SELECT * FROM land WHERE land_id = $land_id";
$ensure_land_id_sql_result = mysqli_query($connection, $ensure_land_id_sql);
$ensure_land_id_sql_result_rows = mysqli_num_rows($ensure_land_id_sql_result);
if ($ensure_land_id_sql_result_rows == 0) {
    header('Location: ../../../static/error/HTTP404.html');
    die();
}

$get_land_sql = "SELECT * FROM owns 
                  JOIN land l on l.land_id = owns.land_id 
                  JOIN land_cost_info lci on l.land_id = lci.land_id 
                  JOIN land_docs ld on l.land_id = ld.land_id 
                  WHERE l.land_id = " . $land_id . " ORDER BY title;";

$get_land_sql_result = mysqli_query($connection, $get_land_sql);
$lands = mysqli_fetch_array($get_land_sql_result);

$owner_id = $lands["owner_id"];
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

$land_age = date_diff(date_create($land_acquire_date), date_create('today'))->y;
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


$demand_status = "";

if ($land_demand_points > 0 && $land_demand_points <= 2) {
    $demand_status = ' bg-red-100 text-red-500"> Poorly Demanding ';
} else if ($land_demand_points > 2 && $land_demand_points <= 4) {
    $demand_status = ' bg-yellow-100 text-yellow-600"> Somewhat Demanding ';
} else if ($land_demand_points > 4 && $land_demand_points <= 6) {
    $demand_status = ' bg-green-100 text-green-500"> Demanding ';
} else if ($land_demand_points > 6 && $land_demand_points <= 8) {
    $demand_status = '  bg-green-100 text-green-500"> High Demanding ';
} else if ($land_demand_points > 8 && $land_demand_points <= 10) {
    $demand_status = ' bg-green-100 text-green-500"> Very Demanding ';
}

$net_price = $land_area * $land_cp_sqft;
$net_price = number_format($net_price, 2, '.', ',');

$get_owner_name_sql = "SELECT * FROM user WHERE nid = " . $owner_id . ";";
$get_owner_name_sql_result = mysqli_query($connection, $get_owner_name_sql);
$owner_name = mysqli_fetch_array($get_owner_name_sql_result);
$owner_name = $owner_name["full_name"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
    <link rel="icon" href="../../../resource/ico.svg">

</head>

<body class="bg-beige-default">
<nav id="index_navbar"
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
            <a href="../"
               class="transition-colors bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6
                    text-green-700 font-medium">
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
    if (isset($_SESSION["id"]) && isset($_SESSION["token"])) {

        // Verify Token
        $token = $_SESSION['token'];
        $user_id = $_SESSION['id'];
        $get_token_sql = "SELECT token FROM login WHERE user_nid = " . $user_id . ";";
        $get_token_result = mysqli_query($connection, $get_token_sql);
        $get_token = mysqli_fetch_assoc($get_token_result);

        if ($token == $get_token['token']) {
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

            if (isset($_POST["sign_out"])) {
                $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
                $delete_token = mysqli_query($connection, $delete_token_sql);
                session_destroy();
                header("Location: ../../../");
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
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-2xl shadow-2xl w-64">
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
                   <a href="../../user-dashboard/owned-land" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Owned Lands</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../user-dashboard/sale-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Sale List</span>
                    </a>
                </li>

                <li>
                    <a href="../../user-dashboard/successors" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Successor</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../user-dashboard/payment-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Payment</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../user-dashboard/booking-land" class="flex mb-2 px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Bookings</span>
                    </a>
                </li>
                <hr class="w-full h-1 mx-auto my-1 bg-gray-300 border-0 rounded-full">
                
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
                    <a href="../../user-dashboard/account-settings" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
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
        } else {
            session_destroy();
            $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
            $delete_token = mysqli_query($connection, $delete_token_sql);
            header('Location: ./?land_id=' . $land_id);
        }
    } else {
        $loggedOut =
            <<<HTML
        <div class="flex gap-6 items-center">
        <button onclick="window.location.href = '../../sign-in';"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = '../../sign-up';"
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
                    <a href="../index.php"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                        On Sale
                    </a>
                </div>
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
                        <?php echo $land_title ?>
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section class="container mx-auto my-auto mt-48 mb-16 pl-28 pr-28">

    <main class="w-full rounded-3xl p-4 flex justify-between">
        <section class="w-full flex-col p-4 flex gap-6">
            <div class="w-full flex justify-between items-center gap-8">
                <div class="flex flex-col gap-4 ">
                    <div
                        class="bg-beige-darkest text-zinc-600 font-mono w-fit align-middle p-1 rounded-xl font-sm px-3">
                        <?php echo $land_id ?>
                    </div>
                    <h1 class="text-5xl font-bold text-green-600">
                        <?php echo $land_title ?>
                    </h1>
                    <h1 class="text-xl font-mono font-bold text-gray-600">
                        <?php echo $land_address ?>
                    </h1>
                    <p class="text-lg text-gray-500 font-light ">
                        <?php echo $land_details ?>
                    </p>

                    <div>
                        <?php
                        $random = rand(1, 1000);
                        echo <<< HTML
                            <div class="p-2 rounded-full flex gap-2 w-fit items-center bg-beige-dark hover:shadow-lg">
                                <img class="w-12 h-12 mr-2 rounded-full"
                                src="https://api.dicebear.com/6.x/avataaars/svg?seed=$random%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9" alt="">
                                <div>
                                    <h1 class="text-lg font-bold pr-4">Owned By <span class="text-primary">$owner_name</span> </h1>
                                </div>
                            </div>
                        HTML;
                        ?>
                    </div>

                    <div class="flex gap-4 items-baseline">
                        <form
                            action="../../../utility/php/land_book.php?land_id=<?php echo $land_id ?>&owner_id=<?php echo $owner_id ?>"
                            method="post">
                            <?php
                            $check_already_booked_sql = "SELECT * FROM booked_land_purchase WHERE land_id = '$land_id' AND potential_buyer_id = '$user_id'";
                            $check_already_booked_result = mysqli_query($connection, $check_already_booked_sql);

                            # Check owner owns land
                            $check_owner_owns_land_sql = "SELECT * FROM owns WHERE land_id = '$land_id' AND owner_id = '$user_id'";
                            $check_owner_owns_land_result = mysqli_query($connection, $check_owner_owns_land_sql);
                            $owner_owns_land = false;
                            if ($check_owner_owns_land_result->num_rows > 0) {
                                $owner_owns_land = true;
                            }

                            if ($owner_owns_land) {
                                echo <<< HTML
                                        <div                                       
                                            class="                   
                                            py-3 px-16 text-center text-base    
                                            font-bold text-primary rounded-full outline-none items-center                 
                                            col-span-2                     
                                            ">                                              
                                            You Own This Land!                                                     
                                        </div>                                                          
                                    HTML;
                            } else {
                                if ($check_already_booked_result->num_rows > 0) {
                                    echo <<< HTML
                                       <div                                       
                                           class="                   
                                           py-3 px-16 text-center text-base    
                                           font-bold text-primary rounded-full outline-none items-center                 
                                           col-span-2                     
                                           ">                                              
                                           Booked!                                                     
                                       </div>                                                          
                                    HTML;

                                } else {
                                    echo <<< HTML
                                        <button type="submit"
                                            class="hover:shadow-form bg-green-700
                                            py-3 px-8 text-center text-base transition-all duration-300
                                            font-bold text-white outline-none items-center
                                            col-span-2 rounded-full hover:bg-green-800
                                            hover:shadow-lg">
                                            Book Land
                                        </button>  
                                    HTML;
                                }
                            }

                            ?>

                        </form>


                        <button
                            class="hover:shadow-form
                        py-3 px-8 text-center
                        font-bold text-primary outline-none items-center transition-all duration-300
                        col-span-2 rounded-full border border-primary hover:border-green-800
                        hover:shadow-lg">
                            Contact Owner
                        </button>

                    </div>
                </div>

                <div
                    class="rounded-xl p-4 bg-beige-dark hover:shadow-lg transition-all duration-300 flex flex-col gap-2">
                    <iframe class="h-52 w-[21rem] rounded-2xl border"
                            src="https://www.openstreetmap.org/export/embed.html?bbox=90.4473602771759%2C23.796357186638033%2C90.45122265815735%2C23.79806774014946&amp;layer=mapnik&amp;marker=23.79721246620885%2C90.44929146766663"
                    >

                    </iframe>

                    <a href="https://www.openstreetmap.org/?mlat=23.79721&amp;mlon=90.44929#map=19/23.79721/90.44929"
                       class="text-center w-full mt-2 font-bold select-none text-gray-500 hover:underline">
                        View Location
                    </a>
                </div>

            </div>
        </section>
    </main>

    <main id="gallery">
        <div class="mt-4 flex w-full items-center snap-x gap-4 overflow-x-auto pb-5 pt-5 pl-2 pr-2 no-scroll">
            <?php
            for ($i = 0; $i < 5; $i++) {
                $random = rand(1, 1000);
                echo <<< HTML
                <div class="min-w-[80%] transform motion-safe:hover:scale-[1.01] transition-all duration-300">
                    <div class="h-72 w-full snap-center rounded-xl bg-center bg-cover shadow-md"
                         style="background-image: url('https://api.dicebear.com/6.x/shapes/svg?seed=$random">
                    </div>
                </div>
                HTML;
            }
            ?>
        </div>
        <h1 class="text-center font-light text-gray-500 text-md">Swipe left to see more images</h1>
    </main>

    <main class="mt-12">

        <div class="flex flex-col gap-8">
            <div class="flex justify-around items-center align-middle gap-6">
                <div class="w-full p-2 text-center font-medium px-2.5 rounded-2xl bg-beige-dark flex-col flex">
                    <h1 class="font-bold text-xl text-green-800">Cost Per SQFT</h1>
                    <h1 class="font-mono text-lg"> $<?php echo $land_cp_sqft ?> </h1>
                </div>

                <div class="w-full p-2 text-center font-medium px-2.5 rounded-2xl bg-beige-dark flex-col flex">
                    <h1 class="font-bold text-xl text-green-800">Total Cost</h1>
                    <h1 class="font-mono text-lg"> $<?php echo $net_price ?> </h1>
                </div>
                <?php

                $ratio = $land_cp_sqft / $land_rcv;
                $ratio = round($ratio, 3);

                if ($ratio >= 1) {
                    echo <<< HTML
                    <div class="w-full p-2 text-center font-medium px-2.5 rounded-2xl bg-beige-dark flex-col flex">
                        <h1 class="font-bold text-xl text-green-800">Value Ratio</h1>
                        <h1 class="font-mono text-lg"> $ratio </h1>
                    </div>
                    HTML;

                } else {
                    echo <<< HTML
                    <div class="w-full p-2 text-center font-medium px-2.5 rounded-2xl bg-red-100 flex-col flex">
                        <h1 class="font-bold text-xl text-red-800">Value Ratio</h1>
                        <h1 class="font-mono text-lg"> $ratio </h1>
                    </div>
                    HTML;
                }
                ?>

                <div class="w-full p-2 text-center font-medium px-2.5 rounded-2xl bg-beige-dark flex-col flex">
                    <h1 class="font-bold text-xl text-green-800">Owned from</h1>
                    <h1 class="font-mono text-lg"> <?php echo $land_acquire_date ?> </h1>
                </div>


            </div>
            <div class="grid grid-cols-3  place-items-center">
                <?php
                echo <<< HTML
                    <div class="mt-2 flex justify-between items-center">
                        <p class="w-fit text-md font-bold p-3 rounded-2xl $environment_status </p>
                    </div>
                    HTML;

                echo <<< HTML
                    <div class="mt-2 flex justify-between items-center">
                        <div class="font-bold text-md p-3 rounded-xl  $style "> $land_type </div>
                    </div>
                    HTML;

                echo <<< HTML
                    <div class="mt-2 flex justify-between items-center">
                            <p class="w-fit text-md font-bold p-3 rounded-2xl $demand_status </p>
                    </div>
                    HTML;
                ?>
            </div>
        </div>
    </main>

    <main id="information" class="mt-16 flex flex-col gap-4">
        <h1 class="pb-6 text-3xl font-medium">
            Legal Documents. <span class="text-gray-500"> View authentic documents reviewed by officials</span>
        </h1>
        <div class="grid grid-cols-3 gap-4">
            <?php
            if ($registration_document != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Registration Paper
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                    ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Registration Paper
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            }


            if ($government_permit != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Government Permit
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Government Permit
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            }


            if ($agreement_document != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Agreement Document
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Agreement Document
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            }


            if ($sale_deed != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Sale Deed
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Sale Deed
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            }


            if ($tax_payment != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Tax Payment
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Tax Payment
                        </h1>
                    </div>
                    
                    
                </button>
            HTML;
            }

            if ($map_property != null) {
                echo <<< HTML
                <button class="hover:shadow-lg motion-safe:hover:scale-[1.02] transition-all duration-300 w-full bg-green-200 items-center p-6 flex justify-between rounded-xl">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_available.svg" alt="">
                        <h1 class="text-lg font-bold text-primary">
                            Map Property
                        </h1>
                    </div>
                    
                   
                </button>
            HTML;
            } else {
                echo <<< HTML
                <button disabled class="disabled:opacity-75 w-full bg-red-200 items-center p-6 flex justify-between rounded-xl
                ">
                    <div class="flex gap-4">
                        <img src="../../../resource/icons/dashboard/docs_unavailable.svg" alt="">
                        <h1 class="text-lg font-bold text-red-600">
                            Map Property
                        </h1>
                    </div>
                </button>
            HTML;
            }
            mysqli_close($connection);
            ?>
        </div>


    </main>
</section>

<footer id="index_footer"
        class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12 pb-12 drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300">Community </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300">Rules and Regulations </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300">Volunteers </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300">Option </a>
                <a href="../../../static/error/HTTP501.html" class="hover:text-green-300">Opt Out </a>


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

<!-- Search modal -->
<div id="defaultModal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto
     md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-60 bg-beige-darkest
    backdrop-blur-md transition-all shadow-xl animate-global_search_fadeIn">

    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-2xl shadow">
            <!-- Modal header -->
            <div class="flex justify-between p-6 border-b rounded-t items-center">
                <img src="../../../resource/icons/modal-search-icon.svg" alt="">
                <input type="text"
                       name="quick_search_box"
                       id="quick_search_box"
                       placeholder="Type anything to search"
                       onkeyup="load_data(this.value)"
                       class="w-full rounded-md
                               bg-white px-3 text-base font-medium text-[#6B7280]
                               outline-none"
                />
                <label for="quick_search_box"></label>
                <button type="button"
                        class="text-gray-400 bg-transparent rounded-lg text-sm ml-auto inline-flex items-center"
                        data-modal-hide="defaultModal">
                    <kbd class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">Esc</kbd>
                </button>
            </div>
            <!-- Modal body -->
            <div id="quick_search_result" class="mx-3 my-6 flex flex-col gap-2 overflow-y-auto h-64">
            </div>
            <!-- Modal footer -->
            <div class="group flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                <div class="text-sm font-bold text-[#6B7280] flex gap-2 items-center">
                    <span>
                        <svg
                            class="fill-zinc-500 group-hover:fill-accent-2 group-hover:animate-pulse transition-all duration-300"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0,0,255.98959,255.98959" width="24px"
                            height="24px">
                                <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                   stroke-linejoin="miter"
                                   stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                   font-size="none" style="mix-blend-mode: normal">
                                    <g transform="scale(0.5,0.5)">
                                        <path
                                            d="M260,20c-128.82279,0 -234.10507,101.7594 -239.73828,229.23828c-0.00968,0.11119 -0.01749,0.22254 -0.02344,0.33399c-0.14677,3.42844 -0.23828,6.9027 -0.23828,10.42773c0,132.42945 107.57055,240 240,240c132.42945,0 240,-107.57055 240,-240c0,-3.46094 -0.09349,-6.86645 -0.23438,-10.22852c-0.00066,-0.06511 -0.00196,-0.13022 -0.0039,-0.19531c0,-0.0013 0,-0.0026 0,-0.0039c-5.46269,-127.63601 -110.82571,-229.57227 -239.76172,-229.57227zM250,41.44531v88.67188c-22.19618,0.48076 -43.61137,2.55409 -63.86328,6.03711c3.61628,-12.61254 7.75143,-24.28338 12.32422,-34.80078c8.67741,-19.95807 18.92922,-35.74238 29.58789,-46.11133c7.32921,-7.13 14.62808,-11.66161 21.95117,-13.79688zM270,41.44531c7.32309,2.13526 14.62196,6.66688 21.95117,13.79688c10.65867,10.36895 20.91048,26.15326 29.58789,46.11133c4.57279,10.5174 8.70794,22.18824 12.32422,34.80078c-20.25191,-3.48302 -41.6671,-5.55635 -63.86328,-6.03711zM209.30664,45.88477c-11.21652,12.38282 -20.92453,28.48929 -29.1875,47.49414c-6.17353,14.19912 -11.52996,30.04789 -15.94922,47.20507c-26.6177,6.19228 -50.76596,14.91618 -71.42969,25.69727c-17.04397,8.89251 -31.89067,19.33525 -43.66016,31.04687c22.24184,-75.09123 83.41908,-133.36312 160.22656,-151.44335zM310.69336,45.88477c76.80748,18.08023 137.98473,76.35212 160.22656,151.44335c-11.76948,-11.71162 -26.61619,-22.15436 -43.66015,-31.04687c-20.66373,-10.78109 -44.81199,-19.50499 -71.42969,-25.69727c-4.41926,-17.15718 -9.77569,-33.00595 -15.94922,-47.20507c-8.26297,-19.00485 -17.97098,-35.11132 -29.1875,-47.49414zM250,150.12305v89.87695h-79.60742c1.13762,-29.55065 4.75515,-57.43879 10.3164,-82.45508c21.64218,-4.26774 44.95227,-6.86121 69.29102,-7.42187zM270,150.12305c24.33875,0.56066 47.64884,3.15413 69.29102,7.42187c5.56125,25.01629 9.17878,52.90443 10.3164,82.45508h-79.60742zM159.18555,162.47656c-4.77962,24.02491 -7.81474,50.1148 -8.81446,77.52344h-106.55664c7.91924,-20.71812 27.98244,-40.23326 58.17578,-55.98633c16.49543,-8.60632 35.81237,-15.91886 57.19532,-21.53711zM360.81445,162.47656c21.38295,5.61825 40.69989,12.93079 57.19532,21.53711c30.19333,15.75307 50.25653,35.26821 58.17578,55.98633h-106.55664c-0.99972,-27.40864 -4.03484,-53.49853 -8.81446,-77.52344zM40,260h110c0,34.73784 3.25582,67.71747 9.18555,97.52344c-21.38295,-5.61825 -40.69989,-12.93079 -57.19532,-21.53711c-39.77236,-20.75082 -61.99023,-48.02845 -61.99023,-75.98633zM170,260h80v109.87695c-24.33875,-0.56066 -47.64884,-3.15413 -69.29102,-7.42187c-6.80142,-30.59496 -10.70898,-65.47867 -10.70898,-102.45508zM270,260h80c0,36.97641 -3.90756,71.86012 -10.70898,102.45508c-21.64218,4.26774 -44.95227,6.86121 -69.29102,7.42187zM370,260h110c0,27.95788 -22.21787,55.23551 -61.99023,75.98633c-16.49543,8.60632 -35.81237,15.91886 -57.19532,21.53711c5.92973,-29.80597 9.18555,-62.7856 9.18555,-97.52344zM49.0332,322.625c11.7769,11.73059 26.6404,22.18941 43.70703,31.09375c20.66373,10.78109 44.81199,19.50499 71.42969,25.69727c4.41926,17.15718 9.77569,33.00595 15.94922,47.20507c8.25884,18.99537 17.96051,35.09621 29.16992,47.47657c-76.82507,-18.08384 -138.02931,-76.35042 -160.25586,-151.47266zM470.9668,322.625c-22.22655,75.12224 -83.43079,133.38882 -160.25586,151.47266c11.20941,-12.38036 20.91108,-28.4812 29.16992,-47.47657c6.17353,-14.19912 11.52996,-30.04789 15.94922,-47.20507c26.6177,-6.19228 50.76596,-14.91618 71.42969,-25.69727c17.06663,-8.90434 31.93013,-19.36316 43.70703,-31.09375zM186.13672,383.8457c20.25191,3.48302 41.6671,5.55635 63.86328,6.03711v88.67188c-7.32309,-2.13526 -14.62196,-6.66688 -21.95117,-13.79688c-10.65867,-10.36895 -20.91048,-26.15326 -29.58789,-46.11133c-4.57279,-10.5174 -8.70794,-22.18824 -12.32422,-34.80078zM333.86328,383.8457c-3.61628,12.61254 -7.75143,24.28338 -12.32422,34.80078c-8.67741,19.95807 -18.92922,35.74238 -29.58789,46.11133c-7.32921,7.13 -14.62808,11.66162 -21.95117,13.79688v-88.67188c22.19618,-0.48076 43.61137,-2.55409 63.86328,-6.03711z">

                                        </path>
                                    </g>
                                </g>
                        </svg>
                    </span>
                    <h1> Global Search </h1>
                </div>
                <h1 class="text-sm font-light text-[#6B7280]">Results are shown from internal database</h1>
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
            document.getElementById('quick_search_box').focus();
        }
        if (event.ctrlKey && event.keyCode === 75) {
            document.getElementById('search_button').click();
            document.getElementById('quick_search_box').focus();

        }
    });

    const os = navigator.platform;
    if (os === "Win32" || os === "Win64" || os === "Windows" || os === "WinCE") {
        document.getElementById('keyboard_shortcut').innerHTML = "Ctrl";
    }


    function get_text(event) {
        let string = event.textContent;
        // fetch api
        fetch("../../../utility/php/quick_search.php", {
            method: "POST",
            body: JSON.stringify({
                search_query: string
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(function (response) {
            return response.json();
        }).then(function () {
            document.getElementsByName('quick_search_box')[0].value = string;
            document.getElementById('quick_search_result').innerHTML = '';
        });
    }

    function load_data(query) {
        if (query.length > 0) {
            let form_data = new FormData();
            form_data.append('query', query);
            let ajax_request = new XMLHttpRequest();
            ajax_request.open('POST', '../../../utility/php/quick_search.php');
            ajax_request.send(form_data);
            ajax_request.onreadystatechange = function () {
                if (ajax_request.readyState === 4 && ajax_request.status === 200) {
                    let response = JSON.parse(ajax_request.responseText);

                    let html = '';

                    if (response.length > 0) {
                        for (let count = 0; count < response.length; count++) {
                            html += '<a href="';
                            html += response[count]._url;
                            html += '" class="group flex justify-between gap-1 bg-beige-default hover:bg-beige-dark transition-all duration-300 p-4 rounded-xl">';
                            html += '<div class="flex flex-col gap-1"><h1 class="font-bold group-hover:text-primary transition-all duration-300" onclick="get_text(this)">' + response[count].search_key + '</h1>';
                            html += '<p class="text-sm text-gray-500">' + response[count].search_description + '</p></div>';
                            html += '<img class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300" src="../../../resource/icons/jump.svg" alt="">';
                            html += '</a>';
                        }
                    } else {
                        html += '<p class="text-center text-gray-500 text-2xl font-bold mt-12">No result found</p>';
                    }
                    document.getElementById('quick_search_result').innerHTML = html;

                }
            }
        } else {
            document.getElementById('quick_search_result').innerHTML = '';
        }
    }


</script>
</html>

