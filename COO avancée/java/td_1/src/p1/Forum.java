package p1;

import java.util.*;

public class Forum {
	private String name;
	private List<Membre> members = new ArrayList<>();
	private List<Message> messages = new ArrayList<>();
	
	public Forum(String name) {
		this.name = name;
	}
	
	public void addMembers(Membre m) {
		members.add(m);
	}
	
	public List<Membre> getAllMembers(){
		return this.members;
	}
	
	public void addMessage(Message m) {
		messages.add(m);
	}
	
	public List<Message> getAllMessages(){
		return this.messages;
	}
}
