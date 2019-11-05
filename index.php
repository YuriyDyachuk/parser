<?php  
// ini_set('error_reporting', E_ALL);

	/*$parser =  file_get_contents('https://stylecaster.com/feeds/amazon');
	$pars = new SimpleXMLElement($parser);
	echo date('Y/m/d ') . $pars->channel->item[0]
		->children('https://amazon.com/ospublishing/1.0/')
			->products[0]
			->product[1]
			->productHeadline;*/

			// ----------------

$pars_url = 'https://stylecaster.com/feeds/amazon'; 
$data_xml = simplexml_load_file($pars_url);

// ----------------
$i=0; 
foreach($data_xml->channel->item as $val) { 

// ----------------
$title       = (string)$val->title;
$link        = (string)$val->link;

$content     = $val->children("amzn", true);
$encoded     = (string)$content->products->product->productURL;
$productHeadline     = (string)$content->products->product->productHeadline;
$productSummary     = (string)$content->products->product->productSummary; 


$n = ($i+1);

// ----------------

print '----|----- '. $n .' ----|----- '.'<br />'."\n";

print 'Title: '. $title .'<br />'."\n"; 
print 'Link: '. $link .'<br />'."\n"; 
print 'Content: '.'<br />'."\n"; 
print 'ProductURL: '. $encoded .'<br />'."\n"; 
print 'ProductHeadline: '. $productHeadline .'<br />'."\n"; 
print 'ProductSummary: '. $productSummary .'<br />'."\n"; 

// ----------------

print '<br />'."\n";

$i++; 
}

// ---------------- file.csv

$list = array (

    array('title' => 
	    	'The Best Retinol For Sensitive Skin, Because the Tingling Isn’t For Everyone', 
	    	'The Best Engagement Rings Under $500 That You Can Buy on Amazon', 
	    	'How to Trim Your Own Bangs at Home Without Going Overboard', 
	    	'Our Favorite Lip Products For an Instantly Plumped Pout Without Fillers',
	    	'Our Favorite Hydrating Primers For Super Dry Skin',
	    	'Here’s How to Instantly Conceal Grown-Out Roots in Between Salon Appointments',
	    	'These Beginner-Friendly Derma Rollers Help Stimulate Collagen For an Instant Glow',
	    	'The Best-Ever Moisturizers for Natural Hair According to a Hairstylist',
	    	'The Best Sunscreens For Sensitive Skin',
	    	' The Best Affordable Dupes For Laura Mercier’s Iconic Translucent Setting Powder',
    ),

    array('link' =>
    		'https://stylecaster.com/beauty/best-retinol-dry-sensitive-skin/',
     		'https://stylecaster.com/best-engagement-rings-under-500/',
      		'https://stylecaster.com/beauty/how-to-trim-your-own-hair/',
      		'https://stylecaster.com/beauty/how-to-plump-lips-without-filler/',
      		'https://stylecaster.com/beauty/best-primers-for-dry-skin/',
      		'https://stylecaster.com/beauty/best-root-concealer/',
      		'https://stylecaster.com/beauty/best-derma-rollers-amazon/',
      		'https://stylecaster.com/beauty/best-natural-hair-moisturizer/',
      		'https://stylecaster.com/the-10-best-selling-sunscreens-on-amazon-under-30/',
      		'https://stylecaster.com/beauty/laura-mercier-setting-powder-dupes/',
    ),

    array('ProductURL' => 
	    	'https://www.amazon.com/dp/B004D267JO',
	    	'https://www.amazon.com/dp/B01AKCIHFC',
	    	'https://www.amazon.com/dp/B001DYM62C',
	    	'https://www.amazon.com/dp/B07F634FQC',
	    	'https://www.amazon.com/dp/B003FKSVMG',
	    	'https://www.amazon.com/dp/B01M2DMYD0',
	    	'https://www.amazon.com/dp/B073CFR8R4',
	    	'https://www.amazon.com/dp/B00G187CP6',
	    	'https://www.amazon.com/dp/B004D2826K',
	    	'https://www.amazon.com/dp/B000BNG4VU',
    ),

    array('ProductHeadline' => 
	    	' ROC Retinol Sensitive Night Cream',
	    	'<span id',
	    	'Tinkle Hair Cutters',
	    	'Kimi Lip Max Lip Plumper',
	    	'Covergirl Anti-Aging Foundation Primer',
	    	'PROTÉGÉ Premium Root Touch-Up',
	    	'Sdara Cosmetic Needling Tool',
	    	'Color Wow One Minute Transformation Anti-Frizz Styling Cream',
	    	'Neutrogena Clear Face Sunscreen',
	    	'Coty Airspun Loose Face Powder',
    ),

    array('ProductSummary' => 
	    	
	    	"ROC's affordable line of retinol-based skin care products have long been a tried and true drugstore beauty staple. This sensitive version of their best-selling Retinol Night Cream is formulated with a milder form of retinol in moisturizing cream to reduce irritation and keep the skin hydrated - not flaky.",
	    	" For those who prefer gem stones to diamonds, this opal and sterling silver ring is a gorgeous choice that won't break the bank.",
	    	"This tiny little trimmer and combo combo helps you get an event result. It's designed with two double edge razor blades, and one with thinner teeth for those with fine hair.",
	    	"This all-natural lip plumper not only instantly plumps your pout, but it also hydrates dry lips and helps to soften and prevent fine lines over time.",
	    	"This anti-aging primer is a great option for dry skin types that are also prone to clogged pores and breakouts. It's an oil-free formula, but gives skin a boost of hydration for a smooth and makeup-ready canvas.",
	    	"This powder concealer helps you attain gradual color and coverage, and comes in a wide range of shades. It's also waterproof and long-wearing, so you won't have to worry about it fading throughout your day.",
	    	" This derma roller is designed with 0.25mm needles, making it ideal for beginners and those with sensitive skin. You'll reap the anti-aging powers of mild exfoliation and better skin care absorption, while also stimulating blood flow to the skin for instant glow. Reviewers love that this tool delivers quick results but doesn't hurt like other contenders on the market. It's gentle but still effective.",
	    	"If body and volume are what you're looking for, this anti-frizz styling cream has exactly what your curls crave. It also doesn't contain lots of oils so it leaves hair with lots of body, says Dorsey.",
	    	"Neutrogena’s Clear Face Sunscreen is specially formulated for acne-prone and oily skin. The liquid-lotion formula has a water-light texture that leaves a weightless, matte finish on the skin that won’t look greasy.",
	    	"A cult-status favorite in its own right, this affordable setting powder is a close rival to its prestige counterpart. The ultra lightweight and velvety-smooth formula glides over the skin seamlessly, helping to blur lines and texture and lock makeup in place for all-day wear. Fans of the product also love to bake with this powder because it's lightweight enough to set and mattify your makeup without leaving the skin feeling parched. Another selling point is that it also comes in six different shades, including an 'extra coverage",
    ),
);

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);