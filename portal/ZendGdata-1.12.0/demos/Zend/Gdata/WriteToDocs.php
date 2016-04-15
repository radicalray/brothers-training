 
<?php
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
// Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
function getClientLoginHttpClient($user, $pass)
{
  $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
  $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
  return $client;
}
$client = getClientLoginHttpClient('norcalchurches@gmail.com', 'serot2015');
$spreadsheetService = new Zend_Gdata_Spreadsheets($client);
// Get your spreadsheets feed
$feed = $spreadsheetService->getSpreadsheetFeed();
foreach($feed->entries as $entry) {
 $title = $entry->title->text;
 if ($title == "Test Spreadsheet") $id = $entry->id;
}
// Get spreadsheet key
$spreadsheetsKey = basename($id);   
echo 'Your spreadsheet key is: ' . $spreadsheetsKey .'</br>';
$query = new Zend_Gdata_Spreadsheets_DocumentQuery();
$query->setSpreadsheetKey($spreadsheetsKey);
$feed = $spreadsheetService->getWorksheetFeed($query);
foreach($feed->entries as $entry) {
    echo 'Your "'. $entry->title->text .'" worksheet ID is: ';
    $worksheetId = basename($entry->id);
    echo $worksheetId.'</br>';
}
// Get cell feed
$query = new Zend_Gdata_Spreadsheets_CellQuery();
$query->setSpreadsheetKey($spreadsheetsKey);
$query->setWorksheetId($worksheetId);
$cellFeed = $spreadsheetService->getCellFeed($query);
// Echo all cells
foreach($cellFeed as $cellEntry) {
  $row = $cellEntry->cell->getRow();
  $col = $cellEntry->cell->getColumn();
  $val = $cellEntry->cell->getText();
  echo "$row, $col = $val</br>";
}
$updatedCell = $spreadsheetService->updateCell(3,
                                               2,
                                               'Hello from PHP!',
                                               $spreadsheetsKey,
                                               $worksheetId);
