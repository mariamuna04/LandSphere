<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_NAME = 'dbms_project';
$DB_PASS = '';

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM land WHERE land_type = 0";

$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $_land_type = $row['land_type'];

        // HTML variables
        $land_type = null;


        if ($_land_type == 0) {
            $land_type = "Residential";
        } else if ($_land_type == 1) {
            $land_type = "Commercial";
        } else if ($_land_type == 2) {
            $land_type = "Industrial";
        }


        echo

"

<a href='#' class='group bg-white rounded-2xl w-full block shadow-md 
transform motion-safe:hover:scale-[1.03]
transition-all hover:shadow-lg text-gray-600 duration-300'>
    <img class='w-full object-cover rounded-tl-2xl rounded-tr-2xl' alt='picture'
         src='../../resource/img/image_placeholder.webp'
    />

    <div class='mt-1 p-4 flex flex-col'>
    
        <p class='text-sm text-gray-500 font-semibold p-2 bg-beige-light rounded-2xl text-center mb-5
        group-hover:bg-beige-dark'>
            " . $row['address'] . "
        </p>

        <p class='text-xs font-extrabold pb-1 opacity-75 text-gray-600'>
            " . $land_type . "
        </p>
        

       <p class='font-bold text-green-600 text-xl col-span-7'>
            " . $title . " 
        </p> 
       
        
        <p class='text-sm text-gray-500 pb-2 pt-1 group-hover:text-black'>
            " . $row['place_details'] . "
        </p>
        
        <p class='text-lg text-gray-500 pb-3'>
            " . $row['area'] . " sqft
        </p>
        
        <p class='mr-auto mt-1 mb-1 text-xs font-medium px-2.5 py-0.5 rounded-2xl
       ";
        if ($row['environment_point'] > 0 && $row['environment_point'] <= 2) {
            echo " bg-green-100 text-green-500'> Ecologically Excellent ";
        } else if ($row['environment_point'] > 2 && $row['environment_point'] <= 4) {
            echo " bg-green-100 text-green-500'> Ecologically Very Good";
        } else if ($row['environment_point'] > 4 && $row['environment_point'] <= 6) {
            echo " bg-green-100 text-green-500'> Ecologically Good";
        } else if ($row['environment_point'] > 6 && $row['environment_point'] <= 8) {
            echo "  bg-yellow-100 text-yellow-600'> Ecologically Fair";
        } else if ($row['environment_point'] > 8 && $row['environment_point'] <= 10) {
            echo "  bg-red-100 text-red-500'> Ecologically Poor";
        }
        echo "
       </p>
        
        <p class='text-2xl font-black group-hover:text-green-600'>
            $" . $row['area'] * 0.3 . "
        </p> 
       
    </div>
</a>";
    }
} else {
    echo

    "<div class='text-2xl text-center text-red-400 col-span-3 flex-col flex items-center'>
   <span class='font-bold text-red-500'> No results found.</span> Try a different search or contact us for help.
</div>";

}
mysqli_close($connection);
?>