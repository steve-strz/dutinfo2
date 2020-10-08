package p1;

import java.util.HashMap;
import java.util.Set;

public class Gestionnaire {

	private HashMap<String, Forum> forums = new HashMap<String, Forum>();
	
	public Set<String> getNomForums() {
		return this.forums.keySet();
	}

	public Forum getForum(String nomDuForum) {
		return this.forums.get(nomDuForum);
	}

	public boolean exist(String nomDuForum) {
		return this.forums.containsKey(nomDuForum);
	}

	public Forum creerForum(String nomDuForum) {
		if(!this.exist(nomDuForum)) {			
			Forum f = new Forum();
			this.forums.put(nomDuForum, f);
			return f;
		}else {
			return null;
		}
	}

}
