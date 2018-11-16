<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset= "<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<!-- La navigation -->
<div class="container">
    <?php wp_nav_menu(array(
            'theme_location' => 'menu-principal',
            'menu_class' => 'blog-nav list-inline'
    ));  ?>
</div>

<div class="container">
    <h1 class="blog-title"><?php bloginfo('name'); ?></h1>
    <?php $description = get_bloginfo('description', 'display'); ?>
        <?php if($description) { ?>
            <p class ="lead blog-description"><?php echo $description ?></p>
        <?php } ?> 
</div>


<div class="main">

</div>
    
