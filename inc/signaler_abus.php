<?php

function inc_signaler_abus_dist($id_objet,$objet,$statut='signale',$commentaire=''){
	include_spip('inc/session');

	$id_auteur=session_get('id_auteur');	
	$ip=$GLOBALS['ip'];	

	$maj=date('Y-m-d G:i:s');
	
	//Teste si visiteur a d&eacute;j&agrave;a signal&eacute; cet abus
	if($id_auteur)$where='AND id_auteur='.$id_auteur;
	elseif($ip) $where=' AND ip='.sql_quote($ip);
	$teste=sql_getfetsel('id_abusobjet','spip_abusobjets','id_objet='.$id_objet.' AND objet='.sql_quote($objet).$where);	
	
	if(!$teste){
		$id_abusobjet=sql_insertq('spip_abusobjets',array('statut'=>$statut,'id_objet'=>$id_objet,'objet'=>$objet,'id_auteur'=>$id_auteur,'ip'=>$ip,'commentaire'=>$commentaire));
		
		$contexte=sql_fetsel('*','spip_'.$objet.'s','id_'.$objet.'='.$id_objet);
		
		$contexte['url_objet']=generer_url_ecrire($objet,'id_'.$objet.'='.$id_objet,false);
		$contexte['commentaire']=$commentaire;
		$contexte['auteur']=(session_get('nom')?session_get('nom'):$ip);
		
		
		// Envoi d'un mail
		// Chargement de la fonction
		$envoyer_mail = charger_fonction('envoyer_mail', 'inc/');

		// Envoi via facteur
		$destinataire=explode(',',lire_config('abus/emails_abus'));
		$nom_envoyeur=$GLOBALS['meta']["nom_site"];
		$from=$GLOBALS['meta']["email_envoi"];
		$sujet=_T('abus:sujet_mail');
		$html=recuperer_fond('inclure/mail_avis_abus_destinataires',$contexte);
		$corps=array('from'=>$from,'nom_envoyeur'=>$nom_envoyeur,'html'=>$html);
		
		$ok=$envoyer_mail($destinataire, $sujet, $corps);
		

		}
		
		
	return $valeurs;
	}
?>
