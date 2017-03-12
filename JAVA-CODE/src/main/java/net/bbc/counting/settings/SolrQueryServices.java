package net.bbc.counting.settings;

import java.io.IOException;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.apache.solr.client.solrj.SolrQuery;
import org.apache.solr.client.solrj.SolrServerException;
import org.apache.solr.client.solrj.impl.HttpSolrServer;
import org.apache.solr.client.solrj.request.QueryRequest;
import org.apache.solr.client.solrj.response.QueryResponse;
import org.apache.solr.common.SolrDocumentList;
import org.apache.solr.common.SolrInputDocument;
import net.bbc.counting.entities.Vote;

public final class SolrQueryServices {
	
	private static final Logger logger = Logger.getLogger(SolrQueryServices.class.getName());
	
	public static final String VOTE_CORE = SourceSettings.VOTE_CORE;
	public static final String REGULAR_EXPRESSION_UUID_PATTERN = "[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}";//check if a String is a UUID

    public static void postVote(Vote current){
    	
    	try {
    		
    		HttpSolrServer server = new HttpSolrServer(VOTE_CORE);
    		
	    	SolrInputDocument doc = new SolrInputDocument();
	    	 
	    	SimpleDateFormat formatter = new SimpleDateFormat("E MMM dd yyyy HH:mm:ss z");
	    	String dateInString = current.getDateCreated();
	    	Date date = formatter.parse(dateInString);
		
	    	doc.addField("id",current.getKey());
	    	
	    	doc.addField("candidateId",current.getCandidateKey());
	    	doc.addField("candidateName",current.getCandidateName());
			
	    	doc.addField("authorId",current.getUserKey());
			doc.addField("authorDisplayName", current.getUserName());			
			doc.addField("dateCreated",date );
	
			server.add(doc);
			server.commit();
    		
    	} catch (SolrServerException e) {
			
			// TODO Auto-generated catch block
			e.printStackTrace();
		
		} catch (IOException e) {
			
			// TODO Auto-generated catch block
			e.printStackTrace();
		
    	} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	
    }
    
    public static int countUserVotes(String userId){
    	   		
    	int count = 0;
    	
    	try {
    		
    		if(userId != null && userId.matches(REGULAR_EXPRESSION_UUID_PATTERN)){
    			
    			HttpSolrServer solr = new HttpSolrServer(VOTE_CORE);
    			SolrQuery qry = new SolrQuery();
    			
    			qry.setQuery("authorId:"+userId);		
    					
	    		qry.setIncludeScore(true);
	    		qry.setShowDebugInfo(true);
	    		qry.setRows(100);
	    		
	    		QueryRequest qryReq = new QueryRequest(qry);
	
				QueryResponse resp = qryReq.process(solr);
		
				SolrDocumentList results = resp.getResults();
				logger.log(Level.INFO,results.getNumFound() + " total hits");
				
				count = results.size();
				logger.log(Level.INFO,count + " received hits");
				
    		}
			
		
    	} catch (SolrServerException e) {
    		
			// TODO Auto-generated catch block
			e.printStackTrace();
		
    	}
    	
    	return count;
    	
    }

    
    public static void main(String[] args){
    	 
    	SourceSettings.loadConfigProperties();
    	
	}
	
	
}
