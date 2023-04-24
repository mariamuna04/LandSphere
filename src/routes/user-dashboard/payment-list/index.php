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


// Get lands in payment list, used in while loop
$get_lands_in_payment_list = "SELECT * FROM payment WHERE buyer_nid = " . $user_id . ";";
$lands_in_payment_list_result = mysqli_query($connection, $get_lands_in_payment_list);
$has_lands_in_payment_list = mysqli_num_rows($lands_in_payment_list_result);
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
                    <a href="../sale-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Sale List</span>
                    </a>
                </li>

                <li>
                    <a href="../successors" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Successor</span>
                    </a>
                </li>
                
                <li>
                    <a class="flex px-4 py-2 bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1 text-primary select-none">Payment</span>
                    </a>
                </li>
                
                <li>
                    <a  href="../booking-land" class="flex mb-2 px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
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
                        Your Payments
                    </a>
                </div>
            </li>
        </ol>
    </div>
</div>

<section class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">
    <?php
    if ($has_lands_in_payment_list) {
        echo <<< HTML
            <p class="text-3xl font-medium ">
                Your <span class="text-primary">Payments.</span>
                <span class="text-gray-500">
                    Your dream is coming true!
                </span>
            </p>
        HTML;
    } else {
        echo <<< HTML
            <p class="text-3xl font-medium text-center w-full">
              <span class="text-gray-500">
                    You have not process payments of any land yet!
              </span>
            </p>
        HTML;
    }
    ?>

    <main id="your_payments" class="grid-cols-2 grid place-items-center gap-4 mt-4">
        <?php
        // If there are any lands in payment list
        if ($has_lands_in_payment_list) {
            // Start the loop
            $lands_in_payment_list = mysqli_fetch_assoc($lands_in_payment_list_result);
            while ($lands_in_payment_list) {
                // Get Payment table information for each land
                $payment_id = $lands_in_payment_list['payment_id'];
                $land_id = $lands_in_payment_list['land_id'];
                $due_time = $lands_in_payment_list['due_time'];
                $total_amount = $lands_in_payment_list['total_amount'];
                $paid_amount = 0;   // because paid can be calculated from installment table
                $installment = $lands_in_payment_list['installments'];
                // Now for installment == 0 or 1, we have a special case.
                // 0 or 1 means pay fully. so there will be 1 transaction (or we say installment)
                // NULL and 0 SAME FOR ME
                if ($installment == 0 || $installment == 1 || $installment == null) {
                    // handle this special case
                    $installment = 1;
                }

                // Get Land table information for each land
                $get_land_information_sql = "SELECT * FROM land WHERE land_id = '$land_id'";
                $get_land_information_result = mysqli_query($connection, $get_land_information_sql);
                $land_information = mysqli_fetch_assoc($get_land_information_result);

                // Get Installment table information for each land
                $get_installment_information_sql = "SELECT * FROM installment WHERE payment_id = '$payment_id'";
                $get_installment_information_result = mysqli_query($connection, $get_installment_information_sql);
                $installment_number_row_count = mysqli_num_rows($get_installment_information_result);

                // Check if there are already some installments paid
                // if so, get total paid amount from installment table
                if ($installment_number_row_count > 0) {
                    // get total paid amount
                    $get_paid_amount_sql = "SELECT SUM(amount) AS paid_amount FROM installment WHERE payment_id = '$payment_id'";
                    $get_paid_amount_result = mysqli_query($connection, $get_paid_amount_sql);
                    $paid_amount_row = mysqli_fetch_assoc($get_paid_amount_result);
                    // paid amount is updated here, this will be used later
                    $paid_amount = $paid_amount_row['paid_amount'];
                }


                // calculate the next installment amount
                // 3 cases: installment = 1; installment = last installment; installment = any other installment
                $next_installment_amount = 0;
                // if installment = 1, then next installment amount = total amount
                if ($installment == 1) {
                    $next_installment_amount = $total_amount;
                } // if installment = last installment, then next installment amount = total amount - paid amount
                else if ($installment == $installment_number_row_count) {
                    // calculate next installment amount for last installment
                    $next_installment_amount = $total_amount - $paid_amount;
                    // if next installment amount is negative, then set it to 0
                    // client may overpay UwU
                    if ($next_installment_amount < 0) {
                        $next_installment_amount = 0;
                    }
                    // finally for normal cases, next installment amount = (total amount - paid amount) / (installment - installment_number_row_count)
                } else {
                    $next_installment_amount = ($total_amount - $paid_amount) / ($installment - $installment_number_row_count);
                }

                // check if overpaid
                if ($paid_amount > $total_amount) {
                    $next_installment_amount = 0;
                }

                // convert next installment amount to 2 decimal places
                $converted_next_installment_amount = number_format($next_installment_amount, 2);

                // Calculate progressbar width
                $percentage = ($paid_amount / $total_amount) * 100;
                $percentage = (int)$percentage;
                // if percentage is greater than 100, set it to 100
                if ($percentage > 100) {
                    $percentage = 100;
                }

                // convert paid amount and total amount to 2 decimal places
                $paid_amount = number_format($paid_amount, 2);
                $total_amount = number_format($total_amount, 2);


                echo <<< HTML
                    <a href="#" class="group flex-col flex gap-1 bg-beige-dark w-full p-4 
                    rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 
                    antialiased motion-safe:hover:scale-[1.02]">
                        <div class="flex justify-between font-mono tracking-wide">
                            <div class="bg-beige-darkest text-sm px-2 py-1 rounded-xl">$land_id</div>
                            <div class="bg-zinc-600 text-white text-sm px-2 py-1 rounded-xl opacity-50">$payment_id</div>
                        </div>
                        
                        <div class="transition-all duration-300 group-hover:text-primary font-bold text-2xl">
                            {$land_information['title']}
                        </div>
                        
                        <div class="transition-all duration-300 group-hover:text-zinc-800 text-zinc-500 font-bold text-lg">
                            {$land_information['address']}
                        </div>
                        
                        <hr class="border-2 border-gray-300 rounded-full my-2">
                        <div class="grid-cols-2 grid place-items-center justify-between my-2">
                            <div class="bg-white text-sm px-2 py-2 rounded-xl w-[90%] text-center font-medium 
                            border border-white group-hover:border group-hover:border-green-400 transition-all duration-300">Deadline: $due_time</div>
                            <div class="bg-white text-sm px-2 py-2 rounded-xl w-[90%] text-center font-medium
                            border border-white group-hover:border group-hover:border-green-400 transition-all duration-300">Installments:
                                <span class="font-mono pl-3"> $installment_number_row_count / $installment </span>
                            </div>
                        </div>
                               
                        <div class="bg-beige-darkest w-full h-3 rounded-full">
                            <div class="bg-green-400 group-hover:bg-primary transition-all duration-500 h-full rounded-full" style="width: {$percentage}%">
                            </div>
                        </div>
                        <div class="grid-cols-2 grid place-items-center justify-between my-2 font-mono">
                            <div class="bg-white text-sm px-2 py-2 rounded-xl w-[90%] text-center font-medium
                            border border-white group-hover:border group-hover:border-green-400 transition-all duration-300">Paid Amount: <br> $paid_amount</div>
                            <div class="bg-white text-sm px-2 py-2 rounded-xl w-[90%] text-center font-medium
                            border border-white group-hover:border group-hover:border-green-400 transition-all duration-300">Total Amount: <br> $total_amount</div>
                        </div>

                        <h1 class="w-full text-center font-bold text-zinc-500">
                            Next Installment Amount ~ <span class="font-mono tracking-widest text-primary">$converted_next_installment_amount</span>
                        </h1>

                    </a>
                HTML;
                $lands_in_payment_list = mysqli_fetch_assoc($lands_in_payment_list_result);
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
