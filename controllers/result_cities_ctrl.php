<?php
require_once dirname(__FILE__).'/../models/City.php';

if ($_POST['search']) {
    echo 'ok';
    $city = new City();
    $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    $cityList = $city->findCity($search);
    print_r( $cityList);
    // echo $cityList;
}
var_dump($_POST);

