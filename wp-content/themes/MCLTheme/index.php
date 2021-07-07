<?php

use ParagonIE\Sodium\Core\Curve25519\H;

get_header() ?>

<body>
    Theme à personnaliser dans MCLTheme index.php --> TITLE : <?php wp_title(); ?>

    <!-- afficher des produits -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="card" style="width: 18rem;">
            <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title"><?php the_title() ?></h5>
                <p class="card-text"><?php the_content() ?></p>
                <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir</a>
            </div>
        </div>
    <?php endwhile; else : ?>
        <p>Pas d'articles</p>
    <?php endif; ?>
</body>
<?php get_footer() ?>
<!-- </html> -->