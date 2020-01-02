<div class="column col-xs-12 col-sm-6 col-lg-4 col-md-4">
   <article class="entry-item border post-4311 post type-post status-publish format-standard has-post-thumbnail hentry category-mi-v-zmi">
      <div class="entry-media">
         <?php the_post_thumbnail('makeit_thumb');?>
               </div>
               <div class="entry-content-container">
                  <div class="entry-title">
                     <h4 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>

                  </div>
                  <div class="entry-summary"><?php the_excerpt(); ?> 
                  </div>
                  <div class="entry-link heading-font">
                     <a href="<?php echo get_permalink(); ?>"><?php _e("[:ua]Читати далі[:en]Read full[:ru]Читать далее[:]"); ?></a>
                  </div>
               </div>
         </article>
</div>


