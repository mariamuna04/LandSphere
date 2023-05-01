<?php
//print error
ini_set('display_errors', 1);
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

$get_spouse_info = "SELECT * FROM marital_status WHERE partner_nid = " . $user_id . ";";
$get_spouse_info_result = mysqli_query($connection, $get_spouse_info);
$get_spouse_info_row = mysqli_fetch_assoc($get_spouse_info_result);

$get_children_info = "SELECT * FROM children WHERE parent_nid = " . $user_id . " ORDER BY birth_certificate_number;";
$get_children_info_result = mysqli_query($connection, $get_children_info);
$number_of_children = mysqli_num_rows($get_children_info_result);

if (isset($_POST['update_spouse'])) {
    $nid = $_POST['spouse_nid'];
    if (empty($nid)) $nid = $get_spouse_info_row['nid'];

    $name = $_POST['spouse_name'];
    if (empty($name)) $name = $get_spouse_info_row['full_name'];

    $email = $_POST['spouse_email'];

    if (empty($email)) {
        $email = $get_spouse_info_row['email'];
    }
    $phone = $_POST['spouse_phone_number'];

    if (empty($phone)) {
        $phone = $get_spouse_info_row['phone_number'];
        if (empty($phone)) {
            $phone = "";
        }
    }
    $birth_certificate = $_POST['spouse_birth_certificate'];

    if (empty($birth_certificate)) {
        $birth_certificate = $get_spouse_info_row['birth_certificate_no'];
    }
    $passport = $_POST['spouse_passport_number'];


    if (empty($passport)) {
        $passport = $get_spouse_info_row['passport_number'];
        if (empty($passport)) {
            $passport = "";
        }
    }
    $division_index = $_POST['spouse_division_index'];

    if (empty($division_index)) {
        $division_index = $get_spouse_info_row['division_index'];
    }

    if ($get_spouse_info_row) {
        $update_spouse_info = "UPDATE marital_status SET nid = " . $nid . ", full_name = '" . $name . "', email = '" . $email . "', phone_number = '" . $phone . "', birth_certificate_no = '" . $birth_certificate . "', passport_number = '" . $passport . "', division_index = " . $division_index . " WHERE partner_nid = " . $user_id . ";";
        $update_spouse_info_result = mysqli_query($connection, $update_spouse_info);
        if ($update_spouse_info_result) {
            header('Location: ./');
        }
    } else {
        $insert_spouse_info = "INSERT INTO marital_status (nid, full_name, email, phone_number, birth_certificate_no, passport_number, division_index, partner_nid) VALUES (" . $nid . ", '" . $name . "', '" . $email . "', '" . $phone . "', '" . $birth_certificate . "', '" . $passport . "', " . $division_index . ", " . $user_id . ");";
        $insert_spouse_info_result = mysqli_query($connection, $insert_spouse_info);
        if ($insert_spouse_info_result) {
            header('Location: ./');
        }
    }
}

if (isset($_POST['add_spouse'])) {
    $new_spouse_nid = $_POST['new_spouse_nid'];
    $new_spouse_name = $_POST['new_spouse_name'];
    $new_spouse_email = $_POST['new_spouse_email'];
    $new_spouse_birth_certificate = $_POST['new_spouse_birth_certificate'];

    $get_remaining_division_index = "SELECT SUM(division_index) FROM children WHERE parent_nid = " . $user_id . ";";
    $get_remaining_division_index_result = mysqli_query($connection, $get_remaining_division_index);
    $get_remaining_division_index_row = mysqli_fetch_assoc($get_remaining_division_index_result);
    $new_spouse_division_index = 1 - $get_remaining_division_index_row['SUM(division_index)'];


    $insert_new_spouse = "INSERT INTO marital_status (nid, partner_nid, full_name, email, phone_number, passport_number, birth_certificate_no, division_index) 
VALUES (" . $new_spouse_nid . ", " . $user_id . ", '" . $new_spouse_name . "', '" . $new_spouse_email . "', NULL, NULL, '" . $new_spouse_birth_certificate . "', " . $new_spouse_division_index . ");";
    $insert_new_spouse_result = mysqli_query($connection, $insert_new_spouse);
    if ($insert_new_spouse_result) {
        header('Location: ./?add_spouse=success');
    }
}

if (isset($_POST['remove_spouse'])) {
    $remove_spouse = "DELETE FROM marital_status WHERE partner_nid = " . $user_id . ";";
    $remove_spouse_result = mysqli_query($connection, $remove_spouse);
    if ($remove_spouse_result) {
        header('Location: ./?remove_spouse=success');
    }
}

if (isset($_POST['add_children'])) {
    $new_child_birth_certificate = $_POST['new_children_birth_certificate'];
    $new_child_name = $_POST['new_children_name'];
    $new_child_email = $_POST['new_children_email'];

    $insert_new_child = "INSERT INTO children (birth_certificate_number, parent_nid, full_name, email, phone_number, division_index) 
VALUES ('" . $new_child_birth_certificate . "', " . $user_id . ", '" . $new_child_name . "', '" . $new_child_email . "', NULL, 0);";
    $insert_new_child_result = mysqli_query($connection, $insert_new_child);
    if ($insert_new_child_result) {
        header('Location: ./?add_children=success');
    }
}

foreach ($_POST as $name => $value) {
    if (str_starts_with($name, "remove_children_")) {
        $buttonNumber = substr($name, strlen("remove_children_"));
        header('Location: ../../../utility/php/remove_children.php?index=' . $buttonNumber);
    }
}

foreach ($_POST as $name => $value) {
    if (str_starts_with($name, "update_children_")) {
        $buttonNumber = substr($name, strlen("remove_children_"));

        $new_child_name = $_POST['new_children_name_' . $buttonNumber];
        $new_child_email = $_POST['new_children_email_' . $buttonNumber];
        $new_children_phone = $_POST['new_children_phone_' . $buttonNumber];
        if (empty($new_children_phone) || $new_children_phone == "") {
            $new_children_phone = "";
        }
        $new_children_division_index = $_POST['new_children_division_index_' . $buttonNumber];
        if (empty($new_children_division_index)) {
            $new_children_division_index = 0;
        } else {
            $new_children_division_index = $new_children_division_index / 100;
        }


        $update_children = "UPDATE children SET full_name = '" . $new_child_name . "', email = '" . $new_child_email . "', phone_number = '" . $new_children_phone . "', division_index = " . $new_children_division_index . " WHERE parent_nid = " . $user_id . " AND birth_certificate_number = " . $buttonNumber . ";";
        $update_children_result = mysqli_query($connection, $update_children);
        if ($update_children_result) {
            header('Location: ./?success=1');
        }


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
<nav id="index_navbar"
     class="bg-zinc-300 flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex-none gap-5 items-center">
        <a href="../../../index.php" class="flex select-none">
            <img alt="" src="../../../resource/icons/landSphere.svg">
        </a>
    </div>

    <div class="flex gap-2 items-end grow">
        <h1 class="text-xl font-bold text-end w-full text-zinc-600">Successor Settings</h1>
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
                        Successor Settings
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section class="container mx-auto my-auto mt-48 mb-24 pl-16 pr-16">
    <form method="post" action="" class="grid grid-cols-2 gap-12 place-items-start">
        <div class="col-span-2 w-full h-1 mx-auto ">
            <div class="flex gap-2 justify-end align-middle items-center">
                <h1 class="text-end text-3xl font-bold text-zinc-400">Your Spouse</h1>

                <?php if (!$get_spouse_info_row) {
                    echo <<< HTML

<button id="spouse_add_button" type="button" data-modal-target="spouse_add_modal" data-modal-toggle="spouse_add_modal"
            class="rounded-full opacity-75 hover:opacity-100 transition-all duration-300 hover:bg-green-100
                    flex gap-12 items-center">
        <span class="flex items-center gap-2">
            <img class="h-8 w-8" src="../../../resource/icons/dashboard/add.svg" alt=" ">
        </span>
</button>



<div id="spouse_add_modal"
     tabindex="-1"
     aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto
     md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-60 bg-beige-darkest
     backdrop-blur-md transition-all shadow-xl animate-global_search_fadeIn">

    <div class="relative w-full max-w-2xl h-auto">
        
        <div class="relative rounded-2xl bg-beige-light p-8 flex flex-col gap-3">
            <h1 class="text-2xl font-bold text-zinc-500">Add Spouse</h1>
            <hr class="col-span-2 w-full h-1 mx-auto bg-gray-300 border-0 rounded-full">
            
            <label for="spouse_nid" class="text-sm pl-2">Spouse NID</label>
            <input type="text"
                   name="new_spouse_nid"
                   id="new_spouse_nid"
                   placeholder="NID Number"
                   class="-mt-1 w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md font-mono disabled:opacity-50"
            />
            
            <label for="spouse_name" class="text-sm pl-2">Name</label>
            <input type="text"
                   name="new_spouse_name"
                   id="new_spouse_name"
                   placeholder="Full Name"
                   class="-mt-1 w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md font-mono"
            />
            
                    <label for="spouse_email" class="text-sm pl-2">Spouse Email</label>
                    <input type="email"
                           name="new_spouse_email"
                           placeholder="someone@example.com"
                           id="new_spouse_email"
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono"
                    />
                    
                    <label for="spouse_birth_certificate" class="text-sm pl-2">Spouse Birth Certificate</label>
                    <input type="text"
                           name="new_spouse_birth_certificate"
                           id="new_spouse_birth_certificate"
                           placeholder="11 Digit Number"
             
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono tracking-widest"
                    />  
                    <button name="add_spouse" type="submit" class="mt-2 w-full rounded-xl
                           bg-green-600 py-3 px-6 text-base font-medium text-white
                           outline-none focus:shadow-md font-mono hover:bg-green-600 transition-all duration-300">
                        Add Spouse</button>                   
        </div>
    </div>
</div>

HTML;
                }
                ?>
            </div>
        </div>
        <hr class="col-span-2 w-full h-1 mx-auto bg-gray-300 border-0 rounded-full">

        <?php
        if ($get_spouse_info_row) {
            echo <<< HTML
            <div class="w-full">
                <div class="flex flex-col gap-3">
                    <label for="spouse_nid" class="text-sm pl-2">Spouse NID</label>
                    <input type="text"
                           name="spouse_nid"
                           id="spouse_nid"
                           placeholder="NID Number"
                           value={$get_spouse_info_row['nid']}
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono disabled:opacity-50"
                    />
    
                    <label for="spouse_email" class="text-sm pl-2">Spouse Email</label>
                    <input type="email"
                           name="spouse_email"
                           placeholder="someone@example.com"
                           value={$get_spouse_info_row['email']}
                           id="spouse_email"
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono"
                    />
    
    
                    <label for="spouse_birth_certificate" class="text-sm pl-2">Spouse Birth Certificate</label>
                    <input type="text"
                           name="spouse_birth_certificate"
                           id="spouse_birth_certificate"
                           placeholder="11 Digit Number"
                           value={$get_spouse_info_row['birth_certificate_no']}
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono tracking-widest"
                    />
    
                </div>
            </div>
            <div class="w-full">
                <div class="flex flex-col gap-3">
                    <label for="spouse_name" class="text-sm pl-2">Name</label>
                    <input type="text"
                           name="spouse_name"
                           id="spouse_name"
                           placeholder="Full Name"
                           value={$get_spouse_info_row['full_name']}
                           class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono"
                    />
    
                    <label for="spouse_phone_number" class="text-sm pl-2 pb-1">Phone Number</label>
                    <input type="text"
                           name="spouse_phone_number"
                           id="spouse_phone_number"
                           placeholder="+880 1xxx-xxxxxx"
                           value="{$get_spouse_info_row['phone_number']}"
                           class="-mt-2 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono"
                    />
    
    
                    <div class="flex gap-4">
                        <div class="flex-col">
                            <label for="spouse_passport_number" class="text-sm pl-2">Spouse Passport Number</label>
                            <input type="text"
                                   name="spouse_passport_number"
                                   id="spouse_passport_number"
                                   placeholder="7 Digit Number"
                                   value="{$get_spouse_info_row['passport_number']}"
                                   class="mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono disabled:opacity-70"
                            />
    
                        </div>
    
                        <div class="flex-col">
                            <label for="spouse_division_index" class="text-sm pl-2">Division Index</label>
                            <div class="flex items-center">
                                <input type="text"
                                       name="spouse_division_index"
                                       id="spouse_division_index"
                                       placeholder="Default: 50"
                                       value={$get_spouse_info_row['division_index']}
                                       class="mt-1  rounded-xl
                                   bg-white py-3 px-6 w-48 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono text-center"
                                />
                                <label for="spouse_division_index" class="text-xl pl-2">%</label>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            
            <div class="flex gap-4 items-center">
            <button name="remove_spouse" class="text-red-600 h-12 rounded-full
                           bg-red-100 py-3 px-6 text-base font-medium col-span-2 flex justify-center
                           outline-none focus:shadow-md font-mono hover:bg-red-200 transition-all duration-300">
                Remove Information
            </button>
            <button name="update_spouse" class="text-white h-12 rounded-full
                           bg-green-600 py-3 px-6 text-base font-medium col-span-2 flex justify-center
                           outline-none focus:shadow-md font-mono hover:bg-green-800 transition-all duration-300">
                Update Information
            </button>
            </div>
            
HTML;

        } else {
            echo <<< HTML
    <div class="w-full text-center col-span-2 h-1 mx-auto text-2xl font-bold text-zinc-400">
<h1>Opps! You do not have spouse...</h1>
</div>
HTML;


        }
        ?>


        <div class="col-span-2 w-full h-1 mx-auto flex justify-end text-3xl font-bold text-zinc-400 mt-16">
            <div class="flex items-center gap-2">
                <h1>Your Children</h1>
                <button id="children_add_button" type="button" data-modal-target="children_add_modal"
                        data-modal-toggle="children_add_modal"
                        class="rounded-full opacity-75 hover:opacity-100 transition-all duration-300 hover:bg-green-100
                    flex gap-12 items-center">
                    <span class="flex items-center gap-2">
                        <img class="h-8 w-8" src="../../../resource/icons/dashboard/add.svg" alt=" ">
                    </span>
                </button>


                <div id="children_add_modal"
                     tabindex="-1"
                     aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto
     md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-60 bg-beige-darkest
     backdrop-blur-md transition-all shadow-xl animate-global_search_fadeIn">

                    <div class="relative w-full max-w-2xl h-auto">

                        <div class="relative rounded-2xl bg-beige-light p-8 flex flex-col gap-3">
                            <h1 class="text-2xl font-bold text-zinc-500">Add Children</h1>
                            <hr class="col-span-2 w-full h-1 mx-auto bg-gray-300 border-0 rounded-full">

                            <label for="spouse_nid" class="text-sm pl-2">Birth Certificate Number</label>
                            <input type="text"
                                   name="new_children_birth_certificate"
                                   id="new_children_birth_certificate"
                                   placeholder="Birth Certificate Number"
                                   class="-mt-1 w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md font-mono disabled:opacity-50"
                            />

                            <label for="spouse_name" class="text-sm pl-2">Name</label>
                            <input type="text"
                                   name="new_children_name"
                                   id="new_children_name"
                                   placeholder="Full Name"
                                   class="-mt-1 w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md font-mono"
                            />

                            <label for="spouse_email" class="text-sm pl-2">Email</label>
                            <input type="email"
                                   name="new_children_email"
                                   placeholder="someone@example.com"
                                   id="new_children_email"
                                   class="-mt-1 w-full rounded-xl
                                   bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                                   outline-none focus:shadow-md font-mono"
                            />
                            <button name="add_children" type="submit" class="mt-2 w-full rounded-xl
                           bg-green-600 py-3 px-6 text-base font-medium text-white
                           outline-none focus:shadow-md font-mono hover:bg-green-600 transition-all duration-300">
                                Add Children
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="col-span-2 w-full -mt-3 h-1 mx-auto bg-gray-300 border-0 rounded-full">

        <div id="childrenContainer" class="col-span-2 flex gap-4 w-full">
            <?php
            if ($number_of_children > 0) {
                $get_children_info_row = mysqli_fetch_assoc($get_children_info_result);
                echo ' <div class="flex flex-col gap-2"> ';
                while ($get_children_info_row) {

                    $full_name = $get_children_info_row['full_name'];
                    $phone_number = $get_children_info_row['phone_number'];
                    $children_email = $get_children_info_row['email'];
                    $birth_certificate_no = $get_children_info_row['birth_certificate_number'];
                    $division_index = $get_children_info_row['division_index'] * 100;

                    echo <<<HTML
<div class="flex gap-4 w-full justify-evenly">
                <div class="flex flex-col gap-1 justify-evenly">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Full name</label>
                    <input type="text"
                           name="new_children_name_$birth_certificate_no"
                           id="new_children_name_$birth_certificate_no"
                           placeholder="Full Name"
                            value="$full_name"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>

                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Phone Number</label>
                    <input type="text"
                           name="new_children_phone_number_$birth_certificate_no"
                           id="new_children_phone_number_$birth_certificate_no"
                           placeholder="+8801XXXXXXXXX"
                            value="$phone_number"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>
                
                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Email</label>
                    <input type="text"
                           name= "new_children_email_$birth_certificate_no"
                           id="new_children_email_$birth_certificate_no"
                           placeholder="Email"
                            value="$children_email"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>


                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Birth Certificate</label>
                    <input type="text"
                           name= "new_children_birth_certificate_number_$birth_certificate_no"
                           id="new_children_birth_certificate_number_$birth_certificate_no"
                           placeholder="Full Name"
                            value="$birth_certificate_no"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>
                
                
                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Division Index</label>
                    <div class="flex gap-1 items-center">
                        <input type="text"
                               name="new_children_division_index_$birth_certificate_no"
                               id= "new_children_division_index_$birth_certificate_no"
                              
                               value="$division_index"
                               class="-mt-1 rounded-xl w-24
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                        <label for="spouse_division_index" class="text-xl pl-2">%</label>
                    </div>
                </div>
                
                <button name="update_children_$birth_certificate_no"
                    class="translate-y-[1.5rem] h-12 text-red-600 text-sm font-bold py-2 px-4 rounded-full flex gap-1 hover:bg-green-100 transition-all duration-300 items-center">
                    <img class="h-6 w-6" src="../../../resource/icons/dashboard/upload.svg" alt="">
                </button>
                
                <button name="remove_children_$birth_certificate_no"
                    class="translate-y-[1.5rem] h-12 text-red-600 text-sm font-bold py-2 px-4 rounded-full flex gap-1 hover:bg-red-100 transition-all duration-300 items-center">
                    <img src="../../../resource/icons/dashboard/file_delete.svg" alt="">
                </button>
                
                
               
            </div>

HTML;
                    $get_children_info_row = mysqli_fetch_assoc($get_children_info_result);
                }
                echo '</div>';
            } else {
                echo <<<HTML
                        <h1 class="justify-center flex w-full h-1 mx-auto text-2xl font-bold text-zinc-400">You have not added any children</h1>
                HTML;

            }
            ?>
        </div>

        <hr class="col-span-2 w-full h-1 mx-auto my-8 bg-gray-300 border-0 rounded-full mt-22">

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
<script>

    // when click the button with id "add_children_button", it will add a div with inputs
    // inside the div with id "children_section"


    // Write js codes here.


</script>
</html>
