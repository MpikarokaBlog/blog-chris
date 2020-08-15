<?php
function bc_build_options_page()
{

    $theme_opts = get_option('bc_opts'); ?>

    <div class="container">

        <?php if(isset($_GET['status']) && $_GET['status'] == 1) { ?>
            <div class="alert alert-success">Mise à jour effectué avec succès.</div>
        <?php } ?>

        <div class="jumbotron jumbotron-fluid">
            <h1 class="h2 text-center font-italic">Paramètres du site.</h1>
        </div>
        <form action="admin-post.php" method="POST" id="form-bc-options" class="form-horizontal">
            <input type="hidden" name="action" value="bc_save_options">

            <?php wp_nonce_field('bc_options_verify'); ?>

            <!-- OPTION LOGO -->

            <div class="col-xs-12">
                <h1 class="h3">Logo en page d'accueil (haut de page)</h1>
                <div class="row">
                    <div class="col-lg-5">
                        <img id='img_preview_logo' src="<?= $theme_opts['image_logo_url']; ?>" alt="" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <button class="btn btn-primary btn-outline-dark" type="button" id="btn_img_01">Choisir une image pour le logo</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bc_image_url_logo" class="col-sm-2 control-label" style="color: #000">logo sauvegardée</label>
                    <div class="col-sm-10">
                        <input style="min-width: 500px" type="hidden" id="bc_image_url" name="bc_image_url" value="<?= $theme_opts['image_logo_url']; ?>"/>
                        <input style="min-width: 500px" type="text" id="bc_image_url_logo" name="bc_image_url_logo" disabled value="<?= $theme_opts['image_logo_url']; ?>"/>
                    </div>
                </div>
            </div>

            <!-- FIN OPTION LOGO -->

            <!-- OPTION BANNER -->

            <div class="col-xs-12">
                <h1 class="h3">Banner en page d'accueil (haut de page)</h1>
                <div class="row">
                    <div class="col-lg-5">
                        <img id='img_preview_banner' src="<?= $theme_opts['image_banner_url']; ?>" alt="" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <button class="btn btn-primary btn-outline-dark" type="button" id="btn_img_02">Choisir une image pour le banner</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bc_image_url_banner" class="col-sm-2 control-label" style="color: #000">image sauvegardée</label>
                    <div class="col-sm-10">
                        <input style="min-width: 500px" type="hidden" id="bc_image_banner_url" name="bc_image_banner_url" value="<?= $theme_opts['image_banner_url']; ?>"/>
                        <input style="min-width: 500px" type="text" id="bc_image_url_banner" name="bc_image_url_banner" disabled value="<?= $theme_opts['image_banner_url']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="bc_legend_logo" class="col-sm-2 control-label" style="color: #000">Légende</label>
                    <div class="col-sm-10">
                        <textarea style="min-width: 500px" name="bc_legend_logo" id="bc_legend_logo"><?= $theme_opts['legend_logo']; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- FIN OPTION BANNER -->

            <!-- OPTION FREEBIE -->

            <div class="col-xs-12">
                <h1 class="h3">Freebie en page d'accueil</h1>
                <div class="row">
                    <div class="col-lg-5">
                        <img id='img_preview_freebie' src="<?= $theme_opts['image_freebie_url']; ?>" alt="" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <button class="btn btn-primary btn-outline-dark" type="button" id="btn_img_03">Choisir une image pour le freebie</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bc_image_url_freebie" class="col-sm-2 control-label" style="color: #000">image sauvegardée</label>
                    <div class="col-sm-10">
                        <input style="min-width: 500px" type="hidden" id="bc_image_freebie_url" name="bc_image_freebie_url" value="<?= $theme_opts['image_freebie_url']; ?>"/>
                        <input style="min-width: 500px" type="text" id="bc_image_url_freebie" name="bc_image_url_freebie" disabled value="<?= $theme_opts['image_freebie_url']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="bc_legend_freebie" class="col-sm-2 control-label" style="color: #000">Légende</label>
                    <div class="col-sm-10">
                        <textarea style="min-width: 500px" name="bc_legend_freebie" id="bc_legend_freebie"><?= $theme_opts['legend_freebie']; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- FIN OPTION FREEBIE -->

            <button id="validator" class="btn btn-outline-success" type="submit">Mettre à jour</button>
        </form>
    </div>
<?php
}