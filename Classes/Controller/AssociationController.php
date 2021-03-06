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
	 * Association controller class for the associationing extension. Provides actions for
	 * association listing, creating and updating associations and displaying association details.
	 *
	 * @author     Hauke Webermann <hauke@webermann.net>
	 * @package    EcAssociation
	 * @subpackage Controller
	 * @version    $Id$
	 * @license    GNU Public License, version 2
	 *             http://opensource.org/licenses/gpl-license.php
	 *
	 */

Class Tx_EcAssociation_Controller_AssociationController Extends Tx_EcAssociation_Controller_AbstractController {

		/*
		 * ATTRIBUTES
		 */

		/**
		 * A association repository instance
		 * @var Tx_EcAssociation_Domain_Repository_AssociationRepository
		 */
	Protected $associationRepository;

		/**
		 * A frontend user repository instance
		 * @var Tx_Extbase_Domain_Repository_FrontendUserRepository
		 */
	Protected $userRepository;





		/*
		 * ACTION METHODS
		 */




	
		/**
		 *
		 * The initialization action. This methods creates instances of all required
		 * repositories.
		 *
		 * @return void
		 *
		 */

	Protected Function initializeAction() {
		$this->associationRepository =& t3lib_div::makeInstance('Tx_EcAssociation_Domain_Repository_AssociationRepository');
		$this->userRepository        =& t3lib_div::makeInstance('Tx_Extbase_Domain_Repository_FrontendUserRepository');
	}



		/**
		 *
		 * The index action. Displays a list of all top-level associations.
		 * @return void
		 *
		 */

	Public Function indexAction() {
		$this->view->assign('associations', $this->associationRepository->findForIndexView() );
	}



		/**
		 *
		 * The show action. Displays details for a specific association.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The association that is to be displayed.
		 * @return void
		 *
		 */

	Public Function showAction ( Tx_EcAssociation_Domain_Model_Association $association ) {
		$this->view->assign('association', $association);
	}



		/**
		 *
		 * The new action. Displays a form for creating a new association.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The new association
		 * @return void
		 * @dontvalidate $association
		 *
		 */

	Public Function newAction ( Tx_EcAssociation_Domain_Model_Association $association=NULL ) {
		$this->view->assign('association' , $association)
		           ->assign('associations', array_merge(Array(NULL), $this->associationRepository->findAll()))
		           ->assign('users'   , $this->userRepository->findAll());
	}



		/**
		 *
		 * The create action. This method creates a new association and stores it into the
		 * database.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The new association
		 * @param array $assignments                                 An array of users and roles that are to be assigned to this association.
		 * @return void
		 * @dontverifyrequesthash
		 *
		 */

	Public Function createAction( Tx_EcAssociation_Domain_Model_Association $association, $assignments ) {
		$association->removeAllAssignments();
		ForEach($assignments As $userId => $roleId) {
			If($roleId == 0) Continue;
			$association->assignUser($this->userRepository->findByUid((int)$userId));
		}
		$this->associationRepository->add($association);
		$this->flashMessages->add('Der Krei/Verband '.$association->getName().' wurde erfolgreich angelegt.');

		$this->redirect('index');
	}



		/**
		 *
		 * The edit action. This method displays a form for editing existing associations.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The association
		 * @return void
		 * @dontvalidate $association
		 *
		 */

	Public Function editAction( Tx_EcAssociation_Domain_Model_Association $association ) {
		$this->view->assign('association' , $association)
		           ->assign('associations', array_merge(Array(NULL), $this->associationRepository->findAll()))
		           ->assign('users'   , $this->userRepository->findAll());
	}



		/**
		 *
		 * The update action. Updates an existing association in the database.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The association
		 * @param array $assignments                                 An array of users and roles that are to be assigned to this association.
		 * @return void
		 * @dontverifyrequesthash
		 *
		 */

	Public Function updateAction( Tx_EcAssociation_Domain_Model_Association $association, $assignments ) {
		$association->removeAllAssignments();
		ForEach($assignments As $userId => $roleId) {
			If($roleId == 0) Continue;
			$association->assignUser($this->userRepository->findByUid((int)$userId));
		}
		$this->associationRepository->update($association);
		$this->flashMessages->add("Das Projekt {$association->getName()} wurde erfolgreich bearbeitet.");

		$this->redirect('show', NULL, NULL, Array('association' => $association));
	}



		/**
		 *
		 * The delete action. Deletes an existing association from the database.
		 *
		 * @param Tx_EcAssociation_Domain_Model_Association $association The association that is to be deleted
		 * @return void
		 *
		 */

	Public Function deleteAction( Tx_EcAssociation_Domain_Model_Association $association ) {
		$this->associationRepository->remove($association);
		$this->flashMessages->add("Das Projekt {$association->getName()} wurde erfolgreich gelöscht.");

		$this->redirect('index');
	}

}

?>
