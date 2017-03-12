package net.bbc.counting.webservices;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;

import net.bbc.counting.settings.SourceSettings;

@WebServlet("/InitializeDBServlet")
public class InitializeDB extends HttpServlet{
	
	private static final long serialVersionUID = 1L;
    
	public void init() throws ServletException{
		
		System.out.println("----------");
        System.out.println("---------- InitializeDB Servlet Initialized successfully ----------");
        System.out.println("----------");
        SourceSettings.loadConfigProperties();
        
        //DBAccess access = new DBAccess();
	}

	public static void main(String[] args){
		
		/*
		InitializeDB temp = new InitializeDB();
		System.out.println("----------");
        System.out.println("---------- InitializeDB Servlet Initialized successfully ----------");
        System.out.println("----------");
        SourceSolrSettings.loadConfigProperties();
        */
		

	}
	
}
