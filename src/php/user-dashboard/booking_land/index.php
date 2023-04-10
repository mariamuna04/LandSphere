<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
            <img alt="" src="../../../resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="#"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Services</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="php/contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Contact</a>
        </div>
    </div>

    <div class="flex gap-6 items-center">
        <div>profile_picture</div>
        <div>
            <p>
                <?php echo $_SESSION["name"];
                ?>
            </p>
        </div>
        <div><form method="post" action=""><button name="sign_out">Log out</button></form></div>
    </div>
</nav>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">

    <div>Land has been booked</div>
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
            <?php
            $sql = "SELECT * FROM BOOKING join LAND on LAND.land_id=BOOKING.land_nid WHERE booker_nid != ".$_SESSION["id"];
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_land_type = $row['land_type'];

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }



                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['title'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $row['area'] . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $row['address'] . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $land_type ."
        </p>
        
    </div>
</a>";
            }
            ?>
        </div>
    </main>


    <div>Land to book</div>
    <main class="w-full bg-beige-light rounded-3xl p-4 flex justify-between">
        <div class="grid lg:grid-cols-3 justify-items-stretch gap-4 sm:grid-cols-1 md:grid-cols-2">
            <?php
            $sql = "SELECT * FROM LAND join OWNS on LAND.land_id= OWNS.land_id WHERE owner_id != ".$_SESSION["id"];
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_land_type = $row['land_type'];

                if ($_land_type == 0) {
                    $land_type = "Residential";
                } else if ($_land_type == 1) {
                    $land_type = "Commercial";
                } else if ($_land_type == 2) {
                    $land_type = "Industrial";
                }



                echo

                    "

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['title'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $row['area'] . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $row['address'] . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $land_type ."
        </p>
        
    </div>
</a>";
            }
            ?>
        </div>
    </main>
</section>


<footer id="index_footer" class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12
                                 pb-12 drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>
                <a href="#" class="hover:text-green-300"> Option </a>

            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
                <a href="#" class="hover:text-green-300"> Options </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> Help and Support </a>
                <a href="#" class="hover:text-green-300"> Blog </a>
                <a href="#" class="hover:text-green-300"> Careers </a>
                <a href="#" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="#" class="hover:text-green-300"> About Us </a>
                <a href="#" class="hover:text-green-300"> Leadership </a>
                <a href="#" class="hover:text-green-300"> Careers </a>
                <a href="#" class="hover:text-green-300"> Press </a>
                <a href="#" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="../../../resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="#" class="hover:text-green-300"> Terms of Service </a>
                <a href="#" class="hover:text-green-300"> Privacy Policy </a>
                <a href="#" class="hover:text-green-300"> Cookie Settings </a>
                <a href="#" class="hover:text-green-300"> Accessibility </a>
            </div>

        </div>

    </div>

</footer>
</body>
</html>
