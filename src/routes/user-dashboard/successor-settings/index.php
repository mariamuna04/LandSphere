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

$get_children_info = "SELECT * FROM children WHERE parent_nid = " . $user_id . ";";
$get_children_info_result = mysqli_query($connection, $get_children_info);
$number_of_children = mysqli_num_rows($get_children_info_result);

if(isset($_POST['submit'])){
    $nid= $_POST['spouse_nid'];
    if(empty($nid)){
        $nid= $get_spouse_info_row['nid'];
    }
    $name= $_POST['spouse_name'];

    if(empty($name)){
        $name= $get_spouse_info_row['full_name'];
    }
    $email= $_POST['spouse_email'];

    if(empty($email)){
        $email= $get_spouse_info_row['email'];
    }
    $phone= $_POST['spouse_phone_number'];

    if(empty($phone)){
        $phone= $get_spouse_info_row['phone_number'];
    }
    $birth_certificate= $_POST['spouse_birth_certificate'];

    if(empty($birth_certificate)){
        $birth_certificate= $get_spouse_info_row['birth_certificate_no'];
    }
    $passport= $_POST['spouse_passport_number'];

    if(empty($passport)){
        $passport= $get_spouse_info_row['passport_number'];
    }
    $division_index= $_POST['spouse_division_index'];

    if(empty($division_index)){
        $division_index= $get_spouse_info_row['division_index'];
    }

    if($get_spouse_info_row){
        $update_spouse_info = "UPDATE marital_status SET nid = " . $nid . ", full_name = '" . $name . "', email = '" . $email . "', phone_number = '" . $phone . "', birth_certificate_no = '" . $birth_certificate . "', passport_number = '" . $passport . "', division_index = " . $division_index . " WHERE partner_nid = " . $user_id . ";";
        $update_spouse_info_result = mysqli_query($connection, $update_spouse_info);
        if($update_spouse_info_result){
            header('Location: ./');
        }
    }
    else{
        $insert_spouse_info = "INSERT INTO marital_status (nid, full_name, email, phone_number, birth_certificate_no, passport_number, division_index, partner_nid) VALUES (" . $nid . ", '" . $name . "', '" . $email . "', '" . $phone . "', '" . $birth_certificate . "', '" . $passport . "', " . $division_index . ", " . $user_id . ");";
        $insert_spouse_info_result = mysqli_query($connection, $insert_spouse_info);
        if($insert_spouse_info_result){
            header('Location: ./');
        }
    }

    $children_name = $_POST['children_name_1'];
    header('Location: ./random.php?x='.$children_name);
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
        <div class="col-span-2 w-full h-1 mx-auto text-end text-3xl font-bold text-zinc-400">
            <h1>Your Spouse</h1>
        </div>
        <hr class="col-span-2 w-full h-1 mx-auto bg-gray-300 border-0 rounded-full">

        <div class="w-full">
            <div class="flex flex-col gap-3">
                <label for="spouse_nid" class="text-sm pl-2">Spouse NID</label>
                <input type="text"
                       name="spouse_nid"
                       id="spouse_nid"
                       placeholder="NID Number"
                       <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['nid'].'"'?>
                       class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono disabled:opacity-50"
                />

                <label for="spouse_email" class="text-sm pl-2">Spouse Email</label>
                <input type="email"
                       name="spouse_email"
                       placeholder="someone@example.com"
                          <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['email'].'"'?>
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
                          <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['birth_certificate_no'].'"'?>
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
                            <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['full_name'].'"'?>
                       class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                />

                <label for="spouse_phone_number" class="text-sm pl-2 pb-1">Phone Number</label>
                <input type="text"
                       name="spouse_phone_number"
                       id="spouse_phone_number"
                       placeholder="+880 1xxx-xxxxxx"
                            <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['phone_number'].'"'?>
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
                                    <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['passport_number'].'"'?>
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
                                        <?php if ($get_spouse_info_row) echo 'value="'.$get_spouse_info_row['division_index'].'"'?>
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

        <div class="col-span-2 w-full h-1 mx-auto flex justify-between text-3xl font-bold text-zinc-400">
            <h1>Total Children: <?php echo $number_of_children?></h1>
            <h1>Your Children</h1>
        </div>
        <hr class="col-span-2 w-full h-1 mx-auto bg-gray-300 border-0 rounded-full">

        <div id="childrenContainer" class="col-span-2 flex gap-4">
            <div class="flex flex-col gap-2">
            <?php
            $count =0 ;
            if($number_of_children > 0){
                $get_children_info_row = mysqli_fetch_assoc($get_children_info_result);
                while($get_children_info_row){
                    $count++;
                    $full_name = $get_children_info_row['full_name'];
                    $phone_number = $get_children_info_row['phone_number'];
                    $birth_certificate_no = $get_children_info_row['birth_certificate_number'];
                    $division_index = $get_children_info_row['division_index'];

                    echo <<<HTML
<div class="flex gap-4 w-full justify-evenly">
                <div class="flex flex-col gap-1 justify-evenly">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Name</label>
                    <input type="text"
                           name="children_name_$count"
                           id="children_name_$count"
                           placeholder="Full Name"
                            value="$full_name"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>

                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Name</label>
                    <input type="text"
                           name="children_phone_number_$count"
                           id="children_phone_number_$count"
                           placeholder="Full Name"
                            value="$phone_number"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>

                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Name</label>
                    <input type="text"
                           name= "children_birth_certificate_number_$count"
                           id="children_birth_certificate_number_$count"
                           placeholder="Full Name"
                            value="$birth_certificate_no"
                           class="-mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                </div>

                <div class="flex flex-col gap-1">
                    <label for="spouse_name" class="text-sm pl-2 pb-1">Name</label>
                    <div class="flex gap-1 items-center">
                        <input type="text"
                               name="children_division_index_$count"
                               id= "children_division_index_$count"
                               placeholder="Full Name"
                                 value="$division_index"
                               class="-mt-1 rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                        <label for="spouse_division_index" class="text-xl pl-2">%</label>
                    </div>
                </div>

                <button
                    class="translate-y-[1.5rem] h-12 text-red-600 text-sm font-bold py-2 px-4 rounded-full flex gap-1 hover:bg-red-100 transition-all duration-300 items-center">
                    <img src="../../../resource/icons/dashboard/file_delete.svg" alt="">
                </button>
            </div>

HTML;
$get_children_info_row = mysqli_fetch_assoc($get_children_info_result);
                }
            }
                ?>
        </div>
        </div>

        <div class="w-full flex flex-col gap-4">
            <button id="add_children_button" class="p-4 bg-gray-300">
                Add Children
            </button>

            <div id="children_section">

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
                SSL Encryption
            </h1>


        </div>

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
<script>

    // when click the button with id "add_children_button", it will add a div with inputs
    // inside the div with id "children_section"


    // Write js codes here.


</script>
</html>