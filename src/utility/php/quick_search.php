<?php

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    die();
}

if (isset($_POST["query"])) {
    $data = array();
    $key = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);

    $query = "SELECT * FROM global_search 
         WHERE global_search.search_key LIKE '" . $key . "%' 
         OR global_search.search_description LIKE '%" . $key . "%' 
         OR global_search.hidden_keywords LIKE '%" . $key . "%' LIMIT 10";

    $result = mysqli_query($connection, $query);
    foreach ($result as $row) {
        $data[] = array(
            'search_key' => str_replace($key, $key, $row["search_key"]),
            "search_description" => str_replace($key, $key, $row["search_description"]),
            '_url' => str_replace($key, $key, $row["url"])
        );
    }
    echo json_encode($data);
}

$post_data = json_decode(file_get_contents('php://input'), true);