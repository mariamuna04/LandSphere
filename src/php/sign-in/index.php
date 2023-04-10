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
    $email_or_phone = $_POST['email'];
    $password = $_POST['password'];

    // If One of the field is empty, exit
    if (empty($email_or_phone) || empty($password)) {
        $error_message = 'Please fill in all fields';
        $authentication_error = true;
    } else {
        // Validate Email
        if (!filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
            $error_message = 'Please use a valid email address';
            $authentication_error = true;
        } else {
            $email_or_phone = mysqli_real_escape_string($connection, $email_or_phone);
            $password = mysqli_real_escape_string($connection, $password);

            $sql = "SELECT *
                    FROM USER 
                    JOIN LOGIN AS L on user.nid = L.user_nid 
                    WHERE (email LIKE '" . $email_or_phone . "' OR phone_number LIKE ' " . $email_or_phone . " ')
                    AND password LIKE '" . $password . "';";

            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $_SESSION["id"] = $row['nid'];
                $_SESSION["name"] = $row['full_name'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["phone_number"] = $row['phone_number'];
                $_SESSION["date_of_birth"] = $row['date_of_birth'];
                $_SESSION["address"] = $row['address'];
                $_SESSION["occupation"] = $row['occupation'];


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

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-2xl
    bg-opacity-60 backdrop-blur-md bg-beige-light shadow-2xl
    animate-fadeIn overflow-y-auto dark:bg-black dark:bg-opacity-30
    dark:border-gray-800 ">

        <h2 class="align-middle pb-8 text-center font-black text-2xl dark:text-white select-none">
            Sign in to your account
        </h2>

        <form action="" method="POST">
            <div class="mb-5">
                <div class="mb-5">
                    <input type="email" name="email" id="email"
                        <?php if ($authentication_error) {
                            if (!empty($email_or_phone)) {
                                echo "value='$email_or_phone'";
                            }
                        } ?>
                           placeholder="Email address or Phone Number"
                           class="w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                    />
                    <label for="email" class="text-sm"></label>
                    <p class="text-sm pt-2 text-center text-red-600">
                        <?php
                        if ($authentication_error) {
                            if (empty($email_or_phone)) {
                                echo 'Email or Phone Number is required';
                            } else {
                                if (!filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
                                    echo 'Please use a valid email address';
                                }
                            }
                        }

                        ?>

                    </p>
                </div>
            </div>

            <div class="mb-5">
                <div class="mb-5">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="Password"
                           class="w-full rounded-xl
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:shadow-md dark:border-gray-900 dark:bg-[#393939] dark:text-white dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm"></label>
                    <p class="text-sm pt-2 text-center text-red-600">
                        <?php
                        if ($authentication_error) {
                            if (empty($password)) {
                                echo 'Password is required';
                            } else echo $error_message;
                        }

                        ?>

                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-2 align-middle">
                <div class="flex items-center justify-center gap-24">
                    <button name="submit" type="submit"
                            class="hover:shadow-form bg-green-700
                        py-3 px-8 text-center text-base
                        font-bold text-white outline-none items-center
                        col-span-2 rounded-xl hover:bg-green-800
                        hover:shadow-lg">
                        Sign in
                    </button>

                    <a href="../sign-up"
                       class="text-center text-green-600 outline-none items-center font-medium pl-2 select-none">
                        Sign Up Instead
                    </a>

                </div>
                <div class="flex pt-4 pb-4 py-3 px-8">
                    <a href="../forgot-password" class="cursor-hand rounded-md text-center text-base font-semibold
                outline-none items-center hover:underline select-none text-gray-500 flex flex-row gap-2">
                        Having trouble signing in?
                    </a>
                </div>

            </div>

        </form>
    </div>
</div>


</body>
</html>