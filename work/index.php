<?php include('../includes/dochead.inc.php'); ?>
<?php 
$page = "work";
$subpage = "work";
$homepath = explode('index.php',$_SERVER['PHP_SELF']);
$category = isset($_GET['category']) ? urldecode($_GET['category']) : "all";
$category = $category == '' ? "all" : $category;
$xml = simplexml_load_file('../xml/work.xml');
$tags = array();
$work = array();
$case_study = array();
foreach($xml->item as $item){
	$itemtags = explode(",", strval($item->tags));
	$tags = checktags($tags, $itemtags); // get tags
	// gather work based on tag selection
	// if all add everything
	if($category == "all"){
		switch($item['type']){
			case "project" : 
				array_push($work, array(
					'id' => $item['id'],
					'type' => $item['type'],
					'title' => $item->desc->title,
					'copy' => '',
					'thumbs' => $item->thumbnails
				));
			break;
            case "feature" : 
                array_push($work, array(
                    'id' => $item['id'],
                    'type' => $item['type'],
                    'title' => $item->desc->title,
                    'copy' => '',
                    'thumbs' => $item->thumbnails
                ));
            break;
			case "case study" : 
				array_push($case_study, array(
					'id' => $item['id'],
					'type' => $item['type'],
					'title' => $item->desc->title,
					'copy' => '',
					'thumbs' => $item->thumbnails,
					'url' => $item->desc->url
				));
			break;
			case "link" : 
				array_push($work, array(
					'id' => $item['id'],
					'type' => $item['type'],
					'title' => $item->desc->title,
					'thumbs' => $item->thumbnails,
					'copy' => '',
					'url' => $item->desc->url
				));
			break;
		}
	}else{
		// match the projects tag with the current id
		for($p=0;$p<count($itemtags);$p++){
			if(trim($itemtags[$p]) == $category){
				array_push($work, array(
					'id' => $item['id'],
					'type' => $item['type'],
					'title' => $item->desc->title,
					'copy' => '',
					'thumbs' => $item->thumbnails
				));
			}
		}
	}
}
asort($tags);
array_unshift($tags,"all"); // add all option as first item
$page_title = !$workpagetitles[$category] ? $workpagetitles["all"] : $workpagetitles[$category];
?>
<?php include('../includes/header.inc.php'); ?>
<?php include('../includes/navigation.inc.php'); ?>
<div class="q30-container-1325">
    <div class="pure-g">
        <div class="pure-u-1">
            <div class="q30-container">
                <ul class="q30-subnav-list">
<?php
for($q=0;$q<count($tags);$q++){
	if($category == $tags[$q]){
		echo !$q ? '<li class="lead active">' : '<li class="active">';
	}else{
		echo !$q ? '<li class="lead">' : '<li>';
	}
	$path = $tags[$q] != "all" ? $homepath[0] . $tags[$q] : $homepath[0];
	$link = $tags[$q] != "all" ? str_replace('-',' ',$tags[$q]) : "work";
	?><a href="<?php echo $path; ?>"><?php echo ucfirst($link); ?></a></li><?php
}
echo "\r";
?>
			
                </ul>
            </div>
        </div>
    </div>
    <div class="pure-g">
<?php
for($q=0;$q<count($work);$q++):
    switch($work[$q]['type']):
        case "case study" :
?>
        <div class="pure-u-1-2">
            <?php echo output_casestudy($work[$q]); ?>
        </div>
<?php
        break;
        default : 
?>
        <div class="pure-u-1-2 pure-u-sm-1-3 pure-u-lg-1-3">
        	<!-- project -->
            <?php echo output_project($work[$q]); ?>
        </div>
<?php
    endswitch;
endfor;
?>
    </div>
    &nbsp;
    <br>
    &nbsp;
</div>
<?php include('../includes/footer.inc.php'); ?>