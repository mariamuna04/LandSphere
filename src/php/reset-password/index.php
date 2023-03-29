<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>Sign In</title>
</head>

<body class="bg-sign-in-background-light bg-cover filter dark:bg-sign-in-background-dark">

<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
    bg-opacity-60 backdrop-blur-md border border-gray-400 bg-white shadow-2xl
    animate-fadeIn overflow-y-auto dark:bg-black dark:bg-opacity-30
    dark:border-gray-800 ">

        <h2 class="align-middle pb-12 text-center font-black text-2xl dark:text-white select-none">
            Reset Password
        </h2>

        <form action="" method="POST">
            <div class="mb-5">
                <p class="text-xs text-gray-500 text-center dark:text-gray-300 select-none pb-6">
                    An authentication code will be sent to your email address or phone number <br>
                    You will need to enter the code to reset your password
                </p>
                <div class="mb-5 flex gap-6 pl-12 pr-12">
                    <input type="text" name="digit_1" id="digit_1"
                           class="input w-full rounded-3xl border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400
                           max-w-[70px] text-center text-black text-xl"
                    />

                    <input type="text" name="digit_2" id="digit_2"
                           class="input w-full rounded-3xl border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400
                           max-w-[70px] text-center text-black text-xl"
                    />

                    <input type="text" name="digit_3" id="digit_3"
                           class="input w-full rounded-3xl border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400
                           max-w-[70px] text-center text-black text-xl"
                    />

                    <input type="text" name="digit_4" id="digit_4"
                           class="input w-full rounded-3xl border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400
                           max-w-[70px] text-center text-black text-xl"

                    />
                </div>
            </div>

            <div class="mb-5">
                <div class="mb-5">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Password"
                           class="input w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                          dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm">
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-2 align-middle">
                <div class="flex items-center justify-center gap-24">
                    <a href="../forgot-password" class="cursor-hand rounded-md py-3 px-8 text-center text-base font-semibold
                outline-none items-center select-none text-primary flex flex-row gap-2 text-primary">
                        Forgot Password?
                    </a>
                    <button name="submit"
                            class="hover:shadow-form rounded-md bg-primary py-3 px-8 text-center text-base font-semibold text-white outline-none items-center">
                        Sign in
                    </button>

                </div>
                <div class="flex pt-4 py-3 px-8">
                    <p class="text-black dark:text-white select-none">Don't have an account?</p>
                    <a href="../sign-up"
                       class="text-center text-base text-secondary outline-none items-center font-bold pl-2 select-none">
                        Sign Up
                    </a>
                </div>

            </div>

        </form>
    </div>
</div>

<script>
    var allElements = document.querySelectorAll('input');
    var i;
    for (i = 0; i < allElements.length; i++) {
        var el = allElements[i];
        el.addEventListener("keypress", function () {
            this.nextSibling.nextSibling.focus();
        });
    }
</script>

</body>
</html>