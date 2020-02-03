<?php

// Custom dashboard content

  // Add meta boxes
  add_action('wp_dashboard_setup', 'gmuj_custom_dashboard_meta_boxes');
  function gmuj_custom_dashboard_meta_boxes() {
    // Adds custom WordPress dashboard content boxes

    global $wp_meta_boxes;
    
    // 'theme info' meta box
    add_meta_box("gmuj_custom_dashboard_meta_box_theme_info", "Mason WordPress Theme Info", "gmuj_custom_dashboard_meta_box_theme_info", "dashboard","side");

     /* 'theme support' meta box */
    add_meta_box("gmuj_custom_dashboard_meta_box_theme_support", "Mason WordPress Theme Support", "gmuj_custom_dashboard_meta_box_theme_support", "dashboard","normal");

    /* 'Mason resources' meta box */
    add_meta_box("gmuj_custom_dashboard_meta_box_mason_resources", "Mason Resources", "gmuj_custom_dashboard_meta_box_mason_resources", "dashboard","normal");

  }

  /* WordPress dashboard meta box content: theme info */
  function gmuj_custom_dashboard_meta_box_theme_info()
  {
      echo "<p><strong>Recommended Image Sizes</strong></p>";
      echo "<table>";
      echo "<tr><th style='text-align:left; vertical-align:top;'>Site Logo</th><td>Recommended Size: 200px wide</td></tr>";
      echo "<tr><th style='text-align:left; vertical-align:top;'>Banner Image</th><td>Minimum Size: 1000px wide by 270px high<br />Images taller than this minimum size will be centered in desktop view. As the window width shrinks on smaller screens the top and bottom of the image will become visible.</td></tr>";
      echo "</table>";
  }

  /* WordPress dashboard meta box content: theme support */
  function gmuj_custom_dashboard_meta_box_theme_support() {
    echo '<p>Welcome to the Mason WordPress Theme!</p>';
    echo '<p>Need help?</p>';
    echo '<p>For general inquiries, contact the Mason webmaster team at <a href="mailto:webmaster@gmu.edu">webmaster@gmu.edu</a>.</p>';
    echo '<p>For more in-depth questions or requests, please <a href="https://gmu.teamdynamix.com/TDClient/33/Portal/Requests/TicketRequests/NewForm?ID=HyCYnjyvSqI_" target="_blank">submit a ticket to the webmaster team</a>.</p>';
  }

  /* WordPress dashboard meta box content: Mason resources */
  function gmuj_custom_dashboard_meta_box_mason_resources() {
    echo '<ul>';
    echo '<li><a href="https://brand.gmu.edu/" target="_blank">Mason Brand Profile</a></li>';
    echo '<li><a href="https://brand.gmu.edu/visual-identity-and-style/color/" target="_blank">Mason Colors</a></li>';
    echo '<li><a href="https://webinfo.gmu.edu/" target="_blank">Mason Web Standards</a></li>';
    echo '<li><a href="https://webdev.gmu.edu/" target="_blank">Mason Web Development</a></li>';
    echo '</ul>';
  }

  // Customize admin dashboard footer
    add_filter('admin_footer_text', 'gmuj_replace_footer_admin');
    function gmuj_replace_footer_admin() {
      echo 'Designed by: George Mason University - Information Technology Services - Web Applications and Services- <a href="mailto:webmaster@gmu.edu">Contact Us</a> - <a href="https://gmu.teamdynamix.com/TDClient/33/Portal/Requests/TicketRequests/NewForm?ID=HyCYnjyvSqI_" target="_blank">Submit a Ticket</a>';
    }