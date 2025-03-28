<?php
/*
 * @version $Id: HEADER 15930 2011-10-30 15:47:55Z tsmr $
 -------------------------------------------------------------------------
 Metademands plugin for GLPI
 Copyright (C) 2018-2019 by the Metademands Development Team.

 https://github.com/InfotelGLPI/metademands
 -------------------------------------------------------------------------

 LICENSE

 This file is part of Metademands.

 Metademands is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Metademands is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Metademands. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

include ('../../../inc/includes.php');
header("Content-Type: text/html; charset=UTF-8");
Html::header_nocache();

Session::checkLoginUser();

if (!isset($_POST['step'])) {
   $_POST['step'] = 'default';
}

switch ($_POST['step']) {
   case 'order':
      $fields = new PluginMetademandsField();
      $fields->showOrderDropdown($_POST['rank'],
                                 $_POST['fields_id'],
                                 $_POST['previous_fields_id'],
                                 $_POST["metademands_id"]);
      break;
   default:
      $fields = new PluginMetademandsField();
      $fields->getEditValue(PluginMetademandsField::_unserialize(stripslashes($_POST['custom_values'])),
                            PluginMetademandsField::_unserialize(stripslashes($_POST['comment_values'])),
                            $_POST);
      $fields->viewTypeField($_POST);
      break;
}

//Html::ajaxFooter();