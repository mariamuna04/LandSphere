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

$token = '';
$user_id = '';
if (!isset($_SESSION['token'])) {
    die();
} else {
    $token = $_SESSION['token'];
    $user_id = $_SESSION['id'];
}
$get_token_sql = "SELECT token FROM login WHERE user_nid = " . $user_id . ";";
$get_token_result = mysqli_query($connection, $get_token_sql);
$get_token = mysqli_fetch_assoc($get_token_result);

if ($token != $get_token['token']) {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../sign-in/');
}

if (isset($_POST["sign_out"])) {
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    session_destroy();
    header("Location: ../../../");
}

$owner_has_land_sql = "SELECT * FROM sell_list WHERE user_id = {$_SESSION["id"]}";
$owner_has_land_result = mysqli_query($connection, $owner_has_land_sql);
$owner_has_land = mysqli_num_rows($owner_has_land_result) > 0;

$get_lands_that_not_listed_sql = "SELECT * FROM owns
         JOIN land l on l.land_id = owns.land_id
         WHERE owner_id = " . $_SESSION["id"] . " AND l.land_id NOT IN (SELECT land_id FROM sell_list);";
$get_lands_that_not_listed_result = mysqli_query($connection, $get_lands_that_not_listed_sql);
$user_has_lands_that_not_listed = mysqli_num_rows($get_lands_that_not_listed_result) > 0;


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
                 src="https://api.dicebear.com/6.x/avataaars/svg?seed=$rnd%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"
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
                   <a href="../owned-land" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Owned Lands</span>
                    </a>
                </li>
                
                <li>
                    <a class="flex px-4 py-2 bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1 text-primary select-none">Sale List</span>
                    </a>
                </li>

                <li>
                    <a href="../successors" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Successor</span>
                    </a>
                </li>
                
                <li>
                    <a href="../payment-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Payment</span>
                    </a>
                </li>
                
                <li>
                    <a href="../booking-land" class="flex mb-2 px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
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

<div class="group fixed w-full top-0 mt-24 flex justify-center z-50">
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
                        Your Sale List
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">
    <?php
    if ($owner_has_land) {
        echo <<< HTML
            <p class="text-3xl pb-2 font-medium">
                Your <span class="font-bold text-primary">Sale List</span>
            </p>
        HTML;

    }

    ?>

    <main class="w-full rounded-3xl p-4 flex justify-between">
        <section class="w-full flex-col flex gap-6">
            <?php
            if ($owner_has_land) {
                $get_lands_sql = "SELECT * FROM sell_list 
                                JOIN land l on l.land_id = sell_list.land_id 
                                JOIN land_cost_info lci on l.land_id = lci.land_id 
                                JOIN land_docs ld on l.land_id = ld.land_id 
                                JOIN owns o on l.land_id = o.land_id
                                WHERE user_id = " . $_SESSION['id'] . " ORDER BY title;";

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
                    <div class="flex flex-col bg-beige-dark p-6 rounded-xl align-middle hover:shadow-lg 
                                transition-all duration-300 transform group">
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
                        
                        <div class="mt-2 flex justify-between items-center gap-8">
                            <p class="py-1">$land_details</p> 
                        </div>                  
                        
                       
                       <div class="mt-4 w-full flex justify-between gap-4 items-center">

                HTML;
                    $is_booked_sql = "SELECT * FROM booked_land_purchase WHERE land_id = " . $land_id . ";";
                    $is_booked_result = mysqli_query($connection, $is_booked_sql);
                    $is_booked = mysqli_num_rows($is_booked_result);

                    if ($is_booked) {
                        $is_book_row = mysqli_fetch_assoc($is_booked_result);
                        $potential_buyer_id = $is_book_row["potential_buyer_id"];
                        $get_potential_buyer_sql = "SELECT * FROM user WHERE nid = " . $potential_buyer_id . ";";
                        $get_potential_buyer_result = mysqli_query($connection, $get_potential_buyer_sql);
                        $get_potential_buyer_row = mysqli_fetch_assoc($get_potential_buyer_result);
                        $potential_buyer_name = $get_potential_buyer_row["full_name"];
                        $potential_buyer_email = $get_potential_buyer_row["email"];

                        $random = rand(0, 100000);

                        echo <<< HTML
                            <div class="text-lg text-green-700 font-black">Booked By</div>
                            <div class="p-2 rounded-full flex gap-2 items-center bg-beige-light">
                                <img class="w-12 h-12 mr-2 rounded-full"
                                src="https://api.dicebear.com/6.x/avataaars/svg?seed=$random%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9" alt="">
                                <div>
                                    <h1 class="text-lg font-bold pr-4">$potential_buyer_name</h1>
                                    <h1 class="text-sm font-bold font-mono text-gray-500 pr-4">$potential_buyer_email</h1>
                                </div>
                            </div>
                        HTML;
                    } else {
                        echo <<< HTML
                           <div class="text-lg text-gray-400 font-black">Hang tight, No one booked yet...</div>
                           <form method="post" action="../../../utility/php/cancel_sell_list.php?land_id=$land_id">
                            <button class="group text-red-600 text-sm font-bold py-2 px-4 rounded-full border border-red-300 flex gap-1 hover:bg-red-100 
                            transition-all duration-300 items-center">
                            <img class="invisible opacity-0 group-hover:opacity-100 group-hover:visible transition-all 
                            duration-300 w-5 h-5" src="../../../resource/icons/dashboard/file_delete.svg" alt="">
                                <span class="-translate-x-[0.55rem]  group-hover:translate-x-0 transition-all duration-300">Remove From Sell List</span>
                            </button>
                            </form>
                        HTML;
                    }

                    echo "</div></div>";
                    $lands = mysqli_fetch_assoc($get_lands_result);
                }
            } else {
                echo <<< HTML
                    <p class="text-center text-3xl pb-12 font-medium leading-relaxed text-gray-500">
                        You are not selling any lands
                    </p>
                HTML;

            }
            ?>
        </section>
    </main>

    <?php
    if ($user_has_lands_that_not_listed) {
        echo <<< HTML
                <p class="text-3xl pb-2 pt-8 font-medium">
                    Lands that you have <span class="font-bold text-primary">not listed </span> yet ...
                </p>
            HTML;

    }
    ?>


    <main class="w-full flex-col p-4 flex gap-6">
        <?php
        if ($user_has_lands_that_not_listed) {
            $lands = mysqli_fetch_assoc($get_lands_that_not_listed_result);
            while ($lands) {
                $land_id = $lands["land_id"];
                $land_title = $lands["title"];
                $land_area = $lands["area"];
                $land_address = $lands["address"];
                $land_environment_points = $lands["environment_point"];
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

                $land_has_all_legal_documents_sql = "SELECT * FROM land_docs WHERE land_id = " . $land_id . ";";
                $land_has_all_legal_documents_result = mysqli_query($connection, $land_has_all_legal_documents_sql);
                $legal_document_table = mysqli_fetch_assoc($land_has_all_legal_documents_result);
                $has_all_legal_docs = false;
                $registration_document = $legal_document_table["registration_paper"];
                $government_permit = $legal_document_table["government_permit"];
                $agreement_document = $legal_document_table["agreement"];
                $sale_deed = $legal_document_table["sale_deed"];
                $tax_payment = $legal_document_table["tax_pay_receipt"];
                $map_property = $legal_document_table["map_property"];

                if ($registration_document && $government_permit && $agreement_document && $sale_deed && $tax_payment && $map_property) {
                    $has_all_legal_docs = true;
                }

                echo <<< HTML
                        <div class="group flex flex-col bg-beige-dark p-6 rounded-xl align-middle hover:shadow-lg 
                                transition-all duration-300 ">
                            <div class="flex justify-between">
                                <div class="flex gap-4">  
                                    <div class="bg-beige-darkest text-zinc-600 font-mono align-middle p-1 rounded-xl font-sm px-3">$land_id</div>
                                    <h1 class="text-2xl font-extrabold group-hover:text-primary transition-all duration-300">$land_title</h1>
                                </div>
                                <div class="font-bold font-mono text-md px-3 rounded-xl p-1 $style "> 
                                    $land_type 
                                </div>
                            </div>
                        
                            <div class="mt-3 flex justify-between items-center align-middle">
                                <p class="p-1 rounded-xl bg-beige-light px-3 text-zinc-400 font-bold font-mono">$land_address</p> 
                                <p class="font-bold text-xl">$land_area sqft</p> 
                            </div>
                        HTML;
                if ($has_all_legal_docs) {
                    echo <<< HTML
                            <form class="mt-3 flex justify-end" method="post" action="../../../utility/php/list_for_sale.php?land_id=$land_id">
                                <button class="group text-green-600 text-sm font-bold py-2 px-4 rounded-full border border-green-300 flex gap-1 hover:bg-green-100 
                                transition-all duration-300 items-center">
                                <img class="invisible opacity-0 group-hover:opacity-100 group-hover:visible transition-all 
                                duration-300 w-5 h-5" src="../../../resource/icons/dashboard/add.svg" alt="">
                                    <span class="-translate-x-[0.65rem]  group-hover:translate-x-0 transition-all duration-300">Add to Sell List</span>
                                </button>
                             </form>
                    </div>
                        
                    HTML;
                } else {
                    echo <<< HTML
                        <div class="mt-3 flex justify-end">
                             <div class="flex flex-col gap-1"> 
                                <p class="text-end text-red-600 font-extrabold text-sm opacity-75">You cannot list this land for sale because legal documents are missing</p>
                                <p class="font-extrabold text-gray-600 text-end">Head to 
                                    <a class="text-primary hover:underline" href="../owned-land/my-land/?land_id=$land_id">Owned Land/$land_title</a> to add a legal Document
                                </p>
                             </div>
                        </div> 
                   </div>
                   HTML;
                }
                $lands = mysqli_fetch_assoc($get_lands_that_not_listed_result);
            }
        }
        ?>
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
