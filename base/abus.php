<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 */
function abus_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['abusobjets'] = 'abusobjets';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 */
function abus_declarer_tables_objets_sql($tables) {

	$tables['spip_abusobjets'] = array(
		'type' => 'abusobjet',
		'principale' => "oui",
		'field'=> array(
			"id_abusobjet"       => "bigint(21) NOT NULL",
			"id_objet"           => "bigint(21) NOT NULL DEFAULT 0",
			"objet"              => "varchar(25) NOT NULL DEFAULT ''",
			"id_auteur"          => "bigint(21) NOT NULL DEFAULT 0",
			"ip"                 => "varchar(255) NOT NULL DEFAULT ''",
			"maj"                => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"commentaire"        => "text NOT NULL DEFAULT ''", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_abusobjet",
			"KEY statut"         => "statut", 
		),
		'texte_objet' => 'abus:titre_abusobjet',
		'texte_objets' => 'abus:titre_abusobjets',
		'champs_editables'  => array('maj'),
		'champs_versionnes' => array('maj'),
		'rechercher_champs' => array(),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'signale'    => 'abus:texte_statut_abus_signale',
			'accepte'     => 'abus:texte_statut_abus_accepte',
			'refuse'   => 'abus:texte_statut_abus_refuse',
			'spam'   => 'abus:texte_statut_abus_spam',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'accepte',
				'previsu'   => 'accepte,signale',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'statut_images' => 	 array(
			'statut_abus.png',
			'signale'=>'statut_signale.png',
			'accepte'=>'statut_accepte.png',
			'refuse'=>'statut_refuse.png',
			'spam'=>'statut_spam.png'),
		'texte_changer_statut' => 'abus:texte_changer_statut_abusobjet', 
		

	);

	return $tables;
}



?>
