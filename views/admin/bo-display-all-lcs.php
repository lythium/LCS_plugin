<?php

// Remove the event with specified delete

global $wpdb;

$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category");

// Par exemple ici, on est plus dans du PHP que dans du HTML
if (!is_null($row)) {
    // var_dump($_GET);
    if (!empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // var_dump($delete_id);
        $wpdb->delete("{$wpdb->prefix}lcs_category", array("LCS_id" => $delete_id));
    }
}
?>

<div id="acf-field-group-wrap" class="wrap lcs-display">
    <div class="acf-columns-2">
        <h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
        <a class="page-title-action" href="<?= admin_url('admin.php?page=add_lcs') ?>" class="page-title-action">Ajouter</a>
        <p>Bienvenue sur la page d'accueil du plugin</p>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
                <tr>
                    <th scope="col" id="fields" class="manage-column column-cb id-column">ID</th>
                    <th scope="col" id="fields" class="manage-column column-title column-primary column-fields">Name</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Type</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Number Show</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Categories</th>
                    <th scope="col" id="fields" class="manage-column column-fields">Shortcode</th>
                </tr>
            </thead>
            <tbody id"the-list">
            <?php

            // Why repeat same request ?
            // $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category"); // <- One
            // if (!is_null($row)):
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category"); // <- Two
                if ($results):
                    foreach ($results as $key):
                        $id = $key->LCS_id;
                        $type = $key->LCS_Type;
                        $url_update =  "admin.php?page=update_lcs&select=".$id;
                        $url_delete = "admin.php?page=lcs&delete=".$id;
                        $categories_id = unserialize($key->Category_ID);
                        $select_id = "cb-select-" . $id;
            ?>
                        <tr class="iedit level-0 type-page status-publish hentry">
                            <!-- ID -->
                            <td class="id-column column">
                                <strong><span><?= $id ?></span></strong>
                            </td>
                            <!-- Title -->
                            <td class="column-primary" data-colname="Titre">
                                <div class="locked-info">';
                                    <span class="locked-avatar"></span>
                                    <span class="locked-text"></span>
                                </div>
                                <strong><a class="row-title" href=""><?= $key->LCS_Name ?></a></strong>
                                <!-- Actions -->
                                <div class="row-actions">
                                    <span class="edit inline">
                                        <!-- Update -->
                                        <input type="hidden" name="select_id" value="<?= $id ?>">
                                        <a href="<?= admin_url($url_update) ?>" >modifier</a>
                                    </span>
                                    <span class="inline"> | </span>
                                    <span class="trash inline">
                                        <!-- Delete -->
                                        <input type="hidden" name="delete" value="<?= $id ?>">
                                        <a href="<?= admin_url($url_delete) ?>">Supprimer</a>
                                    </span>
                                </div>
                            </td>
                            <!-- Type -->
                            <td class="title column-title has-row-actions column page-title">
                                <span>
                                    <strong>
                                    <?php if ($type === "1"): ?>
                                        <strong> Slide </strong>
                                    <?php elseif ($type === "2"): ?>
                                        <strong> Card </strong>
                                    <?php endif; ?>
                                </span>
                            </td>
                            <!-- Number -->
                            <td class="column">
                                <span>
                                    <strong><?= $key->LCS_number ?></strong>
                                </span>
                            </td>
                            <!-- Category -->
                            <td class="category-column column">
                                <?php foreach ($categories_id as $cat_id): ?>
                                    <span><?= get_cat_name($cat_id) ?>.</span><br>
                                <?php endforeach; ?>
                            </td>
                            <!-- Shortcode -->
                            <td class="column">
                                <span>
                                    <strong>[category_show num=<?= $key->LCS_id ?>]</strong>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-items">
                        <td class="colspanchange" colspan="7">Sorry, None Category Slide</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
