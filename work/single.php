<?php
include('../includes/dochead.inc.php');
/* PROCESS XML */
$page = "work";
$subpage = "work-single";
$homepath = explode('single.php',$_SERVER['PHP_SELF']);
$id = isset($_GET['id']) ? $_GET['id'] : "default";
$id = str_replace('-',' ',$id);
$category = isset($_GET['category']) ? $_GET['category'] : "all";
$heading = "";
$images = array();
$imageref = -1;
$image_type = "";
$xml = simplexml_load_file('../xml/work.xml');
$project_type = '';
$related = array();
$found = false;
foreach($xml->item as $item):
	if(strtolower($item['id']) == $id):
		switch($item['type']):
			case "project" :
				$heading = $item->desc->title;
				$copy = trim($item->desc->copy);
				foreach($item->images->img as $img):
					$type = explode(",",$img['type']);
					if($image_type != strval($type[0]) || $image_ss_id != NULL && $image_ss_id != strval($type[1])){
						// different type of image set so create a new array for it
						$imageref++;
						$images[$imageref] = array();
						$images[$imageref][0] = strval($type[0]);
						$images[$imageref][1] = array();
					}
					array_push($images[$imageref][1],$img);
					$image_type = strval($type[0]);
					$image_ss_id = strval($type[1]) ? strval($type[1]) : NULL;
				endforeach;
				$found = true;
			break;
			case "feature" :
				$title = $item->desc->title;
				$heading = $item->desc->heading;
				$copy = trim($item->desc->copy);
				$services = explode(",", trim($item->desc->services));
				foreach ($item->images->item as $img_item):
					switch($img_item['type']):
						case "image" :
							foreach($img_item->img as $img):
								$type = explode(",",$img['type']);
								if($image_type != strval($type[0]) || $image_ss_id != NULL && $image_ss_id != strval($type[1])){
									// different type of image set so create a new array for it
									$imageref++;
									$images[$imageref] = array();
									$images[$imageref][0] = strval($type[0]);
									$images[$imageref][1] = array();
								}
								array_push($images[$imageref][1],$img);
								$image_type = strval($type[0]);
								$image_ss_id = strval($type[1]) ? strval($type[1]) : NULL;
							endforeach;
						break;
						case "text" :
							$imageref++;
							$images[$imageref] = array();
							$images[$imageref][0] = "text";
							$images[$imageref][1] = (string) $img_item;
							$image_type = "text";
						break;
					endswitch;
				endforeach;
				$found = true;
			break;
			case "case study" :
				$url = trim($item->desc->url);
				$found = true;
			break;
		endswitch;
		$project_type = $item['type'];
		$project_id = $item['id'];
		$related = explode(",", trim($item->related));
		$page_title = trim($item->title);
		$description = trim($item->meta);
	endif;
endforeach;
if(!$found):
	header('Location: /404/'); // send bad url for error
endif;
// set page
include('../includes/header.inc.php');
include('../includes/navigation.inc.php');
switch($project_type):
	case "case study" :
		require($url);
	break;
	case "project" :
?>
<div class="q30-container-1325">
    <div class="pure-g">
        <div class="pure-u-1">
            <span class="q30-breadcrumb">
                <a href="<?php echo $homepath[0]; ?>" class="breadcrumb active">Work</a><?php if($category != "all"){ ?><a href="<?php echo $homepath[0] . $category; ?>" class="breadcrumb active"><?php echo ucwords($category); ?></a><?php } ?><?php echo trim($heading); ?>
            </span>
            <span class="q30-project-desc">
            	<?php if(strlen($copy)) { echo '<p>' . $copy . '</p>'; } ?>
            </span>
        </div>
    </div>
</div>
<?php
	break;
	case "feature" :
?>
<div class="q30-bkg-brown q30-mrgn-40 q30-nomrgn-top q30-nomrgn-left q30-nomrgn-right">
	<div class="q30-container-1325">
	    <div class="pure-g">
	        <div class="pure-u-1">
	            <span class="q30-breadcrumb">
	                <a href="<?php echo $homepath[0]; ?>" class="breadcrumb active">Work</a><?php if($category != "all"){ ?><a href="<?php echo $homepath[0] . $category; ?>" class="breadcrumb active"><?php echo ucwords($category); ?></a><?php } ?><?php echo trim($title); ?>
	            </span>
	        </div>
	    </div>
	    <div class="pure-g">
	    	<div class="pure-u-1 pure-u-md-3-4">
	    		<div class="q30-feature-content">
	    			<?php if(strlen($heading)) { echo '<h1>' . $heading . '</h1>'; } ?>
	    			<?php if(strlen($copy)) { echo $copy; } ?>
	    		</div>
	    	</div>
	    	<div class="pure-u-1 pure-u-md-1-4">
<?php
if(count($services)):
?>
				<div class="q30-feature-content">
					<div class="q30-feature-content-list">
						<h5>Services</h5>
						<ul>
<?php
foreach($services as $service):
?>
							<li><?php echo $service; ?></li>
<?php
endforeach;
?>
						</ul>
					</div>
				</div>
<?php
endif;
?>
	    	</div>
	    </div>
	</div>
</div>
<?php
	break;
endswitch;
// images and content
for($q=0;$q<count($images);$q++):
	if($images[$q][0] == "static"){
?>
<div class="q30-container-1325">
    <div class="pure-g">
        <div class="pure-u-1">
            
<?php
			for($p=0;$p<count($images[$q][1]);$p++){
				// change source for mobile
				$src = strval($images[$q][1][$p]['src']);
				$srcimg = explode('/', strval($images[$q][1][$p]['src']));
				$ln = (strlen($srcimg[count($srcimg) - 1]) + 1);
				if ( $detect->isMobile() && !$detect->isTablet() ) {
					$src = substr_replace($src, '/480/', 0 - $ln) . $srcimg[count($srcimg) - 1];
				} else if( $detect->isTablet() ){
					$src = substr_replace($src, '/960/', 0 - $ln) . $srcimg[count($srcimg) - 1];
				}
?>
				<div class="q30-project-img">
                	<img src="<?php echo docroot . $src; ?>" alt="<?php echo strval($images[$q][1][$p]['alt']); ?>" class="q30-project-static">
                </div>
<?php
			}
?>
        </div>
    </div>
</div>
<?php
	}else if($images[$q][0] == "slide-auto" || $images[$q][0] == "slide-controls"){
?>
<div class="q30-container-980">
    <div class="pure-g">
        <div class="pure-u-1">
            <div class="q30-mrgn-10">
                <div id="q30-ss-<?php echo $q; ?>" class="q30-cs-ss">
                    <div class="q30-cs-slides">
<?php
			$ssref = array_reverse($images[$q][1]);
			for($p=0;$p<count($ssref);$p++){
				// change source for mobile
				$src = strval($ssref[$p]['src']);
				$srcimg = explode('/', strval($ssref[$p]['src']));
				$ln = (strlen($srcimg[count($srcimg) - 1]) + 1);
				if ( $detect->isMobile() && !$detect->isTablet() ) {
					$src = substr_replace($src, '/480/', 0 - $ln) . $srcimg[count($srcimg) - 1];
				} else if( $detect->isTablet() ){
					$src = substr_replace($src, '/960/', 0 - $ln) . $srcimg[count($srcimg) - 1];
				}
?>
                        <div id="<?php echo (count($ssref) - 1) - $p; ?>" class="q30-cs-img"><img src="<?php echo docroot . $src; ?>" alt="<?php echo strval($ssref[$p]['alt']); ?>"></div> 
<?php
			}
?>
                    </div>
                </div>
<?php
if($detect->isMobile() && !$detect->isTablet() || $images[$q][0] == "slide-auto"){
	$autorun = 1;
} else {
	$autorun = 0;
}
?>
                <script type="text/javascript">
            	    var _ss<?php echo $q; ?> = new q30Slider({ id:'q30-ss-<?php echo $q; ?>', autorun:Boolean(<?php echo $autorun; ?>), autosize:'auto' });
            	    $(window).load(function(){
                        _ss<?php echo $q; ?>.init();
            	    });
                </script>
            </div>
        </div>
    </div>
</div>
<?php
	}else if($images[$q][0] == "vimeo"){
?>
<div class="q30-container-1325">
    <div class="pure-g">
        <div class="pure-u-1">
            <div class="q30-pad-10 q30-nopad-top q30-nopad-bottom">
<?php
		for($p=0;$p<count($images[$q][1]);$p++){
?>
                <iframe src="<?php echo $images[$q][1][$p]['src']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen class="q30-project-static q30-project-vimeo"></iframe>
<?php
		}
?>
            </div>
        </div>
    </div>
</div>
<?php
	}else if($images[$q][0] == "text"){
?>
<div class="q30-container-980">
    <div class="pure-g">
        <div class="pure-u-1">
            <div class="q30-single-text">
            	<?php echo $images[$q][1]; ?>
            </div>
        </div>
    </div>
</div>
<?php
	}
?>
<?php
endfor;
include('../includes/related.inc.php');
include('../includes/footer.inc.php'); ?>