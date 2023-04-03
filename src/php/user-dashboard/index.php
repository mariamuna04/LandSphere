<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../sign-in");
}

if (isset($_POST["sign_out"])) {
    session_destroy();
    header("Location: ../../");
}
$name = $_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
            <img alt="" src="../../resource/icons/landSphere.svg">
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
        <div>user_name</div>
        <div><form method="post" action=""><button name="sign_out">Bhago PLS</button></form></div>
    </div>
</nav>

<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16 pl-36 pr-36">

<!--    USER DASHBOARD -->
    <main class="w-full h-72 bg-blue-950 rounded-3xl p-4 bg-user-dashboard-bg-image bg-cover bg-center">
        <h1 class="text-3xl text-black text-white"> Dashboard </h1>
    </main>

    <main class="bg-white h-72 rounded-3xl overflow-y-auto mt-[-40px]">

    </main>

    <main class="grid grid-cols-5 gap-3 pb-12 h-36 mb-10 ">
        <h1 class = "col-span-5 text-2xl font-bold">Features</h1>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
           <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png">
            <span class="  text-lg font-bold pt-4"> Owned Land </span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png">
            <span class="  text-lg font-bold pt-4"> List for Sale </span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png">
            <span class="  text-lg font-bold pt-4"> Successors</span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png">
            <span class="  text-lg font-bold pt-4"> Payment </span>
        </a>
        <a href="#" class=" flex flex-col bg-white shadow-md p-3 rounded-3xl ">
            <img class=" h-12 w-12 pb-4" src="../../resource/icons/icons8-inland-48.png">
            <span class="  text-lg font-bold pt-4"> Bookings </span>
        </a>

    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        LAND STATUS
    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        NOTICE
    </main>

    <main class="flex flex-col gap-4 pb-12 h-36 text-center rounded-2xl bg-white mb-10">
        NEWS
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
                <img src="../../resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/footer/icon-youtube.svg" alt="">
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