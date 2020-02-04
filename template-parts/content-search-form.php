<!-- search form -->
<form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input class="form-control keyword-field" type="search" name="s" value="<?php esc_attr_e(get_search_query()); ?>" placeholder="Search..." required>

        <span class="input-group-append submit-wrap">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </span>
    </div>
</form>