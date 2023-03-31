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
</head>

<body class="bg-beige-default">
<nav class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 mb-12 z-50">
    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
            <img alt="" src="resource/icons/logo.svg">
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
        <button onclick="window.location.href = './php/sign-in';"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem] 
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = './php/sign-up';"
                class="bg-green-600 border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem] 
                pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
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

        <div id="ongoing_projects" class="flex gap-4 justify-evenly">

            <a href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500  hover:text-black">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-2xl rounded-tr-2xl"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Exterior-01-Full-Exterior-Wide-angle-View.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4"> Sunset Ridge Estates <br>
                        1234 Maple Lane Maplewood, CA 90210</p>
                </div>
            </a>

            <a href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500  hover:text-black">

                <img alt="Home" class="h-48 w-full object-cover rounded-tl-2xl rounded-tr-2xl"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Ext_Cam2-1920x2317.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4"> Riverbend Heights <br>
                        4567 Riverbend Road Hillside, NY 12345</p>
                </div>
            </a>

            <a href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500  hover:text-black">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-2xl rounded-tr-2xl"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/DSC_0012-1920x2891.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4"> Maple Grove Estates <br>
                        7890 Sunset Ridge Drive Westfield, MA 01085</p>
                </div>
            </a>

        </div>
    </main>

    <main class="flex flex-col gap-4 pb-12">
        <h1 class="pb-4 text-3xl font-medium">
            Help is here. <span class="text-gray-500">Whenever and however you need it.</span>
        </h1>
        <div class="grid grid-cols-2 gap-4">
            <a href="#" class="bg-beige-dark rounded-3xl pt-10 pl-8 pr-8 w-full row-span-2 flex flex-col shadow-md
                        transform motion-safe:hover:scale-[1.02] transition-all hover:shadow-lg bg-homepage-help-bg-card-1">
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
            transition-all hover:shadow-lg flex items-center justify-between pt-8 pb-8 bg-card-bg-homepage">
                <p class="font-medium text-2xl ">Get expert service <br> and support</p>
                <img src="resource/icons/homepage-help-brain.svg" alt="brain">
            </a>
        </div>
    </main>

    <main class="flex flex-col gap-3 pb-12">
        <h1 class="pb-4 text-3xl font-medium">
            LandSphere differences. <span class="text-gray-500">Even more reasons to be with us.</span>
        </h1>

        <main class="grid grid-cols-3 gap-6 ">
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/hompage-feature-simple.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    It's that <span class="text-green-500">simple</span>.
                    Just a few steps and your lands are <span class="text-green-500">managed!</span>
                </p>
            </div>
            <div class="bg-white  justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/homepage-feature-booking.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    <span class="text-blue-500"> Booking </span> was never this much
                    <span class="text-blue-500"> easier. </span>
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/homepage-feature-middleman.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Take a shortcut and <span class="text-purple-500">say goodbye to middlemen</span>
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/homepage-featue-credit-card.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Pay in full or <span class="text-green-500"> pay over time.</span> Your choice.
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/homepage-feature-dispute.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Even if you have a <span style="color: #FFAB45">big family </span>, there won't be any land
                    <span style="color: #FFAB45"> disputes </span> at dinner table!</p>
            </div>
            <div id="privacy" class=" bg-gray-800 justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg">
                <img class="pb-4" src="resource/icons/home-page-feature-lock.svg" alt="">
                <p class="text-white font-medium text-2xl pb-4 transition-all">
                    Privacy is our priority. <span id="hidden_bullet">Stay sa
                    &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span>
                    <span id="visible_bullet" class="hidden">Stay safe and secure!</span>
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
<script>
    const card_privacy = document.getElementById("privacy");
    const hidden_bullet = document.getElementById("hidden_bullet");
    const visible_bullet = document.getElementById("visible_bullet");

    card_privacy.addEventListener("mouseover", () => {
        hidden_bullet.style.display = "none";
        visible_bullet.style.display = "inline";
    });

    card_privacy.addEventListener("mouseout", () => {
        hidden_bullet.style.display = "inline";
        visible_bullet.style.display = "none";
    });
</script>
</html>