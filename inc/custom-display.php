<?php

// General

	// Modify title separator
	add_filter('document_title_separator', 'modifyTitleSeparator');

	function modifyTitleSeparator(){
	    global $config_title_separator;

	    return $config_title_separator;
	}

	// Modify excerpt 'read more' text (default is [...])
	add_filter('excerpt_more', 'modifyExcerptMore');

	function modifyExcerptMore($more){
	    global $post;
	    global $config_read_more_link_text;

	    return '&hellip; <a class="moretag" href="'. get_permalink($post->ID) . '">'.$config_read_more_link_text.'</a>';
	}

// Pagination

	// Modify pagination page link
	add_filter('wp_link_pages_link', 'paginationPageLink', 10, 2);

	function paginationPageLink($link, $i){
	    if (strpos($link, '<a') === false) {
	        return '<li class="page-item active"><a class="page-link" href="#">' . $link . '</a></li>';
	    } else {
	        $link = str_ireplace('<a', '<a class="page-link"', $link);
	        return '<li class="page-item">' . $link . '</li>';
	    }
	}

// Comments

	// Modify comment reply link class
	add_filter('comment_reply_link', 'modifyCommentReplyLinkClass');

	function modifyCommentReplyLinkClass($class){
	    $class = str_ireplace('comment-reply-link', 'comment-reply-link btn btn-light btn-sm', $class);
	    $class = str_ireplace('comment-reply-login', 'comment-reply-login btn btn-light btn-sm', $class);
	    return $class;
	}

	// Modify comment navigation previous/next link attributes
	add_filter('previous_comments_link_attributes', 'modifyCommentNavLinkPrevious');
	add_filter('next_comments_link_attributes', 'modifyCommentNavLinkNext');

	function modifyCommentNavLinkPrevious($attributes){
	    return modifyCommentNavLink($attributes, 'previous');
	}

	function modifyCommentNavLinkNext($attributes){
	    return modifyCommentNavLink($attributes, 'next');
	}

	function modifyCommentNavLink($attributes, $nav){
	    $attributes = 'class="btn btn-light';
	    if ($nav == 'next') {
	        $attributes .= ' float-right';
	    } else {
	        $attributes .= ' float-left';
	    }
	    $attributes .= '"';

	    return $attributes;
	}

// Image links

	// Modify previous/next image links
	add_filter('previous_image_link', 'modifyPreviousNextImageLink');
	add_filter('next_image_link', 'modifyPreviousNextImageLink');

	function modifyPreviousNextImageLink($link) {
	    return str_replace( '<a ', '<a class="btn btn-outline-secondary" ', $link );
	}