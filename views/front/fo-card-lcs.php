<div class="row card-container-lcs lcs_<?= $id_shortcode ?>">
    <div class="card-in-container-lcs">
    <?php $categories_id = unserialize($key->Category_ID); ?>
    <?php foreach ($categories_id as $cat_id): ?>
        <div class="<?= esc_attr($col_size) ?> card_lcs">
            <div class="inter-card-lcs">
                <div class="in-card_lcs">
                    <div class="category_name_lcs inline text-center">
                        <a class="" href="<?= get_category_link($cat_id) ?>">
                            <h3><?= substrwords(get_cat_name($cat_id), 15) ?></h3>
                        </a>
                    </div>
                    <div class="col-md-12 img-card-lcs">
                        <?php
                            $posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
                            $id_last = $posts_last[0]->ID;
                        ?>
                        <div class="card-lcs-last-post">
                            <a class="card-lcs-link" href="<?= get_category_link($cat_id) ?>">
                                <?php if (has_post_thumbnail($id_last)): ?>
                                    <?= get_the_post_thumbnail($id_last, 'thumbnail', array( 'class' => 'col-md-12' )); ?>
                                <?php else: ?>
                                    <img class="col-md-12" src="<?= plugin_dir_url(__FILE__) ?>default.jpg">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
