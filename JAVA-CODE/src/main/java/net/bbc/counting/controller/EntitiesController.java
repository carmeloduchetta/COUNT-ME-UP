/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package net.bbc.counting.controller;

import net.bbc.counting.database.DBAccess;
import net.bbc.counting.entities.User;
import net.bbc.counting.entities.Vote;

import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Connaught
 */
public class EntitiesController {
	
	private static final Logger logger = Logger.getLogger(EntitiesController.class.getName());
	
    public EntitiesController(){
        
    }
    
    public String getMessage()
    {
        return "EntitiesController initialised";
    }
    
    public User authenticate(String username, String password)
    {
        logger.log(Level.INFO,"*** EntitiesController.authenticate  ***");
        DBAccess dbAccess = new DBAccess();
        
        User user = dbAccess.authenticate(username, password);
        
        return user;
    }
    

    public String addVote(Vote vote)
    {
        logger.log(Level.INFO,"Controller.addVote");
        
        DBAccess dbAccess = new DBAccess();
        
        return dbAccess.addVote(vote);
    }
    
    public String updateUser(User user)
    {
        DBAccess dbAccess = new DBAccess();
    	
        return dbAccess.editUser(user);
    }
    
    
}
