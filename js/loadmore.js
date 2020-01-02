jQuery(function($){
	$('#true_loadmore').click(function(){
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl, 
			data:data, 
			type:'POST', 
			success:function(data){
				if( data ) { 
					$('.weinnewsposts').append(data);
					//$('#true_loadmore').before(data); 
					current_page++; 
					if (current_page == max_pages) $("#true_loadmore").remove(); 
				} else {
					$('#true_loadmore').remove();
				}
			}
		});
	});
});