# Création d'un widget qui intègre sur votre site internet les tweets de votre compte twitter

## du coté de twitter

1.	aller sur https://publish.twitter.com/#
2.	Enter l'url de l'utilistaeur dont on veut partager les tweets. Moi je l'ai fait pour la boite ou j'ai fait mon stage :  https://twitter.com/haemerstech?lang=fr
3.	Choisir Embedded Timeline
4.	Vous pouvez changer un peu le visuel en cliquant sur set customization options
5.	Copier le lien

## le widget

### 1. Créer sa nouvelle zone de widget

Dans votre theme, dans le fichier function.php :

```php
// Les widgets
function widget_initialiser(){
    // register_sidebar : permet de définir une nouvelle zone de widgets
    register_sidebar(array(
        'name' => 'droite_widget',
        'id' => 'droite_widget',
        'before_widget' => '<div class="twitter">',
        'after_widget' => '</div>',
        'before_title' => '<h4>', 
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'widget_initialiser');
```
Nos zones de widgets apparraissent maintenant dans Apparence/Widgets

### 2. Déclarer le widget, mode d'emploi

1. wp-content/theme/votretheme/plugins/créer un dossier qui va contenir tout vos plugins/widgets : chez moi MariePlugin
2. Créez un fichier qui appelera tous vos différents plugins. Moi il se nomme mariePlugin.php

```php
// Déclarer le widget
<?php
/*
Plugin Name: mariePlugin
Plugin URI: http://mariePlugin.com
Description: Un plugin d'introduction pour le développement sous WordPress
Version: 0.1
Author: Thielens Marie
Author URI: http://www.thielens-marie.be
License: GPL2
*/
class MariePlugin
{
    public function __construct()
    {
        // Va me chercher mon fichier twhitterwidget.php
        include_once plugin_dir_path( __FILE__). '/twitterwidget.php';
        // un objet à partir de sa classe 
        new Twitter_widget(); 
    }
}
new MariePlugin();
```

## 3. fichier twitterWidget.php

```php
<?php

class Twitter_widget extends WP_Widget
{
public function __construct()
{
parent::__construct('twitter', 'twitter', array('description' => 'Un
widget pour tweeter'));
}
// Visuel dans le site (pas le dashboard)
public function widget($args, $instance)
{
    echo $args['before_widget'];
    ?>
    <h2 class="white">Lastest Tweets</h2>
    <a class="twitter-timeline" data-width="288" data-height="628" data-theme="dark" data-link-color="#E95F28" href="https://twitter.com/HaemersTech?ref_src=twsrc%5Etfw">Tweets by
    HaemersTech</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> <?php
    echo $args['after_widget'];
}
public function update($new_instance, $old_instance)
{

}
// Visuel dans le dashboard
public function form($instance)
{

}
}

add_action('widgets_init', function(){register_widget('Twitter_Widget');});

?>
```

## 4. Afficher le widget dans la page souhaitée

Moi je vais le mettre dans le fichier sidebar.php

```PHP
if (is_active_sidebar('droite_twitter') ) : ?>
<div id="droite_twitter" class="droite_twitter">
    <?php dynamic_sidebar('droite_twitter'); ?>
</div>
<?php endif;
?>
```

Et je rajoute un peu de style dans mon style.css (de mon theme)

```css
#droite_twitter{
    float:right;
    margin-right:5%;
}
```

