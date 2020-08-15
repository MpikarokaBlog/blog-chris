<?php 
function bc_save_options()  {

    if(current_user_can( 'publish_pages' ) == false) {
        wp_die('Vous n\'êtes pas autorisé à effectuer cette opération.');
    }
    check_admin_referer( 'bc_options_verify');
    $opts = get_option('bc_opts');

    // sauvegarde de la légende
    $opts['legend_logo'] = sanitize_text_field( $_POST['bc_legend_logo'] );
    $opts['image_logo_url'] = sanitize_text_field( $_POST['bc_image_url'] );
    $opts['image_banner_url'] = sanitize_text_field( $_POST['bc_image_banner_url'] );
    $opts['image_freebie_url'] = sanitize_text_field( $_POST['bc_image_freebie_url'] );
    $opts['legend_freebie'] = sanitize_text_field( $_POST['bc_legend_freebie'] );
    
    update_option( 'bc_opts', $opts );
    wp_redirect(admin_url('admin.php?page=bc_theme_opts&status=1'));
    exit;
}