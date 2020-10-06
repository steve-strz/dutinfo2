package p1;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Set;


public class MembreManager {

	protected HashMap<String, Membre> members = new HashMap<>();

	public MembreManager() {
		super();
	}

	public Membre addMember(Membre m) {
		 return members.computeIfAbsent(m.getName(), k-> m);
		//An "equivalent" but less efficient code
			/*
			 * Member x = members.get(m.getName()); 
			 * if (x==null) { 
			 *          members.put(m.getName(), m); 
			 *          return m; } 
			 * //else a member with this name is already registered else
			 * return x;
			 */
	}

	/**
	 * create a member and add it to the list of members
	 * @param name of the member to add
	 * @return the new ({@code Member} if there is no existing member with that name, otherwise the member already known by that name
	 */
	public Membre addMember(String name) {
		return members.computeIfAbsent(name, Membre::new);
	}
	
	/**
	 * @return the list of registered members
	 */
	public List<Membre> getMembers() {
		List<Membre> allMembers = new ArrayList<>();
		allMembers.addAll(members.values());
		return allMembers;
	}
	
	/**
	 * @param name of the member
	 * @return Member 
	 * the value to which the name is mapped, or null if there is no member with this name.
	 */
	public Membre getMember(String name) {
		return members.get(name);
	}
	
	
	/**
	 * @return a Set of members' names.
	 */
	public Set<String> getMemberNames(){
		return members.keySet();
	}

}