<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>Title</title>
    <script src="js/utility.js"></script>
</head>

<body class="bg-beige-default">
<nav class="bg-beige-dark flex gap-6 justify-between pl-24
    pr-24 pt-5 pb-5 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-md items-center top-0 mb-12">
    <div class="flex gap-10">
        <h1>Our hotels</h1>
        <h1>Rooms</h1>
        <h1>Offers</h1>
    </div>

    <div class="flex">
        <h1>Logo</h1>
    </div>

    <div class="flex gap-10 items-center">
        <h1>Contact</h1>
        <button onclick="gotoSignIn()">
            Sign In
        </button>
        <button onclick="gotoSignUp()"
                class="bg-green-600 pt-3 pb-3 pl-6 pr-6 rounded-3xl font-bold text-white">
            Sign Up
        </button>


    </div>

</nav>

<section class="container mx-auto my-auto mt-48 mb-24 pl-16 pr-16">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus neque urna, condimentum eu arcu ut, vulputate
        viverra purus. Proin libero lorem, mattis at tincidunt quis, vulputate in odio. Integer in augue ac augue
        ullamcorper cursus. Aenean ut turpis ultricies, feugiat turpis nec, hendrerit purus. In felis libero, semper in
        nunc quis, fringilla vehicula est. Vivamus mauris est, semper et suscipit ut, posuere vel mauris. Praesent a
        enim vehicula, ultrices lorem quis, molestie eros. Cras eget imperdiet arcu. Proin at feugiat mi. Pellentesque
        at nulla vel nulla imperdiet maximus id non erat. Fusce vestibulum orci eu lectus consectetur, a pretium risus
        condimentum.


        Nullam ac risus egestas, ultrices justo nec, porttitor eros. Proin volutpat sollicitudin blandit. In in luctus
        velit, eu euismod massa. Cras ultricies justo a tincidunt pellentesque. Phasellus maximus ullamcorper lacinia.
        Fusce mattis maximus mollis. Donec luctus bibendum lacus, sit amet ultricies augue mattis a. Vivamus condimentum
        eleifend mi, sed porta odio varius vel. Ut et tellus sit amet neque fermentum interdum sit amet sit amet nisl.
        Phasellus sit amet enim sollicitudin, pharetra lorem nec, semper leo. Pellentesque molestie neque maximus purus
        scelerisque, et maximus libero rutrum.

        Pellentesque maximus congue interdum. Aenean efficitur feugiat ornare. Nullam sollicitudin ex diam, vel suscipit
        ipsum mattis volutpat. Ut ullamcorper nibh mollis aliquet tristique. Nunc semper finibus odio at mattis.
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum et orci non
        leo auctor fringilla non in justo. Phasellus vehicula, nisi eget vehicula aliquet, dui turpis aliquet ante, a
        commodo mi est non tellus. Praesent varius a enim eu lobortis. Integer euismod ac nunc eu blandit. Maecenas in
        pellentesque sem, non iaculis ipsum. Proin eget lacus eros. In sit amet molestie leo. Maecenas eget volutpat
        urna.


        Vestibulum a sodales tortor, sed consequat velit. Proin ac suscipit ligula. Interdum et malesuada fames ac ante
        ipsum primis in faucibus. Pellentesque fermentum justo elit, in porta nibh lacinia eget. Aliquam blandit
        fringilla ligula ut aliquet. Quisque et iaculis sem. In mauris ex, sodales ut sollicitudin eu, aliquet ut
        tellus. Praesent ut mi consequat, fermentum risus eget, venenatis urna. Integer egestas mauris aliquet eros
        dictum pellentesque. Nam rutrum fringilla mi, eget tincidunt massa finibus sed.

        Quisque blandit, elit lacinia ultricies volutpat, nibh nunc tempus felis, eget pellentesque neque lectus in
        massa. Aliquam a porttitor sapien, et ornare justo. Integer auctor leo a porttitor hendrerit. Duis lorem neque,
        lobortis ac tortor eget, aliquam condimentum libero. Aenean consequat quam at dolor ornare fermentum. Etiam
        fringilla ut quam ut accumsan. Aenean mollis faucibus elit, vel gravida dui aliquet scelerisque. Donec nec
        varius erat, et facilisis massa. Fusce convallis erat at sem consequat sagittis. Integer nisi leo, ultricies id
        risus sed, aliquet consequat ipsum.

        Sed consequat, ipsum vel tristique porta, libero velit scelerisque leo, eget tincidunt elit diam nec dolor. Ut
        in urna id felis interdum dignissim. Cras ut quam non velit accumsan cursus. Proin suscipit, elit at vestibulum
        fermentum, mauris sem rutrum lectus, vitae cursus massa tortor sed diam. Morbi eu ligula mattis orci rhoncus
        dictum. Cras ultrices lobortis eleifend. Etiam in lacus justo. Cras commodo purus at venenatis feugiat. Sed
        scelerisque a tortor sit amet interdum. Vivamus vitae est sed elit molestie ornare.


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