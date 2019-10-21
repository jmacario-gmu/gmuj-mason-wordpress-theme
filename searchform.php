<?php
/**
 * Widget template for display search form in search widget.
 * 
 * @package bootstrap-basic4
 */
?>

<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input class="form-control" type="search" name="s" value="<?php esc_attr_e(get_search_query()); ?>" placeholder="" required>
        <span class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </span>
    </div>
</form>