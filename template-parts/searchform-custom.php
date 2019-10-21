<?php
/**
 * Widget template for display search form in search widget.
 * 
 * @package bootstrap-basic4
 */
?>

<form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input class="form-control keyword-field" type="search" name="s" value="<?php esc_attr_e(get_search_query()); ?>" placeholder="Search..." required>

        <?php
          /* $terms = get_terms(array(
              'taxonomy' => 'service_category',
              'hide_empty' => true)
          );
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
            <span class="input-group-append category-wrap">
              <select id="category-selector" class="category-field">
                <option>Select Topic</option>
                <?php 
                  foreach ($terms as $term) {
                    printf('<option data-taxonomy="service_category" value="%2$s" %3$s>%1$s</option>', $term->name, $term->term_id, $_GET['terms'] == $term->term_id ? 'selected' : '');
                  }
                ?>
              </select>
            </span>
        <?php
          endif; */
        ?>

        <span class="input-group-append submit-wrap">
            <button class="btn btn-outline-secondary" type="submit"><?php _e('Search', 'bootstrap-basic4'); ?></button>
        </span>
    </div>
</form>