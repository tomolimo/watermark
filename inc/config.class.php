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

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access this file directly");
}

class PluginWatermarkConfig extends CommonDBTM {

   static private $_instance = null;
   static $rightname = "config";

   static function canCreate() {
      return self::canUpdate();
   }

   /**
    * Summary of getTypeName
    * @param mixed $nb plural
    * @return mixed
    */
   static function getTypeName($nb = 0) {
      return __("Watermark", "watermark");
   }

   /**
    * Summary of getName
    * @param mixed $with_comment with comment
    * @return mixed
    */
   function getName($with_comment = 0) {
      return self::getTypeName();
   }

   /**
    * Summary of getInstance
    * @return PluginWatermarkConfig
    */
   static function getInstance() {
      if (!isset(self::$_instance)) {
         self::$_instance = new self();
         if (!self::$_instance->getFromDB(1)) {
            self::$_instance->getEmpty();
         }
      }
      return self::$_instance;
   }


   /**
    * Summary of showConfigForm
    * @param mixed $item is the config
    * @return boolean
    */
   static function showConfigForm($item) {
      $config = self::getInstance();
      $config->showFormHeader();

      echo "<tr class='tab_bg_2'>";
      echo "<td>" . __('Watermark text', 'watermark') . "</td>";
      echo "<td>";
      echo "<input size='50' type='text' name='watermark' value='".$config->fields['watermark']."'>";
      echo "</td></tr>";
      echo "<tr class='tab_bg_1'>";
      echo "<td >".__('Force watermark to all profiles', 'watermark')."</td><td >";
      Dropdown::showYesNo("force_watermark", $config->fields['force_watermark']);
      echo "</td></tr>";
      
      $config->showFormButtons(['candel'=>false]);

      return false;
   }


   function getTabNameForItem(CommonGLPI $item, $withtemplate = 0) {
      if ($item::getType() == 'Config') {
         return self::getTypeName();
      }
      return '';
   }


   static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0) {
      if ($item::getType() == 'Config') {
         self::showConfigForm($item);
      }
      return true;
   }

}
