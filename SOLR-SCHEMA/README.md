#Apache Solr and Configuration

After installing the Apache Solr Server 4.10.0 it needs to copy BBC_VOTES-STAGE folder into  "$SERVER_ROOT/example/solr/" and restart the server

TO CLEAR THE CORE RUN:
http://127.0.0.1:8984/solr/BBC_VOTES-STAGE/update?stream.body=%3Cdelete%3E%3Cquery%3E*:*%3C/query%3E%3C/delete%3E&commit=true
