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
	 * An Exception that is thrown, when an user tries to save timesets for a project
	 * that he is not a member of.
	 *
	 * @author     Hauke Webermann <hauke@webermann.net>
	 * @package    EcAssociation
	 * @subpackage Domain_Exception
	 * @version    $Id$
	 * @license    GNU Public License, version 2
	 *             http://opensource.org/licenses/gpl-license.php
	 *
	 */

Class Tx_EcAssociation_Domain_Exception_NoAssociationMemberException Extends Tx_EcAssociation_Domain_Exception_AbstractException {
	Protected $code = 1266412844;
	Protected $message = "You are no member of this association!";
}

?>