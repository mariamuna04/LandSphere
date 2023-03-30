<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>Title</title>
    <script src="../../js/utility.js"></script>
</head>

<body class="bg-beige-default">
<nav class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-md items-center top-0 mb-12">
    <div class="flex gap-5 items-center">

        <a href="../../index.php" class="flex select-none">
            <img alt="" src="../../resource/icons/logo.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="#"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">About</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">Projects</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">Services</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">News</a>
            <a href="#"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">Contact</a>
        </div>
    </div>


    <div class="flex gap-6 items-center">
        <button onclick="gotoSignIn()"
                class="hover:border-green-600 border border-beige-darker pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="gotoSignUp()"
                class="bg-green-600 border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>


    </div>

</nav>

<section class="container mx-auto my-auto mt-48 mb-24 pl-16 pr-16">
    <p class="text-3xl font-black text-center text-green-600 pb-2">
        We would love to meet you
    </p>
    <p class="text-xl font-semibold text-center">
        Get in touch with us
    </p>
    <p class="text-gray-500 text text-center pt-4">
        Fill out the form below, and we will get back to you as soon as possible.
    </p>

    <form action="" method="POST" class="grid grid-cols-2 gap-x-3 pt-8 ml-48 mr-48">
        <div class="mb-5 col-span-2">
            <input type="text" name="full_name" id="full_name"
                   placeholder="Full Name"
                   class="w-full rounded-md border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            <label for="full_name" class="text-sm">
        </div>

        <div class="mb-5">
            <input type="text"
                   name="email"
                   id="email"
                   placeholder="Email address"
                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md "
            />
            <label for="email" class="text-sm">
        </div>

        <div class="mb-5">
            <input type="tel"
                   name="telephone"
                   id="telephone"
                   placeholder="Telephone number"
                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            <label for="telephone" class="text-sm">
        </div>

        <div class="mb-5 col-span-2">
            <textarea type="tel"
                   name="text"
                   id="message"
                   placeholder="Write your message here..."
                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md h-32"></textarea>
            <label for="message" class="text-sm">
        </div>

        <button name="submit" type="submit"
                class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base font-semibold
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-3xl hover:bg-green-800">
            Submit
        </button>


    </form>

</section>

<section class="container mx-auto my-auto mb-12 rounded-xl pl-24 pr-24 pt-6 pb-6
                bg-green-50 text-green-800 text-center">
    <h1 class="text-3xl font-bold pb-3">We support Turkey</h1>
    <p class="text-black">
        We are taking action to support Turkey by donating 10% of our profits to the Turkish Red Crescent.
    </p>
</section>

<footer class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12 pb-12">

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
                <img src="../../resource/icons/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="../../resource/icons/icon-youtube.svg" alt="">
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
