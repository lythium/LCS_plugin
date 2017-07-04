<div class="row card-container-lcs lcs_<?= $id_shortcode ?>">
    <?php foreach ($categories_id as $cat_id): ?>
        <div class="card_lcs" style="width:<?= $col_size ?>">
            <div class="inter-card-lcs">
                <div class="in-card_lcs">
					<?php if ($display_name === "none"):?>
						<div class="category_name_lcs inline text-center" style="display:none;">
					<?php else: ?>
						<div class="category_name_lcs inline text-center">
					<?php endif; ?>
                        <a class="" href="<?= get_category_link($cat_id) ?>">
                            <h3><?= substrwords(get_cat_name($cat_id), 15) ?></h3>
                        </a>
                    </div>
                    <div class="img-card-lcs">
                        <?php
                            $posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
                            $id_last = $posts_last[0]->ID;
                        ?>
                        <div class="card-lcs-last-post">
                            <a class="card-lcs-link" href="<?= get_category_link($cat_id) ?>">
                                <?php if (has_post_thumbnail($id_last)): ?>
                                    <?= get_the_post_thumbnail($id_last, 'thumbnail', array( 'class' => 'image-card' )); ?>
                                <?php else: ?>
                                    <img class="image-card" src="<?= plugin_dir_url(__FILE__) ?>default.jpg">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
