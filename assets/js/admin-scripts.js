jQuery(document).ready(function($) {
	'use strict';

	/**
     * Radio Image control in customizer
     */
    // Use buttonset() for radio images.
    $( '.lc-meta-options-wrap .buttonset' ).buttonset();


    /**
     * Meta tabs and its content
     */
    $('.lc-meta-menu-wrapper li').click(function() {
        var tabIdRaw = $(this).attr('id');
        var tabId = tabIdRaw.split('-');
        $('.lc-single-meta').hide();
        $('#lc-'+tabId[1]+'-content').fadeIn();
    });
});