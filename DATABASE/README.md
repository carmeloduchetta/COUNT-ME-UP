<h2> CASSANDRA NoSQL 2.0.6 Configuration </h2>

This solution uses a Cassandra database with 2 tables User and Vote. The keyspace's name is bbc_stage

After all the tables are created against Cassandra DB using CASSANDRA-, it needs to import the User.csv file on User table. It contains the Default User to track the exceeded votes when each user will vote more than 3 times.
