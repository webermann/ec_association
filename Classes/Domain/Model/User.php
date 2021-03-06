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
 * The class extended fe user
 * http://www.derhansen.de/2012/12/typo3-extbase-mapping-existing-fields.html
 *
 * @author     Hauke Webermann <hauke@webermann.net>
 * @package    EcDonationrun
 * @subpackage Domain_Model
 * @version    $Id: Donation.php 46 2014-02-26 06:48:05Z hauke $
 * @license    GNU Public License, version 2
 *             http://opensource.org/licenses/gpl-license.php
 * @entity
 *
 */

Class Tx_EcAssociation_Domain_Model_User Extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * Association Group
	 *
	 * @var Tx_EcAssociation_Domain_Model_Group
	 */
	protected $txEcassociationGroup;

	/**
	 * Getter for Association Group
	 *
	 * @return Tx_EcAssociation_Domain_Model_Group
	 */
	public function getTxEcassociationGroup() {
		return $this->txEcassociationGroup;
	}

	/**
	 * Setter for Association Group
	 *
	 * @param Tx_EcAssociation_Domain_Model_Group $txEcassociationGroup
	 * @return void
	 */
	public function setTxEcassociationGroup($txEcassociationGroup) {
		$this->group = $txEcassociationGroup;
	}




}

?>
