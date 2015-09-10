<?php

add_action('init', 'cptui_register_my_taxes_product_categories');
function cptui_register_my_taxes_product_categories()
{
    register_taxonomy('product-categories', array(
            0 => 'product',
        ),
        array('hierarchical'      => true,
              'label'             => 'Produkt-Kategorien',
              'show_ui'           => true,
              'query_var'         => true,
              'show_admin_column' => true,
              'labels'            => array(
                  'search_items'               => 'Produkt-Kategorie',
                  'popular_items'              => 'Beliebte Produkt-Kategorien',
                  'all_items'                  => 'Alle Produkt-Kategorien',
                  'parent_item'                => 'Übergeordnete Produkt-Kategorie',
                  'parent_item_colon'          => 'Übergeordnete Produkt-Kategorie:',
                  'edit_item'                  => 'Produkt-Kategorien bearbeiten',
                  'update_item'                => 'Produkt-Kategorie aktualisieren',
                  'add_new_item'               => 'Neue Produkt-Kategorie hinzufügen',
                  'new_item_name'              => 'Neuer Produkt-Kategorien-Name',
                  'separate_items_with_commas' => '',
                  'add_or_remove_items'        => 'Produkt-Kategorien hinzufügen oder löschen',
                  'choose_from_most_used'      => 'Aus den am häufigsten verwendeten Produkt-Kategorien auswählen',
              )
        ));
}