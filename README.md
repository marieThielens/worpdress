# worpdress

WordPress est le CMS le plus répandu actuellement sur le web ( on parle de plus de 30% de parts de marché source). Cette popularité en fait un outil intéressant pour le déploiement rapide. De plus, il n'est pas rare que votre client aie déjà utilisé WordPress, ce qui a l'avantage qu'il connaisse déjà son futur outil.

WordPress nécessite PHP et MySQL. À l'origine, c'était surtout un outil pour gérer un blog, donc un journal personnel, en ligne. C'est pourquoi, quand on installe WordPress, on peut par défaut créer des articles et des pages, et avoir des commentaires sous ses articles. Avec le temps, l'outil est devenu hyper flexible et si on sait coder (comme toi), on peut à peu près tout faire avec WordPress.

Au terme de ce parcours, tu seras capable de créer un premier site "custom" sur WordPress et son écosystème commencera à t'être familier. Ce n'est que du PHP, du SQL, du HTML, du CSS et du javascript après tout !

## Bonne pratique de sécurité

1) __Fichier .htaccess__

Empêcher d'écrire dans l'url (wp-admin) par exemple.

```PHP
    <Files wp-config.php>
       order allow,deny
       deny from all
    </Files>

    Options All -Indexes

    <Files .htaccess>
       order allow,deny 
       deny from all 
    </Files>
```


2) __Readme.html__

Supprimer le fichier readme.html (à la racine). Il donne beaucoup d'informations à quelqu'un qui souhaiterait attaquer votre site !

3) __function.php__

Dans le fichier function.php (wp-content / themes / LeTheme / function.php) ajouter ceci :

    add_filter('login_errors', create_function('$a', "return null;"));
    remove_action('wp_head', 'wp_generator');

4) __header.php__

Dans le fichier header.php enlever la ligne :
`<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />`