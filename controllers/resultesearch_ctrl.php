<?php
// require_once dirname(__FILE__).'/../models/';
if (isset($_GET['search'])&& $_GET['search'] != '')
{
    echo 'ok';
}
else
{
    echo 'non';
} 
require_once dirname(__FILE__).'/../views/resultsearch_views.php';
?>
