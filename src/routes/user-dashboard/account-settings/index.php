<?php
ini_set('display_errors', 0);
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../sign-in");
}

include "../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../../static/error/HTTP521.html');
    die();
}

$sql = "SELECT * FROM user WHERE nid =" . $_SESSION['id'] . ";";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

$nid = $_SESSION['id'];
$previous_full_name = $row['full_name'];
$previous_email = $row['email'];
$previous_phone_number = $row['phone_number'];
$previous_date_of_birth = $row['date_of_birth'];
$previous_address = $row['address'];
$previous_occupation = $row['occupation'];
$previous_birth_certificate = $row['birth_certificate_number'];
$previous_passport_number = $row['passport_number'];
$yearly_income = $row['yearly_income'];


if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../../");
}


if (isset($_POST["submit"])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $birth_certificate = $_POST['birth_certificate'];
    $passport_number = $_POST['passport_number'];
    $yearly_income = $_POST['yearly_income'];

    $sql = "UPDATE user SET full_name = '$full_name', email = '$email', phone_number = '$phone_number', address = '$address', occupation = '$occupation', yearly_income = '$yearly_income' WHERE nid = '$nid';";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION["name"] = $full_name;
        $_SESSION["email"] = $email;

        header("Location: ../");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
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
    <form method="post" action="" class="grid grid-cols-2 place-items-start items-start">
        <div id="profile_image" class="pl-12 flex flex-col items-center justify-center">
            <?php
            $rnd = rand(0, 1000000);
            echo "<img class='h-48 w-48 rounded-full'
                 src='https://api.dicebear.com/6.x/avataaars/svg?seed=" . $rnd . "%20Hill&backgroundColor=b6e3f4,c0aede,d1d4f9'
                 alt='user photo'>"
            ?>
            <p class="text-xl mt-6 font-bold">
                <?php echo $previous_full_name; ?>
            </p>
            <p class="text-lg text-gray-400 font-medium">
                <?php echo $previous_email; ?>
            </p>

            <div class="mt-12 flex flex-col g-4 items-center w-fit">

                <button name="submit" type="submit"
                        class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-full hover:bg-green-800
                        hover:shadow-lg">
                    Save and Return to Home
                </button>


                <a href="../index.php" class="hover:shadow-form w-full
                        py-3 px-8 text-center text-base
                        font-medium text-primary outline-none items-center
                        col-span-2 rounded-full">Return to Home</a>
                <a class=" mt-6
                        py-3 px-8 text-center text-base w-full
                        font-bold text-red-700 outline-none items-center
                        col-span-2 rounded-full border hover:border-red-800
                        ">Delete Account

                </a>
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-col gap-3">
                <label for="nid" class="text-sm pl-2">National ID</label>
                <input type="text"
                       name="nid" disabled
                       id="nid"
                    <?php
                    echo "value='" . $nid . "'";
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
                    echo "value='" . $previous_full_name . "'";
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
                    echo "value='" . $previous_email . "'";
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
                            echo "value='" . $previous_phone_number . "'";
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
                            echo "value='" . $previous_date_of_birth . "'";
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
                    echo "value='" . $previous_address . "'";
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
                            echo "value='" . $previous_occupation . "'";
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
                            echo "value='" . $yearly_income . "'";
                            ?>
                               class="mt-1 w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                        />
                    </div>

                </div>

            </div>
        </div>
    </form>
</section>

<hr>

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
