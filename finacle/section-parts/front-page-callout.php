<?php 
// To display Footer Call Out section on front page

$finacle_contact_section_hideshow = get_theme_mod('finacle_contact_section_hideshow','hide');
if ($finacle_contact_section_hideshow =='show') { 
    $ctah_btn_text = get_theme_mod('ctah_btn_text'); ?> 
 

<!-- Start call to action -->
           <div class="content-section black-bg ptb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div class="call-to-action">
                                <h2><?php echo esc_html(get_theme_mod('ctah_heading')); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <?php if (!empty($ctah_btn_text)) { ?>
                                <div class="call-to-action-btn">
                                    <a href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>" class="button active"><?php echo esc_html($ctah_btn_text); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

<!-- End call to action -->

<?php } ?>  
       
 