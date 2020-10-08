package p1;

import java.util.HashMap;

public class Message {

	private String content;
	private Membre author;
	private HashMap<String, Membre> lecteurs = new HashMap<String, Membre>();
	
	//CONSTRUCTOR
	public Message(String msg, Membre member) {
		this.content = msg;
		this.author = member;
		lecteurs.put(member.getName(), member);
	}
	
	//SETTERS
	public void addLecteur(Membre member) {
		this.lecteurs.put(member.getName(), member);
	}
	
	//GETTERS
	public String getContent() {
		return this.content;
	}
	public Membre getAuthor() {
		return this.author;
	}
	public boolean readBy(Membre member) {
		return lecteurs.containsKey(member.getName());
	}
	public int getLength() {
		return this.content.length();
	}
	
	@Override
	public String toString() {
		return "'" + this.getContent() + "' - " + this.getAuthor();
	}
}
