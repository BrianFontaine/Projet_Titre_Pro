<?php
require_once dirname(__FILE__).'/../models/City.php';

if ($_POST['search']) {
    $city = new City();
    $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    $cityList = $city->findCity($search);
    echo json_encode($cityList);
}

