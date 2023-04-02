<?php
session_start();

if (isset($_SESSION["id"])) {
    header("Location: ../user-dashboard");
}

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// variables
$authentication_error = false;
$error_message = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // If One of the field is empty, exit
    if (empty($email) || empty($password)) {
        $error_message = 'Please fill in all fields';
        $authentication_error = true;
    } else {
        // Validate Email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = 'Please use a valid email address';
            $authentication_error = true;
        } else {
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);

            $sql = "SELECT nid, password FROM USER JOIN LOGIN AS L on USER.nid = L.user_nid";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $_SESSION["id"] = $row['nid'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["name"] = $row['_name_'];
                header("Location: ../user-dashboard");
            } else {
                $error_message = 'Invalid Credentials';
                $authentication_error = true;
            }
        }
    }
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

<body class="bg-sign-in-background-light bg-cover filter dark:bg-sign-in-background-dark">

<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
    bg-opacity-60 backdrop-blur-md bg-beige-light shadow-2xl
    animate-fadeIn overflow-y-auto dark:bg-black dark:bg-opacity-30
    dark:border-gray-800 ">

        <h2 class="align-middle pb-12 text-center font-black text-2xl dark:text-white select-none">
            Sign in to your account
        </h2>

        <form action="" method="POST">
            <div class="mb-5">
                <div class="mb-5">
                    <input type="email" name="email" id="email"
                        <?php if ($authentication_error) {
                            if (!empty($email)) {
                                echo "value='$email'";
                            }
                        } ?>
                           placeholder="Email address or Phone Number"
                           class="w-full rounded-md border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                            <?php if ($authentication_error) {
                               echo 'border-red-600';
                           } ?>
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                    />
                    <label for="email" class="text-sm">
                </div>
            </div>

            <div class="mb-5">
                <div class="mb-5">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Password"
                           class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md
                               <?php if ($authentication_error) {
                               echo 'border-red-600';
                           } ?>
                          dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm">
                </div>
            </div>

            <?php

            if ($error_message != '') {
                echo "<div class='text-red-500 text-center pb-4'>$error_message</div>";
            } else {
                echo '';
            }
            ?>



            <div class="flex flex-col items-center justify-center gap-2 align-middle pt-4">
                <div class="flex items-center justify-center gap-24">
                    <a href="../forgot-password" class="cursor-hand rounded-md text-center text-base font-semibold
                outline-none items-center select-none text-primary flex flex-row gap-2 text-primary">
                        Forgot Password?
                    </a>
                    <button name="submit" type="submit"
                            class="hover:shadow-form rounded-md bg-primary py-3 px-8 text-center text-base font-semibold text-white outline-none items-center">
                        Sign in
                    </button>

                </div>
                <div class="flex pt-4 pb-4 py-3 px-8">
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


</body>
</html>