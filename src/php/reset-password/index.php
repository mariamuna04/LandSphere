<?php
session_start();
if (!isset($_SESSION['nid'])) {
    header('Location: ../forgot-password');
}
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$_SESSION['success'] = false;
$error = '';

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password != $confirm_password) {
        $error = 'Passwords do not match!';
    } else {
        $query = "UPDATE login SET password = '$password' WHERE user_nid = '" . $_SESSION['nid'] . "'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['success'] = true;
        } else {
            $error = 'Something went wrong!';
            session_destroy();
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

<?php
if (!$_SESSION['success']) {
    echo '
    <div class="flex items-center justify-center h-screen">

    <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
    bg-opacity-60 backdrop-blur-md bg-beige-light shadow-2xl
    animate-fadeIn overflow-y-auto dark:bg-black dark:bg-opacity-30
    dark:border-gray-800 ">

        <h2 class="align-middle pb-12 text-center font-black text-2xl dark:text-white 
        select-none">
            Reset Password
        </h2>

        <form action="" method="POST">
            <div class="mb-5">
                <p class="text-xs text-gray-500 text-center dark:text-gray-300 select-none pb-4">
                    Please check your email or phone number. A verification code is sent.
                </p>
            </div>

            <div class="mb-5">
                <div class="mb-5">
                    <input type="text"
                           name="OTP"
                           id="OTP"
                           placeholder="Enter Six Digit OTP"
                           class="input w-full rounded-md border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white 
                           dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm">
                </div>
            </div>

            <div id="passwordBox" class="hidden animate-fadeIn">
                <div class="mb-5">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="New Password"
                           class="input w-full rounded-md border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white 
                           dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm">                   
                </div>

                <div class="mb-5">
                    <input type="password"
                           name="confirm_password"
                           id="confirm_password"
                           placeholder="Confirm New Password"
                           class="input w-full rounded-md border border-[#e0e0e0]
                           bg-white py-3 px-6 text-base font-medium text-[#6B7280]
                           outline-none focus:border-[#6A64F1] focus:shadow-md
                           dark:border-gray-900 dark:bg-[#393939] dark:text-white
                           dark:placeholder-gray-400"
                    />
                    <label for="password" class="text-sm">
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-2 align-middle pt-4">
                <div class="flex items-center justify-center">
                    <button name="submit" type="submit"
                            class="hover:shadow-form rounded-md bg-primary py-3 px-8 
                            text-center text-base font-semibold text-white outline-none 
                            items-center">
                        Submit
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
';
} else {
    echo '
    <div class="loading rounded h-1 w-[0%] bg-green-800 transition-all duration-200 absolute z-40 top-0 dark:bg-green-500">
    </div>
    
    <div class="flex items-center justify-center h-screen">
    
        <div class="mx-auto w-[550px] p-12 flex flex-col justify-between rounded-xl
        bg-opacity-60 backdrop-blur-md bg-beige-light shadow-2xl
        animate-fadeIn overflow-y-auto dark:bg-black dark:bg-opacity-30
        dark:border-gray-800">
    
            <img src="../../resource/icons/checkmark.svg" class="h-[100px] pb-5" alt="success_img">
                <h2 class="align-middle text-center font-black text-2xl dark:text-white select-none">
                    Password Changed Successfully!
                    Redirecting...
                </h2>
        </div>
    </div>
';
    header('refresh:3; url=../sign-in');
    session_destroy();
}
?>

</body>
<?php
if (!$_SESSION['success']) {
    echo "<script>
    const otp = document.getElementById('OTP');
    const password = document.getElementById('passwordBox');
    let otpValue;

    otp.addEventListener('keyup', (e) => {
        otpValue = e.target.value;
        if (otpValue.length === 6) {
            password.classList.remove('hidden')
        } else {
            password.classList.add('hidden')
        }
    })
</script>";
} else {
    echo "<script>
    const loading = document.querySelector('.loading');
    let currentProgress = 0;
    let itv = setInterval(function(){
        if(currentProgress < 100){
            const increment = 0.2;
            currentProgress += increment;
            if(currentProgress > 100) currentProgress = 100;
            setProgress(currentProgress);
        }else{
            clearInterval(itv);
        }
    },0.3);

    function setProgress(progress){
        loading.style.width = progress + '%';
    }

</script>";
}
?>
</html>