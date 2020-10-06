package p1;

import java.util.HashMap;
import java.util.Set;

public class Gestionnaire {

	private HashMap<String, Forum> forums = new HashMap<String, Forum>();
	
	public Set<String> getNomForums() {
		if(!forums.isEmpty()) {
			return forums.keySet();
		}
		else{
			return null;
		}
	}

	public Forum getForum(String nomDuForum) {
		return forums.get(nomDuForum);
	}

	public boolean exist(String nomDuForum) {
		return forums.containsKey(nomDuForum);
	}

	public Forum creerForum(String nomDuForum) {
		// TODO Auto-generated method stub
		return null;
	}

}
