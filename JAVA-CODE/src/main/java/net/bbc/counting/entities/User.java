/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package net.bbc.counting.entities;

import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;
import org.firebrandocm.dao.annotations.*;

@ColumnFamily(consistencyLevel = ConsistencyLevel.LOCAL_QUORUM)
@NamedQueries({
		@NamedQuery(name = User.QUERY_ALL_ENTITIES, query = "select * from User"),
        @NamedQuery(name = User.QUERY_ALL_ACTIVE_ENTITIES, query = "select * from User where isActive='1'"),
		@NamedQuery(name = User.QUERY_ALL_ENTITIES_WITH_KEY, query = "select * from User where KEY = :key"),
})

/**
 *
 * @author Carmelo Duchetta
 */
@XmlRootElement(name="user")
public class User implements java.io.Serializable {
    /**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	public static final String QUERY_ALL_ENTITIES = "User.QUERY_ALL_ENTITIES";
    public static final String QUERY_ALL_ACTIVE_ENTITIES = "User.QUERY_ALL_ACTIVE_ENTITIES";
    public static final String QUERY_ALL_ENTITIES_WITH_KEY = "User.QUERY_ALL_ENTITIES_WITH_KEY";
    
    public User(){
    	
    }
    
    
    public User(String key){
    	this.setKey(key);
    }
    
    public User(String key, String imageProfile,String firstname,
    		String lastname,String ddi,String mobile, String email) {
    	this.setKey(key);
    	this.setFirstname(firstname);
    	this.setLastname(lastname);
    	this.setDdi(ddi);
    	this.setMobile(mobile);
    	this.setEmail(email);
    }
    
    @Key
    private String key;
    
    //@Column(indexed = true)
    private String name;

    @Column(indexed = true)
    private String firstname;
    
    @Column(indexed = true)
    private String lastname;
    
    @Column(indexed = true)
    private String isActive;
    
    //@Column(indexed = true)
    private String username;
    
    //@Column(indexed = true)
    private String password;
    
    //@Column(indexed = true)
    private String title;
    
    //@Column(indexed = true)
    private String company;
    
    //@Column(indexed = true)
    private String ddi;
    
    private String mobile;
    
    private String mainTel;
    
    private String telephone2;
    
    //@Column(indexed = true)
    private String email;
    
    //@Column(indexed = true)
    private String notes;
    
    //@Column(indexed = true)
    private String isCandidate;
     
    /**
     * @return the key
     */
    public String getKey() {
        return key;
    }

    /**
     * @param key the key to set
     */
    @XmlElement
    public void setKey(String key) {
        this.key = key;
    }

    /**
     * @return the name
     */
    public String getName() {
        return name;
    }

    /**
     * @param name the name to set
     */
    @XmlElement
    public void setName(String name) {
        this.name = name;
    }
    
    /**
     * @return the firstname
     */
    public String getFirstname() {
        return firstname;
    }

    /**
     * @param firstname the firstname to set
     */
    @XmlElement
    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }
    
    /**
     * @return the lastname
     */
    public String getLastname() {
        return lastname;
    }

    /**
     * @param lastname the lastname to set
     */
    @XmlElement
    public void setLastname(String lastname) {
        this.lastname = lastname;
    }

    /**
     * @return the title
     */
    public String getTitle() {
        return title;
    }

    /**
     * @param title the title to set
     */
    @XmlElement
    public void setTitle(String title) {
        this.title = title;
    }

    /**
     * @return the company
     */
    public String getCompany() {
        return company;
    }

    /**
     * @param company the company to set
     */
    @XmlElement
    public void setCompany(String company) {
        this.company = company;
    }

    /**
     * @return the ddi
     */
    public String getDdi() {
        return ddi;
    }

    /**
     * @param ddi the ddi to set
     */
    @XmlElement
    public void setDdi(String ddi) {
        this.ddi = ddi;
    }

    /**
     * @return the email
     */
    public String getEmail() {
        return email;
    }

    /**
     * @param email the email to set
     */
    @XmlElement
    public void setEmail(String email) {
        this.email = email;
    }
    
    /**
     * @return the notes
     */
    public String getNotes() {
        return notes;
    }

    /**
     * @param notes the notes to set
     */
    @XmlElement
    public void setNotes(String notes) {
        this.notes = notes;
    }

    /**
     * @return the username
     */
    public String getUsername() {
        return username;
    }

    /**
     * @param username the username to set
     */
    @XmlElement
    public void setUsername(String username) {
        this.username = username;
    }

    /**
     * @return the password
     */
    public String getPassword() {
        return password;
    }
    
    /**
     * @param password the password to set
     */
    @XmlTransient
    public void setPassword(String password) {
        this.password = password;
    }

    /**
     * @return the mobile
     */
    public String getMobile() {
        return mobile;
    }

    /**
     * @param mobile the mobile to set
     */
    @XmlElement
    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    /**
     * @return the mainTel
     */
    public String getMainTel() {
        return mainTel;
    }

    /**
     * @param mainTel the mainTel to set
     */
    @XmlElement
    public void setMainTel(String mainTel) {
        this.mainTel = mainTel;
    }
        
    /**
     * @return the telephone2
     */
    public String getTelephone2() {
        return telephone2;
    }

    /**
     * @param telephone2 the telephone2 to set
     */
    @XmlElement
    public void setTelephone2(String telephone2) {
        this.telephone2 = telephone2;
    }
    
    /**
     * @return the isActive
     */
    public String getIsActive() {
        return isActive;
    }

    /**
     * @param isActive the isActive to set
     */
    public void setIsActive(String isActive) {
        this.isActive = isActive;
    }
        
	public String getIsCandidate() {
		return isCandidate;
	}

	@XmlElement
	public void setIsCandidate(String isCandidate) {
		this.isCandidate = isCandidate;
	}
}




