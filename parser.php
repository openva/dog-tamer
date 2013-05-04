<?php

/* A simple wrapper for cURL. */
function http_retrieve($url)
{
	$ch = curl_init();
	
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	
	ob_start();
	
	curl_exec ($ch);
	curl_close ($ch);
	$string = ob_get_contents();
	
	ob_end_clean();
	
	return $string;
}

/* This is a list of localities and their associated VDACS IDs, as found in the source of the
 * Dangerous Dog Registry home page.
 */
$localities = array(
	'1' => 'Accomack County',
	'3' => 'Albemarle County',
	'5' => 'Alleghany County',
	'7' => 'Amelia County',
	'9' => 'Amherst County',
	'11' => 'Appomattox County',
	'13' => 'Arlington County',
	'15' => 'Augusta County',
	'17' => 'Bath County',
	'19' => 'Bedford County',
	'21' => 'Bland County',
	'23' => 'Botetourt County',
	'25' => 'Brunswick County',
	'27' => 'Buchanan County',
	'29' => 'Buckingham County',
	'31' => 'Campbell County',
	'33' => 'Caroline County',
	'35' => 'Carroll County',
	'36' => 'Charles City County',
	'37' => 'Charlotte County',
	'41' => 'Chesterfield County',
	'510' => 'City Of Alexandria',
	'515' => 'City Of Bedford',
	'520' => 'City Of Bristol',
	'530' => 'City Of Buena Vista',
	'540' => 'City Of Charlottesville',
	'550' => 'City Of Chesapeake',
	'570' => 'City Of Colonial Heights',
	'580' => 'City Of Covington',
	'590' => 'City Of Danville',
	'595' => 'City Of Emporia',
	'600' => 'City Of Fairfax',
	'610' => 'City Of Falls Church',
	'620' => 'City Of Franklin',
	'630' => 'City Of Fredericksburg',
	'640' => 'City Of Galax',
	'650' => 'City Of Hampton',
	'660' => 'City Of Harrisonburg',
	'670' => 'City Of Hopewell',
	'678' => 'City Of Lexington',
	'680' => 'City Of Lynchburg',
	'683' => 'City Of Manassas',
	'685' => 'City Of Manassas Park',
	'690' => 'City Of Martinsville',
	'700' => 'City Of Newport News',
	'710' => 'City Of Norfolk',
	'720' => 'City Of Norton',
	'730' => 'City Of Petersburg',
	'735' => 'City Of Poquoson',
	'740' => 'City Of Portsmouth',
	'750' => 'City Of Radford',
	'760' => 'City Of Richmond',
	'770' => 'City Of Roanoke',
	'775' => 'City Of Salem',
	'790' => 'City Of Staunton',
	'800' => 'City Of Suffolk',
	'810' => 'City Of Virginia Beach',
	'820' => 'City Of Waynesboro',
	'830' => 'City Of Williamsburg',
	'840' => 'City Of Winchester',
	'43' => 'Clarke County',
	'45' => 'Craig County',
	'47' => 'Culpeper County',
	'49' => 'Cumberland County',
	'51' => 'Dickenson County',
	'53' => 'Dinwiddie County',
	'57' => 'Essex County',
	'59' => 'Fairfax County ',
	'61' => 'Fauquier County',
	'63' => 'Floyd County',
	'65' => 'Fluvanna County',
	'67' => 'Franklin County',
	'69' => 'Frederick County',
	'71' => 'Giles County',
	'73' => 'Gloucester County',
	'75' => 'Goochland County',
	'77' => 'Grayson County',
	'79' => 'Greene County',
	'81' => 'Greensville County',
	'83' => 'Halifax County',
	'85' => 'Hanover County',
	'87' => 'Henrico County ',
	'89' => 'Henry County',
	'91' => 'Highland County',
	'93' => 'Isle Of Wight County',
	'95' => 'James City County',
	'99' => 'King George County',
	'101' => 'King William County',
	'97' => 'King And Queen County',
	'103' => 'Lancaster County',
	'105' => 'Lee County',
	'107' => 'Loudoun County',
	'109' => 'Louisa County',
	'111' => 'Lunenburg County',
	'113' => 'Madison County',
	'115' => 'Mathews County',
	'117' => 'Mecklenburg County',
	'119' => 'Middlesex County',
	'121' => 'Montgomery County',
	'125' => 'Nelson County',
	'127' => 'New Kent County',
	'131' => 'Northampton County',
	'133' => 'Northumberland County',
	'135' => 'Nottoway County',
	'137' => 'Orange County',
	'139' => 'Page County',
	'141' => 'Patrick County',
	'143' => 'Pittsylvania County',
	'145' => 'Powhatan County',
	'147' => 'Prince Edward County',
	'149' => 'Prince George County',
	'153' => 'Prince William County',
	'155' => 'Pulaski County',
	'157' => 'Rappahannock County',
	'159' => 'Richmond County',
	'161' => 'Roanoke County',
	'163' => 'Rockbridge County',
	'165' => 'Rockingham County',
	'167' => 'Russell County',
	'169' => 'Scott County',
	'171' => 'Shenandoah County',
	'173' => 'Smyth County',
	'175' => 'Southampton County',
	'177' => 'Spotsylvania County',
	'179' => 'Stafford County',
	'181' => 'Surry County',
	'183' => 'Sussex County',
	'185' => 'Tazewell County',
	'1001' => 'Town Of Big Stone Gap',
	'1000' => 'Town Of Blackstone',
	'1002' => 'Town Of Clifton Forge',
	'1003' => 'Town Of Marion',
	'1004' => 'Town Of South Boston',
	'1005' => 'Town Of Tappahannock',
	'1006' => 'Town Of Vienna',
	'1007' => 'Town Of Vinton',
	'1008' => 'Town Of Wytheville',
	'187' => 'Warren County',
	'191' => 'Washington County',
	'193' => 'Westmoreland County',
	'195' => 'Wise County',
	'197' => 'Wythe County',
	'199' => 'York County'
);

/*
 * Initialize the array in which we'll store our final array of data.
 */
$dogs = array();

/*
 * Iterate through each locality and store their listings as flat HTML.
 */
foreach ($localities as $id => $name)
{
	$html = http_retrieve('http://www.vi.virginia.gov/vdacs_dd/public/cgi-bin/public.cgi?loc='.$id.'&submit=Go');
	preg_match_all('/Owner - ([^<]+)<br>Dog - ([^<]+)<br>([^<]+)<br>([^<]+), VA ([0-9]{5})<br><a href="([^"]+)">More Information<\/a>/', $html, $matches);
	if ($matches)
	{
		
		/*
		 * Iterate through the URLs and prefix them properly.
		 */
		foreach ($matches[6] as &$url)
		{
			$url = 'http://www.vi.virginia.gov/vdacs_dd/public/cgi-bin/' . $url;
		}
		
		/*
		 * Pivot the arrays. Right now there's one array for each regex group, and we want to pivot
		 * those so that we have one array for each *entry*.
		 */
		foreach ($matches as $group => $match)
		{
			if ($group === 0)
			{
				continue;
			}
			foreach ($match as $number => $field)
			{
				$groups = array(
							1 => 'owner',
							2 => 'name',
							3 => 'street',
							4 => 'city',
							5 => 'zip',
							6 => 'url');
				$label = $groups[$group];
				$dogs[$name][$number][$label] = trim($field);
			}
		}
	}
	unset($matches);
}

/*
 * Store this listing as JSON.
 */
file_put_contents('dogs.json', json_encode($dogs));

echo '<p><a href="dogs.json">dogs.json generated</a>.</p>';

/*
 * Store the listing as HTML.
 */
$html = '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Virginia Dangerous Dog Listing</title>
	<link rel="stylesheet" href="/css/reset.css" media="screen" />
	<link rel="stylesheet" href="/css/master.css" media="screen" />
	<style>
		dl + dl {
			margin-top: 2em;
		}

		dl {
			padding: 0.5em;
		}
		dt {
			float: left;
			clear: left;
			width: 100px;
			text-align: right;
			font-weight: bold;
		}
		dt:after {
			content: ":";
		}
		dd {
			margin: 0 0 0 110px;
			padding: 0 0 0.5em 0;
		}
	</style>
	<script src="https://www.google.com/jsapi?key=ABQIAAAAn01L8sl4uwWn5vTPpoEoXhSoclbV0lStNWyWkmXm7JYp1pRtdhQmMHq94Ax7asts20lRgq4acShXHw"></script>
</head>
<body>
<header>
	<h1>Virginia Dangerous Dog Registry</h1>
	<p>A more accessible version of the list of dogs on the
	<a href="http://www.vdacs.virginia.gov/animals/dogs.shtml">Virginia Dangerous Dog
	Registry</a>. Last updated on '.date('F j, Y').'.</p>
</header>
<section id="page">';

/*
 * Iterate through every locality, and then every dog, to display HTML.
 */
foreach ($dogs as $locality_name => $locality)
{
	$locality_anchor = str_replace(' ', '-', strtolower($locality_name));
	$html .= '<section>
		<h2 id="'.$locality_anchor.'">'.$locality_name.'</h2>';
	
	/*
	 * Output each dog in this locality.
	 */
	foreach ($locality as $dog)
	{
		$html .= '<dl>';
		foreach ($dog as $key => $value)
		{
			
			if ($key == 'url')
			{
				$value = '<a href="' . $value . '"> ' . urlencode($value) . '</a>';
			}
			
			$html .= 
				'<dt>'.$key.'</dt>
				 <dd>'.$value.'</dd>';
		}
		$html .= '</dl>';
			
	}

	$html .= '</section>';
}

$html .= '
</section>
</body>
</html>';

echo '<p><a href="index.html">index.html generated</a>.</p>';

/*
 * Save the entire listing to index.html.
 */
file_put_contents('index.html', $html);

?>
