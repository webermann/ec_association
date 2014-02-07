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
	 * The class for the association domain model. The association class models the association
	 * object, that is characterized by a name attribute and a start and end date. Each
	 * association may have an infinite number of sub-associations.
	 *
	 * @author     Hauke Webermann <hauke@webermann.net>
	 * @package    EcAssociation
	 * @subpackage Domain_Model
	 * @version    $Id$
	 * @license    GNU Public License, version 2
	 *             http://opensource.org/licenses/gpl-license.php
	 * @entity
	 *
	 */

Class Tx_EcAssociation_Domain_Model_Association Extends Tx_Extbase_DomainObject_AbstractEntity {
		/*
		 * ATTRIBUTES
		 */
		/**
		 * The association name
		 * @var string
		 * @validate StringLength(minimum = 3, maximum = 255)
		 */
	Protected $name;

		/**
		 * The parent association. For toplevel associations, this attribute is NULL
		 * @var Tx_EcAssociation_Domain_Model_Association
		 */
	Protected $association=NULL;

		/**
		 * The date this association was last edited on.
		 * @var DateTime
		 */
	Protected $tstamp;

		/**
		 * The sub-associations of this association.
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_EcAssociation_Domain_Model_Association>
		 * @lazy
		 * @cascade remove
		 */
	Protected $subassociation;

		/**
		 * A caching array for the groups of this association.
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_EcAssociation_Domain_Model_Group>
		 * @lazy
		 * @cascade remove
		 */
	Protected $groups = NULL;


		/*
		 * CONSTRUCTORS
		 */
		 /**
		  *
		  * Creates a new association.
		  *
		  */

	Public Function __construct() {
		
	}

		/*
		 * GETTERS
		 */

		 /**
		  *
		  * Gets the association name
		  * @return string The association name
		  *
		  */

	Public Function getName() {
		Return $this->name;
	}

		/**
		 *
		 * Gets the parent association.
		 * @return Tx_EcAssociation_Domain_Model_Association The parent association
		 *
		 */

	Public Function getParent() {
		Return $this->association;
	}

		/**
		 *
		 * Gets the parent association.
		 * @return Tx_EcAssociation_Domain_Model_Association The parent association
		 *
		 */

	Public Function getAssociation() {
		Return $this->association;
	}

		/**
		 *
		 * Gets the edit date.
		 * @return DateTime The edit date
		 *
		 */

	Public Function getEditDate() {
		Return $this->tstamp;
	}

		/**
		 *
		 * Gets all sub associations for this association.
		 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_Association>
		 *
		 */

	Public Function getSubassociation() {
		Return $this->subassociation;
	}

		/**
		 *
		 * Gets all groups for this association.
		 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_Group>
		 *
		 */

	Public Function getGroups() {
		Return $this->groups;
	}



		/*
		 * SETTERS
		 */

		 /**
		  *
		  * Sets the association name
		  * @param string $name The association name
		  * @return void
		  *
		  */

	Public Function setName($name) {
		$this->name = $name;
	}

		/**
		 *
		 * Sets the parent association
		 * @param Tx_EcAssociation_Domain_Model_Association $parent The parent association
		 * @return void
		 *
		 */

	Public Function setParent(Tx_EcAssociation_Domain_Model_Association $parent=NULL) {
		$this->association = $parent;
	}

		/**
		 *
		 * Adds a new subassociation.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The new subassociation
		 * @return void
		 *
		 */

	Public Function addSubassociation(Tx_EcAssociation_Domain_Model_Association $association) {
		$association->setParent($this);
		$this->subassociation->attach($association);
	}
	

}

?>
