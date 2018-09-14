<?php
include('includes/dochead.inc.php');
$description = "Toronto branding, design, UX, web, print, development, programming";
include('includes/header.inc.php');
include('includes/navigation.inc.php');
/* homepage images */
$homepage_images = array(
	'1-Homepage.jpg',
	'2-Homepage.jpg',
	'3-Homepage.jpg',
	'4-Homepage.jpg',
	'5-Homepage.jpg',
	'6-Homepage.jpg',
	'7-Homepage.jpg',
	'8-Homepage.jpg',
	'9-Homepage.jpg'
);
/* sizes */
$src = '/img/homepage/';
if ( $detect->isMobile() && !$detect->isTablet() ) {
	$src = '/img/homepage/960/';
} else if( $detect->isTablet() ){
	$src = '/img/homepage/960/';
}
?>
<div class="q30-container">
<div id="q30-slides" class="q30-slides">
	<div id="q30-slide-1" style="background-image:url('<?php echo $src . $homepage_images[0]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-content">
				<h1>We’re q30.<br>We specialize in smart design for:</h1>
				<ul class="q30-slide-list">
					<li>Interactive experiences</li>
					<li>Brands</li>
					<li>Corporate communications</li>
					<li>Environments</li>
				</ul>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-2" />
			</div>
		</div>
	</div>
	<div id="q30-slide-2" name="q30-slide-2" style="background-image:url('<?php echo $src . $homepage_images[1]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>For over 20 years, we’ve been designing solutions that help our clients achieve their goals</h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-3" />
			</div>
		</div>
	</div>
	<div id="q30-slide-3" name="q30-slide-3" style="background-image:url('<?php echo $src . $homepage_images[2]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>The merging of <a href="/work/all/ieso-web">entities</a>.</h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-4" />
			</div>
		</div>
	</div>
	<div id="q30-slide-4" name="q30-slide-4" style="background-image:url('<?php echo $src . $homepage_images[3]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>Delivering <a href="/work/all/td-bank-reporting">best-in-class reporting</a> to a global audience</h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-5" />
			</div>
		</div>
	</div>
	<div id="q30-slide-5" name="q30-slide-5" style="background-image:url('<?php echo $src . $homepage_images[4]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>Putting users on top of the <a href="/work/all/oha-education-website">learning curve</a></h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-6" />
			</div>
		</div>
	</div>
	<div id="q30-slide-6" name="q30-slide-6" style="background-image:url('<?php echo $src . $homepage_images[5]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2><a href="/work/all/cumbraes">Craving inducing</a> web design</h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-7" />
			</div>
		</div>
	</div>
	<div id="q30-slide-7" name="q30-slide-7" style="background-image:url('<?php echo $src . $homepage_images[6]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>Helping a <a href="/work/feature/scp">non-profit</a> tell their story and attract innovative partners</h2>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-8" />
			</div>
		</div>
	</div>
	<div id="q30-slide-8" name="q30-slide-8" style="background-image:url('<?php echo $src . $homepage_images[7]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-black"></div>
			<div class="q30-slide-content">
				<h2>We get to know your business, whether it’s:</h2>

				<?php if ( !$detect->isMobile() && $detect->isTablet() ) { ?>

				<ul class="q30-slide-list">
					<li>finance</li>
					<li>healthcare</li>
					<li>energy</li>
					<li>legal</li>
					<li>insurance</li>
					<li>non-profit</li>
				</ul>

				<?php } else { ?>

				<ul class="q30-slide-list-m">
					<li>finance</li>
					<li>healthcare</li>
					<li>energy</li>
					<li>legal</li>
					<li>insurance</li>
					<li>non-profit</li>
				</ul>

				<?php } ?>
			</div>
			<div class="q30-slide-next">
				<img src="/img/icons/q30-slide-next.png" alt="next slide" href="#q30-slide-9" />
			</div>
		</div>
	</div>
	<div id="q30-slide-9" name="q30-slide-9" style="background-image:url('<?php echo $src . $homepage_images[8]; ?>');">
		<div class="q30-slide-block">
			<div class="q30-slide-content">
				<h2>Do you have a story to tell?<br><a href="/contact/">Talk to us</a>.</h2>
				<h2><a tel="416.596.6500" class="no-deco">416.596.6500</a></h2>
				<h2><a href="mailto:info@q30design.com" class="no-deco">info@q30design.com</a></h2>
			</div>
			<div class="q30-slide-next">
				<p class="emphaszied white"><a href="#q30-slide-1" class="no-deco">Back to top</a></p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
<?php
if(!$detect->isMobile() || $detect->isTablet()):
?>
var _media = "standard"; 
<?php
else:
?>
var _media = "mobile"; 
<?php
endif;
?>
/* word functions */
var _animateRef = new Array();
var _animateList = function(_slide){
	var _slideList = $(_slide).find('.q30-slide-list').eq(0);
	var _slideChildren = $(_slideList).children();
	if(!_animateRef[_slide]){
		_animateRef[_slide] = 0;
	}
	if(_animateRef[_slide] < _slideChildren.length){
		$(_slideChildren[_animateRef[_slide]]).fadeIn( 399, function() {
			_animateRef[_slide]++;
			_animateList(_slide);
		});
	}
}
/* scroll functions */
var _scrollTop = 0;
var _scrollItems = 9;
var _scrollBlk = new Array();
var _scrollRef = new Array();
var _slideAbove = function(_slide){
	return $(_slide).offset().top - ($(_slide).height()/3);
}
var _updateScroll = function(){
	for(var q=1;q<_scrollItems;q++){
		if( _scrollTop > _slideAbove('#q30-slide-' + String(q)) && _scrollTop < _slideAbove('#q30-slide-' + String(q+1)) ){
			_scrollBlk['#q30-slide-' + String(q)] = $('#q30-slide-' + String(q)).find('.q30-slide-black').eq(0);
			if(!_scrollRef['#q30-slide-' + String(q)]){
				if(_media != "mobile"){ /* don't animate this for mobile */
					$(_scrollBlk['#q30-slide-' + String(q)]).delay(149).animate( { opacity:0 }, 499 );
				}
				_scrollRef['#q30-slide-' + String(q)] = 1;
				// check for slide 8
				if(String('#q30-slide-' + String(q)) == '#q30-slide-8'){
					_animateList('#q30-slide-8');
				}
			}
		}
	}
}
$(window).load(function(){
	_animateList('#q30-slide-1');
	_scrollTop = $(window).scrollTop();
	_updateScroll(_scrollTop);
	$(window).scroll(function(e){
		_scrollTop = $(window).scrollTop();
		_updateScroll(_scrollTop);
	});
});
$(document).ready(function(){
	$('.q30-slide-next img').click(function(event){
		var full_url = $(this).attr('href'),
			parts = full_url.split('#'),
			trgt = parts[1],
			target_offset = $('#'+trgt).offset(),
			target_top = target_offset.top;
		if(_media != "mobile"){ /* don't animate this for mobile */
			$('html, body').animate( { scrollTop:target_top }, 399 );
		}else{
			var _i = full_url.split('-').pop();
			var _n = (target_offset.top * _i) - target_offset.top;
			$('#q30-slides').animate( { scrollTop:_n }, 399 );
		}
	});
});
</script>
</body>
</html>