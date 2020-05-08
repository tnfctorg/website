<?php if( get_theme_mod('vw_charity_ngo_topbar_hide_show') != ''){ ?>
  <div id="top-bar">
    <div class="container">
      <div class="row m-0">
        <div class="col-lg-9 col-md-9 p-0">
          <div class="row m-0">        
            <div class="col-lg-4 col-md-4">
              <?php if ( get_theme_mod('vw_charity_ngo_address','') != "" ) {?>
                <span class="email"><i class="<?php echo esc_attr(get_theme_mod('vw_charity_ngo_topbar_location_icon','fas fa-map-marker-alt')); ?>"></i><?php echo esc_html( get_theme_mod('vw_charity_ngo_address','') ); ?></span>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php if ( get_theme_mod('vw_charity_ngo_contact','') != "" ) {?>
                <span class="call"><i class="<?php echo esc_attr(get_theme_mod('vw_charity_ngo_contact_no_icon','fas fa-mobile-alt')); ?>"></i><?php echo esc_html( get_theme_mod('vw_charity_ngo_contact','')); ?></span>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php if ( get_theme_mod('vw_charity_ngo_email','') != "" ) {?>
                <span class="email"><i class="<?php echo esc_attr(get_theme_mod('vw_charity_ngo_email_address_icon','fa fa-envelope')); ?>"></i><?php echo esc_html( get_theme_mod('vw_charity_ngo_email','')); ?></span>
              <?php }?>
            </div>        
          </div>
        </div>
        <div class="col-lg-3 col-md-3 p-0">
          <?php dynamic_sidebar('social-icon') ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>