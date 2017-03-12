package net.bbc.counting.entities;

import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;

import org.firebrandocm.dao.annotations.Column;
import org.firebrandocm.dao.annotations.ColumnFamily;
import org.firebrandocm.dao.annotations.ConsistencyLevel;
import org.firebrandocm.dao.annotations.Key;
import org.firebrandocm.dao.annotations.NamedQueries;
import org.firebrandocm.dao.annotations.NamedQuery;

@ColumnFamily(consistencyLevel = ConsistencyLevel.LOCAL_QUORUM)
@NamedQueries({
		@NamedQuery(name = Vote.QUERY_ALL_ENTITIES, query = "select * from Vote"),
		@NamedQuery(name = Vote.QUERY_ALL_ENTITIES_WITH_KEY, query = "select * from Vote where KEY = :key")
})

@XmlRootElement(name="vote")
public class Vote implements java.io.Serializable {

	private static final long serialVersionUID = 1L;
	
	public static final String QUERY_ALL_ENTITIES = "Vote.QUERY_ALL_ENTITIES";
    public static final String QUERY_ALL_ENTITIES_WITH_KEY = "Vote.QUERY_ALL_ENTITIES_WITH_KEY";
    
    public Vote(){
    	
    }
    
    public Vote(String key){
    	this.setKey(key);
    }
	
    @Key
    private String key;
	
    private String candidateName;
    private String candidateKey;
    private String userName;
    private String userKey;
    
    @Column(indexed = true)
    private String dateCreated;
    
    public String getKey() {
		return key;
	}
    
    @XmlElement
	public void setKey(String key) {
		this.key = key;
	}

	public String getDateCreated() {
		return dateCreated;
	}

	@XmlElement
	public void setDateCreated(String dateCreated) {
		this.dateCreated = dateCreated;
	}

	public String getCandidateName() {
		return candidateName;
	}
	
	@XmlElement
	public void setCandidateName(String candidateName) {
		this.candidateName = candidateName;
	}

	public String getCandidateKey() {
		return candidateKey;
	}
	
	@XmlElement
	public void setCandidateKey(String candidateKey) {
		this.candidateKey = candidateKey;
	}
	
	public String getUserName() {
		return userName;
	}
	
	@XmlElement
	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getUserKey() {
		return userKey;
	}
	
	@XmlElement
	public void setUserKey(String userKey) {
		this.userKey = userKey;
	}

}
