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

$get_spouse_sql = "SELECT * FROM marital_status WHERE partner_nid =" . $_SESSION['id'] . ";";
$get_spouse_result = mysqli_query($connection, $get_spouse_sql);
$get_spouse_row = mysqli_fetch_assoc($get_spouse_result);

$get_lands_sql = "SELECT * FROM owns JOIN land l on l.land_id = owns.land_id WHERE owner_id =" . $_SESSION['id'] . " ORDER BY title;";
$get_lands_result = mysqli_query($connection, $get_lands_sql);
$lands_exists = mysqli_num_rows($get_lands_result) > 0;
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
                   <a href="../owned-land" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Owned Lands</span>
                    </a>
                </li>
                
                <li>
                    <a href="../owned-land" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1">Sale List</span>
                    </a>
                </li>

                <li>
                    <a class="flex px-4 py-2 bg-gray-100 gap-3 w-full items-center">
                        <span class="font-bold pl-1 text-primary select-none">Successor</span>
                    </a>
                </li>
                
                <li>
                    <a href="../payment" class="flex px-4 py-2 hover:bg-gray-100 gap-3 w-full items-center">
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
                        Your Successors
                    </a>
                </div>
            </li>
        </ol>
    </div>

</div>

<section class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">

    <section id="family_tree_container"
             class="grid grid-cols-3 gap-x-6 place-self-center align-middle justify-items-center">

        <div id="land_owner_container"
             class="flex items-center space-x-4">

            <?php
            $rnd = rand(1, 10000);
            echo '<img class="w-10 h-10 rounded-full"
                 src="https://api.dicebear.com/6.x/avataaars/svg?seed=' . $rnd . '%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"
                 alt="user photo" height="32px" width="32px">';
            ?>

            <div class="font-medium">
                <div><?php echo $_SESSION['name'] ?></div>
                <div class="text-sm text-gray-500">Land Owner</div>
            </div>

        </div>
        <div id="center_line_container"
             class="w-full flex gap-4 justify-center items-center align-middle">
            <hr class="w-96 h-1 my-8 bg-gray-300 border-0 rounded-full hover:bg-green-700 hover:shadow-primary transition-all duration-300 drop-shadow-xl">
            <img src="../../../resource/icons/dashboard/wedding.svg" alt="">
            <hr class="w-96 h-1 my-8 bg-gray-300 border-0 rounded-full hover:bg-green-700 transition-all duration-300 drop-shadow-xl">
        </div>
        <div id="spouse_container"
             class="flex items-center space-x-4">

            <?php
            if ($get_spouse_row == null) {
                echo "<div class='text-center text-2xl font-bold text-zinc-400 select-none'> Not Assigned </div>";
            } else {
                $rnd = rand(1, 10000);
                $spouse_section = <<< HTML
                        <img class="w-10 h-10 rounded-full "
                             src="https://api.dicebear.com/6.x/avataaars/svg?seed=' . $rnd . '%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"
                             alt="user photo" height="32px" width="32px">
                        <div class="font-medium">
                            <div> {$get_spouse_row['full_name']} </div>
                            <div class="text-sm text-gray-500">Spouse</div>
                        </div>
                    
                    HTML;
                echo $spouse_section;
            }
            ?>

        </div>

        <div id="land_owner_information_container"
             class="min-w-[8rem] w-96 flex flex-col rounded-xl overflow-x-auto mt-4 hover:shadow-xl transition-all duration-300">
            <div class="bg-beige-darkest text-center p-2 font-bold
            <?php
            if (!$lands_exists) echo " hidden ";
            ?>
            ">
                Owned Land
            </div>
            <div class="w-full">
                <?php
                if ($lands_exists) {

                    $get_lands_sql = "SELECT * FROM owns JOIN land l on l.land_id = owns.land_id WHERE owner_id =" . $_SESSION['id'] . " ORDER BY title;";
                    $get_lands_result = mysqli_query($connection, $get_lands_sql);
                    $lands = mysqli_fetch_assoc($get_lands_result);
                    while ($lands) {
                        $information = <<< HTML
                        <div class="group rounded-xl bg-beige-darker m-2 p-2 flex flex-col"> 
                           <div class="text-sm text-zinc-500"> {$lands['address']}</div>
                           <div class="flex justify-between">
                                <p class="font-mono font-bold"> {$lands['land_id']}   </p>
                                <p class="font-bold group-hover:text-primary transition-all duration-300"> {$lands['title']}   </p>
                           </div>
                           <div class="w-full bg-beige-light text-center flex justify-center gap-4 rounded-lg mt-2 font-mono"> 
                                <img src="../../../resource/icons/dashboard/area_count.svg" alt="">
                                <div> {$lands['area']} sqft </div>  
                           </div>
                        </div>
                    
                    
                    
                    HTML;
                        echo $information;
                        $lands = mysqli_fetch_assoc($get_lands_result);
                    }
                } else {
                    echo "<div class='text-center text-2xl font-bold text-zinc-400 select-none'> No Lands Exist </div>";
                }
                ?>
            </div>

        </div>
        <hr id="vertical_line"
            class=" drop-shadow-xl rounded-full left-1/2 -ml-0.5 w-1 h-full bg-gray-300 mb-4 hover:bg-green-700 transition-all duration-300"></hr>
        <div id="spouse_information_container"
             class="min-w-[8rem] w-96 rounded-xl
                <?php
             if ($get_spouse_row == null)
                 echo ' hidden ';
             else {
                 echo ' flex flex-col overflow-x-auto mt-4 hover:shadow-xl transition-all duration-300';
             }
             ?>
             ">

            <div class="w-full">
                <?php
                if ($get_spouse_row != null) {
                    $get_lands_sql = "SELECT * FROM owns JOIN land l on l.land_id = owns.land_id WHERE owner_id =" . $_SESSION['id'] . " ORDER BY title;";
                    $get_lands_result = mysqli_query($connection, $get_lands_sql);
                    $lands = mysqli_fetch_assoc($get_lands_result);

                    $get_spouse_division_multiplier_sql = "SELECT spouse_percentage FROM successor_division WHERE nid =" . $_SESSION['id'] . ";";
                    $get_spouse_division_multiplier_result = mysqli_query($connection, $get_spouse_division_multiplier_sql);
                    $spouse_division_multiplier = mysqli_fetch_assoc($get_spouse_division_multiplier_result);
                    $spouse_division_multiplier = $spouse_division_multiplier['spouse_percentage'];

                    if ($lands_exists) {
                        echo
                            '<div class="bg-beige-darkest text-center p-2 font-bold">
                                Division of Spouse <span class="font-mono text-zinc-600"> (' . $spouse_division_multiplier * 100 . '%)</span>
                            </div>';
                    } else {
                        echo "<div class='text-center text-2xl font-bold text-zinc-400 select-none'> No Lands Exist </div>";
                    }

                    while ($lands) {
                        $spouse_divided_area = $lands['area'] * $spouse_division_multiplier;
                        $information = <<< HTML
                        <div class="group rounded-xl bg-beige-darker m-2 p-2 flex flex-col"> 
                           <div class="text-sm text-zinc-500"> {$lands['address']}</div>
                           <div class="flex justify-between">
                                <p class="font-mono font-bold"> {$lands['land_id']}   </p>
                                <p class="font-bold group-hover:text-primary transition-all duration-300"> {$lands['title']}   </p>
                           </div>
                           <div class="w-full bg-beige-light text-center flex justify-center gap-4 rounded-lg mt-2 font-mono"> 
                                <img src="../../../resource/icons/dashboard/area_count.svg" alt="">
                                <div> $spouse_divided_area sqft </div>  
                           </div>
                        </div>
                    HTML;
                        echo $information;
                        $lands = mysqli_fetch_assoc($get_lands_result);
                    }
                }
                ?>
            </div>

        </div>

        <hr class="drop-shadow-xl col-span-3 w-full h-1 mt-8 mb-4 bg-gray-300 border-0 rounded-full hover:bg-green-700 transition-all duration-300">

        <div id="children_container"
             class="col-span-3 w-full">
            <div class="flex gap-4 justify-around">
                <?php
                $get_children_sql = "SELECT * FROM children WHERE parent_nid =" . $_SESSION['id'] . ";";
                $get_children_result = mysqli_query($connection, $get_children_sql);
                $children = mysqli_fetch_assoc($get_children_result);
                // check if there is any children
                if ($children == null) {
                    echo "<div class='text-center text-2xl font-bold text-zinc-400 select-none'>No Children</div>";
                } else {
                    $children_count = mysqli_num_rows($get_children_result);
                    $land_information = "";

                    $get_division_sql = "SELECT * FROM successor_division WHERE nid =" . $_SESSION['id'] . ";";
                    $get_division_result = mysqli_query($connection, $get_division_sql);
                    $division = mysqli_fetch_assoc($get_division_result);
                    $spouse_division_multiplier = $division['spouse_percentage'];
                    $children_division_string = $division['children_percentage'];
                    $children_division_array = explode(",", $children_division_string);


                    for ($i = 0; $i < $children_count; $i++) {
                        $rnd = rand(1, 10000);
                        $full_name = $children['full_name'];

                        $children_division = $children_division_array[$i];

                        $get_lands_sql = "SELECT * FROM owns JOIN land l on l.land_id = owns.land_id WHERE owner_id =" . $_SESSION['id'] . " ORDER BY title;";
                        $get_lands_result = mysqli_query($connection, $get_lands_sql);
                        $lands = mysqli_fetch_assoc($get_lands_result);
                        while ($lands) {
                            $area = $lands['area'];
                            $children_divided_area = ($area - ($area * $spouse_division_multiplier)) * $children_division;
                            $lf = <<< HTML
                        <div class="group rounded-xl bg-beige-darker m-2 p-2 flex flex-col"> 
                           <div class="text-sm text-zinc-500"> {$lands['address']}</div>
                           <div class="flex justify-between">
                                <p class="font-mono font-bold"> {$lands['land_id']}   </p>
                                <p class="font-bold group-hover:text-primary transition-all duration-300"> {$lands['title']}   </p>
                           </div>
                           <div class="w-full bg-beige-light text-center flex justify-center gap-4 rounded-lg mt-2 font-mono"> 
                                <img src="../../../resource/icons/dashboard/area_count.svg" alt="">
                                <div> $children_divided_area sqft </div>  
                           </div>
                        </div>
                    HTML;
                            $land_information .= $lf;
                            $lands = mysqli_fetch_assoc($get_lands_result);
                        }
                        $children_division_in_percent = $children_division * 100;
                        echo <<< HTML
                        <div class="flex flex-col items-center ">
                            <img class="w-10 h-10 rounded-full"
                                 src="https://api.dicebear.com/6.x/avataaars/svg?seed=' . $rnd . '%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9"
                                 alt="user photo" height="32px" width="32px">
                            <div class="font-medium mt-1">$full_name</div>
                            
                            <div id="land_owner_information_container"
                                 class="min-w-[8rem] w-96 flex flex-col rounded-xl overflow-x-auto mt-4 hover:shadow-xl transition-all duration-300">
                        HTML;
                        if ($lands_exists) {
                            echo <<< HTML
                                <div class="bg-beige-darkest text-center p-2 font-bold">
                                Division of $full_name 
                                    <span class="font-mono text-zinc-600">
                                        ($children_division_in_percent)%
                                    </span>
                                </div>
                            HTML;
                        } else {
                            echo "<div class='text-center text-2xl font-bold text-zinc-400 select-none'> No Lands Exist </div>";

                        }
                        echo <<< HTML
                            $land_information
                            </div >
                                
                            </div >
                        HTML;

                        $land_information = "";
                        $children = mysqli_fetch_assoc($get_children_result);
                    }
                }
                ?>
            </div>
        </div>

    </section>

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
