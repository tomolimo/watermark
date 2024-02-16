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

define ("PLUGIN_WATERMARK_VERSION", "2.0.0");

/**
 * Summary of plugin_init_watermark
 * Init the hooks of the plugins
 */
function plugin_init_watermark() {

   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['watermark'] = true;

   if (Session::haveRightsOr("config", [READ, UPDATE])) {
      Plugin::registerClass('PluginWatermarkConfig', ['addtabon' => 'Config']);
      $PLUGIN_HOOKS['config_page']['watermark'] = 'front/config.form.php';
   }

   $PLUGIN_HOOKS['add_javascript']['watermark'][] = 'js/watermark.js';

   // this hook will not redefine menu, but will output the GLPI_WATERMARK_PLUGIN_DATA js variable
   // to pass watermark data to the js that will show (or not) the watermark on the html pages
   $PLUGIN_HOOKS['redefine_menus']['watermark'] = 'plugin_watermark_redefine_menus';

}


/**
 * Summary of plugin_version_watermark
 * Get the name and the version of the plugin
 * @return array
 */
function plugin_version_watermark() {
   return [
      'name'         => __('Watermark'),
      'version'      => PLUGIN_WATERMARK_VERSION,
      'author'       => 'Olivier Moron',
      'license'      => 'GPLv2+',
      'homepage'     => 'https://github.com/tomolimo/watermark',
      'requirements' => [
         'glpi' => [
            'min' => '10.0',
            'max' => '10.1'
            ]
         ]
   ];
}


/**
 * Summary of plugin_watermark_check_prerequisites
 * check prerequisites before install : may print errors or add to message after redirect
 * @return bool
 */
function plugin_watermark_check_prerequisites() {
   if (version_compare(GLPI_VERSION, '10.0', 'lt')
       && version_compare(GLPI_VERSION, '10.1', 'ge')) {
      echo "This plugin requires GLPI >= 10.0 and < 10.1";
      return false;
   } else {
      return true;
   }
}


/**
 * Summary of plugin_watermark_check_config
 * @return bool
 */
function plugin_watermark_check_config() {
   return true;
}

