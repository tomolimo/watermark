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

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT."/inc/includes.php");

$config = PluginWatermarkConfig::getInstance();
if (Config::canUpdate() || $config->fields['force_watermark']) {
   echo '
      $("body").append(\'<div id="watermark_tl" style="left: 0px; top: 110px; font-size: 36px; position: fixed; z-index: 99; opacity: 0.3; transform-origin: right top; transform: rotate(-90deg); pointer-events: none;">'.$config->fields['watermark'].'</div>\');
      $("#watermark_tl").css("left", -$("#watermark_tl").width());
      $("body").append(\'<div id="watermark_tr" style="right: 50px; top: 110px; font-size: 36px; position: fixed; z-index: 99; opacity: 0.3; transform-origin: right top; transform: rotate(-90deg); pointer-events: none;">'.$config->fields['watermark'].'</div>\');
      $("body").append(\'<div id="watermark_bl" style="left: 5px; bottom: 5px; font-size: 36px; position: fixed; z-index: 99; opacity: 0.3; pointer-events: none;">'.$config->fields['watermark'].'</div>\');
      $("body").append(\'<div id="watermark_br" style="right: 5px; bottom: 5px; font-size: 36px; position: fixed; z-index: 99; opacity: 0.3; pointer-events: none;">'.$config->fields['watermark'].'</div>\');
   ';
}
