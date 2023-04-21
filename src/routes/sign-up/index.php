<?php
session_start();

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <link rel="icon" href="../../resource/ico.svg">
    <title>Sign In</title>
</head>
<body class="bg-sign-up-background-light bg-cover">
<div class="flex items-center justify-center h-screen">
    <div class="mx-auto w-[1000px] h-[600px] p-12
                rounded-xl bg-opacity-60 backdrop-blur-md bg-beige-light
                shadow-2xl animate-fadeIn">

        <h2 class="align-middle pb-2 text-center font-black text-2xl select-none">
            Let's Create Your Account
        </h2>

        <h2 class="align-middle pb-6 text-center font-semibold text-gray-400 text-md select-none">
            Fill up this form, and we'll create an account for you
        </h2>

        <form action="" method="POST" class="pb-[4rem] h-full flex flex-col justify-between">
            <div class="grid grid-cols-9 gap-x-4">
                <section class="col-start-1 col-span-4 flex-col w-full flex gap-2">
                    <input type="text"
                           name="full_name"
                           id="full_name"
                           placeholder="Full Name"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="full_name" class="text-sm"></label>

                    <input type="email"
                           name="email"
                           id="email"
                           placeholder="Email Address"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="email" class="text-sm"></label>

                    <input type="tel"
                           name="phone_number"
                           id="phone_number"
                           placeholder="Phone Number"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="phone_number" class="text-sm"></label>

                    <label for="date_of_birth" class="text-sm pl-4 text-gray-500">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           id="date_of_birth"
                           placeholder="Date of Birth"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />

                    <input type="text"
                           name="address"
                           id="address"
                           placeholder="Permanent Address"
                           class="w-full rounded-xl mt-2
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="address" class="text-sm"></label>
                </section>

                <hr class="relative left-1/2 -ml-0.5 w-0.5 h-full bg-gray-300 rounded-full">

                <section class="col-start-6 col-span-4 flex-col w-full flex gap-2">
                    <input type="text"
                           name="nid"
                           id="nid"
                           placeholder="National ID"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="nid"></label>


                    <input type="text"
                           name="birth_certificate_number"
                           id="birth_certificate_number"
                           placeholder="Birth Certificate Number (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="birth_certificate_number"></label>

                    <input type="text"
                           name="passport_number"
                           id="passport_number"
                           placeholder="Passport Number (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="passport_number" class="text-xs text-red-800 text-center opacity-75">
                        You cannot change NID, Birth Certificate Number, and Passport Number after registration
                    </label>

                    <input type="text"
                           name="occupation"
                           id="occupation"
                           placeholder="Occupation (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="occupation"></label>

                    <input type="text"
                           name="yearly_income"
                           id="yearly_income"
                           placeholder="Yearly Income (optional)"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md font-mono"
                    />
                    <label for="yearly_income"></label>


                </section>
            </div>

            <div id="end_section" class="flex flex-col items-center align-middle border-t pt-4">
                <div class="flex justify-evenly gap-2 items-center w-full">
                    <a href="../sign-in"
                       class="hover:border-primary text-gray-500 border border-beige-darker transition-all pt-[0.60rem] pb-[0.60rem]
                pl-6 pr-6 rounded-3xl align-middle hover:text-green-800">
                        Sign In Instead
                    </a>

                    <div class="flex items-center gap-2 justify-center">
                        <input type="password"
                               name="new_password"
                               id="new_password"
                               placeholder="Enter New Password"
                               class="rounded-xl text-center border
                               bg-white py-2 px-3 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-lg font-mono"
                        />
                        <label for="new_password" class="text-sm"></label>

                        <input type="password"
                               name="confirm_password"
                               id="confirm_password"
                               placeholder="Confirm Password"
                               class="rounded-xl text-center border
                               bg-white py-2 px-3 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-lg font-mono"
                        />
                        <label for="confirm_password" class="text-sm"></label>
                    </div>

                    <button name="submit" type="submit"
                            class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-full hover:bg-green-800
                        hover:shadow-lg">
                        Submit
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

</body>

<script>
    let page_number = 0;

    const stepOne = document.getElementById('step-one');
    const stepTwo = document.getElementById('step-two');
    const stepThree = document.getElementById('step-three');
    const stepFour = document.getElementById('step-four');

    const stepOneCircle = document.getElementById('step-one-circle');
    const stepTwoCircle = document.getElementById('step-two-circle');
    const stepThreeCircle = document.getElementById('step-three-circle');
    const stepFourCircle = document.getElementById('step-four-circle');

    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');

    const page1 = document.getElementById('page1');
    const page2 = document.getElementById('page2');
    const page3 = document.getElementById('page3');
    const page4 = document.getElementById('page4');

    const headerPageOne = document.getElementById('header-page-one');
    const headerPageTwo = document.getElementById('header-page-two');
    const headerPageThree = document.getElementById('header-page-three');
    const headerPageFour = document.getElementById('header-page-four');


    function onNextClick() {
        page_number += 1;

        if (page_number === 1) {
            stepOneCircle.classList.remove('text-black');
            stepOneCircle.classList.remove('animate-pulse');
            stepOneCircle.classList.add('bg-green-600');
            stepOneCircle.classList.add('text-white');
            stepTwoCircle.classList.add('border-4');
            stepTwoCircle.classList.add('border-green-600');
            stepTwoCircle.classList.add('animate-pulse');
            previousButton.classList.remove('hidden');
            page1.classList.add('hidden');
            page2.classList.remove('hidden');
            headerPageOne.classList.add('hidden');
            headerPageTwo.classList.remove('hidden');
            stepOne.classList.add('text-gray-400');
        } else if (page_number === 2) {
            stepTwoCircle.classList.remove('text-black');
            stepTwoCircle.classList.remove('animate-pulse');
            stepTwoCircle.classList.add('bg-green-600');
            stepTwoCircle.classList.add('text-white');

            stepThreeCircle.classList.add('border-4');
            stepThreeCircle.classList.add('border-green-600');
            stepThreeCircle.classList.add('animate-pulse');

            page2.classList.add('hidden');
            page3.classList.remove('hidden');

            headerPageTwo.classList.add('hidden');
            headerPageThree.classList.remove('hidden');

            stepTwo.classList.add('text-gray-400');
        } else if (page_number === 3) {
            stepThreeCircle.classList.remove('text-black');
            stepThreeCircle.classList.remove('animate-pulse');
            stepThreeCircle.classList.add('bg-green-600');
            stepThreeCircle.classList.add('text-white');

            stepFourCircle.classList.add('border-4');
            stepFourCircle.classList.add('border-green-600');
            stepFourCircle.classList.add('animate-pulse');

            stepThree.classList.add('text-gray-400');

            page3.classList.add('hidden');
            page4.classList.remove('hidden');

            headerPageThree.classList.add('hidden');
            headerPageFour.classList.remove('hidden');

            nextButton.classList.add('hidden');
            submitButton.classList.remove('hidden');
        }

    }

    function onPreviousClick() {
        --page_number;

        if (page_number === 0) {
            stepOneCircle.classList.add('text-black');
            stepOneCircle.classList.add('animate-pulse');
            stepOneCircle.classList.remove('bg-green-600');
            stepOneCircle.classList.remove('text-white');

            stepTwoCircle.classList.remove('border-4');
            stepTwoCircle.classList.remove('border-green-600');
            stepTwoCircle.classList.remove('animate-pulse');
            previousButton.classList.add('hidden');

            stepOne.classList.remove('text-gray-400');

            headerPageTwo.classList.add('hidden');
            headerPageOne.classList.remove('hidden');

            page1.classList.remove('hidden');
            page2.classList.add('hidden');
        } else if (page_number === 1) {
            stepTwoCircle.classList.add('text-black');
            stepTwoCircle.classList.add('animate-pulse');
            stepTwoCircle.classList.remove('bg-green-600');
            stepTwoCircle.classList.remove('text-white');

            stepThreeCircle.classList.remove('border-4');
            stepThreeCircle.classList.remove('border-green-600');
            stepThreeCircle.classList.remove('animate-pulse');

            stepTwo.classList.remove('text-gray-400');

            headerPageThree.classList.add('hidden');
            headerPageTwo.classList.remove('hidden');


            page2.classList.remove('hidden');
            page3.classList.add('hidden');
        } else if (page_number === 2) {
            stepThreeCircle.classList.add('text-black');
            stepThreeCircle.classList.add('animate-pulse');
            stepThreeCircle.classList.remove('bg-green-600');
            stepThreeCircle.classList.remove('text-white');

            stepFourCircle.classList.remove('border-4');
            stepFourCircle.classList.remove('border-green-600');
            stepFourCircle.classList.remove('animate-pulse');

            stepThree.classList.remove('text-gray-400');

            page3.classList.remove('hidden');
            page4.classList.add('hidden');

            headerPageFour.classList.add('hidden');
            headerPageThree.classList.remove('hidden');

            nextButton.classList.remove('hidden');
            submitButton.classList.add('hidden');
        }
    }

</script>

</html>