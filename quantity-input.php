<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

global $post;
$stock = get_post_meta( $post->ID, '_stock', true );
if ( $stock !== false ) {
    $stock = intval( $stock );
}
$min = intval( $min_value );
$max = intval( $max_value );
?>
<select id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
<?php
for ( $option = $min; $option <= $max; $option++ ) {
    print '<option value="' . $option . '">' . $option . '</option>';
}
?>
</select>