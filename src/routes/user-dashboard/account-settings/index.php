<?php
session_start();

if (!isset($_SESSION['id'])) {
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

// Get user Data
$fetch_existing_user_data_sql = "SELECT * FROM user WHERE nid = " . $_SESSION['id'] . ";";
$fetch_existing_data_result = mysqli_query($connection, $fetch_existing_user_data_sql);
$fetch_existing_data_row = mysqli_fetch_assoc($fetch_existing_data_result);

// Get User Password
$fetch_existing_password_sql = "SELECT * FROM login WHERE user_nid = " . $_SESSION['id'] . ";";
$fetch_existing_password_result = mysqli_query($connection, $fetch_existing_password_sql);
$fetch_existing_password_row = mysqli_fetch_assoc($fetch_existing_password_result);

// Get User Payment Method
$fetch_existing_payment_sql = "SELECT * FROM payment_method WHERE user_id = " . $_SESSION['id'] . ";";
$fetch_existing_payment_result = mysqli_query($connection, $fetch_existing_payment_sql);
$fetch_existing_payment_row = mysqli_fetch_assoc($fetch_existing_payment_result);
$previous_card_exist = mysqli_num_rows($fetch_existing_payment_result) > 0;

// Authentication Variable
$password_modify = false;
$password_match = false;
$current_password_match = false;
$authentication = true;

if (isset($_POST["submit"])) {
    // User Data Information
    $new_name = $_POST['full_name'];
    if (empty($new_name)) $new_name = $fetch_existing_data_row['full_name'];

    $new_email = $_POST['email'];
    if (empty($new_email)) $new_email = $fetch_existing_data_row['email'];

    $new_phone_number = $_POST['phone_number'];
    if (empty($new_phone_number)) $new_phone_number = $fetch_existing_data_row['phone_number'];

    $new_address = $_POST['address'];
    if (empty($new_address)) $new_address = $fetch_existing_data_row['address'];

    $new_occupation = $_POST['occupation'];
    if (empty($new_occupation)) $new_occupation = $fetch_existing_data_row['occupation'];

    $new_yearly_income = $_POST['yearly_income'];
    if (empty($new_yearly_income)) $new_yearly_income = $fetch_existing_data_row['yearly_income'];

    // User Password Information
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) $password_modify = true;
    if ($password_modify) $password_match = $new_password == $confirm_password;

    // User Card Information
    $card_number = $_POST['card_number'];
    $card_expire_date = $_POST['expiry_date'];
    $card_cvc = $_POST['cvc'];
    $card_name = $_POST['name_on_card'];
    $card_billing_address = $_POST['billing_address'];

    $current_password = $_POST['current_password'];
    $current_password_match = $current_password == $fetch_existing_password_row['password'];

    // Final Authentication check
    // If password is modified, then check if the new password matches and the current password matches
    // If password is not modified, then check if the current password matches
    $authentication = $password_modify ? $password_match && $current_password_match : $current_password_match;


    if ($authentication) {
        $update_new_user_data_sql = "UPDATE user 
            SET full_name = '$new_name', email = '$new_email', phone_number = '$new_phone_number', address = 
                '$new_address', occupation = '$new_occupation', yearly_income = '$new_yearly_income' 
            WHERE nid = " . $_SESSION['id'] . ";";
        $update_new_user_data_result = mysqli_query($connection, $update_new_user_data_sql);

        if ($password_modify) {
            $update_new_password_sql = "UPDATE login SET password = '$new_password' WHERE user_nid = " . $_SESSION['id'] . ";";
            $update_new_password_result = mysqli_query($connection, $update_new_password_sql);
        }

        if ($previous_card_exist) {
            if (empty($card_number)) $card_number = $fetch_existing_payment_row['card_number'];
            if (empty($card_expire_date)) $card_expire_date = $fetch_existing_payment_row['expire_date'];
            if (empty($card_cvc)) $card_cvc = $fetch_existing_payment_row['cvc'];
            if (empty($card_name)) $card_name = $fetch_existing_payment_row['name_on_card'];
            if (empty($card_billing_address)) $card_billing_address = $fetch_existing_payment_row['billing_address'];

            $update_new_payment_sql = "UPDATE payment_method 
                SET card_number = '$card_number', expire_date = '$card_expire_date', cvc = '$card_cvc', 
                    name_on_card = '$card_name', billing_address = '$card_billing_address' 
                WHERE user_id = " . $_SESSION['id'] . ";";
            $update_new_payment_result = mysqli_query($connection, $update_new_payment_sql);
        } else {
            if (!empty($card_number) || !empty($card_expire_date) || !empty($card_cvc) || !empty($card_name) || !empty($card_billing_address)) {
                $insert_new_payment_sql = "INSERT INTO payment_method (user_id, card_number, expire_date, cvc, name_on_card, billing_address) 
                VALUES (" . $_SESSION['id'] . ", '$card_number', '$card_expire_date', '$card_cvc', '$card_name', '$card_billing_address');";
                $insert_new_payment_result = mysqli_query($connection, $insert_new_payment_sql);
            }

        }
        header("Location: ../");
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../../resource/ico.svg">
    <title>Contact Us</title>
</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-zinc-300 flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex-none gap-5 items-center">
        <a href="../../../index.php" class="flex select-none">
            <img alt="" src="../../../resource/icons/landSphere.svg">
        </a>
    </div>

    <div class="flex gap-2 items-end grow">
        <h1 class="text-xl font-bold text-end w-full text-zinc-600">Customize Your Account</h1>
    </div>

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
                        Account Settings
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section class="container mx-auto my-auto mt-48 mb-24 pl-16 pr-16">
    <form method="post" action="" class="grid grid-cols-2 gap-4 place-items-start align-middle items-center">
        <div id="profile_image" class="w-full flex flex-col items-center justify-center">
            <?php
            $rnd = rand(0, 1000000);
            echo "<img class='h-48 w-48 rounded-full'
                 src='https://api.dicebear.com/6.x/avataaars/svg?seed=" . $rnd . "%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9'
                 alt='user photo'>"
            ?>
            <p class="text-xl mt-6 font-bold">
                <?php echo $fetch_existing_data_row['full_name']; ?>
            </p>
            <p class="text-lg text-gray-400 font-medium">
                <?php echo $fetch_existing_data_row['email']; ?>
            </p>

            <div class="mt-6 flex flex-col g-4 items-center w-fit">
                <h1 class="text-center text-gray-400 font-light">
                    To change <br>
                    <span class="font-medium">Birthday</span>,
                    <span class="font-medium">National ID number</span>,<br>
                    <span class="font-medium">Birth Certificate Number</span>,
                    <span class="font-medium">Passport Number</span>;<br>
                    contact us.
                </h1>

                <a href="../index.php" class="hover:shadow-form w-full
                        py-3 px-8 text-center text-base mt-8 border border-primary text-primary
                        font-medium  outline-none items-center hover:bg-green-700 hover:text-white
                        col-span-2 rounded-full">Return to Home</a>

            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-col gap-3">
                <label for="nid" class="text-sm pl-2">National ID</label>
                <input type="text"
                       name="nid" disabled
                       id="nid"
                    <?php
                    echo "value='" . $fetch_existing_data_row['nid'] . "'";
                    ?>
                       class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono disabled:opacity-50"
                />

                <label for="full_name" class="text-sm pl-2">Full Name</label>
                <input type="text"
                       name="full_name"
                       id="full_name"
                    <?php
                    echo "value='" . $fetch_existing_data_row['full_name'] . "'";
                    ?>
                       class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                />

                <label for="email" class="text-sm pl-2">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                    <?php
                    echo "value='" . $fetch_existing_data_row['email'] . "'";
                    ?>
                       class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                />


                <div class="flex gap-4">
                    <div class="flex-col">
                        <label for="phone_number" class="text-sm pl-2">Phone Number</label>
                        <input type="text"
                               name="phone_number"
                               id="phone_number"
                            <?php
                            echo "value='" . $fetch_existing_data_row['phone_number'] . "'";
                            ?>
                               class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                    </div>

                    <div class="flex-col">
                        <label for="birthday" class="text-sm pl-2">Birthday</label>
                        <input type="text" disabled
                               name="birthday"
                               id="birthday"
                            <?php
                            echo "value='" . $fetch_existing_data_row['date_of_birth'] . "'";
                            ?>
                               class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono disabled:opacity-70"
                        />
                    </div>

                </div>

                <label for="address" class="text-sm pl-2">Permanent Address</label>
                <input type="text"
                       name="address"
                       id="address"
                    <?php
                    echo "value='" . $fetch_existing_data_row['address'] . "'";
                    ?>
                       class="-mt-2 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                />

                <div class="flex gap-4">
                    <div class="flex-col">
                        <label for="occupation" class="text-sm pl-2">Occupation</label>
                        <input type="text"
                               name="occupation"
                               id="occupation"
                            <?php
                            echo "value='" . $fetch_existing_data_row['occupation'] . "'";
                            ?>
                               class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                    </div>

                    <div class="flex-col">
                        <label for="yearly_income" class="text-sm pl-2">Yearly Income</label>
                        <input type="text"
                               name="yearly_income"
                               id="yearly_income"
                            <?php
                            echo "value='" . $fetch_existing_data_row['yearly_income'] . "'";
                            ?>
                               class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                    </div>

                </div>

            </div>
        </div>

        <hr class="col-span-2 w-full h-1 mx-auto my-8 bg-gray-300 border-0 rounded-full">

        <div class="flex flex-col place-items-center w-full">
            <img class="mb-4" src="../../../resource/icons/dashboard/lock.svg" alt="">
            <h1 class="text-md text-gray-700 font-medium">
                Secure your account
            </h1>
            <span class="font-light text-gray-600">
                BY
            </span>

            <h1 class="text-xl font-bold font-mono text-primary">
                Strong Password</h1>
        </div>

        <div class="w-full flex flex-col gap-4">
            <div class="flex-col">
                <label for="new_password" class="text-sm pl-2">New Password</label>
                <input type="password"
                       name="new_password"
                       id="new_password"
                       class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center"
                />
            </div>

            <div class="flex-col">
                <label for="confirm_password" class="text-sm pl-2">Confirm Password</label>
                <input type="password"
                       name="confirm_password"
                       id="confirm_password"
                       class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center"
                />
            </div>
        </div>

        <hr class="col-span-2 w-full h-1 mx-auto my-8 bg-gray-300 border-0 rounded-full">


        <div class="flex flex-col place-items-center w-full">
            <img class="mb-4" src="../../../resource/icons/dashboard/card.svg" alt="">
            <h1 class="text-md text-gray-700 font-medium">
                Add a Payment Method
            </h1>
            <span class="font-light text-gray-600">
                SECURED BY
            </span>

            <h1 class="text-xl font-bold font-mono text-primary">
                SSL Encryption</h1>
            </h1>

        </div>
        <div class="w-full flex flex-col gap-4">
            <div class="flex-col">
                <label for="card_number" class="text-sm pl-2">Card Number</label>
                <input type="text"
                       name="card_number"
                       id="card_number" placeholder="XXXX-XXXX-XXXX-XXXX"
                       class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center  tracking-widest"
                />
            </div>

            <div class="flex gap-4 items-center">
                <div class="flex-col">
                    <label for="expiry_date" class="text-sm pl-2">Expiry Date</label>
                    <input type="date"
                           name="expiry_date"
                           id="expiry_date"
                           class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center"
                    />
                </div>

                <div class="flex-col">
                    <label for="cvc" class="text-sm pl-2">CVC</label>
                    <input type="text"
                           name="cvc"
                           id="cvc" placeholder="XXX"
                           class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center"
                    />
                </div>

            </div>

            <div class="flex-col">
                <label for="name_on_card" class="text-sm pl-2">Card Holder Name</label>
                <input type="text"
                       name="name_on_card"
                       id="name_on_card" placeholder="Card Holder Name"
                    <?php
                    if ($previous_card_exist) {
                        echo "value='" . $fetch_existing_payment_row['name_on_card'] . "'";
                    } ?>
                       class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono  tracking-widest"
                />
            </div>

            <div class="flex-col">
                <label for="billing_address" class="text-sm pl-2">Billing Address</label>
                <input type="text"
                       name="billing_address"
                    <?php
                    if ($previous_card_exist) {
                        echo "value='" . $fetch_existing_payment_row['billing_address'] . "'";
                    } ?>
                       id="billing_address" placeholder="Billing Address"
                       class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono  tracking-widest"
                />
            </div>
        </div>


        <hr class="col-span-2 w-full h-1 mx-auto my-8 bg-gray-300 border-0 rounded-full">
        <div class="col-span-2 flex w-full justify-center gap-12">
            <input type="password"
                   name="current_password"
                   id="current_password"
                   placeholder="Enter Password to Save Changes"
                   class="mt-1 rounded-xl
                               w-96 py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono text-center"
            />
            <label for="current_password"></label>

            <button name="submit" type="submit"
                    class="hover:shadow-form bg-green-700
                        px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-full hover:bg-green-800
                        hover:shadow-lg">
                Save and Return to Home
            </button>
    </form>
</section>


<footer id="index_footer" class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12
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

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</html>