    <?php get_template_part( 'template/footer' ); ?>
</div><!-- // .site-content -->

<?php
    do_action( 'monica_end_site' );
    wp_footer();
?>
<script>
	jQuery(document).ready(function($){
		// if($("body").hasClass("postid-2346")){
		// 	$("body").append("<div class='gallery-link'><a href='/fotoblog/'><div class='gallery-link-text'><?php _e('[:ua]ФОТО:<br> ми і наші <br> улюбленці[:][:ru]ФОТО:<br> мы и наши <br> питомцы[:][:en]PHOTOS:<br> we and our <br> pets[:]') ?></div><div class='gallery-link-img'><img src='<?php echo get_stylesheet_directory_uri() ?>/img/fotoblog.png' alt='photo' /></div></a><span class='close'></span></div>");
		// }
		// setTimeout(function(){
		// 	$( ".gallery-link-img" ).animate({
		// 	    marginRight: 0,
		// 	}, 1000);
		// }, 5000);

		// setTimeout(function(){
		// 	$( ".gallery-link .close" ).animate({
		// 	    opacity: 1,
		// 	}, 1000);
		// }, 6000);

		// setTimeout(function(){
		// 	$( ".gallery-link-text" ).animate({
		// 	    opacity: 1,
		// 	}, 1000);
		// }, 6000);

		// $(".gallery-link .close").click(function(){
		// 	$( ".gallery-link" ).animate({
		// 	    right: -350,
		// 	}, 500);
		// });


		//photoblog
		$(".wonderplugin-gridgallery-item").mouseenter(function(){
			var height = $(".wonderplugin-gridgallery-item-text").innerHeight();
			$(this).find(".wonderplugin-gridgallery-item-img").animate({
			    marginTop: '-='+height/2+'px',
			}, 300);
		});

		$(".wonderplugin-gridgallery-item").mouseleave(function(){
			var height = $(".wonderplugin-gridgallery-item-text").innerHeight();
			$(this).find(".wonderplugin-gridgallery-item-img").animate({
			    marginTop: '+='+height/2+'px',
			}, 300);
		});
	});
</script>
</body>
</html>