<?php
/**
 * Run this file with php -f db_backup.php and schema + db backups will be saved
 */

$backup_db = true;
include_once 'includes/psl-config.php';

backup_tables(HOST, USER, PASSWORD, DATABASE);
backup_tables(HOST, USER, PASSWORD, DATABASE, '*', true);

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*',$schema_only = false)
{
  echo "######### Backing up $host ##########\n";

  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);

  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');

    while($row = mysql_fetch_row($result))
    {
      print_r ($row);
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);

    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";

    for ($i = 0; $i < $num_fields; $i++)
    {
      if (!$schema_only) {
        while($row = mysql_fetch_row($result))
        {
          $return.= 'INSERT INTO '.$table.' VALUES(';
          for($j=0; $j < $num_fields; $j++)
          {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = ereg_replace("\n","\\n",$row[$j]);
            if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
            if ($j < ($num_fields-1)) { $return.= ','; }
          }
          $return.= ");\n";
        }
      }
    }
    $return.="\n\n\n";
  }

  //save file
  $f_keyword = $schema_only ? "schema" : "backup";
  $filename = 'backup/db-'.$f_keyword.'-'.time().'-'.(md5(implode(',',$tables))).'.sql';
  $handle = fopen($filename,'w+');
  fwrite($handle,$return);
  fclose($handle);

  echo "########## Saved ##########\n";
  echo "$filename\n";

}

?>