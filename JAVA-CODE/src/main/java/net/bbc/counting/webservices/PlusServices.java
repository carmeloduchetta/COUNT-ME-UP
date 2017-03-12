package net.bbc.counting.webservices;

import javax.ws.rs.*;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.UriInfo;

import net.bbc.counting.controller.EntitiesController;
import net.bbc.counting.entities.User;
import net.bbc.counting.entities.Vote;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;


/**
 * REST Web Service
 *
 * @author Carmelo Duchetta
 */
@Path("plus")
public class PlusServices {

    @Context
    private UriInfo context;

    private static final Logger logger = Logger.getLogger(PlusServices.class.getName());
    public static final String STATUS_NOT_STARTED = "0";
    public static final String ENTITY_IS_ACTIVE = "1";
        
    /**
     * Creates a new instance of PlusServices
     */
    public PlusServices() {
    }

    /**
     * Retrieves representation of an instance of net.bbc.counting.webservices.PlusServices
     * @return an instance of java.lang.String
     */
    @GET
    @Produces("application/xml")
    public String getXml() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of PlusServices
     * @param content representation for the resource
     * @return an HTTP response with content of the updated or created resource.
     */
    @PUT
    @Consumes("application/xml")
    public void putXml(String content) {
    }
        
    @POST
    @Path("authenticate")
    @Produces("application/xml")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public String authenticate(@FormParam("username") String username, @FormParam("password") String password) {
       
        logger.log(Level.INFO,"************* BBCServices.authenticate (" + username + ", " + password +" ) ******************");
        
        EntitiesController controller = new EntitiesController();
        User user = controller.authenticate(username, password);
        
        // use the key as the token
        String userXml = "<user><token>" + user.getKey() + "</token><userid>" + user.getKey() + "</userid><userDisplayName>" + user.getName() + "</userDisplayName><isAdmin>1</isAdmin></user>";
        //System.out.println(userXml);
        return userXml;
    }
    
    @POST
    @Path("addvote")
    @Produces("text/plain")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public String addVote(
    		 	@FormParam("key") String key,
	   		 	@FormParam("userid") String userId,
	   		 	@FormParam("userdisplayname") String authorDisplayName,
	   		 	@FormParam("candidatekey") String candidatekey,
	   		 	@FormParam("candidatename") String candidatename){   
    	
    	logger.log(Level.INFO,"**** BBCServices.addVote (POST) entered*****");
        
        logger.log(Level.INFO, "key- {0}", key);
        logger.log(Level.INFO, "userId- {0}", userId);
        logger.log(Level.INFO, "authorDisplayName- {0}", authorDisplayName);
        logger.log(Level.INFO, "candidatekey- {0}", candidatekey);
        logger.log(Level.INFO, "candidatename- {0}", candidatename);

    	String status = "";
    	
        try { 
        	
        	Vote vote = new Vote();
        	Date date = new Date();
            
        	String timestamp = new SimpleDateFormat("E MMM dd yyyy HH:mm:ss z").format(date.getTime()).toString();
        	
        	vote.setDateCreated(timestamp);
        	vote.setCandidateKey(candidatekey);
        	vote.setCandidateName(candidatename);
        	vote.setUserName(authorDisplayName);
        	vote.setUserKey(userId);
        	
            EntitiesController controller = new EntitiesController();
            status = controller.addVote(vote);
            
         } catch (Exception e) {
         	
         	e.printStackTrace();
         
         }
    	
    	return status;
    
    }
    
    @POST
    @Path("edituser")
    @Produces("application/xml")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public String editUser(
    		@FormParam("userId") String userId,
            @FormParam("username") String username,
            @FormParam("password") String password,
            @FormParam("firstName") String firstName,
            @FormParam("lastName") String lastName,
            @FormParam("title") String title,
            @FormParam("email") String email,
            @FormParam("company") String company,
            @FormParam("telephone1") String telephone1,
            @FormParam("telephone2") String telephone2
                           ) {
     
    	logger.log(Level.INFO,"Key: "+userId+" username: "+username+" password: "+password+" email: "+email);
    	logger.log(Level.INFO,"firstname: "+firstName+" lastname: "+lastName+" company: "+company);
    	logger.log(Level.INFO,"telephone1: "+telephone1+" telephone2: "+telephone2);
    	
        // Populate a User object with the data to be updated
        User user = null;
        
        EntitiesController controller = new EntitiesController();
             
        if(!userId.trim().equals("-1")){
        	//user = controller.getUser(userId);
        }else {
        	user = new User();
        }
        
        if(user != null){
        	
	        /** THESE FIELDS ARE MANDATORY **/
	        user.setEmail(email);
	        user.setUsername(username);
	        user.setName(firstName+" "+lastName);
	        user.setFirstname(firstName);
	        user.setLastname(lastName);
	        user.setEmail(email);
	        
	        if(!password.trim().equals(""))
	        	user.setPassword(password);
	        
	        if(!telephone1.trim().equals(""))
	        	user.setMainTel(telephone1);
	        
	        if(!telephone2.trim().equals(""))
	        	user.setTelephone2(telephone2);
        }
        
        String status = controller.updateUser(user);
        
        return status;
    }
    
}

