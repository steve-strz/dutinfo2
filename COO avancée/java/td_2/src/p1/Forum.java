package p1;

import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;
import java.util.Set;

public class Forum {
	
	private HashMap<String, Channel> channels = new HashMap<String, Channel>();
	private ArrayList<Membre> membersList = new ArrayList<Membre>();
	
	public void addMember(Membre member) {
		this.membersList.add(member);
	}
	
	public boolean isSubscribed(Membre m) {
		return this.membersList.contains(m);
	}
	
	public Set<String> getChannelNames() {
		return this.channels.keySet();
	}

	public boolean addChannel(String nomDeCanal) {
		if(!this.exist(nomDeCanal)) {			
			Channel c = new Channel(nomDeCanal);
			this.channels.put(nomDeCanal, c);
			return true;
		}else return false;
	}

	public boolean addChannelOfBriefs(String nomDeCanal, int maxSize) {
		if(!this.exist(nomDeCanal)) {			
			Channel c = new Channel(nomDeCanal, maxSize);
			this.channels.put(nomDeCanal, c);
			return true;
		}else return false;
	}
	
	public boolean exist(String name) {
		return this.channels.containsKey(name);
	}

	public Collection<Channel> getChannels() {
		return this.channels.values();
	}
	
	public Channel getChannel(String nomDeCanal) {
		if(this.exist(nomDeCanal)) {
			return this.channels.get(nomDeCanal);
		}else return null;
	}

}
