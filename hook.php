<?php
/*
 * -------------------------------------------------------------------------
Watermark plugin
Copyright (C) 2021 by Raynet SAS a company of A.Raymond Network.

http://www.araymond.com
-------------------------------------------------------------------------

LICENSE

This file is part of Watermark plugin for GLPI.

This file is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

GLPI is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with GLPI. If not, see <http://www.gnu.org/licenses/>.
--------------------------------------------------------------------------
 */

/**
 * Summary of plugin_watermark_install
 * @return boolean
 */
function plugin_watermark_install() {
   global $DB;

   if (!$DB->tableExists("glpi_plugin_watermark_configs")) {
         $query = "CREATE TABLE `glpi_plugin_watermark_configs` (
			   `id` INT(10) NOT NULL AUTO_INCREMENT,
			   `watermark` VARCHAR(250) NULL DEFAULT '' COMMENT 'Used to show a text when Config::canUpdate()' COLLATE 'utf8_general_ci',
	         `force_watermark` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Used to force watermark to all profiles',
			   PRIMARY KEY (`id`)
		      )
		      COLLATE='utf8_general_ci'
		      ENGINE=innoDB;
		      ";
         $DB->query($query) or die("error creating glpi_plugin_watermark_configs " . $DB->error());

         // default config
         $query = "INSERT INTO `glpi_plugin_watermark_configs` (`id`) VALUES (1);";
         $DB->query( $query ) or die("error creating default record in glpi_plugin_watermark_configs" . $DB->error());
   }

   return true;
}


/**
 * Summary of plugin_watermark_uninstall
 * @return boolean
 */
function plugin_watermark_uninstall() {

   // nothing to uninstall
   // do not delete table

   return true;
}