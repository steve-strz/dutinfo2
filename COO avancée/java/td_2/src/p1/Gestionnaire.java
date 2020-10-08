package p1;

import java.util.HashMap;
import java.util.Set;
import java.io.Serializable;

public class Gestionnaire implements Serializable{

	private HashMap<String, Forum> forums = new HashMap<String, Forum>();
	
	public Set<String> getNomForums() {
		return this.forums.keySet();
	}

	public Forum getForum(String nomDuForum) {
		return this.forums.get(nomDuForum);
	}

	public HashMap<String, Forum> getAllForums(){
		return this.forums;
	}
	
	public boolean exist(String nomDuForum) {
		return this.forums.containsKey(nomDuForum);
	}

	public Forum creerForum(String nomDuForum, Membre m) {
		if(!this.exist(nomDuForum)) {			
			Forum f = new Forum(nomDuForum, m);
			this.forums.put(nomDuForum, f);
			return f;
		}else {
			return null;
		}
	}

}
