package p1;

import java.util.ArrayList;
import java.io.Serializable;
import java.util.Collection;
import java.util.HashMap;
import java.util.Set;

public class Forum implements Serializable{
	
	private Membre owner;
	private String type;
	private String name;
	private HashMap<String, Channel> channels = new HashMap<String, Channel>();
	private ArrayList<Membre> membersList = new ArrayList<Membre>();
	
	public Forum(String n, Membre m) {
		this.name = n;
		this.owner = m;
		this.type = "Community";
	}
	
	public Forum(String n, Membre m, String t) {
		this.name = n;
		this.owner = m;
		this.type = t;
	}
	
	public void addMember(Membre member) {
		this.membersList.add(member);
	}
	
	public boolean isSubscribed(Membre m) {
		return this.membersList.contains(m);
	}
	
	public void setForumType(String t) {
		this.type = t;
	}
	
	public Set<String> getChannelNames() {
		return this.channels.keySet();
	}

	public boolean addChannel(String nomDeCanal) {
		if(!this.exist(nomDeCanal) && this.canAddChannel()) {			
			Channel c = new Channel(nomDeCanal);
			this.channels.put(nomDeCanal, c);
			return true;
		}else return false;
	}

	public boolean addChannelOfBriefs(String nomDeCanal, int maxSize) {
		if(!this.exist(nomDeCanal) && this.canAddChannel()) {			
			Channel c = new Channel(nomDeCanal, maxSize);
			this.channels.put(nomDeCanal, c);
			return true;
		}else { 
			System.out.println("Le nom du channel est déjà prit ou le nombre de channels possible est depasse.");
			return false;
		}
	}
	
	public boolean exist(String name) {
		return this.channels.containsKey(name);
	}
	
	public boolean canAddChannel() {
		switch (this.type) {
			case "Community":
				return this.channels.size() < 2;
			case "Premium":
				return this.channels.size() < 5;
			case "Pro":
				return true;
			default:
				return false;
		}
	}

	public Collection<Channel> getChannels() {
		return this.channels.values();
	}
	
	public Channel getChannel(String nomDeCanal) {
		if(this.exist(nomDeCanal)) {
			return this.channels.get(nomDeCanal);
		}else return null;
	}
	
	public boolean isOwner(Membre m) {
		return this.owner == m;
	}
	
	public String getName() {
		return this.name;
	}
	
	public String getType() {
		return this.type;
	}
	
	@Override
	public String toString() {
		return this.getName();
	}

}
