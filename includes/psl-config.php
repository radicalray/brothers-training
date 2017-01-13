<?php
/**
 * These are the database login details
 */

error_reporting(E_ERROR | E_PARSE);

$addr = $_SERVER["REMOTE_ADDR"];
$debug = $addr == "127.0.0.1" || $addr == "::1";

if (!$debug) {

  /////////////////////// Production Settings ////////////////////////

  define("HOST", "mysql.churchincambridge.org");     // The host you want to connect to.
  //define("USER", "cl44-cdnbrtr");    // The database username.
  //define("USER", "ncc_readonly");    // The database username.
  define("USER", "sbruso");    // The database username.
  define("PASSWORD", "2608amtT");    // The database password.
  define("DATABASE", "brotherstraining");    // The database name.
  //define("DATABASE", "norcalchurches");    // The database name.

  define("CAN_REGISTER", "any");
  define("DEFAULT_ROLE", "member");

  define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!

} else {
  ////////////////////////// Local Development //////////////////////////

  define("HOST", "localhost");     // The host you want to connect to.
  //define("USER", "cl44-cdnbrtr");    // The database username.
  //define("USER", "ncc_readonly");    // The database username.
  define("USER", "root");    // The database username.
  define("PASSWORD", "root");    // The database password.
  define("DATABASE", "brotherstraining");    // The database name.
  //define("DATABASE", "norcalchurches");    // The database name.

  define("CAN_REGISTER", "any");
  define("DEFAULT_ROLE", "member");

  define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
}

?>