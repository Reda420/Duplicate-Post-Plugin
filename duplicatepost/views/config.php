    <div class="wrap">
        <h1>Reglages de Duplicate Post</h1>
        <form action="options.php"  method="POST">
            <?php settings_fields('general');?>
            <?php do_settings_sections('duplicate_post');?>
            <?php submit_button();?>
        </form>
    </div>