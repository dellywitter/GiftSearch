<?php
ini_set('display_errors', 'On');
require_once 'lib/AmazonECS.class.php';

$amazonEcs = new AmazonECS('AKIAI3J67J7KQYJICD5Q', '7pxH1VOn2ivq0OEMOkf77Hj/8cT4lkWaRES0MYK0', 'co.uk', 'giftsuggest-20');
$amazonEcs->returnType(AmazonECS::RETURN_TYPE_ARRAY);
	
	// First of all you have to set an another ResponseGroup. If not the request would not be successful
    // Possible Responsegroups: BrowseNodeInfo,MostGifted,NewReleases,MostWishedFor,TopSellers
    $amazonEcs->responseGroup('BrowseNodeInfo');

    // Then browse a node like this:  nodeId (See: http://docs.amazonwebservices.com/AWSECommerceService/2010-09-01/DG/index.html?BrowseNodeIDs.html)
    // For example: 542064 on German Amazon is: Software
    //var_dump($response);

$ids=array(83451031,
248878031,
60032031,
117333031,
1025612,
573406,
560800,
344155031,
66280031,
10709121,
3147411,
193717031,
341678031,
3147411,
213078031,
77198031,
520920,
192414031,
10709021,
1025616,
362350011,
1025614,
319530011,
84124031,
595314,
573400,
328229011);

echo "{";
echo "\"All\": [";
echo "<br/>";

echo  "{";
echo "<br/>";

//var_dump($response);
foreach ($ids as $id){
//echo $id;
//echo "<br/>";
$response= $amazonEcs->browseNodeLookup($id);

$name=$response["BrowseNodes"]["Request"]["BrowseNodeLookupRequest"]["BrowseNodeId"];
//echo $name;
$json=array();

foreach ($response['BrowseNodes']['BrowseNode']['Children']['BrowseNode'] as $sub)

{
$name_sub=$sub['Name'];
$node_id=$sub["BrowseNodeId"];
echo $name_sub;
//$json[$node_id]=$name_sub;
//$json=$json+array($node_id=>$name_sub);
}


//foreach($json as $el){
//echo $el;}

}



echo "<br/>";
echo "}";


?>