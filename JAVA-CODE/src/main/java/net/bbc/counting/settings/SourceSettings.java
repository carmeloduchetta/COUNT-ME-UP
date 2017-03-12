package net.bbc.counting.settings;

import java.io.IOException;
import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;

import net.bbc.counting.controller.Definitions;

public final class SourceSettings {

	/**  
    ==================== LOADING SETTINGS ==================== 
	
	################################################################
	#
	# Carmelo Duchetta
	# 
	# Config Files - JAVA Integration code
	#   
	# Loading all parameters strings used in all scenarios from 
	# config files
	#
	################################################################

    */
	
	public final static String LOCAL_MODALITY = "LOC";
	public final static String STAGE_MODALITY = "STAGE";
	public final static String LIVE_MODALITY = "LIVE";
	public final static String BETA_MODALITY = "BETA";
	private final static String DEF_CONFIG_FILE = "config.properties";
	
	public static String CURRENT_MODALITY = "";
	public static String CURRENT_CONFIG_FILE = "";
	
	public static int ENVIRONMENT;
	
	public static String VOTE_CORE = "";
	        
	public static String SOURCE_CLUSTER = "";
	public static String SOURCE_KEYSPACE = "";
	public static final String[] sourceNodes = new String[6];
	
	public static int MAXRESULT_PER_PAGE = 0;
	public static int MAXCOMPLETED_DEALS = 0;
	public static int EXPIRYTIME_IN_DAYS = 0;
		
	private static Logger logger = null;
	private static Properties properties = null;
	
	public static void loadConfigProperties(){
		
		logger = Logger.getLogger(SourceSettings.class.getName());
		
		properties = new Properties();

        try{
            
        	properties.load(Thread.currentThread().getContextClassLoader().getResourceAsStream(DEF_CONFIG_FILE));
        
        }
        catch(IOException e) {
        	
            e.printStackTrace();
        
        }
        
        ENVIRONMENT = Integer.parseInt(properties.getProperty("environment"));
        CURRENT_MODALITY = properties.getProperty("modality");
        
        logger.log(Level.INFO, "---- ENVIRONMENT: "+ENVIRONMENT+"  ---- MODALITY: "+CURRENT_MODALITY);
   
        switch(ENVIRONMENT){
        	
        	case 1:
        		
        		CURRENT_CONFIG_FILE = "configlocalLL.properties";
        		break;
        	        		
        }
     
        if(!CURRENT_CONFIG_FILE.equals("")){
        	
        	logger.log(Level.INFO, "Config File: "+CURRENT_CONFIG_FILE);
            
        	properties = new Properties();
        	
        	try{
            
        		properties.load(Thread.currentThread().getContextClassLoader().getResourceAsStream(CURRENT_CONFIG_FILE));
        
        	}
        	catch(IOException e) {
        	
        		e.printStackTrace();
        
        	}
        
        	setCurrentConfig();
        }
        
	}
	
	public static void setCurrentConfig(){
		
		SOURCE_CLUSTER = properties.getProperty("cluster");	
		
		 switch(CURRENT_MODALITY){
		 	
		 	case LOCAL_MODALITY:
		 		
		 		sourceNodes[0] = properties.getProperty("localnode");
		 		
		 		break;
		 	
		 	default:
		 		
		 		sourceNodes[0] = properties.getProperty("node1");
				sourceNodes[1] = properties.getProperty("node2");
				sourceNodes[2] = properties.getProperty("node3");
				
				//if(CONFIG_FILE.equals("configcolliers.properties")){
					
					//sourceNodes[3] = properties.getProperty("node4");
					//sourceNodes[4] = properties.getProperty("node5");
					//sourceNodes[5] = properties.getProperty("node6");
				
				//}
		 		
		 		break;
		 
		 }
		 		                  
	     switch(CURRENT_MODALITY){
	        	
	     	case LIVE_MODALITY:
	     		
	     		Definitions.CURRENT_PROJECT = properties.getProperty("LIVE_PROJECT_NAME");
	     		VOTE_CORE = properties.getProperty("VOTE_LIVE_CORE");
	     		SOURCE_KEYSPACE = properties.getProperty("keyspace_live");
	     		                        	     			
	     		break;
	        		
	        case STAGE_MODALITY:
	        	
	        	Definitions.CURRENT_PROJECT = properties.getProperty("STAGE_PROJECT_NAME");
	        	VOTE_CORE = properties.getProperty("VOTE_DEV_CORE");
	        	SOURCE_KEYSPACE = properties.getProperty("keyspace_dev");
	        		     		
	        	break;
	        	
	        case LOCAL_MODALITY:
	        	
	        	Definitions.CURRENT_PROJECT = properties.getProperty("STAGE_PROJECT_NAME");
	        	VOTE_CORE = properties.getProperty("VOTE_DEV_CORE");
	        	SOURCE_KEYSPACE = properties.getProperty("keyspace_dev");
	        		     		
	        	break;
	        	
	        case BETA_MODALITY:
	        	
	        	Definitions.CURRENT_PROJECT = properties.getProperty("BETA_PROJECT_NAME");
	        	VOTE_CORE = properties.getProperty("VOTE_CORE");
	        	SOURCE_KEYSPACE = properties.getProperty("keyspace_beta");
	        		     		
	        	break;		
	        
	      }
	    		 
		  logger.log(Level.INFO, "---- SOURCE_KEYSPACE: "+SOURCE_KEYSPACE+"  ---- CURRENT_PROJECT: "+Definitions.CURRENT_PROJECT);
		  logger.log(Level.INFO, "---- VOTE_CORE: "+VOTE_CORE);
	}
	
}
