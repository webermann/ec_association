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
	 * The association repository class. Provides methods for accessing the association table.
	 *
	 * @author     Hauke Webermann <hauke@webermann.net>
	 * @package    EcAssociation
	 * @subpackage Domain_Repository
	 * @version    $Id$
	 * @license    GNU Public License, version 2
	 *             http://opensource.org/licenses/gpl-license.php
	 *
	 */

Class Tx_EcAssociation_Domain_Repository_GroupRepository Extends Tx_Extbase_Persistence_Repository {
	protected $defaultOrderings = array ('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);


		/**
		 *
		 * Finds all associations for an index view. The parent association can be specified
		 * using the $parent parameter (NULL by default). All associations are ordered by the
		 * association name in ascending order.
		 *
		 * @param  Tx_EcAssociation_Domain_Model_Group $parent The parent association
		 * @return Array<Tx_EcAssociation_Domain_Model_Group>  The result list.
		 *
		 */

	Public Function findForIndexView ( Tx_EcAssociation_Domain_Model_Group $parent=NULL ) {

		$query = $this->createQuery();
		Return $query
			->matching($query->equals('group', $parent ? $parent : Array(0,NULL) ))
			->setOrderings(Array('name' => Tx_Extbase_Persistence_Query::ORDER_ASCENDING))
			->execute();

	}

}

?>
