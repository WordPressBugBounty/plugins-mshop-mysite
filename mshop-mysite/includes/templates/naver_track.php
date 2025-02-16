<?php
wp_enqueue_script( 'mysite-naver-track', 'https://wcs.naver.net/wcslog.js', array(), MSHOP_OWNERSHIP_VERIFICATION_VERSION );

ob_start();
?>
<script>
    if (!wcs_add) var wcs_add={};
    wcs_add["wa"] = "<?php echo $content_id['track_content'] ?>";
    if (!_nasa) var _nasa={};
    wcs.inflow();
    wcs_do(_nasa);
</script>
<?php
$inline_script = ob_get_clean();
$inline_script = trim( preg_replace( '#<script[^>]*>(.*)</script>#is', '$1', $inline_script ) );

wp_add_inline_script( 'mysite-naver-track', $inline_script );
wp_print_scripts( 'mysite-naver-track' );