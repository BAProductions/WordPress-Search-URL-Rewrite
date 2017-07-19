<?php
function fb_change_search_url_rewrite() {
global $wp_rewrite;
	if( $wp_rewrite->using_permalinks() ){
		if ( is_search() && ! empty( $_GET['s'] ) ) {
			if(get_query_var( 'paged' ) == 0){
				wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) . '');
				exit();
			}else{
				wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) . '/page/' . urlencode( get_query_var( 'paged' ) ) . '');
				exit();
			}
		}
	}else{
		if ( is_search() && ! empty( $_GET['s'] ) ) {
			wp_redirect( home_url( "?s=" ) . urlencode( get_query_var( 's' ) ) . '&paged=' . urlencode( get_query_var( 'paged' ) ) . '');
			exit();
		}
	}
}
add_action( 'template_redirect', 'fb_change_search_url_rewrite' );
?>
