<?php

/*
   ----------------------------------------------------------------------
   FusionInventory
   Copyright (C) 2010-2011 by the FusionInventory Development Team.

   http://www.fusioninventory.org/   http://forge.fusioninventory.org/
   ----------------------------------------------------------------------

   LICENSE

   This file is part of FusionInventory.

   FusionInventory is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 2 of the License, or
   any later version.

   FusionInventory is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with FusionInventory.  If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------
   Original Author of file: David DURIEUX
   Co-authors of file:
   Purpose of file:
   ----------------------------------------------------------------------
 */

if(!defined('GLPI_ROOT')) {
   define('GLPI_ROOT', '../..');
}

//Agent posting an inventory or asking for orders using REST
if ((isset($_GET['action']) 
   && isset($_GET['machineid'])) 
      || isset($GLOBALS["HTTP_RAW_POST_DATA"])) {

   include_once(GLPI_ROOT ."/plugins/fusioninventory/front/communication.php");

//Fusioninventory plugin pages
} else {
   include (GLPI_ROOT."/inc/includes.php");
   commonHeader($LANG['plugin_fusioninventory']['title'][0],$_SERVER["PHP_SELF"], "plugins", 
                "fusioninventory");

   glpi_header($CFG_GLPI['root_doc']."/plugins/fusioninventory/front/wizard.php");
   commonFooter();
}
?>