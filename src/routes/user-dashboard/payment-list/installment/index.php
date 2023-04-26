<?php
session_start();
if (!isset($_GET['land_id'])) {
    $_SESSION['redirect_url'] = "http" .
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') .
        "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];
    header('Location: ../../../../static/error/HTTP404.html');
    die();
}

include "../../../../utility/php/connection.php";
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
    header('Location: ../../../sign-in/');
}

$land_id = $_GET['land_id'];
$payment_id = $_GET['payment_id'];
$get_land_information_sql = "SELECT * FROM land WHERE land_id = " . $land_id . ";";
$get_land_information_result = mysqli_query($connection, $get_land_information_sql);
$get_land_information = mysqli_fetch_assoc($get_land_information_result);
$land_title = $get_land_information['title'];
$land_address = $get_land_information['address'];

// Get installment information
$get_installment_information_sql = "SELECT * FROM installment WHERE id = " . $payment_id . " ORDER BY date DESC;";
$get_installment_information_result = mysqli_query($connection, $get_installment_information_sql);
$get_number_of_installments = mysqli_num_rows($get_installment_information_result);

// Get max payable amount
$max_payable_amount = 0;
$get_payment_information_sql = "SELECT * FROM payment WHERE payment_id = " . $payment_id . ";";
$get_payment_information_result = mysqli_query($connection, $get_payment_information_sql);
$payment_information = mysqli_fetch_assoc($get_payment_information_result);
$installments = $payment_information['installments'];   // Get number of installments also
$total_amount = $payment_information['total_amount'];
$total_paid = $payment_information['paid_amount'];
if ($total_paid == 0 || $total_paid == null) {
    $total_paid = 0;
}
$max_payable_amount = $total_amount - $total_paid;

// Check if it is a full payment or installment payment
$full_payment = false;
if ($installments == 1 || $installments == 0 || $installments == null) {
    $full_payment = true;
}

// Left Blank variables
$installment_amount_left_blank = false;
$card_number_left_blank = false;
$password_left_blank = false;

// Error Variables
$installment_overpaid_error = false;

$installment_amount_error = false;
$card_number_error = false;
$password_error = false;
if (isset($_POST['submit'])) {
    $pay_amount = $_POST['installment_amount'];
    if ($full_payment) $pay_amount = $max_payable_amount;
    if (empty($pay_amount)) $installment_amount_left_blank = true;
    if ($pay_amount > $max_payable_amount) $installment_overpaid_error = true;
    if ($pay_amount <= 0) $installment_amount_error = true;
    $card_number = $_POST['card_number'];
    if (empty($card_number)) $card_number_left_blank = true;
    $password = $_POST['password'];
    if (empty($password)) $password_left_blank = true;

    if (!$installment_amount_left_blank && !$card_number_left_blank && !$password_left_blank) {
        $fetch_actual_card_number_sql = "SELECT * FROM payment_method WHERE user_id = " . $user_id . ";";
        $fetch_actual_card_number_result = mysqli_query($connection, $fetch_actual_card_number_sql);
        $fetch_actual_card_number = mysqli_fetch_assoc($fetch_actual_card_number_result);
        $actual_card_number = $fetch_actual_card_number['card_number'];
        if ($card_number != $actual_card_number) $card_number_error = true;

        $fetch_actual_password_sql = "SELECT * FROM login WHERE user_nid = " . $user_id . ";";
        $fetch_actual_password_result = mysqli_query($connection, $fetch_actual_password_sql);
        $fetch_actual_password = mysqli_fetch_assoc($fetch_actual_password_result);
        $actual_password = $fetch_actual_password['password'];
        $password = hash('sha256', $password);
        if ($password != $actual_password) $password_error = true;

        if ($card_number == $actual_card_number && $password == $actual_password && !$installment_overpaid_error && !$installment_amount_error) {
            $insert_installment_sql = "INSERT INTO installment (id, amount) VALUES (" . $payment_id . ", " . $pay_amount . ");";
            $insert_installment_result = mysqli_query($connection, $insert_installment_sql);
            if ($insert_installment_result) {
                echo "<script>alert('Payment Successful!')</script>";
                $update_payment_sql = "UPDATE payment SET paid_amount = paid_amount + " . $pay_amount . " WHERE payment_id = " . $payment_id . ";";
                $update_payment_result = mysqli_query($connection, $update_payment_sql);
                if ($update_payment_result) {
                    header('Location: ../');
                }
            }

        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../../../resource/ico.svg">
    <title>LandSphere | Your Personal Land Manager</title>
</head>

<body class="bg-beige-default">
<nav id="navbar"
     class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="../../../../index.php" class="flex select-none">
            <img alt="" src="../../../../resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="../../../about-us"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="../../../projects"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="../../../on-sale"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                On Sale
            </a>
            <a href="../../../news"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="../../../contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Contact</a>
        </div>
    </div>

    <button id="search_button" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-3 pr-3
                    flex gap-12 items-center">
        <span class="flex items-center gap-2">
            <img src="../../../../resource/icons/search-navbar.svg" alt=" ">
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
                   <a href="../../owned-land" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Owned Lands</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../sale-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Sale List</span>
                    </a>
                </li>

                <li>
                    <a href="../../successors" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Successor</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../payment-list" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Payment</span>
                    </a>
                </li>
                
                <li>
                    <a href="../../booking-land" class="flex mb-2 px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Bookings</span>
                    </a>
                </li>
                <hr class="w-full h-1 mx-auto my-1 bg-gray-300 border-0 rounded-full">
                
                <li>
                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../../../resource/icons/dashboard/settings.svg" alt="">
                        </span>
                        <span class="font-medium text-primary">Landsphere</span><span>Settings</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="../../account-settings" class="flex px-4 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <span>
                            <img src="../../../../resource/icons/dashboard/account.svg" alt="">
                        </span>
                        <span>Manage your Account</span>
                    </a>
                </li>
                <hr>
                <li>
                    <form method="post" action="" class="flex px-4 mb-1.5 py-2 hover:bg-gray-100 gap-2 w-full items-center">
                        <button name="sign_out" class="w-full flex gap-2 items-center text-red-600 rounded-2xl">
                            <span>
                                <img src="../../../../resource/icons/dashboard/cancel.svg" alt="">
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
                <a href="../../../../index.php"
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
                        Your Payments
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
                        Installments of <span class="text-primary"><?php echo $land_title ?></span>
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>


<section id="main-section" class="container mx-auto my-auto mt-48 mb-16 pl-28 pr-28">
    <main class="flex flex-col gap-2 items-center justify-center">
        <h1 class="text-3xl font-bold text-center text-gray-700">
            <?php
                if ($full_payment) echo 'Full Payment of';
                else echo 'Installments of';
                ?>
        </h1>
        <h1 class=" font-bold text-center text-4xl text-primary">
            <?php echo $land_title ?>
        </h1>
        <div class="bg-beige-darkest text-zinc-600 w-fit font-mono align-middle p-1 rounded-xl font-sm px-3">
            <?php echo $land_id ?>
        </div>
        <p class="p-1 rounded-xl px-3 text-zinc-400 font-bold font-mono">
            <?php echo $land_address ?>
        </p>
    </main>
    <main class="mt-12 grid grid-cols-2 gap-6">
        <div class="m-2 p-6 flex-col flex gap-3 ">
            <h1 class="text-2xl font-bold text-primary text-center">
                <?php
                if ($full_payment) echo 'Full Payment';
                else echo 'Pay an Installment';
                ?>

            </h1>
            <form method="post" action="" class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="installment_amount" class="text-sm font-bold pl-4 flex justify-between">
                        Enter the amount you want to pay
                        <span
                            class="font-bold text-zinc-500 font-mono">(Max Amount: $<?php echo $max_payable_amount ?>)</span>
                    </label>
                    <input type="number"
                           name="installment_amount"
                           id="installment_amount"
                           placeholder="Enter Amount ($)"
                        <?php if ($full_payment) echo 'value="' . $max_payable_amount . '" disabled'; ?>
                           class="w-full rounded-xl text-center
                                py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono disabled:cursor-not-allowed
                               disabled:border disabled:border-gray-300 disabled:bg-gray-100
                               <?php if ($installment_amount_left_blank || $installment_amount_error || $installment_overpaid_error) echo ' border-2 border-red-500 bg-red-100 '; ?>"
                    />
                    <?php
                    if ($installment_amount_left_blank && !$full_payment)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Installment Amount left empty</label>';
                    if ($installment_amount_error && !$full_payment)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Invalid Installment Value</label>';
                    if ($installment_overpaid_error && !$full_payment)
                        echo <<< HTML
                            <label for="installment_amount" class="text-sm text-center text-red-600 ">Installment Overpaid. Amount cannot exceed $$max_payable_amount</label>
                        HTML;

                    ?>

                </div>

                <hr class="border-4 border-gray-400 rounded-full my-2">

                <div class="flex flex-col gap-2 ">
                    <label for="card_number" class="text-sm font-bold pl-4">Enter Your Card Number</label>
                    <input type="text"
                           name="card_number"
                           id="card_number"
                           placeholder="XXXX-XXXX-XXXX-XXXX"
                           class="w-full rounded-xl text-center tracking-widest
                               py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono
                               <?php if ($card_number_left_blank || $card_number_error) echo ' border-2 border-red-500 bg-red-100 '; ?>"
                    />
                    <?php
                    if ($card_number_left_blank)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Card number left empty</label>';
                    if ($card_number_error)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Card number did not match</label>';
                    ?>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password" class="text-sm font-bold pl-4">Enter Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Enter Password"
                           class="w-full rounded-xl text-center
                               py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono
                               <?php if ($password_left_blank || $password_error) echo ' border-2 border-red-500 bg-red-100 '; ?>"
                    />
                    <?php
                    if ($password_left_blank)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Password left empty</label>';
                    if ($password_error)
                        echo '<label for="installment_amount" class="text-sm text-center text-red-600 ">Password did not match</label>';
                    ?>
                </div>

                <button type="submit" name="submit"
                        class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-full hover:bg-green-800
                        hover:shadow-lg">
                    Pay Now
                </button>

            </form>
        </div>

        <div class="flex-col flex gap-3 pb-4">

            <div class="m-2 p-6 flex-col flex gap-3 pb-4 rounded-2xl">
                <?php
                if ($get_number_of_installments > 0) {
                    echo <<< HTML
                            <h1 class="text-2xl font-bold text-primary text-center">
                                Paid Installments
                            </h1>
                         HTML;
                } else {
                    echo <<< HTML
                            <h1 class="text-2xl font-bold text-zinc-500 text-center">
                                No Payment Yet
                            </h1>
                         HTML;
                }

                ?>


                <?php
                if ($get_number_of_installments > 0) {
                    $get_installment_information = mysqli_fetch_assoc($get_installment_information_result);
                    while ($get_installment_information) {
                        $installment_date = $get_installment_information['date'];
                        $installment_amount = $get_installment_information['amount'];
                        $installment_amount = number_format($installment_amount, 2);

                        echo <<< HTML
                        <div class="bg-beige-light flex flex-col gap-1 p-4 shadow-lg hover:shadow-xl rounded-2xl motion-safe:hover:scale-[1.02] transform
                            transition-all duration-200">
                            <div class="flex justify-between font-mono tracking-wide">
                            <div class="bg-beige-darkest text-sm px-2 py-1 rounded-xl">$land_id</div>
                            <div class="bg-zinc-600 text-white text-sm px-2 py-1 rounded-xl opacity-50">$payment_id</div>
                            </div>                            
                            <h1 class="pb-2 font-mono font-bold text-end pt-2">$installment_date</h1>

                            <div class="flex justify-between border-t-4 border-dashed border-zinc-500 pt-2">
                                <h1 class="text-lg font-bold">Paid Amount</h1>
                                <h1 class="font-bold text-xl text-primary font-mono tracking-widest">$$installment_amount</h1>
                            </div>
                        </div>

                        HTML;
                        $get_installment_information = mysqli_fetch_assoc($get_installment_information_result);
                    }
                    $print_paid_amount = number_format($total_paid, 2);
                    echo <<< HTML
                        <div class="flex justify-between opacity-75">
                            <h1 class="text-lg font-bold">
                                Total Paid Amount
                            </h1>
                            <h1 class="text-lg font-mono tracking-widest font-bold text-primary">
                                $$print_paid_amount
                            </h1>
                        </div>
                    HTML;

                }
                ?>


            </div>
        </div>
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
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Community </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Rules and Regulations </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Volunteers </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Opt Out </a>


            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Guides </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Office Locations </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Benefits </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> History </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety &
                    Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="../../../../static/error/HTTP501.html">
                <img src="../../../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="../../../../static/error/HTTP501.html">
                <img src="../../../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="../../../../static/error/HTTP501.html">
                <img src="../../../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="../../../../static/error/HTTP501.html">
                <img src="../../../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Terms of Service </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Privacy Policy </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Cookie Settings </a>
                <a href="../../../../static/error/HTTP501.html" class="hover:text-green-300"> Accessibility </a>
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
                <img src="../../../../resource/icons/modal-search-icon.svg" alt="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
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
        fetch("../../../../utility/php/quick_search.php", {
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
        if (query.length > 1) {
            let form_data = new FormData();
            form_data.append('query', query);
            let ajax_request = new XMLHttpRequest();
            ajax_request.open('POST', '../../../../utility/php/quick_search.php');
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
                            html += '<img class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300" src="../../../../resource/icons/jump.svg" alt="">';
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

