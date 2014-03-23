<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ec_association".
 *
 * Auto generated 13-02-2014 22:42
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Association',
	'description' => '',
	'category' => 'Backend-Module',
	'shy' => 0,
	'version' => '0.1.0',
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Hauke Webermann',
	'author_email' => 'hauke@webermann.net',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.5.0-0.0.0',
			'extbase' => '1.3.0-0.0.0',
			'fluid' => '1.3.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:34:{s:12:"ext_icon.gif";s:4:"ac09";s:17:"ext_localconf.php";s:4:"0ce4";s:14:"ext_tables.php";s:4:"9920";s:14:"ext_tables.sql";s:4:"d614";s:41:"Classes/Controller/AbstractController.php";s:4:"5f71";s:44:"Classes/Controller/AssociationController.php";s:4:"6a52";s:46:"Classes/Domain/Exception/AbstractException.php";s:4:"884a";s:57:"Classes/Domain/Exception/NoAssociationMemberException.php";s:4:"d806";s:36:"Classes/Domain/Model/Association.php";s:4:"528c";s:30:"Classes/Domain/Model/Group.php";s:4:"f0e8";s:51:"Classes/Domain/Repository/AssociationRepository.php";s:4:"69a0";s:45:"Classes/Domain/Repository/GroupRepository.php";s:4:"7232";s:33:"Configuration/TCA/Association.php";s:4:"67ef";s:27:"Configuration/TCA/Group.php";s:4:"c893";s:34:"Configuration/TypoScript/setup.txt";s:4:"d6c5";s:40:"Resources/Private/Language/locallang.xml";s:4:"b04f";s:85:"Resources/Private/Language/locallang_csh_tx_ecssociation_domain_model_association.xml";s:4:"ad5a";s:79:"Resources/Private/Language/locallang_csh_tx_ecssociation_domain_model_group.xml";s:4:"a862";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"fb9b";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"95a9";s:35:"Resources/Private/Layouts/main.html";s:4:"95c3";s:47:"Resources/Private/Partials/associationForm.html";s:4:"63d9";s:47:"Resources/Private/Partials/associationList.html";s:4:"42ed";s:41:"Resources/Private/Partials/exception.html";s:4:"2972";s:42:"Resources/Private/Partials/formErrors.html";s:4:"cc71";s:49:"Resources/Private/Templates/Association/edit.html";s:4:"6913";s:50:"Resources/Private/Templates/Association/index.html";s:4:"9b36";s:48:"Resources/Private/Templates/Association/new.html";s:4:"ed00";s:49:"Resources/Private/Templates/Association/show.html";s:4:"e880";s:46:"Resources/Private/Templates/Default/error.html";s:4:"40f5";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:68:"Resources/Public/Icons/tx_ecassociation_domain_model_association.gif";s:4:"905a";s:62:"Resources/Public/Icons/tx_ecassociation_domain_model_group.gif";s:4:"905a";s:39:"Resources/Public/Stylesheets/styles.css";s:4:"a144";}',
	'suggests' => array(
	),
);

?>