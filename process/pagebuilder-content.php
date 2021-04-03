<?php
?>
<h2>ACF FIELDS</h2>
<?php
global $post;
echo 'hellooo';
the_field('title', echo $post->ID);