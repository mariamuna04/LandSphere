<?php
session_start();

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

if (isset($_SESSION['nid'])) {
    header('Location: ../reset-password');
}

$key = '';
$account_not_found = false;
$input_error = false;

if (isset($_POST['submit'])) {
    $key = $_POST['email_or_phone'];

    if (empty($key)) {
        $input_error = true;
    } else {
        $key = mysqli_real_escape_string($connection, $key);
        $sql = "SELECT * FROM user WHERE (email = '$key' OR phone_number = '$key' OR nid = '$key')";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION['nid'] = $row['nid'];
            header("Location: ../reset-password");
        } else {
            $account_not_found = true;
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
    <link rel="icon" href="../../resource/ico.svg">
    <title>Sign In</title>
</head>

<body class="bg-sign-in-background-light bg-cover filter">
<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
    bg-opacity-60 backdrop-blur-md bg-beige-light shadow-2xl
    animate-fadeIn overflow-y-auto">

        <h2 class="align-middle pb-8 text-center font-black text-2xl select-none">
            Okay, Let's find your account
        </h2>

        <p class="text-xs text-gray-500 text-center select-none pb-6">
            An authentication code will be sent to your email address or phone number <br>
            You will need to enter the code to reset your password
        </p>

        <form action="" method="POST">
            <div class="mb-5">
                <div class="mb-5">
                    <input type="text" name="email_or_phone" id="email_or_phone"
                           placeholder="Search By Email, Phone Number or NID"
                           class="w-full rounded-xl
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:shadow-md font-mono"
                        <?php if ($account_not_found || $input_error) {
                            echo "value='$key'";
                        } ?>
                    />
                    <label for="email_or_phone" class="text-sm">
                </div>
                <div class="mb-5">

                    <?php if ($account_not_found) {
                        echo "<div class='mt-2 text-red-600 text-center select-none'>Account not found, please contact for support</div>";
                    } ?>

                    <?php if ($input_error) {
                        echo "<div class='mt-2 text-red-600 text-center select-none'>Please enter a valid keyword</div>";
                    } ?>

                </div>
            </div>


            <div class="flex flex-col items-center justify-center gap-2 align-middle mt-4">
                <div class="flex items-center justify-center gap-24">
                    <button name="submit" type="submit"
                            class="hover:shadow-form rounded-full bg-primary py-3 px-8
                            text-center text-base font-semibold text-white outline-none
                            items-center select-none hover:shadow-lg hover:bg-green-800">
                        Search
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>

