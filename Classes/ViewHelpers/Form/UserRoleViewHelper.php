<?php

/*                                                                      *
 *  COPYRIGHT NOTICE                                                    *
 *                                                                      *
 *  (c) 2013 Hauke Webermann <hauke@webermann.net>                      *
 *           webermann.net                                              *
 *           All rights reserved                                        *
 *                                                                      *
 *  This script is part of the TYPO3 project. The TYPO3 project is      *
 *  free software; you can redistribute it and/or modify                *
 *  it under the terms of the GNU General Public License as published   *
 *  by the Free Software Foundation; either version 2 of the License,   *
 *  or (at your option) any later version.                              *
 *                                                                      *
 *  The GNU General Public License can be found at                      *
 *  http://www.gnu.org/copyleft/gpl.html.                               *
 *                                                                      *
 *  This script is distributed in the hope that it will be useful,      *
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of      *
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the       *
 *  GNU General Public License for more details.                        *
 *                                                                      *
 *  This copyright notice MUST APPEAR in all copies of the script!      *
 *                                                                      */



	/**
	 *
	 * A ViewHelper for displaying a user role select field. In addition to the
	 * SelectViewHelper, this ViewHelper takes a "association" and a "user" argument. The
	 * "options" argument must contain an array of user role objects.
	 *
	 * @author     Hauke Webermann <hauke@webermann.net>
	 * @package    EcAssociation
	 * @subpackage ViewHelpers
	 * @version    $Id: UserRoleViewHelper.php 17 2010-03-03 09:26:45Z helmich $
	 * @license    GNU Public License, version 2
	 *             http://opensource.org/licenses/gpl-license.php
	 *
	 */

Class Tx_EcAssociation_ViewHelpers_Form_UserRoleViewHelper Extends Tx_Fluid_ViewHelpers_Form_SelectViewHelper {



		/**
		 *
		 * Initializes the ViewHelper arguments.
		 * @return void
		 *
		 */

	Public Function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument ( 'association', 'Tx_EcAssociation_Domain_Model_Association', '', TRUE );
		$this->registerArgument ( 'user'   , 'Tx_Extbase_Domain_Model_FrontendUser'     , '', TRUE );
	}



		/**
		 *
		 * Gets the selectable options for this select field. This methods overrides the
		 * respective method in the Tx_Fluid_ViewHelpers_Form_SelectViewHelper class.
		 * @return array The selectable options for this select field.
		 *
		 */

	Protected Function getOptions() {
		$options = Array(0 => 'Kein Mitglied');
		ForEach($this->arguments['options'] As $option) {
			If($option InstanceOf Tx_EcAssociation_Domain_Model_Role)
				$options[$option->getUid()] = $option->getName();
		} Return $options;
	}


		/**
		 *
		 * Gets the name of the form field. This method overrides the respective method
		 * of the Tx_Fluid_ViewHelpers_Form_SelectViewHelper class.
		 *
		 * @return string The form field name
		 *
		 */

	Protected Function getName() {
		Return parent::getName().'['.$this->arguments['user']->getUid().']';
	}

}

?>
