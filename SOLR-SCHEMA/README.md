<h2> Apache Solr 4.10.0 and Configuration </h2>

After installing the Apache Solr Server 4.10.0 it needs to copy BBC_VOTES-STAGE folder into  "$SERVER_ROOT/example/solr/" and restart the server on port 8984

TO CLEAR THE CORE RUN:
http://127.0.0.1:8984/solr/BBC_VOTES-STAGE/update?stream.body=%3Cdelete%3E%3Cquery%3E*:*%3C/query%3E%3C/delete%3E&commit=true

<br><h2>Solr Schema</h2>
  
<br><h5>    
    <br><field name="id" 						        type="string" 			  indexed="true"  stored="true" required="true" multiValued="false" /> 
    <br><field name="offerKey"          		type="string"         indexed="true"  stored="true"/>
<br>
    <br><field name="candidateId"          	type="string"         indexed="true"  stored="true"/>
    <br><field name="candidateName"         type="string"         indexed="true"  stored="true"/>
<br>
    <br><field name="authorId"             	 type="string"        indexed="true"  stored="true"/>
    <br><field name="authorDisplayName"      type="string"        indexed="true"  stored="true"/>
    <br><field name="dateCreated" 				   type="date" 			     indexed="true"  stored="true" default="NOW"   multiValued="false" />
</h5>
