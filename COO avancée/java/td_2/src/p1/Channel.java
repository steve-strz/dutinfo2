package p1;

import java.util.ArrayList;
import java.util.List;

public class Channel {
	
	private String name;
	private final int MAX_MESSAGES = 9999;
	private int maxSize;
	private List<Message> messages = new ArrayList<Message>();

	public Channel(String name) {
		this.name = name;
		this.maxSize = 999;
	}
	
	public Channel(String name, int maxSize) {
		this.name = name;
		this.maxSize = maxSize;
	}
	
	public boolean addMessage(Message message) {
		if(message.getLength() <= maxSize) {			
			this.messages.add(message);
			return true;
		}else {
			return false;
		}
	}

	public List<Message> getMessages() {
		return this.messages;
	}

	public List<Message> getNewMessages(Membre currentMember) {
		List<Message> newMessages = new ArrayList<Message>();
		for(Message m : this.messages) {
			if(!m.readBy(currentMember)) { 
				newMessages.add(m);
				m.addLecteur(currentMember);
			}
		}
		return newMessages;
	}

}
