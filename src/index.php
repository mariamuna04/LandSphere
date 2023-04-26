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
     md:inset-0 h-[calc(100%-1rem)] md:h-full bg-opacity-60 bg-beige-darkest
    backdrop-blur-md transition-all shadow-xl animate-global_search_fadeIn">

    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-2xl shadow">
            <!-- Modal header -->
            <div class="flex justify-between p-6 border-b rounded-t items-center">
                <img src="./resource/icons/modal-search-icon.svg" alt="">
                <input type="text"
                       name="quick_search_box"
                       id="quick_search_box"
                       placeholder="Type anything to search"
                       onkeyup="load_data(this.value)"
                       class="w-full rounded-md
                               bg-white px-3 text-base font-medium text-[#6B7280]
                               outline-none"
                />
                <label for="quick_search_box"></label>
                <button type="button"
                        class="text-gray-400 bg-transparent rounded-lg text-sm ml-auto inline-flex items-center"
                        data-modal-hide="defaultModal">
                    <kbd class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100
                rounded-lg">Esc</kbd>
                </button>
            </div>
            <!-- Modal body -->
            <div id="quick_search_result" class="mx-3 my-6 flex flex-col gap-2 overflow-y-auto h-64">
            </div>
            <!-- Modal footer -->
            <div class="group flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                <div class="text-sm font-bold text-[#6B7280] flex gap-2 items-center">
                    <span>
                        <svg
                            class="fill-zinc-500 group-hover:fill-accent-2 group-hover:animate-pulse transition-all duration-300"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0,0,255.98959,255.98959" width="24px"
                            height="24px">
                                <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                   stroke-linejoin="miter"
                                   stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                   font-size="none" style="mix-blend-mode: normal">
                                    <g transform="scale(0.5,0.5)">
                                        <path
                                            d="M260,20c-128.82279,0 -234.10507,101.7594 -239.73828,229.23828c-0.00968,0.11119 -0.01749,0.22254 -0.02344,0.33399c-0.14677,3.42844 -0.23828,6.9027 -0.23828,10.42773c0,132.42945 107.57055,240 240,240c132.42945,0 240,-107.57055 240,-240c0,-3.46094 -0.09349,-6.86645 -0.23438,-10.22852c-0.00066,-0.06511 -0.00196,-0.13022 -0.0039,-0.19531c0,-0.0013 0,-0.0026 0,-0.0039c-5.46269,-127.63601 -110.82571,-229.57227 -239.76172,-229.57227zM250,41.44531v88.67188c-22.19618,0.48076 -43.61137,2.55409 -63.86328,6.03711c3.61628,-12.61254 7.75143,-24.28338 12.32422,-34.80078c8.67741,-19.95807 18.92922,-35.74238 29.58789,-46.11133c7.32921,-7.13 14.62808,-11.66161 21.95117,-13.79688zM270,41.44531c7.32309,2.13526 14.62196,6.66688 21.95117,13.79688c10.65867,10.36895 20.91048,26.15326 29.58789,46.11133c4.57279,10.5174 8.70794,22.18824 12.32422,34.80078c-20.25191,-3.48302 -41.6671,-5.55635 -63.86328,-6.03711zM209.30664,45.88477c-11.21652,12.38282 -20.92453,28.48929 -29.1875,47.49414c-6.17353,14.19912 -11.52996,30.04789 -15.94922,47.20507c-26.6177,6.19228 -50.76596,14.91618 -71.42969,25.69727c-17.04397,8.89251 -31.89067,19.33525 -43.66016,31.04687c22.24184,-75.09123 83.41908,-133.36312 160.22656,-151.44335zM310.69336,45.88477c76.80748,18.08023 137.98473,76.35212 160.22656,151.44335c-11.76948,-11.71162 -26.61619,-22.15436 -43.66015,-31.04687c-20.66373,-10.78109 -44.81199,-19.50499 -71.42969,-25.69727c-4.41926,-17.15718 -9.77569,-33.00595 -15.94922,-47.20507c-8.26297,-19.00485 -17.97098,-35.11132 -29.1875,-47.49414zM250,150.12305v89.87695h-79.60742c1.13762,-29.55065 4.75515,-57.43879 10.3164,-82.45508c21.64218,-4.26774 44.95227,-6.86121 69.29102,-7.42187zM270,150.12305c24.33875,0.56066 47.64884,3.15413 69.29102,7.42187c5.56125,25.01629 9.17878,52.90443 10.3164,82.45508h-79.60742zM159.18555,162.47656c-4.77962,24.02491 -7.81474,50.1148 -8.81446,77.52344h-106.55664c7.91924,-20.71812 27.98244,-40.23326 58.17578,-55.98633c16.49543,-8.60632 35.81237,-15.91886 57.19532,-21.53711zM360.81445,162.47656c21.38295,5.61825 40.69989,12.93079 57.19532,21.53711c30.19333,15.75307 50.25653,35.26821 58.17578,55.98633h-106.55664c-0.99972,-27.40864 -4.03484,-53.49853 -8.81446,-77.52344zM40,260h110c0,34.73784 3.25582,67.71747 9.18555,97.52344c-21.38295,-5.61825 -40.69989,-12.93079 -57.19532,-21.53711c-39.77236,-20.75082 -61.99023,-48.02845 -61.99023,-75.98633zM170,260h80v109.87695c-24.33875,-0.56066 -47.64884,-3.15413 -69.29102,-7.42187c-6.80142,-30.59496 -10.70898,-65.47867 -10.70898,-102.45508zM270,260h80c0,36.97641 -3.90756,71.86012 -10.70898,102.45508c-21.64218,4.26774 -44.95227,6.86121 -69.29102,7.42187zM370,260h110c0,27.95788 -22.21787,55.23551 -61.99023,75.98633c-16.49543,8.60632 -35.81237,15.91886 -57.19532,21.53711c5.92973,-29.80597 9.18555,-62.7856 9.18555,-97.52344zM49.0332,322.625c11.7769,11.73059 26.6404,22.18941 43.70703,31.09375c20.66373,10.78109 44.81199,19.50499 71.42969,25.69727c4.41926,17.15718 9.77569,33.00595 15.94922,47.20507c8.25884,18.99537 17.96051,35.09621 29.16992,47.47657c-76.82507,-18.08384 -138.02931,-76.35042 -160.25586,-151.47266zM470.9668,322.625c-22.22655,75.12224 -83.43079,133.38882 -160.25586,151.47266c11.20941,-12.38036 20.91108,-28.4812 29.16992,-47.47657c6.17353,-14.19912 11.52996,-30.04789 15.94922,-47.20507c26.6177,-6.19228 50.76596,-14.91618 71.42969,-25.69727c17.06663,-8.90434 31.93013,-19.36316 43.70703,-31.09375zM186.13672,383.8457c20.25191,3.48302 41.6671,5.55635 63.86328,6.03711v88.67188c-7.32309,-2.13526 -14.62196,-6.66688 -21.95117,-13.79688c-10.65867,-10.36895 -20.91048,-26.15326 -29.58789,-46.11133c-4.57279,-10.5174 -8.70794,-22.18824 -12.32422,-34.80078zM333.86328,383.8457c-3.61628,12.61254 -7.75143,24.28338 -12.32422,34.80078c-8.67741,19.95807 -18.92922,35.74238 -29.58789,46.11133c-7.32921,7.13 -14.62808,11.66162 -21.95117,13.79688v-88.67188c22.19618,-0.48076 43.61137,-2.55409 63.86328,-6.03711z">

                                        </path>
                                    </g>
                                </g>
                        </svg>
                    </span>
                    <h1> Global Search </h1>
                </div>
                <h1 class="text-sm font-light text-[#6B7280]">Results are shown from internal database</h1>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script>
    // When ID search_button is pressed, focus to id quick_search_box
    document.getElementById('search_button').addEventListener('click', () => {
        document.getElementById('quick_search_box').focus();
    });

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
            document.getElementById('quick_search_box').focus();
        }
        if (event.ctrlKey && event.keyCode === 75) {
            document.getElementById('search_button').click();
            document.getElementById('quick_search_box').focus();

        }
    });

    const os = navigator.platform;
    if (os === "Win32" || os === "Win64" || os === "Windows" || os === "WinCE") {
        document.getElementById('keyboard_shortcut').innerHTML = "Ctrl";
    }


    function get_text(event) {
        let string = event.textContent;
        // fetch api
        fetch("./utility/php/quick_search.php", {
            method: "POST",
            body: JSON.stringify({
                search_query: string
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(function (response) {
            return response.json();
        }).then(function () {
            document.getElementsByName('quick_search_box')[0].value = string;
            document.getElementById('quick_search_result').innerHTML = '';
        });
    }

    function load_data(query) {
        if (query.length > 0) {
            let form_data = new FormData();
            form_data.append('query', query);
            let ajax_request = new XMLHttpRequest();
            ajax_request.open('POST', './utility/php/quick_search.php');
            ajax_request.send(form_data);
            ajax_request.onreadystatechange = function () {
                if (ajax_request.readyState === 4 && ajax_request.status === 200) {
                    let response = JSON.parse(ajax_request.responseText);

                    let html = '';

                    if (response.length > 0) {
                        for (let count = 0; count < response.length; count++) {
                            html += '<a href="';
                            html += response[count]._url;
                            html += '" class="group flex justify-between gap-1 bg-beige-default hover:bg-beige-dark transition-all duration-300 p-4 rounded-xl">';
                            html += '<div class="flex flex-col gap-1"><h1 class="font-bold group-hover:text-primary transition-all duration-300" onclick="get_text(this)">' + response[count].search_key + '</h1>';
                            html += '<p class="text-sm text-gray-500">' + response[count].search_description + '</p></div>';
                            html += '<img class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300" src="./resource/icons/jump.svg" alt="">';
                            html += '</a>';
                        }
                    } else {
                        html += '<p class="text-center text-gray-500 text-2xl font-bold mt-12">No result found</p>';
                    }
                    document.getElementById('quick_search_result').innerHTML = html;
                }
            }
        } else {
            document.getElementById('quick_search_result').innerHTML = '';
        }
    }


</script>
</html>