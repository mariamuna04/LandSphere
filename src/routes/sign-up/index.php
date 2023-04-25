<?php
session_start();

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

// Error variables (BLANK)
$full_name_left_blank = false;
$email_left_blank = false;
$phone_number_left_blank = false;
$date_of_birth_left_blank = false;
$address_left_blank = false;
$nid_left_blank = false;
$password_left_blank = false;
$confirm_password_left_blank = false;

// Error variables (NOT MATCH)
$password_not_match = false;


if (isset($_POST['submit'])) {
    // Essential Info Check
    $full_name = $_POST['full_name'];
    if (empty($full_name)) $full_name_left_blank = true;
    $email = $_POST['email'];
    if (empty($email)) $email_left_blank = true;
    $phone_number = $_POST['phone_number'];
    if (empty($phone_number)) $phone_number_left_blank = true;
    $date_of_birth = $_POST['date_of_birth'];
    if (empty($date_of_birth)) $date_of_birth_left_blank = true;
    $address = $_POST['address'];
    if (empty($address)) $address_left_blank = true;
    $nid = $_POST['nid'];
    if (empty($nid)) $nid_left_blank = true;

    $essential_info_left_blank = $full_name_left_blank || $email_left_blank || $phone_number_left_blank || $date_of_birth_left_blank || $address_left_blank || $nid_left_blank;

    // Password Check
    $password = $_POST['new_password'];
    if (empty($password)) $password_left_blank = true;
    $confirm_password = $_POST['confirm_password'];
    if (empty($confirm_password)) $confirm_password_left_blank = true;

    if (!$password_left_blank || !$confirm_password_left_blank) {
        if ($password != $confirm_password) {
            $password_not_match = true;
        }
    }

    $proceed = !$essential_info_left_blank && !$password_not_match;

    if ($proceed) {
        $create_a_user_sql = "INSERT INTO user 
    (full_name, email, phone_number, date_of_birth, address, nid) 
    VALUES ('" . $full_name . "', '" . $email . "', '" . $phone_number . "', '" . $date_of_birth . "', '" . $address . "', " . $nid . ")";
        $create_a_user_result = mysqli_query($connection, $create_a_user_sql);
        $echo = "Hello";
        if ($create_a_user_result) {
            # Make password hash sha256
            $password = hash('sha256', $password);
            $create_login_entry_sql = "INSERT INTO login (user_nid, password) VALUES ('" . $nid . "', '" . $password . "')";
            $create_login_entry_result = mysqli_query($connection, $create_login_entry_sql);
            if ($create_login_entry_result) {
                header('Location: ../sign-in/');
            } else {
                header('Location: ../../static/error/HTTP521.html');
            }
        } else {
            header('Location: ../../static/error/HTTP521.html');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../resource/ico.svg">
    <title>Sign In</title>
</head>
<body class="bg-sign-up-background-light bg-cover">
<div class="flex items-center justify-center h-screen">


    <div class="mx-auto w-[1000px] h-[610px] p-12
                rounded-xl bg-opacity-60 backdrop-blur-md bg-beige-light
                shadow-2xl animate-fadeIn">

        <h2 class="align-middle pb-2 text-center font-black text-2xl select-none">
            Let's Create Your Account
        </h2>

        <h2 class="align-middle pb-6 text-center font-semibold text-gray-400 text-md select-none">
            Fill up this form, and we'll create an account for you
        </h2>

        <form action="" method="POST" class="pb-[4rem] h-full flex flex-col justify-between">
            <div class="grid grid-cols-9 gap-x-4">
                <section class="col-start-1 col-span-4 flex-col w-full flex gap-2">
                    <input type="text"
                           name="full_name"
                           id="full_name"
                           placeholder="Full Name"
                           class="w-full rounded-xl
                                py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono<?php
                           if ($full_name_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />
                    <label for="full_name" class="text-sm"></label>

                    <input type="email"
                           name="email"
                           id="email"
                           placeholder="Email Address"
                           class="w-full rounded-xl
                                py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono<?php
                           if ($email_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />
                    <label for="email" class="text-sm"></label>

                    <input type="tel"
                           name="phone_number"
                           id="phone_number"
                           placeholder="Phone Number"
                           class="w-full rounded-xl
                                py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono<?php
                           if ($phone_number_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />
                    <label for="phone_number" class="text-sm"></label>

                    <label for="date_of_birth" class="text-sm pl-4 text-gray-500">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           id="date_of_birth"
                           placeholder="Date of Birth"
                           class="w-full rounded-xl
                                py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono<?php
                           if ($date_of_birth_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />

                    <input type="text"
                           name="address"
                           id="address"
                           placeholder="Permanent Address"
                           class="w-full rounded-xl mt-2
                               py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono<?php
                           if ($address_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />
                    <label for="address" class="text-sm"></label>
                </section>

                <hr class="relative left-1/2 -ml-0.5 w-0.5 h-full bg-gray-300 rounded-full">

                <section class="col-start-6 col-span-4 flex-col w-full flex gap-2">
                    <input type="text"
                           name="nid"
                           id="nid"
                           placeholder="National ID"
                           class="w-full rounded-xl
                               py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono
                               <?php
                           if ($nid_left_blank) echo ' border border-red-500 bg-red-100 ';
                           ?>"
                    />
                    <label for="nid"></label>


                    <input type="text"
                           name="birth_certificate_number"
                           id="birth_certificate_number"
                           placeholder="Birth Certificate Number (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="birth_certificate_number"></label>

                    <input type="text"
                           name="passport_number"
                           id="passport_number"
                           placeholder="Passport Number (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="passport_number" class="text-xs text-gray-500 text-center opacity-75">
                        You cannot change NID, Birth Certificate Number, and Passport Number after registration
                    </label>

                    <input type="text"
                           name="occupation"
                           id="occupation"
                           placeholder="Occupation (optional)"
                           class="w-full rounded-xl
                               py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="occupation"></label>

                    <input type="text"
                           name="yearly_income"
                           id="yearly_income"
                           placeholder="Yearly Income (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="yearly_income"></label>


                </section>
            </div>

            <div id="end_section" class="flex flex-col items-center align-middle border-t pt-4 mt-4">
                <div class="flex justify-evenly gap-2 items-center w-full">
                    <a href="../sign-in"
                       class="hover:border-primary text-gray-500 border border-beige-darker transition-all pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle hover:text-green-800">
                        Sign In Instead
                    </a>

                    <div class="flex items-center gap-2 justify-center">
                        <input type="password"
                               name="new_password"
                               id="new_password"
                               placeholder="Enter New Password"
                               class="rounded-xl text-center border
                               py-2 px-3 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-lg font-mono
                               <?php
                               if ($password_left_blank || $password_not_match) echo ' border-red-500 bg-red-100 ';
                               ?>"
                        />
                        <label for="new_password" class="text-sm"></label>

                        <input type="password"
                               name="confirm_password"
                               id="confirm_password"
                               placeholder="Confirm Password"
                               class="rounded-xl text-center border
                               py-2 px-3 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-lg font-mono
                               <?php
                               if ($confirm_password_left_blank || $password_not_match) echo ' border-red-500 bg-red-100 ';
                               ?>"
                        />
                        <label for="confirm_password" class="text-sm"></label>
                    </div>

                    <button name="submit" type="submit"
                            class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-full hover:bg-green-800
                        hover:shadow-lg">
                        Submit
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>

</body>

</html>