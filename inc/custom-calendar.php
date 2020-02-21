<?php

// Modify calendar to support Bootstrap 4 style.
add_filter('get_calendar', 'modifyCalendarWidget', 10, 1);

function modifyCalendarWidget($calendar){
	// Modify calendar widget to support Bootstrap 4 style.
	// $calendar is the WordPress original calendar widget

    $new_calendar = preg_replace('#(<table*\s)(id="wp-calendar")#i', '$1 id="wp-calendar" class="table"', $calendar);
    $new_calendar = '<div class="table-responsive">' . $new_calendar . '</div>';
    return $new_calendar;
}
