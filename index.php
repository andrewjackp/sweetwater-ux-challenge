<?php 

	function getCurrentPageSlug() {
		$pageSlug = "main-page";

		if (isset($_GET["page"]) ) {
			$pageSlug = $_GET["page"];
		} 

		return $pageSlug;
	}

	$currentPageSlug = getCurrentPageSlug();


	function getPageData($slug) {

		$pageDataFilePath = "data/$slug.json";

		if( file_exists($pageDataFilePath) ) {
			$thePageJson = file_get_contents($pageDataFilePath);
			$pageData = json_decode($thePageJson, true);

			return $pageData;
		}

		return null;
	}

	$pageData = getPageData($currentPageSlug);

	function getModule($name, $props = []) {
		$filePath = "modules/$name/template.php";
		if (file_exists ($filePath) ) {
				extract($props); 
        		include($filePath);
		} else {
			echo "no module called $name";
		}
	}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sweetwater</title>
	<link rel="stylesheet" href="css/site.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Arimo:ital,wght@0,400..700;1,400..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
	
	<main>
   	<?php foreach ($pageData["sections"] as $section): ?>
        	<section class="<?=$section['name']?>">
            <inner-column>
               <?=getModule($section['module'], $section)?>
            </inner-column>
        		</section>
    	<?php endforeach; ?>
	</main>
	
</body>
</html>