<?php

/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["id"])) {
    $pid = $_GET['id'];

    // get a product from products table
    $result = mysql_query("SELECT *FROM id_card WHERE id = $id");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $idcard = array();
            $idcard["id"] = $result["id"];

            $idcard["id_number"] = $result["id_number"];
$idcard["name"] = $result["name"];
            $idcard["dob"] = $result["dob"];
            $idcard["finder_name"] = $result["finder_name"];
            $idcard["finder_contact"] = $result["finder_contact"];
            $idcard["place_to_collect"] = $result["place_to_collect"];
$idcard["reward"] = $result["reward"];
            // success
            $response["success"] = 1;

            // user node
            $response["idcard"] = array();

            array_push($response["idcard"], $idcard);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No ID found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No ID found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
