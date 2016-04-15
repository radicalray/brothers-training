<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Listing spreadsheets</title>
    <style>
    body {
      font-family: Verdana;      
    }
    </style>    
  </head>
  <body>
    <?php
    // load Zend Gdata libraries
    require_once 'Zend/Loader.php';
    Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');

    // set credentials for ClientLogin authentication
    $user = "norcalchurches@gmail.com";
    $pass = "nc_serot2015";

//    try {  
      // connect to API
      $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
      $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
      $service = new Zend_Gdata_Spreadsheets($client);

      // get list of available spreadsheets
      $feed = $service->getSpreadsheetFeed();
//   } catch (Exception $e) {
//      die('ERROR: ' . $e->getMessage());
//    }
    ?>
  
    <h2><?php echo $feed->title; ?></h2>
    <div>
    <?php echo $feed->totalResults; ?> spreadsheet(s) found.
    </div>  

    <ul>
    <?php foreach($feed as $entry): ?>
      <li class="name"><?php echo $entry->getTitle(); ?></li>
    <?php endforeach; ?>
    </ul>

  </body>
<html>
