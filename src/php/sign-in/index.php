<?php
session_start();

if (isset($_SESSION["id"])) {
    header("Location: ../userPanel.php");
}

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'cse3522';
$DB_PASS = '';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// variables
$email_err = false;
$auth_err = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $auth_err = true;
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION["id"] = $row['nid'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["name"] = $row['_name_'];
            header("Location: ../userPanel.php");
        } else {
            $message = "Username and Password does not match";
            $email_err = true;
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
<body class="bg-sign-in-background bg-cover filter ">


<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
    bg-opacity-60 backdrop-blur-md border border-gray-400 bg-white shadow-2xl
    animate-fadeIn overflow-scroll overscroll-none">


        <h2 class="align-middle pb-12 text-center font-black text-2xl"> Sign in to your account</h2>


        <form action="" method="POST">
            <div class="mb-5">
                <div class="mb-5">
                    <input type="email"
                           name="email"
                           id="email"
                        <?php
                        if ($email_err) {
                            echo "value='$email'";
                        }
                        ?>
                           placeholder="Email address or Phone Number"
                           class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md <?php if ($auth_err) {
                               echo 'border-red-600';
                           } ?>"
                    />
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
                               outline-none focus:border-[#6A64F1] focus:shadow-md <?php if ($auth_err) {
                               echo 'border-red-600';
                           } ?>"
                    />
                </div>
            </div>

            <?php
            if ($email_err) {
                echo "<div class='text-red-500 text-center pb-3'>$message</div>";
            } else {
                echo '';
            }
            ?>


            <div class="flex flex-col items-center justify-center gap-2">
                <button name="submit"
                        class="hover:shadow-form rounded-md bg-primary py-3 px-8 text-center text-base font-semibold text-white outline-none items-center">
                    Sign in
                </button>
                <a href="../sign-up"
                   class="pt-2 py-3 px-8 text-center text-base text-secondary outline-none items-center">
                    Don't have an account? Click here to Register
                </a>


            </div>
        </form>
    </div>
</div>


</body>
</html>