jQuery(document).ready(function($){
    "use strict";
    jQuery('.progress-item').waypoint(function() {

        var a = jQuery( this ).find( '.progress-status' ).data( 'percent' );
        jQuery( this ).find( '.progress-status' ).css( 'min-width', a+'%' );

        },{offset: '75%',triggerOnce: true});
});