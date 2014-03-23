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

if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin ($_EXTKEY, 'Pi1', 'Association extension');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Association');



t3lib_extMgm::addLLrefForTCAdescr       ( 'tx_ecassociation_domain_model_association',
                                          'EXT:ec_association/Resources/Private/Language/locallang_csh_tx_ecassociation_domain_model_association.xml' );
t3lib_extMgm::allowTableOnStandardPages ( 'tx_ecassociation_domain_model_association');
$TCA['tx_ecassociation_domain_model_association'] = array (
	'ctrl' => array (
		'title'                    => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_association',
		'label'                    => 'name',
		'tstamp'                   => 'tstamp',
		'crdate'                   => 'crdate',
		'versioningWS'             => 2,
		'versioning_followPages'   => TRUE,
		'origUid'                  => 't3_origuid',
		'languageField'            => 'sys_language_uid',
		'transOrigPointerField'    => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'delete'                   => 'deleted',
		'default_sortby'           => ' ORDER BY name ASC',
		'enablecolumns'            => array ( 'disabled' => 'hidden' ),
		'dynamicConfigFile'        => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Association.php',
		'iconfile'                 => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ecassociation_domain_model_association.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr       ( 'tx_ecassociation_domain_model_group',
                                          'EXT:ec_association/Resources/Private/Language/locallang_csh_tx_ecassociation_domain_model_group.xml' );
t3lib_extMgm::allowTableOnStandardPages ( 'tx_ecassociation_domain_model_group');
$TCA['tx_ecassociation_domain_model_group'] = array (
	'ctrl' => array (
		'title'                    => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_group',
		'label'                    => 'name',
		'tstamp'                   => 'tstamp',
		'crdate'                   => 'crdate',
		'versioningWS'             => 2,
		'versioning_followPages'   => TRUE,
		'origUid'                  => 't3_origuid',
		'languageField'            => 'sys_language_uid',
		'transOrigPointerField'    => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'delete'                   => 'deleted',
		'default_sortby'           => ' ORDER BY name ASC',
		'enablecolumns'            => array ( 'disabled' => 'hidden' ),
		'dynamicConfigFile'        => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Group.php',
		'iconfile'                 => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ecassociation_domain_model_group.gif'
	)
);

//**************************************************//
// USER | Erweiterung fe_users um Feld group
//**************************************************//
t3lib_div::loadTCA('fe_users');
$addColumnArray = array(
	'tx_ecassociation_group' => array(
		'exclude' => 0,
		'label'   => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_group',
		'config' => array(
			'type' => 'select',
			'foreign_class' => 'Tx_EcAssociation_Domain_Model_Group',
			'foreign_table' => 'tx_ecassociation_domain_model_group',
			'foreign_table_where' => 'ORDER BY name ASC',
			'maxitems' => 1,
		)
	),
);
t3lib_extMgm::addTCAcolumns('fe_users', $addColumnArray, 1);
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_ecassociation_group');

?>
