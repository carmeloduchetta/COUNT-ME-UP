# COUNT-ME-UP
  As a BBC television presenter:
<br> • I want to see the counts for candidates within a given time frame
<br> • So that I can announce the winner of the competition

<h2> Required</h2>
•	Apache Cassandra NoSQL 2.0.6
<br>•	Apache Solr 4.10.0
<br>•	Apache Tomcat 7.0.68
<br>•	PHP 5.4.45
<br>•	Java 1.8
<br>•	Eclipse
<br>•	MAVEN
<br>•	Apache server or PHP support for Tomcat 

<h2> CODE CHANGES</h2>
<br> The main code is provided by BBC-1.0-STAGE Branch

<h2> ARCHITECTURE DESCRIPTION</h2>
<br> The Count Me Up PDF file explain the main architecture of the project
[[https://github.com/carmeloduchetta/COUNT-ME-UP/tree/BBC-1.0-STAGE/ARCHITECTURE.png|alt=octocat]]

<h2> Assumptions </h2>

•	A Default User will track all the exceeded votes

•	There is a fixed number of 5 candidates. I do make this configurable on the embedded HTML drop down.

•	Candidates will simply be referenced by a Key-Value pair. [UUID:Text] e.g. [daa61fdc-0422-11e7-93ae-92361f002671:CANDIDATE 1]

•	Users would be signed in to track their votes. They will need to successfully create their own profile on the system.

•	Each User can vote only 3 times, the exceeded votes will be ignored.
