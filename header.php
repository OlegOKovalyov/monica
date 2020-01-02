<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <link href="<?php echo get_template_directory_uri()?>/img/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <?php wp_head(); ?>
  <meta name="yandex-verification" content="e24c778a84760452" />
<script type="text/javascript">
  
 window.onload= function() {

    document.getElementsByClassName('entry-item ').onclick = function() {

    var div = document.getElementsByClassName('authorbox');

    if(div.style.display == 'none') {

        div.style.display = 'block';

 

    };

}};

  </script>
  
<!--   <script type="text/javascript">
var proportion = 860/14;
function resizeFont() { document.body.style.fontSize = parseInt(document.body.offsetWidth/proportion) + 'px' }
onload = onresize = resizeFont;
if (document.addEventListener) document.addEventListener("DOMContentLoaded", resizeFont, null);
</script> -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88635334-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'monica_before_site' ); ?>


<div class="site-content" id="sb-site">

    <?php get_template_part( 'template/header' ); ?>