<?php

session_start();

if (isset($_SESSION["id"])) {
    header("Location: ../userPanel.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>Sign In</title>
</head>
<body class="bg-sign-up-background-light bg-cover dark:bg-sign-up-background-dark">

<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] h-[700px] p-12 flex flex-col justify-between
                rounded-xl bg-opacity-60 backdrop-blur-md border border-gray-400
                bg-white shadow-2xl animate-fadeIn dark:bg-black dark:bg-opacity-30
                dark:border-gray-800">

        <div class="max-w-xl mx-auto my-4 border-b-2 pb-4 select-none">

            <div id="step-box" class="flex pb-3">
                <div class="flex-1">
                    <div id="step-one-circle"
                         class="w-10 h-10 mx-auto rounded-full text-lg flex
                         items-center border-4 border-green-600 text-black
                         animate-pulse dark:text-white">
                        <span class="text-center w-full">1</span>
                    </div>
                </div>


                <div class="flex-1">
                    <div id="step-two-circle"
                         class="w-10 h-10 mx-auto rounded-full text-lg flex
                         items-center dark:text-white">
                        <span class="text-center w-full">2</span>
                    </div>
                </div>

                <div class="flex-1">
                    <div id="step-three-circle"
                         class="w-10 h-10 mx-auto rounded-full text-lg flex
                         items-center dark:text-white">
                        <span class="text-center w-full">3</span>
                    </div>
                </div>

                <div class="flex-1">
                    <div id="step-four-circle"
                         class="w-10 h-10 mx-auto rounded-full text-lg flex
                         items-center dark:text-white">
                        <span class="text-center w-full">4</span>
                    </div>
                </div>
            </div>

            <div class="flex text-xs content-center text-center dark:text-white">
                <div id="step-one" class="w-1/4">
                    Account Registration
                </div>

                <div id="step-two" class="w-1/4">
                    Personal details
                </div>

                <div id="step-three" class="w-1/4">
                    Social Background
                </div>

                <div id="step-4" class="w-1/4">
                    Confirmation
                </div>
            </div>

        </div>

        <div class="overflow-y-scroll scroll-smooth no-scroll">

            <div id="card-title">
                <h2 id="header-page-one"
                    class="align-middle pt-4 pb-8 text-center font-black text-2xl select-none dark:text-white">
                    Create an Account
                </h2>
                <h2 id="header-page-two"
                    class="hidden align-middle pt-4 pb-8 text-center font-black text-2xl select-none dark:text-white animate-fadeIn">
                    A Few More Information...
                </h2>
                <h2 id="header-page-three"
                    class="hidden align-middle pt-4 pb-8 text-center font-black text-2xl select-none dark:text-white animate-fadeIn">
                    Almost There!
                </h2>
                <h2 id="header-page-four"
                    class="hidden align-middle pt-4 pb-8 text-center font-black text-2xl select-none dark:text-white animate-fadeIn">
                    Finishing...
                </h2>
            </div>

            <form action="" method="POST">

                <div id="page1" class="animate-fadeIn">
                    <div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="email"
                                   id="email"
                                   placeholder="Email address or Phone number"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="email" class="text-xs"></label>
                        </div>
                    </div><div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="email"
                                   id="email"
                                   placeholder="Email address or Phone number"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="email" class="text-xs"></label>
                        </div>
                    </div><div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="email"
                                   id="email"
                                   placeholder="Email address or Phone number"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="email" class="text-xs"></label>
                        </div>
                    </div>

                    <div id="nid_number" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="nid_number"
                                   id="nid_number"
                                   placeholder="10 digit NID Number"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="nid_number" class="text-xs"></label>
                        </div>
                    </div>


                    <div id="password" class="mb-5">
                        <div class="mb-5">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   placeholder="Password"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="password" class="text-xs"></label>
                        </div>
                    </div>

                    <div id="confirm_password" class="mb-5">
                        <div class="mb-5">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   placeholder="Confirm Password"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="confirm_password" class="text-xs"></label>
                        </div>
                    </div>

                </div>
                <div class="hidden animate-fadeIn" id="page2">
                    <div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="name"
                                   id="name"
                                   placeholder="Full name"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="name" class="text-xs"></label>
                        </div>
                    </div>

                    <div id="nid_number" class="mb-5">
                        <div class="mb-5">
                            <input type="date"
                                   name="dob"
                                   id="dob"
                                   placeholder="10 digit NID Number"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="dob" class="text-xs"></label>
                        </div>
                    </div>
                </div>
                <div class="hidden animate-fadeIn" id="page3">
                    <div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="text"
                                   name="job"
                                   id="job"
                                   placeholder="Give job"
                                   class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                            />
                            <label for="job" class="text-xs"></label>
                        </div>
                    </div>
                </div>
                <div class="hidden animate-fadeIn" id="page4">
                    <div id="email" class="mb-5">
                        <div class="mb-5">
                            <input type="checkbox"
                                   name="agreement"
                                   id="agreement"
                            />
                            <label for="agreement">Do you agree</label>
                        </div>
                        <div class="mb-5">
                            <input type="checkbox"
                                   name="agreement"
                                   id="agreement"
                            />
                            <label for="agreement">Permission to sell your data</label>
                        </div>
                    </div>

                </div>
            </form>

        </div>

        <div class="flex flex-col items-center justify-center gap-2 pt-4">
            <div class="flex gap-24 justify-end flex-auto">
                <button id="previousButton" onclick="onPreviousClick()"
                   class="cursor-hand rounded-md py-3 px-8 text-center text-base font-semibold
                   outline-none items-center select-none hidden text-primary">
                    Previous
                </button>

                <button id="nextButton" onclick="onNextClick()"
                        class="cursor-hand rounded-md py-3 px-8 text-center text-base font-semibold
                outline-none items-center select-none bg-primary text-white">
                    Next
                </button>

                <button name="submit" id="submitButton"
                        class="hidden cursor-hand rounded-md py-3 px-8 text-center text-base font-semibold
                outline-none items-center select-none bg-primary text-white">
                    Submit
                </button>

            </div>

            <a href="../sign-in"
               class="pt-2 py-3 px-8 text-center text-base text-secondary outline-none items-center
               select-none">
                Already have an Account? Click here to Sign In
            </a>

        </div>
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