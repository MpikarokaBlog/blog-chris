jQuery(document).ready(function ($) {

//=============================================
//=        SELECTION D'UNE IMAGE
//=============================================
    let frame1 = wp.media({
        title: 'Sélectionner un logo',
        button: {
            text: 'Utiliser ce média'        
        },
        multiple: false
    });

    let frame2 = wp.media({
        title: 'Sélectionner une banner',
        button: {
            text: 'Utiliser ce média'        
        },
        multiple: false
    });

    let frame3 = wp.media({
        title: 'Sélectionner un freebie',
        button: {
            text: 'Utiliser ce média'        
        },
        multiple: false
    });

    $("#form-bc-options #btn_img_01").click(function(e){
        e.preventDefault();
        frame1.open();
    });

    $("#form-bc-options #btn_img_02").click(function(e){
        e.preventDefault();
        frame2.open();
    });

    $("#form-bc-options #btn_img_03").click(function(e){
        e.preventDefault();
        frame3.open();
    });

    frame1.on('select', function() {
        let image = frame1.state().get('selection').first().toJSON();
        let url = image.sizes.full.url;

        $("#img_preview_logo").attr('src', url);
        $("#bc_image_url").attr('value', url);
        $("#bc_image_url_logo").attr('value', url);
    });

    frame2.on('select', function() {    	
        let image = frame2.state().get('selection').first().toJSON();
        let url = image.sizes.full.url;

        $("#img_preview_banner").attr('src', url);
        $("#bc_image_banner_url").attr('value', url);
        $("#bc_image_url_banner").attr('value', url);
    });

    frame3.on('select', function() {    	
        let image = frame3.state().get('selection').first().toJSON();
        let url = image.sizes.full.url;

        $("#img_preview_freebie").attr('src', url);
        $("#bc_image_freebie_url").attr('value', url);
        $("#bc_image_url_freebie").attr('value', url);
    });
});