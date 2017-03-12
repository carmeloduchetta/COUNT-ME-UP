package net.bbc.counting.database;

import net.bbc.counting.entities.*;
import net.bbc.counting.settings.SolrQueryServices;
import net.bbc.counting.settings.SourceSettings;

import java.util.*;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.firebrandocm.dao.PersistenceFactory;
import org.firebrandocm.dao.impl.hector.HectorPersistenceFactory;
import org.apache.cassandra.thrift.ConsistencyLevel;
import org.firebrandocm.dao.Query;

/**
 *
 * @author Connaught
 */
public class DBAccess {
    
    private static final Logger logger = Logger.getLogger(DBAccess.class.getName());
    private static PersistenceFactory persistenceFactory = null;
    private static ArrayList<Class<?>> entities = null;
    
    private static final String defaultUserkey = "d1febc20-05c8-11e7-a56c-00236c8d0fdf";
    private static final String defaultUserName = "Default User";
    
    public DBAccess(){
       

        // initialise the Persistence Factory
        if(persistenceFactory == null)
        {
            persistenceFactory = getPersistenceFactory();
            //globalPersistenceFactory = getGlobalPersistenceFactory();
        }
          
    }
    
    public PersistenceFactory getPersistenceFactory()
    {
        try {
        	
        	//System.setProperty("cassandra.config", "file:/etc/cassandra/default.conf/cassandra.yaml");
        	
            if(persistenceFactory == null)
            {
                System.out.println("DBAccess - Getting new persistence factory");
  
                entities = new ArrayList<Class<?>>();
                entities.add(User.class);
                entities.add(Vote.class);
                
                persistenceFactory = new HectorPersistenceFactory.Builder()
                    .defaultConsistencyLevel(ConsistencyLevel.LOCAL_QUORUM)
                    .clusterName(SourceSettings.SOURCE_CLUSTER)
                    .defaultKeySpace(SourceSettings.SOURCE_KEYSPACE)
                    .contactNodes(SourceSettings.sourceNodes)
                    .thriftPort(9160)
                    .autoDiscoverHosts(true)
                    .entities(entities)
                    .build();
            }
            else{
                //System.out.println("Persistence factory already constructed");
            }
                
        } catch (Exception ex) {
            System.out.println("Message: " + ex.getMessage());
            ex.printStackTrace();
        }
        
        return persistenceFactory;
    }
    
    public PersistenceFactory getLocalPersistenceFactory(){
    	return persistenceFactory;
    }
    
    public User authenticate(String username, String password)
    {    
        User authenticatedUser = new User();
       // String token = "-1";
        
        try {
            System.out.println("DBAccess.authenticate");
            
            List<User> users = new ArrayList<User>();
            
            if(persistenceFactory == null) System.out.println("******** Warning - persistenceFactory is null ********");
            
            // get the list of users from the database
            users = persistenceFactory.getResultList(User.class, Query.get(User.QUERY_ALL_ENTITIES));

            // loop through the users
            for(int i=0; i<users.size(); i++){
                
                User user = users.get(i);
                
                // get the username and password for each stored user
                String storedUsername = user.getUsername();
                String storedPassword = user.getPassword();
                                
                if((storedUsername != null) && (storedPassword != null)) {
                
                    // if the username and password match those passed through then the user is validated
                    if((storedUsername.equals(username)) && (storedPassword.equals(password))) {
                        
                        // get this user
                        authenticatedUser = user;
                        
                        break;
                    }
                }
            }
               
            
        } catch (Exception ex) {
            System.out.println("Error encountered while retrieving data!!!");
            System.out.println("Message: " + ex.getMessage());
            ex.printStackTrace();
        }
        
        return authenticatedUser;
    }
    
    public String addVote(Vote voteToAdd)
    {    
        try {
        	
        	//logger.log(Level.INFO, Definitions.CURRENT_PROJECT +"DBAccess.addAction");
        
            logger.log(Level.INFO, "authorId- {0}", voteToAdd.getUserKey());
            logger.log(Level.INFO, "authorDisplayName- {0}", voteToAdd.getUserName());
            logger.log(Level.INFO, "candidatekey- {0}", voteToAdd.getCandidateKey());
            logger.log(Level.INFO, "candidatename- {0}", voteToAdd.getCandidateName());
            
            //checking if the user has voted 3 times 
            int countUserVotes = SolrQueryServices.countUserVotes(voteToAdd.getUserKey());
            
            if(countUserVotes > 2){
            	//if yes need to put the vote to the default user
            	voteToAdd.setUserKey(defaultUserkey);
            	voteToAdd.setUserName(defaultUserName);
            	
            }
            
            Vote vote = persistenceFactory.getInstance(net.bbc.counting.entities.Vote.class);
	    	vote = voteToAdd;
            persistenceFactory.persist(vote);
               
            SolrQueryServices.postVote(voteToAdd);           
            
        } catch (Exception ex) {
            System.out.println("Error encountered while adding Action");
            System.out.println("Message: " + ex.getMessage());
            ex.printStackTrace();
        }
        
        return "Vote added";
    }
    
    public String editUser(User userToAdd){
    	   	
    	try {    
        	
        	User user = persistenceFactory.getInstance(net.bbc.counting.entities.User.class);
	    	user = userToAdd;
        	persistenceFactory.persist(user); 
        	
        } catch (Exception ex) {
            System.out.println("Message: " + ex.getMessage());
        }
    	
    	return "User added";
    	
    }
    
}

