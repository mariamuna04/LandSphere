<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    f
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../dist/output.css" rel="stylesheet">
    <title>LandSphere | Your Personal Land Manager</title>
    <style>
        .outlined-text {
            color: #1F2937;
            text-shadow: -1px -1px 0 #FFF, 1px -1px 0 #FFF, -1px 1px 0 #FFF, 1px 1px 0 #FFF;
        }
    </style>
</head>

<body class="bg-beige-default">
<nav id="index_navbar" class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-4 pb-4 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-lg items-center top-0 z-50">

    <div class="flex gap-5 items-center">

        <a href="#" class="flex select-none">
            <img alt="" src="../../../resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="./php/about-us"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="./php/news"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="php/on-sale"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                On Sale
            </a>
            <a href="php/news"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="php/contact-us"
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

    <div class="flex gap-6 items-center">
        <button onclick="window.location.href = '../../sign-in';"
                class="hover:border-green-600 border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = '../../sign-up';"
                class="bg-green-600 border border-green-600 hover:bg-green-800 transition-colors pt-[0.60rem]
                pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>
    </div>
</nav>
<h1 class="mt-20"></h1>
<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16
                pl-36 pr-36">

    <header id="shelf-one" class="flex flex-col pb-12">
        <div id="oneC1">
            <h1 class="text-5xl font-medium text-gray-600 text-center pb-6">
                Terms and Conditions
            </h1>
        </div>

        <p class="  line-clamp-3 flex flex-col">
        <p class="text-xs font-light">These terms and conditions outline the rules and regulations for the use of
            LandSphere's Website.</p>
        <p class="text-xs font-light pb-6">LandSphere is located at:</p>
        <p class="text-xs font-light pb-12">
            1234, 56th Street, 78th Avenue<br>
            New York, NY 12345<br>
            United States<br>
        </p>
        <p class="text-xs font-light pb-6">By accessing this website we assume you accept these terms and conditions in
            full. Do not continue to use LandSphere's website
            if you do not accept all the terms and conditions stated on this page.</p>
        <p class="text-xs font-light pb-6">The following terminology applies to these Terms and Conditions, Privacy
            Statement and Disclaimer Notice and any or all
            Agreements: "Client", "You" and "Your" refers to you, the person accessing this website and accepting the
            Company's terms
            and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties",
            or "Us",
            refers to both the Client and ourselves, or either the Client or ourselves. All terms refer to the offer,
            acceptance and
            consideration of payment necessary to undertake the process of our assistance to the Client in the most
            appropriate manner,
            whether by formal meetings of a fixed duration, or any other means, for the express purpose of meeting the
            Client's needs
            in respect of provision of the Company's stated services/products, in accordance with and subject to,
            prevailing law of
            . Any use of the above terminology or other words in the singular, plural, capitalisation and/or he/she or
            they, are taken
            as interchangeable and therefore as referring to same.</p>

        <ul class="text-xs font-light pb-6">
            <li>Use of the system: The land administration management system is provided solely for educational purposes
                and
                should not be used for any commercial or professional purposes.
            </li>
            <li>User information: Users of the system are required to provide accurate and up-to-date information during
                the
                registration process. Any user found to have provided false information will have their account
                suspended or
                terminated.
            </li>
            <li>User responsibility: Users are solely responsible for any activity that occurs under their account. They
                must keep their login credentials secure and notify the system administrator immediately of any
                unauthorized
                access to their account.
            </li>
            <li>Intellectual property: All intellectual property rights related to the system, including any software,
                code,
                or content, belong to the system developer. Users are not permitted to reproduce, distribute, or modify
                any
                part of the system without the express written permission of the developer.
            </li>
            <li>Liability: The system developer is not liable for any damages or losses resulting from the use of the
                system, including but not limited to data loss, system downtime, or any errors or inaccuracies in the
                system.
            </li>
            <li>Termination: The system developer reserves the right to terminate any user's access to the system at any
                time, for any reason, without notice.
            </li>
            <li>Changes to terms: The system developer reserves the right to change these terms and conditions at any
                time,
                without notice. Users are responsible for regularly reviewing the terms and conditions to stay informed
                of
                any changes.
            </li>


        </ul>
        <h2 class="text-xs font-light">Cookies</h2>
        <p class="text-xs font-light">We employ the use of cookies. By using LandSphere's website you consent to the use
            of cookies in accordance with LandSphere's
            privacy policy.</p>
        <p class="text-xs font-light">Most of the modern day interactive websites use cookies to enable us to retrieve
            user details for each visit. Cookies are
            used in some areas of our site to enable the functionality of this area and ease of use for those people
            visiting. Some
            of our affiliate / advertising partners may also use cookies.</p>
        <p class="text-xs font-light pt-6">Unless otherwise stated, LandSphere
        </p>


    </header>

</section>

<section id="index_support" class="container mx-auto my-auto mb-12 rounded-xl
                pl-24 pr-24 pt-6 pb-6 bg-green-50 text-green-800 text-center drop-shadow-xl">
    <h1 class="text-3xl font-bold pb-3">We support Turkey</h1>
    <p class="text-black">
        We are taking action to support Turkey by donating 10% of our profits to the Turkish Red Crescent.
    </p>
</section>

<footer id="index_footer" class="container mx-auto my-auto mb-12 bg-green-900 rounded-xl pl-24 pr-24 pt-12
                                 pb-12 drop-shadow-xl">

    <div class="grid grid-cols-4 text-white gap-x-12 gap-y-3">
        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Land Owners
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Option </a>

            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Options </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="../../../html/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety & Security </a>
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
            <div class="flex items-start justify-between p-4 border-b rounded-t flex items-center">
                <img src="resource/icons/modal-search-icon.svg" alt="">
                <input type="text"
                       name="search_box"
                       id="search_text-field"
                       placeholder="Type anything to search"
                       class="w-full rounded-md
                               bg-white px-3 text-base font-medium text-[#6B7280]
                               outline-none text-lg"
                />
                <label for="search_text-field"></label>
                <button type="button"
                        class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
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