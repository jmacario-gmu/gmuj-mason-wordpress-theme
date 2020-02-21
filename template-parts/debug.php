<section id="debug" style="display:none; background-color:#ccc;">
    <table>
        <tbody>
            <tr>
                <td colspan="2">Page Information</td>
            </tr>
            <tr>
                <td>is_home?</td>
                <td><?php echo is_home() ? "Yes" : "No" ?></td>
            </tr>
            <tr>
                <td>is_front_page?</td>
                <td><?php echo is_front_page() ? "Yes" : "No" ?></td>
            </tr>
            <tr>
                <td colspan="2">Theme Information</td>
            </tr>
            <tr>
                <td>Site Logo:</td>
                <td><?php echo get_theme_mod('site_logo') ?></td>
            </tr>
            <tr>
                <td>Theme Color:</td>
                <td><?php echo get_theme_mod('gmuj_theme_color') ?></td>
            </tr>
            <tr>
                <td>Homepage Mode:</td>
                <td><?php echo get_theme_mod('gmuj_homepage_header_mode') ?></td>
            </tr>
            <tr>
                <td>Show Utility Menu?:</td>
                <td><?php echo get_theme_mod('gmuj_show_university_menu') ?></td>
            </tr>

            <tr>
                <td>Mason Unit:</td>
                <td><?php echo get_theme_mod('gmuj_mason_unit') ?></td>
            </tr>
            <tr>
                <td>Mason Department:</td>
                <td><?php echo get_theme_mod('gmuj_mason_department') ?></td>
            </tr>
        </tbody>
    </table>
</section>