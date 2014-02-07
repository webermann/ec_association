<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_ecassociation_domain_model_association'] = array(
	'ctrl' => $TCA['tx_ecassociation_domain_model_association']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,association,groups'
	),
	'types' => array(
		'1' => array('showitem' => 'name,association,groups')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ecassociation_domain_model_association',
				'foreign_table_where' => 'AND tx_ecassociation_domain_model_association.uid=###REC_FIELD_l18n_parent### AND tx_ecassociation_domain_model_association.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_association.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'association' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_association.subassociation',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ecassociation_domain_model_association',
				'foreign_field' => 'association',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinkPosition' => 'bottom',
				),
			)
		),
		'groups' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:ec_association/Resources/Private/Language/locallang_db.xml:tx_ecassociation_domain_model_group',
			'config' => array(
				'type' => 'inline',
				'foreign_class' => 'Tx_EcAssociation_Domain_Model_Group',
				'foreign_table' => 'tx_ecassociation_domain_model_group',
				'foreign_field' => 'association',
				'maxitems' => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinkPosition' => 'bottom',
				),
			)
		),
	),
);
?>