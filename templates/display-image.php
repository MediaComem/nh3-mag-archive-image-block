<?php
/**
 * Template used to display both Featured Images and Photo Documents
 * The presence of a $size = 'full' indicates that the image is a featured image and all content should be displayed
 * This value is also used to add or remove a surrounding `div.wp-media-wrapper` around the img tag
 */
?>
<?php $nh3_blocks_with_caption = isset($att['caption']) && (!isset($size) || 'mini' !== $size); ?>
<?php $nh3_blocks_with_credit = isset($att['credit']) && (!isset($size) || 'mini' !== $size); ?>
<?php if (isset( $att['fileUrl'] ) ) : ?>

  <?php // Add wrapper div if no $size value, or a $size value different thant 'mini' ?>
  <?php if ( ! isset( $size ) || 'mini' !== $size ) : ?>
  <div class="wp-media-wrapper">
  <?php endif; ?>
      <img
        width="<?php echo esc_attr( isset( $att['width'] ) ? $att['width'] : '' ); ?>"
        height="<?php echo esc_attr( isset( $att['height'] ) ? $att['height'] : '' ); ?>"
        alt="<?php echo esc_attr( isset( $att['title'] ) ? $att['title'] : '' ); ?>"
        src="<?php echo esc_attr( $att['fileUrl'] ); ?>"/>
  <?php if ( ! isset( $size ) || 'mini' !== $size ) : ?>
  </div>
  <?php endif; ?>

  <?php if ( $nh3_blocks_with_caption || $nh3_blocks_with_credit ) : ?>
    <figcaption>
      <!-- Caption -->
      <?php if ( $nh3_blocks_with_caption ) : ?>
        <p class="post-block__media-caption"><?php echo esc_html( $att['caption'] ); ?></p>
      <?php endif; ?>
      <!-- Credit -->
      <?php if ( $nh3_blocks_with_credit ) : ?>
        <p class="post-block__media-credits">
          <a href="<?php echo esc_url( NH3_BLOCKS_SITE_URLS[$att['platform']] ); ?>/entries/<?php echo esc_attr( $att['hash'] ); ?>" target="_blank">
            <?php echo esc_html( $att['credit'] ); ?>
          </a>
        </p>
      <?php endif; ?>
    </figcaption>
  <?php endif; ?>
<?php endif; ?>
