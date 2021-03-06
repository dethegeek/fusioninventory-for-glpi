<?php

class SaveInstallTest extends PHPUnit_Framework_TestCase {

   public function should_restore_install() {
      return FALSE;
   }
   public function testSaveInstallation() {
      if (!defined('GLPI_ROOT')) {
         define('GLPI_ROOT', realpath('../../..'));
      }

      include_once (GLPI_ROOT . "/config/based_config.php");
      include_once (GLPI_ROOT . "/inc/dbmysql.class.php");
      include_once (GLPI_CONFIG_DIR . "/config_db.php");
      $DB = new DB();
      $mysqldump_cmd = array('mysqldump');

      $mysqldump_cmd[] = "--opt";
      $mysqldump_cmd[] = "-h ".$DB->dbhost;

      $mysqldump_cmd[] = "-u ".$DB->dbuser;

      if (!empty($DB->dbpassword)) {
         $mysqldump_cmd[] = "-p'".urldecode($DB->dbpassword)."'";
      }

      $mysqldump_cmd[] = $DB->dbdefault;

      $output = shell_exec(
         implode(' ', $mysqldump_cmd)
      );
      $this->assertNotNull($output, print_r(implode(' ', $mysqldump_cmd),TRUE));
      $dumpfile = fopen("./save.sql", "w+");
      fwrite($dumpfile, $output);
      fclose($dumpfile);

      $this->assertFileExists("./save.sql");
      $filestats = stat("./save.sql");
      $length = $filestats[7];
      $this->assertGreaterThan(0, $length);
   }
}
