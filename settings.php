<?php
// Create menu item and page
function truncate_text_settings_menu() {
  add_options_page( 'Truncate Text Settings', 'Truncate Text', 'manage_options', 'truncate-text-settings', 'truncate_text_settings_page' );
}
add_action( 'admin_menu', 'truncate_text_settings_menu' );

// Settings page
function truncate_text_settings_page() {
  if ( !current_user_can( 'manage_options' ) ) {
    wp_die( 'You do not have sufficient permissions to access this page.' );
  }
  ?>
  <div class="wrap">
    <h1 style="display:none;"></h1>
    <div class="head-wrap" style="width:100%;text-align:left;padding-top:20px;">
      <img src="<?php echo plugins_url( 'admin/images/settings-head-02.png', __FILE__ ); ?>" alt="Truncate Text by WebPro" style="width:300px;" />
    </div>
    <h1><b>Shortcode Usage</b></h1>
    <ul style="list-style-type:square;padding-left:20px;">
      <li>Use the <b>[truncate-text]</b> shortcode in your post or page content to truncate the text.<br>
      <i>Example:</i> [truncate-text]This is the text to truncate.[/truncate-text].<br>
      <i>Output:</i> This i...ncate.</li>
      <li>Use the <b>[truncate-shortcode]</b> shortcode in your post or page content to process other shortcodes in the content before truncating it.<br>
      <i>Example:</i> [truncate-shortcode][another-shortcode][/truncate-shortcode].<br>
      <i>Output:</i> This depends on what the internal shortcode is processing.</li>
    </ul>
    <h3>Optional Attributes</h3>
    <p>These optional attributes apply to both shortcodes.</p>
    <ul style="list-style-type:square;padding-left:20px;">
      <li><b>limit</b> - Specify the number of characters you want to display using the limit attribute. The defult is 6.<br>
      <i>Example:</i> [truncate-text limit="8"]This is the long text that will be truncated[/truncate-text].</li>
      <li><b>encoding</b> - Specify the encoding you would like to use by using the encoding attribute. The default is UTF-8.<br>
      <i>Example:</i> [truncate-text limit="8" encoding="ISO-8859-1"].</li>
    </ul>
  </div>
  <?php
}
