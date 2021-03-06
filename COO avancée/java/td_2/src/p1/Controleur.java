package p1;



import static java.lang.System.exit;
import static java.lang.Thread.sleep;

import java.io.IOException;
import java.util.HashMap;
import java.util.Set;

import p1.Membre;
import p1.Channel;
import p1.Forum;
import p1.Gestionnaire;
import p1.Message;
import p1.Memory;

public class Controleur {

	private Gestionnaire registre = new Gestionnaire();
	private UserConsole ui = new UserConsole();

	private Membre currentMember;

	public Controleur() throws ClassNotFoundException, IOException{
		String nom = ui.getNomMembre();
		currentMember = new Membre(nom);
		Object o  = Memory.read("sauvegarde.txt");
		if (o instanceof Gestionnaire) {
			registre = (Gestionnaire) o;
		}
	}


	public void start() throws Exception {
		String commande = ui.lireCommande();
		switch (commande.charAt(0)) {
		case UserConsole.COM_CREER_FORUM:
			creerForum();
			start();
			break;
		case UserConsole.COM_CREER_CANAL :
			creerCanal();
			start();
			break;
		case UserConsole.COM_CREER_CANAL_DE_BREVES :
			creerCanalDeBreves();
			start();
			break;
		case UserConsole.COM_POSTER_MESSAGES:
			posterMessage();
			start();
			break;
		case UserConsole.COM_LIRE_MESSAGES:
			lireMessage();
			start();
			break;
		case UserConsole.COM_LISTE_FORUM_ADMIN:
			afficherListeForumAdmin();
			start();
			break;
		case UserConsole.COM_CHANGER_MEMBRE:
			currentMember = new Membre(ui.getNomMembre());
			start();
			break;
		case UserConsole.COM_EFFACER_MESSAGES:
			clearMessages();
			start();
			break;
		case UserConsole.COM_INSCRIRE:
			inscrireMembreSurForum();
			start();
			break;
		case UserConsole.COM_STOP:
			ui.afficher("Au revoir ");
			Memory.save(registre, "sauvegarde.txt");
			exit(0);
			break;

		default :
			ui.afficher("La commande sp�cifi�e n'existe pas\n");
			sleep(1000);
			start();
		}}

	private void inscrireMembreSurForum() {
		currentMember = new Membre(ui.getNomMembre());
		Forum currentForum = registre.getForum(ui.getNomDuForum(registre.getNomForums()));
		currentForum.addMember(currentMember);
	}

	//M�thode utilitaire
	private Forum getForum() {
		String nomDuForum = ui.getNomDuForum(registre.getNomForums());
		if(!registre.exist(nomDuForum)){
			ui.afficher("Ce Forum n'existe pas");
			return null;
		}
		return registre.getForum(nomDuForum);
	}
	
	private void afficherListeForumAdmin() {
		HashMap<String, Forum> forums = registre.getAllForums();
		ui.afficher("Voici la liste des forums dont vous etes l'admin :");
		for(Forum f : forums.values()) {
			if(f.isOwner(currentMember)) {
				ui.afficher("- " + f.getName());
			}
		}
	}

	private void creerForum() {
		//R�cup�rer la liste des noms des forums
		String str = ui.getForumType();
		if(str == null) {
			ui.afficher("Annulation de la cr�ation du forum.");
			return;
		}
		Set<String> ensembleDesNomsDeForumsExistants = registre.getNomForums();
		String nomDuForum = 
				ui.getNomDuForum(ensembleDesNomsDeForumsExistants);
		Forum forumNouveau = registre.creerForum(nomDuForum, currentMember);
		if (forumNouveau != null) {
			forumNouveau.setForumType(str);
			ui.afficher("Forum creer : " + nomDuForum + ", de type '" + str + "'");
			forumNouveau.addMember(currentMember); //Si le membre cr�er le forum, il est automatiquement membre de celui ci
		}
		else
			ui.afficher("Pbme de creation Forum " + nomDuForum);
	}
	
	private void clearMessages() {
	    Forum forum = getForum();
	    if(forum == null) {
	        return;
	    }
	    String nomDeCanal = ui.getNomCanal(forum.getChannelNames());
	    Channel canal = forum.getChannel(nomDeCanal);
	    if(canal == null)
	        ui.afficher("Ce Canal "+ nomDeCanal + " n'existe pas");
	    else {
	        canal.clearMessages();
	        ui.afficher("Les messages du canal " + nomDeCanal + " ont �t� effac�s");
	    }
	}

	private void creerCanal(){
		Forum forum = getForum();
		if(!forum.isSubscribed(currentMember)) { //Ajout de la possibilit� de savoir si un membre est abonn� au forum. Si ce n'est pas le cas, il n'a pas le droit d'y acc�der.
			ui.afficher("Vous n'etes pas inscrit a ce forum.");
			return; 
		}
		if (forum != null) {
			//R�cup�rer les noms des canaux pr�-existants
			Set <String> nomDesCanaux = forum.getChannelNames();
			String nomDeCanal = ui.getNomCanal(nomDesCanaux);
			if (forum.addChannel(nomDeCanal))
				ui.afficher("Canal cr��  : "+ nomDeCanal);
			else
				ui.afficher("Canal non cr��  : "+ nomDeCanal);
		} 
	}

	private void creerCanalDeBreves() {
		Forum forum = getForum();
		if(!forum.isSubscribed(currentMember)) { //Ajout de la possibilit� de savoir si un membre est abonn� au forum. Si ce n'est pas le cas, il n'a pas le droit d'y acc�der.
			ui.afficher("Vous n'etes pas inscrit a ce forum.");
			return; 
		}
		if (forum != null) {
			//R�cup�rer les noms des canaux pr�-existants
			Set <String> nomDesCanaux = forum.getChannelNames();
			String nomDeCanal = ui.getNomCanal(nomDesCanaux);
			int maxSize = ui.getSize();
			if (forum.addChannelOfBriefs(nomDeCanal,maxSize ))
				ui.afficher("Canal de br�ve cr��  : "+ nomDeCanal);
			else
				ui.afficher("Canal de br�ve non cr��  : "+ nomDeCanal);
		} 
	}

	private void posterMessage() {
		Forum forum = getForum();
		if (forum == null) {
			return;
		}
		if(!forum.isSubscribed(currentMember)) { //Ajout de la possibilit� de savoir si un membre est abonn� au forum. Si ce n'est pas le cas, il n'a pas le droit d'y acc�der.
			ui.afficher("Vous n'etes pas inscrit a ce forum.");
			return; 
		}
		String nomDeCanal = ui.getNomCanal(forum.getChannelNames());
		String msg =  ui.getValeur("saisir le message : ");

		Message message = new Message(msg,currentMember );
		
		if(nomDeCanal.equals("*")){
			for(Channel c : forum.getChannels()){
				c.addMessage(message);
			}
			return;
		}
		Channel canal = forum.getChannel(nomDeCanal);
		if (canal == null)
			ui.afficher("Ce Canal n'existe pas");
		else {
			if (canal.addMessage(message))
				ui.afficher("Message envoy�");
			else
				ui.afficher("Probleme a l'envoi");
			ui.afficher("Messages dans " + nomDeCanal);
			ui.afficherMessages(canal.getMessages());
		}

	}

	private void lireMessage() {
		Forum forum = getForum();
		if (forum == null) {
			return;
		}
		if(!forum.isSubscribed(currentMember)) { //Ajout de la possibilit� de savoir si un membre est abonn� au forum. Si ce n'est pas le cas, il n'a pas le droit d'y acc�der.
			ui.afficher("Vous n'etes pas inscrit a ce forum.");
			return; 
		}
		String nomDeCanal = ui.getNomCanal(forum.getChannelNames());
		Channel canal = forum.getChannel(nomDeCanal);
		if (canal == null)
			ui.afficher("Ce Canal "+ nomDeCanal + " n'existe pas");
		else {
			ui.afficherMessages(canal.getNewMessages(currentMember));
		}
	}

}
