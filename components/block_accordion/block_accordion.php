<?php
  $component_path = 'block_accordion';
  $accordion_items = get_sub_field('accordion');

  $margin = get_component_options('margins'); 
  $padding = get_component_options('paddings'); 
  $width = get_component_options('width');         
  
  $header = get_component_options('header');
  $show_header = get_component_options('show_header');
  $header_size = get_component_options('header_size');    
  $header_font = get_component_options('header_font');
  $header_colour = get_component_options('header_colour');  
  $header_alignment = get_component_options('header_alignment');  
?>

<div class="<?php echo $component_path; ?>-content"> 

  <div class="container <?php echo $component_path.' '.$width.' '.$margin.' '.$padding; ?>"> 

    <?php if(($show_header) && ($header != null)){
      echo "<{$header_size} class='{$component_path}-header {$header_font} {$header_colour} {$header_alignment}'>{$header}</{$header_size}>";
    } ?>
  	
  	<?php
      if($accordion_items){ 
        $i = 0;
      ?>
      
      <div class="accordion" id="accordion">
          <?php foreach($accordion_items as $accordion_item){ 
            $i++;
          ?>
            
            <div class="accordion-item">               
              
              <h2 class="accordion-header">
                <button class="accordion-button"                         
                        data-bs-toggle="collapse" 
                        data-bs-target="#accordion-collapse-<?php echo $i; ?>">
                  
                  <?php echo $accordion_item['question']; ?>  
                
                </button>
              </h2>                                           
              
              <div id="accordion-collapse-<?php echo $i; ?>" 
                    class="collapse"                     
                    data-bs-parent="#accordion">
                
                <div class="accordion-body">
                  <?php echo $accordion_item['answer']; ?>                  
                </div>

              </div>              

            </div>                        

        <?php } ?>
      
      </div>
    <?php } ?>
  
  </div>

</div><!-- ./<?php echo $component_path; ?>-content -->

<?php
  /* - - - - - - - - - - - - - - - - - - - - - - - - -
   * Enqueue scripts
   *
   * Variables:
   * COMPONENT_URI: defined in 'functions.php'
   *
   * - - - - - - - - - - - - - - - - - - - - - - - - -
   */
  $component_version = CACHE_BUSTER;
  wp_register_style( $component_path.'-stylesheet', get_template_directory_uri() . '/dist/css/components/'.$component_path.'/'.$component_path.'.css', false, $component_version );
  wp_enqueue_style( $component_path.'-stylesheet' );
  wp_register_script( $component_path.'-javascript', get_template_directory_uri() . '/dist/js/components/'.$component_path.'.js', array('jquery'), false, true );
  wp_enqueue_script( $component_path.'-javascript' );
?>