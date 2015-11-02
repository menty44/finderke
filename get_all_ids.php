<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT *FROM id_card") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["idcard"] = array();

    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $idcard = array();
        $idcard["id"] = $result["id"];

            $idcard["id_number"] = $result["id_number"];
$idcard["name"] = $result["name"];
            $idcard["dob"] = $result["dob"];
            $idcard["finder_name"] = $result["finder_name"];
            $idcard["finder_contact"] = $result["finder_contact"];
            $idcard["place_to_collect"] = $result["place_to_collect"];
$idcard["reward"] = $result["reward"];
        // push single product into final response array
        array_push($response["idcard"], $idcard);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>


