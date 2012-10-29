<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2012-09-07 16:58:03
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 5,
  ),
  'paquet' => 
  array (
    'nom' => 'Signaler des abus',
    'slogan' => 'Aviser des abus',
    'description' => 'Aviser des abus',
    'prefixe' => 'abus',
    'version' => '1.0.0',
    'auteur' => 'My Chacra',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'communication',
    'etat' => 'dev',
    'compatibilite' => '[3.0.4;3.0.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => 'on',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'autorisations',
      1 => 'fonctions',
      2 => 'options',
      3 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => 'on',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'Objets abusif',
      'nom_singulier' => 'Objet abusives',
      'genre' => 'masculin',
      'logo_variantes' => 'on',
      'table' => 'spip_abusobjets',
      'cle_primaire' => 'id_abusobjet',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'abusobjet',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Id Objet',
          'champ' => 'id_objet',
          'sql' => 'bigint(21) NOT NULL DEFAULT 0',
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Objet',
          'champ' => 'objet',
          'sql' => 'varchar(25) NOT NULL DEFAULT \'\'',
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'ID Auteur',
          'champ' => 'id_auteur',
          'sql' => 'bigint(21) NOT NULL DEFAULT 0',
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'IP',
          'champ' => 'ip',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'Statut',
          'champ' => 'statut',
          'sql' => 'varchar(25) NOT NULL DEFAULT \'\'',
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        5 => 
        array (
          'nom' => 'Mise à jour',
          'champ' => 'maj',
          'sql' => 'datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => '',
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Objets abusif',
        'titre_objet' => 'Objet abusif',
        'info_aucun_objet' => 'Aucun objet abusif',
        'info_1_objet' => 'Un objet abusif',
        'info_nb_objets' => '@nb@ objets abusives',
        'icone_creer_objet' => 'Créer un objet abusif',
        'icone_modifier_objet' => 'Modifier cet objet abusif',
        'titre_logo_objet' => 'Logo de ce objet abusif',
        'titre_langue_objet' => 'Langue de ce objet abusif',
        'titre_objets_rubrique' => 'Objets abusives de la rubrique',
        'info_objets_auteur' => 'Les objets abusives de cet auteur',
        'retirer_lien_objet' => 'Retirer ce objet abusif',
        'retirer_tous_liens_objets' => 'Retirer tous les objets abusives',
        'ajouter_lien_objet' => 'Ajouter ce objet abusif',
        'texte_ajouter_objet' => 'Ajouter un objet abusif',
        'texte_creer_associer_objet' => 'Créer et associer un objet abusif',
        'texte_changer_statut_objet' => 'Ce objet abusif est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => 'on',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => 'administrateur',
        'objet_supprimer' => 'administrateur',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => '',
          'contenu' => '',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
        'logo' => 
        array (
          0 => 
          array (
            'extension' => 'png',
            'contenu' => 'iVBORw0KGgoAAAANSUhEUgAAAGYAAAB6CAYAAABNyyaCAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA09pVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoMTMuMCAyMDEyMDMwNS5tLjQxNSAyMDEyLzAzLzA1OjIxOjAwOjAwKSAgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MkY2MkYxNjA2RjY1MTFFMTg3QURFRkRBNkFEQ0QyNTQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MkY2MkYxNjE2RjY1MTFFMTg3QURFRkRBNkFEQ0QyNTQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFRjRDNjZGRjZGNjQxMUUxODdBREVGREE2QURDRDI1NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFRjRDNjcwMDZGNjQxMUUxODdBREVGREE2QURDRDI1NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1w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',
          ),
        ),
      ),
    ),
  ),
);

?>