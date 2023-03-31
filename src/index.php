<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
    <script src="js/utility.js"></script>
</head>

<body class="bg-beige-default">
<nav class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-md items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
            <img alt="" src="resource/icons/logo.svg">
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
            <a href="php/contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">Contact</a>
        </div>
    </div>

    <div class="flex gap-6 items-center">
        <button onclick="gotoSignIn()"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="gotoSignUp()"
                class="bg-green-600 border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>
    </div>
</nav>

<section class="container mx-auto my-auto mt-48 mb-16
                pl-36 pr-36">
    <header class="flex justify-between items-center pb-24">
        <div id="welcome-container">
            <h1 class="text-5xl font-medium text-gray-600">
                <span class="text-green-600 font-bold">LandSphere.</span> The best way to <br> manage your land.
            </h1>
        </div>
        <div id="button-container" class="flex flex-col gap-2  justify-start">
            <div id="section_one_need_anything" class="flex gap-2 items-center">
                <img src="resource/icons/homepage-header-help.svg" alt="help_avatar">
                <div class="flex flex-col gap-0.5">
                    <p class="font-medium text-sm">Need any help?</p>
                    <a href="#" class="text-green-600 text-sm hover:underline">Ask a specialist</a>
                </div>
            </div>

            <div id="section_one_need_anything" class="flex gap-2 items-center ">
                <img src="resource/icons/homepage-header-office.svg" alt="help_avatar">
                <div class="flex flex-col gap-0.5">
                    <p class="font-medium text-sm">Visit our office</p>
                    <a href="#" class="text-green-600 text-sm hover:underline">Find our locations</a>
                </div>
            </div>


        </div>

    </header>

    <main class="flex flex-col gap-3 pb-12">
        <h1 class="pb-4 text-3xl font-medium">
            The Latest. <span class="text-gray-500">Take a look at what project we are working on, right now.</span>
        </h1>

        <div id="ongoing_projects" class="flex gap-5 justify-evenly">

            <a class="bg-white rounded-lg w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-lg rounded-tr-lg"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Exterior-01-Full-Exterior-Wide-angle-View.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4">ABC Building <br>
                        123 Wallaby Avenue, Park Road</p>
                </div>
            </a>

            <a class="bg-white rounded-lg w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-lg rounded-tr-lg"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Ext_Cam2-1920x2317.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4">ABC Building <br>
                        123 Wallaby Avenue, Park Road</p>
                </div>
            </a>

            <a class="bg-white rounded-lg w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-lg rounded-tr-lg"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/DSC_0012-1920x2891.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4">ABC Building <br>
                        123 Wallaby Avenue, Park Road</p>
                </div>
            </a>

        </div>
    </main>

    <main class="flex flex-col gap-3 pb-12">
        <h1 class="pb-4 text-3xl font-medium">
            Help is here. <span class="text-gray-500">Whenever and however you need it.</span>
        </h1>
        <div class="grid grid-cols-2 gap-4">
            <a href="#" class="bg-beige-dark rounded-3xl pt-10 pl-8 pr-8 w-full row-span-2 flex flex-col shadow-md
                        transform motion-safe:hover:scale-[1.02] transition-all hover:shadow-lg bg-homepage-help-bg-card-1"
               style="background-image: url(./resource/icons/homepage-help-bg-card-1.jpg); ">
                <p class="font-bold text-sm pb-4 text-gray-500">LAND SPECIALIST</p>
                <p class="font-medium text-2xl">Discuss one on one with our specialists. Online or in our office.</p>
            </a>
            <a href="#" class="bg-white rounded-3xl pt-8 pb-8 pl-8 pr-8 w-full flex shadow-md
                        transform motion-safe:hover:scale-[1.02] transition-all hover:shadow-lg
                        items-center justify-between">
                <p class="font-medium text-2xl">Get to know about laws, rules and regulations</p>
                <img src="resource/icons/homepage-help-law.svg" alt="brain">

            </a>
            <a href="#" class="bg-white rounded-3xl pl-8 pr-8 w-full shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg flex items-center justify-between pt-8 pb-8">
                <p class="font-medium text-2xl ">Get expert service <br> and support</p>
                <img src="resource/icons/homepage-help-brain.svg" alt="brain">
            </a>
        </div>
    </main>


    <main class="flex flex-col gap-3 pb-12">
        <h1 class="pb-8 text-3xl font-medium">
            LandSphere differences. <span class="text-gray-500">Even more reasons to be with us.</span>
        </h1>

        <main class="grid grid-cols-4 gap-6 ">
            <div class="col-span-3 bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">Simplicity in management</p>
                <p class="text-sm">Our user-friendly system streamlines land transactions by simplifying administrative
                    tasks, reducing complexity, and increasing efficiency while providing a straightforward interface
                    and
                    reliable data management to ensure a positive user experience.</p>
            </div>
            <div class="row-span-2 bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">Booking was never this much easier</p>
                <p class="text-sm">
                    Our project simplifies the land transaction process, allowing easy browsing and selection of land,
                    with
                    the flexibility to cancel or negotiate transactions, making the process seamless and stress-free for
                    users.
                </p>

            </div>
            <div class="col-span-2 row-span-2 bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">Goodbye to Middleman</p>
                <p class="text-sm">
                    Our land transaction process is broker-free, enabling you to negotiate directly with sellers,
                    reducing
                    costs, increasing transparency and ensuring fair deals.

                </p>
            </div>
            <div class="bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">You are secure!</p>
                <p class="text-sm">
                    Our security is so tight, not even a determined squirrel could crack our system (we hope)!
                </p>
            </div>
            <div class="row-span-2 col-span-2 bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">Even if you have a big family, there won't be any land
                    disputes at dinner table!</p>
                <p class="text-sm">
                    Our product includes a feature that ensures even distribution of land among successors to prevent
                    future
                    disputes or conflicts.
                </p>

            </div>
            <div class="col-span-2 bg-beige-light justify-self-stretch p-6 rounded-2xl drop-shadow-md">
                <p class="text-green-500 font-bold text-xl pb-4">Relax, we got your back</p>
                <p class="text-sm">
                    We do not have direct deals with government organizations, ensuring efficient, secure, and compliant
                    land transactions through our platform.
                </p>
            </div>
        </main>
    </main>


    <main class="flex flex-col">
        <h1 class="col-span-4 pb-4 text-3xl font-medium">
            Quick Links
        </h1>
        <div class="flex gap-4 font-normal">
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest" href="#"> Status </a>
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest" href="#"> Terms and
                conditions </a>
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest" href="#"> Our
                Commitments </a>
        </div>
    </main>
</section>

<section class="container mx-auto my-auto mb-12 rounded-xl pl-24 pr-24 pt-6 pb-6
                bg-green-50 text-green-800 text-center drop-shadow-xl">
    <h1 class="text-3xl font-bold pb-3">We support Turkey</h1>
    <p class="text-black">
        We are taking action to support Turkey by donating 10% of our profits to the Turkish Red Crescent.
    </p>
</section>

<footer class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12 pb-12 drop-shadow-xl">

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
                <img src="resource/icons/icon-facebook.svg" alt="">
            </a>
            <a href="#">
                <img src="resource/icons/icon-twitter.svg" alt="">
            </a>
            <a href="#">
                <img src="resource/icons/icon-linkedin.svg" alt="">
            </a>
            <a href="#">
                <img src="resource/icons/icon-youtube.svg" alt="">
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