<?php
include 'definitions.php';

	postUrl(); 
		
	function postUrl()
	{
		//extract data from the post
		extract($_POST);
		
		switch ($call) {
			
			case "addvote":
				
				$fields = array();
				
				// set the webservice url
				$url = BBC_WEBSERVICE_URL . $call;
				
				$arr = explode(':', $candidate);
					
				$fields = array(
						'key' => urlencode($key),
						'userid' => urlencode($userid),
						'userdisplayname' => urlencode($userdisplayname),
						'candidatekey' => urlencode($arr[0]),
						'candidatename' => urlencode($arr[1])
				);
				
				
				
				//echo 'call: ' + $call;
				//url-ify the data for the POST
				$fields_string="";
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');
					
				//echo 'fields: ' . $fields_string;
				$postfields = $fields_string;
				
				//open connection
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				
				curl_setopt($ch,CURLOPT_POST, 1);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $postfields);
				
				//execute post
				$result = curl_exec($ch);
				
				//close connection
				curl_close($ch);
				
				header( 'Location: ' . BBC_URL_PATH . 'welcome.php' ) ;				
				
				break;
				
			case "edituser":
			
				$fields = array();
			
				// set the webservice url
				$url = BBC_WEBSERVICE_URL . $call;
			
				$fields = array(
					'userId' => urlencode($userId),
					'username' => urlencode($username),
					'email' => urlencode($email),
					'password' => urlencode(encrypt($password)),
					'title' => urlencode($title),
					'firstName' => urlencode($firstName),
					'lastName' => urlencode($lastName),
					'company' => urlencode($company),
					'telephone1' => urlencode($telephone1),
					'telephone2' => urlencode($telephone2)
			
				);
			
				//echo 'call: ' + $call;
				//url-ify the data for the POST
				$fields_string="";
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');
					
				//echo 'fields: ' . $fields_string;
				$postfields = $fields_string;
			
				//open connection
				$ch = curl_init();
			
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
			
				curl_setopt($ch,CURLOPT_POST, 1);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $postfields);
			
				//execute post
				$result = curl_exec($ch);
			
				//close connection
				curl_close($ch);
			
				break;
				
				
			case "getresults":
					
				$urlListingToCall = VOTE_CORE_URL . "/select?q=*%3A*&rows=0&wt=xml&indent=true";
				$resultSolrXML = getUrl($urlListingToCall, "");
				$totalVoteCount = getNumberDocuments($resultSolrXML);
			
				$facetQuery = "&facet=true&facet.limit=".$totalVoteCount."&facet.field=candidateName&facet.sort=index&f.candidateName.facet.sort=index";
			
				$allVotes = "";
		
				if(strcmp($dateFrom, "undefined") != 0 && strcmp($dateTo, "undefined") != 0){
					 
					$allVotes .= '&fq=dateCreated%3A%5B' .$dateFrom. 'T00:00:00Z+TO+' .$dateTo. 'T23:59:99.999Z%5D';
				}
				
				$userQuery='&fq=(*%3A*+-authorId%3Ad1febc20-05c8-11e7-a56c-00236c8d0fdf)';
				
				
				//$urlListingToCall = VOTE_CORE_URL . "/select?q=*%3A*".$allVotes."&start=0&rows=".$totalVoteCount."&wt=xml&indent=true";
				$urlListingToCall = VOTE_CORE_URL . "/select?q=*%3A*".$allVotes.$userQuery.$facetQuery."&start=0&rows=".$totalVoteCount."&sort=dateCreated+desc&wt=xml&indent=true";
				$resultSolrXML = getUrl($urlListingToCall, "");
				//getVotesInfo($resultSolrXML);
				getResultsInfo($resultSolrXML,$totalVoteCount);
				break;
				
		}
		
			
	}
	
	function getNumberDocuments($resultXml){
	
		try{
			$documentsListXml = new SimpleXMLElement($resultXml);
				
			// get the total number of documents
			$totalDocumentsCount = $documentsListXml->result['numFound'];
	
		} catch (Exception $e) {
	
			echo 'Caught exception: ',  $e->getMessage(), "\n";
	
		}
	
		return $totalDocumentsCount;
	
	}
	
	function getResultsInfo($resultXml,$totalVotes) {
	
		$voteRow = "";
		$candidateRow = "";
		$counter = 0;
	
		try{
	
			$votesListXml = new SimpleXMLElement($resultXml);
	
			// get the total number of offers
			$totalVoteCount = $votesListXml->result['numFound'];
	
			// divide the totalContactCount by the number of results per page to get the number of links
			$numOfPageLinks = $totalVoteCount / VOTE_LISTING_RESULTS_PER_PAGE;
	
			//echo '<h3><a>First: ' . $numOfPageLinks . '</a></h3>';
	
			// check if it's an exact number
			if($numOfPageLinks == round($numOfPageLinks)){
				// is an exact number, so leave the $numOfPageLinks as it is
			}
			else{
				// the number of page links was a fraction, so add an additional page for the remainder
				$numOfPageLinks = floor($numOfPageLinks) + 1;
				//echo '<h3><a>' . $numOfPageLinks . '</a></h3>';
			}
			
			$townArray = array();
					
			foreach ($votesListXml->lst as $list) {
				if(strcmp($list['name'], "facet_counts") == 0) {
					foreach ($list->lst as $subList) {
						if(strcmp($subList['name'], "facet_fields") == 0) {
							foreach ($subList->lst as $listData) {
			
								if(strcmp($listData['name'], 'candidateName') == 0) {
									foreach ($listData->int as $listItem) {
										$townName = $listItem['name'];
										if(strcmp($townName, "") != 0) {
											//$townName = str_replace("-", " ", $townName);
											if(strcmp($listItem, "0") != 0){
												$townArray["$townName"] = $listItem;
											}
										}
									}
								}
									
			
							}
						}
					}
				}
			}
			
			foreach($townArray as $key => $value) {
				$candidateRow .= '<candidate>';				
				$candidateRow .= '<candidateName>'.$key.'</candidateName>';
				$candidateRow .= '<numberVotes>'.$value.'</numberVotes>';
				$candidateRow .= '</candidate>';
			}
			$candidateRow .= '<totalResults>'.$totalVotes.'</totalResults>';
			$votesXML = '<results>' . $candidateRow . '</results>';
			echo $votesXML;
	
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	
	}
	
	function getVotesInfo($resultXml) {
	
		$voteRow = "";
		$counter = 0;
	
		try{
	
			$votesListXml = new SimpleXMLElement($resultXml);
	
			// get the total number of offers
			$totalVoteCount = $votesListXml->result['numFound'];
	
			// divide the totalContactCount by the number of results per page to get the number of links
			$numOfPageLinks = $totalVoteCount / VOTE_LISTING_RESULTS_PER_PAGE;
	
			//echo '<h3><a>First: ' . $numOfPageLinks . '</a></h3>';
	
			// check if it's an exact number
			if($numOfPageLinks == round($numOfPageLinks)){
				// is an exact number, so leave the $numOfPageLinks as it is
			}
			else{
				// the number of page links was a fraction, so add an additional page for the remainder
				$numOfPageLinks = floor($numOfPageLinks) + 1;
				//echo '<h3><a>' . $numOfPageLinks . '</a></h3>';
			}
				
			foreach ($votesListXml->result->doc as $vote) {
	
				$resultId = "";
				$candidateId = "";
	
				$candidateName = "";
				$authorId = "";
				$authorDisplayName = "";
	
				$dateCreated = "";
	
				$voteRow .= '<vote>';
				// loop through the String data held for each property
				foreach ($vote->str as $voteData) {
	
					// read the values into variables
					if(strcmp($voteData['name'], "id") == 0) $resultId = $voteData;
	
					if(strcmp($voteData['name'], "candidateId") == 0) $candidateId = $voteData;
					if(strcmp($voteData['name'], "candidateName") == 0) $candidateName = $voteData;
	
					if(strcmp($voteData['name'], "authorId") == 0) $authorId = $voteData;
					if(strcmp($voteData['name'], "authorDisplayName") == 0) $authorDisplayName = $voteData;
	
				}
	
				foreach ($vote->date as $voteData) {
					if(strcmp($voteData['name'], "dateCreated") == 0) $dateCreated = $voteData->date;
				}
	
				if($resultId != '')
					$voteRow .= '<resultId>'.$resultId.'</resultId>';
	
					if($candidateId != '')
						$voteRow .= '<candidateId>'.$candidateId.'</candidateId>';
							
						if($candidateName != '')
							$voteRow .= '<candidateName>'.$candidateName.'</candidateName>';
	
							if($authorId != '')
								$voteRow .= '<authorId>'.$authorId.'</authorId>';
									
								if($authorDisplayName != '')
									$voteRow .= '<authorDisplayName>'.$authorDisplayName.'</authorDisplayName>';
	
									if($dateCreated != '')
										$voteRow .= '<dateCreated>'.$dateCreated.'</dateCreated>';
											
										$voteRow .= '</vote>';
	
			}
	
			$votesXML = '<votes>' . $voteRow . '</votes>';

			echo $votesXML;
	
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	
	}

	/** Calls a URL sent as a parameter and returns the response **/
	function getUrl($urlToCall, $customRequest)
	{
		// create curl resource
		$ch = curl_init();
	
		// set url
		curl_setopt($ch, CURLOPT_URL, $urlToCall);
	
		// allow for delete requests
		if($customRequest == 'DELETE')
		{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $customRequest);
		}
	
		if($customRequest == 'POST')
		{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $customRequest);
		}
	
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
	
		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
		// $output contains the output string
		$output = curl_exec($ch);
	
		// close curl resource to free up system resources
		curl_close($ch);
	
		// return the output from the URL
		return $output;
	
	}
	
	
	function encrypt($plainText){
	
		return base64_encode(mcrypt_encrypt(ENCRYPTION, SECRET_KEY, $plainText, MODE, IV));
	
	}

?>