<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'cse3522';
$DB_PASS = '';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $message = "Email already exists!";
    } else {
        if ($password == $confirm_password) {
            $sql = "INSERT INTO user (_name_, email, password) VALUES ('$name', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $message = "Registration Successful!";
            } else {
                $message = "Registration Failed!";
            }
        } else {
            $message = "Password does not match!";
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Sign In</title>
</head>
<body class="bg-sign-up-background bg-cover">


<div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-full max-w-[550px] p-12 flex flex-col justify-between rounded-xl bg-opacity-60
    backdrop-blur-md border border-gray-400 bg bg-white shadow-2xl">
        <h2 class="align-middle pb-12 text-center font-black text-2xl"> Almost there, just a few steps</h2>
        <form action="" method="POST">


            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <input type="text" name="fName" id="fName" placeholder="First Name"
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <input type="text" name="lName" id="lName" placeholder="Last Name"
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <div class="mb-5">
                    <input type="text"
                           name="date-of-birth"
                           id="date-of-birth"
                           placeholder="Date of Birth (YYYY / MM / DD)"
                           class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
            </div>


            <div class="mb-5">
                <div class="mb-5">
                    <input type="text"
                           name="present-address"
                           id="present-address"
                           placeholder="Present Address"
                           class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
            </div>


            <div class="mb-5">
                <div class="mb-5">
                    <input type="text"
                           name="permanent-address"
                           id="permanent-address"
                           placeholder="Permanent Address"
                           class="w-full rounded-md border border-[#e0e0e0]
                               bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                               outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
            </div>


            <div class="flex flex-col items-center justify-center gap-2">
                <button class="hover:shadow-form rounded-md bg-primary py-3 px-8 text-center text-base font-semibold text-white outline-none items-center">
                    Next
                </button>
            </div>
        </form>
    </div>
</div>


</body>
</html>
