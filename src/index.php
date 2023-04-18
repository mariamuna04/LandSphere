<?php
session_start();

if (isset($_SESSION['id'])) {
    header("Location: ./routes/user-dashboard");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="resource/ico.svg">
    <link href="../dist/output.css" rel="stylesheet">
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
            <img alt="" src="resource/icons/landSphere.svg">
        </a>

        <div class="flex gap-2 items-center">
            <a href="./routes/about-us"
               class="hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6 transition-colors">
                About</a>
            <a href="./routes/projects"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Projects</a>
            <a href="routes/on-sale"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                On Sale
            </a>
            <a href="routes/news"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                News</a>
            <a href="routes/contact-us"
               class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-6 pr-6">
                Contact</a>
        </div>
    </div>
    
    <button id="search_button" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="transition-colors hover:bg-beige-darkest rounded-3xl pt-[0.60rem] pb-[0.60rem] pl-3 pr-3
                    flex gap-12 items-center">
        <span class="flex items-center gap-2">
            <img src="resource/icons/search-navbar.svg" alt=" ">
            <span class="text-xs font-medium text-gray-800">Search</span>
        </span>
        <span class="flex gap-1 select-none">
            <kbd id="keyboard_shortcut" class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">⌘</kbd><kbd class="px-2 py-1 text-xs font-medium text-gray-800 bg-gray-100 
                rounded-lg">K</kbd>
        </span>
    </button>

    <div class="flex gap-6 items-center">
        <button onclick="window.location.href = 'routes/sign-in';"
                class="hover:border-primary border border-beige-darker transition-colors pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle">
            Sign In
        </button>
        <button onclick="window.location.href = 'routes/sign-up';"
                class="bg-primary border border-primary hover:bg-green-800 transition-colors pt-[0.60rem]
                pb-[0.60rem] pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>
    </div>
</nav>
<h1 class="mt-20"></h1>
<section id="index_main-section" class="container mx-auto my-auto mt-48 mb-16
                pl-36 pr-36">

    <header id="shelf-one" class="flex justify-between items-center pb-24">
        <div id="oneC1">
            <h1 class="text-5xl font-medium text-gray-600">
                <span class="text-green-600 font-bold">LandSphere.</span> The best way to <br> manage your land.
            </h1>
        </div>
        <div id="oneC2" class="flex flex-col gap-2 justify-start">
            <div id="oneC2-1" class="flex gap-2 items-center">
                <img src="resource/icons/index/main-section_shelf-one_c2-1_help.svg"
                     alt="shelf-one_c2-1_help.svg">
                <div class="flex flex-col gap-0.5">
                    <p class="font-medium text-sm">Need any help?</p>
                    <a href="static/error/HTTP501.html" class="text-green-600 text-sm hover:underline">Ask a
                        specialist</a>
                </div>
            </div>

            <div id="oneC2-2" class="flex gap-2 items-center ">
                <img src="resource/icons/index/main-section_shelf-one_c2-2_office.svg"
                     alt="shelf-one-c2-2_office.svg">
                <div class="flex flex-col gap-0.5">
                    <p class="font-medium text-sm">Visit our office</p>
                    <a href="static/error/HTTP501.html" class="text-green-600 text-sm hover:underline">Find our
                        locations</a>
                </div>
            </div>


        </div>

    </header>

    <main id="shelf-two" class="flex flex-col gap-3 pb-12">

        <h1 id="twoC1" class="pb-4 text-3xl font-medium">
            The Latest. <span class="text-gray-500">Take a look at what project we are working on, right now.</span>
        </h1>

        <div id="twoC2" class="flex gap-4 justify-evenly">

            <a id="c2-1" href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500 hover:text-black duration-300">
                <img alt="Home" class="h-48 w-full object-cover rounded-tl-2xl rounded-tr-2xl"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Exterior-01-Full-Exterior-Wide-angle-View.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4"> Sunset Ridge Estates <br>
                        1234 Maple Lane Maplewood, CA 90210</p>
                </div>
            </a>

            <a id="c2-2" href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500  hover:text-black duration-300">

                <img alt="Home" class="h-48 w-full object-cover rounded-tl-2xl rounded-tr-2xl"
                     src="https://www.unitedrealestatebd.com/wp-content/uploads/2020/07/Ext_Cam2-1920x2317.jpg"
                />

                <div class="mt-2 p-4 text-center">
                    <p class="font-medium pb-4"> Riverbend Heights <br>
                        4567 Riverbend Road Hillside, NY 12345</p>
                </div>
            </a>

            <a id="c2-3" href="#" class="bg-white rounded-2xl w-full block shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg text-gray-500  hover:text-black duration-300">
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

    <main id="shelf-three" class="flex flex-col gap-4 pb-12 select-none">
        <h1 id="threeC1" class="pb-4 text-3xl font-medium">
            Help is here. <span class="text-gray-500">Whenever and however you need it.</span>
        </h1>
        <div id="threeC2" class="grid grid-cols-2 gap-4">
            <a id="threeC2-1" href="static/error/HTTP501.html" class="bg-beige-dark rounded-3xl pt-10 pl-8 pr-8 w-full row-span-2 flex flex-col shadow-md
                        transform motion-safe:hover:scale-[1.02] transition-all hover:shadow-lg
                        bg-s3c2-1 duration-300">
                <p class="font-bold text-sm pb-4 text-gray-500">LAND SPECIALIST</p>
                <p class="font-medium text-2xl">Discuss one on one with our specialists. Online or in our office.</p>
            </a>
            <a id="threeC2-2" href="static/error/HTTP501.html" class="bg-white rounded-3xl pt-8 pb-8 pl-8 pr-8 w-full flex shadow-md
                        transform motion-safe:hover:scale-[1.02] transition-all hover:shadow-lg
                        items-center justify-between duration-300">
                <p class="font-medium text-2xl">Get to know about laws, rules and regulations</p>
                <img src="resource/icons/index/main-section_shelf-three_c2-2_law.svg"
                     alt="shelf-three_c2-2_law.svg">

            </a>
            <a id="threeC2-3" href="static/error/HTTP501.html" class="bg-white rounded-3xl pl-8 pr-8 w-full shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg flex items-center justify-between pt-8 pb-8
            bg-s3c2-3 duration-300">
                <p class="font-medium text-2xl ">Get expert service <br> and support</p>
                <img src="resource/icons/index/main-section_shelf-three_c2-3_expert.svg"
                     alt="shelf-three_c2-3_expert.svg">
            </a>
        </div>
    </main>

    <main id="shelf-four" class="flex flex-col gap-3 pb-12">
        <h1 id="fourC1" class="pb-4 text-3xl font-medium select-none">
            LandSphere differences. <span class="text-gray-500">Even more reasons to be with us.</span>
        </h1>

        <main id="fourC2" class="grid grid-cols-3 gap-6 select-none">
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-1.svg"
                     alt="shelf-four_c2-1.svg">
                <p class="text-black font-medium text-2xl pb-4">
                    It's that <span class="text-green-500">simple</span>.
                    Just a few steps and your lands are <span class="text-green-500">managed!</span>
                </p>
            </div>
            <div class="bg-white  justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-2.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    <span class="text-blue-500"> Booking </span> was never this much
                    <span class="text-blue-500"> easier. </span>
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-3.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Take a shortcut and <span class="text-purple-500">say goodbye to middlemen</span>
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-4.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Pay in full or <span class="text-green-500"> pay over time.</span> Your choice.
                </p>
            </div>
            <div class="bg-white justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-5.svg" alt="">
                <p class="text-black font-medium text-2xl pb-4">
                    Even if you have a <span style="color: #FFAB45">big family </span>, there won't be any land
                    <span style="color: #FFAB45"> disputes </span> at dinner table!</p>
            </div>
            <div id="privacy" class=" bg-gray-800 justify-self-stretch p-6 rounded-2xl shadow-md transform motion-safe:hover:scale-[1.02]
            transition-all hover:shadow-lg duration-300">
                <img class="pb-4" src="resource/icons/index/main-section_shelf-four_c2-6.svg" alt="">
                <p class="text-white font-medium text-2xl pb-4 transition-all duration-300 animate-fadeIn">
                    Privacy and
                    <span class="outlined-text font-bold"> security </span>
                    is our priority. <br>
                    <span id="hidden_bullet">Stay sa
                    &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span>
                    <span id="visible_bullet" class="hidden animate-bounce">Stay safe and secure!</span>
                </p>
            </div>
        </main>
    </main>

    <main id="shelf-five" class="flex flex-col ">
        <h1 id="fiveC1" class="col-span-4 pb-4 text-3xl font-medium">
            Quick Links
        </h1>
        <div id="fiveC2" class="flex gap-4 font-normal">
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest"
               href="static/error/HTTP501.html"> Status </a>
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest"
               href="./routes/__misc_files/terms-and-conditions"> Terms and
                conditions </a>
            <a class="bg-beige-dark rounded-3xl pt-2 pb-2 pr-6 pl-6 hover:bg-beige-darkest"
               href="static/error/HTTP501.html"> Our
                Commitments </a>
        </div>
    </main>

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
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Community </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Rules and Regulations </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Volunteers </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Option </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Opt Out </a>

            </div>
            <a></a>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                For Visitors
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Guides </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Office Locations </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Benefits </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> History </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Resources
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Help and Support </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Blog </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> News Archive </a>
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="font-black pb-3 text-xl">
                Company
            </h1>
            <div class=" flex flex-col gap-2">
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> About Us </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Leadership </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Careers </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Press </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Trust, Safety & Security </a>
            </div>
        </div>

        <div class="col-span-4 pt-3 flex gap-4 items-center">
            <h1 class="text-lg font-bold"> Follow us </h1>
            <a href="static/error/HTTP501.html">
                <img src="resource/icons/footer/icon-facebook.svg" alt="">
            </a>
            <a href="static/error/HTTP501.html">
                <img src="resource/icons/footer/icon-twitter.svg" alt="">
            </a>
            <a href="static/error/HTTP501.html">
                <img src="resource/icons/footer/icon-linkedin.svg" alt="">
            </a>
            <a href="static/error/HTTP501.html">
                <img src="resource/icons/footer/icon-youtube.svg" alt="">
            </a>
        </div>

        <hr class="col-span-4">

        <div class="col-span-4 flex align-middle items-center justify-between pt-3">
            <h1 class="font-bold"> &copy; 2023 <a href="#" class="text-green-400">LandSphere </a> Inc.</h1>
            <div class="flex gap-6 pt-1">
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Terms of Service </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Privacy Policy </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Cookie Settings </a>
                <a href="static/error/HTTP501.html" class="hover:text-green-300"> Accessibility </a>
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
                <img src="resource/icons/modal-search-icon.svg" alt="">
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
    
    document.addEventListener('keydown', function(event) {
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