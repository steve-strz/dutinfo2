package p1;

import java.io.Serializable;

public class Membre implements Serializable{


	private String name;

	public Membre(String pname) {
		name = pname;
	}

	public String getName() {
		return name;
	}

	@Override
	public String toString() {
		return this.name;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((name == null) ? 0 : name.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Membre other = (Membre) obj;
		if (name == null) {
			if (other.name != null)
				return false;
		} 
		else 
			if (!name.equals(other.name))
				return false;
		return true;
	}

}