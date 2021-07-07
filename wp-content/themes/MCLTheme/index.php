<?php

use ParagonIE\Sodium\Core\Curve25519\H;

get_header() ?>

<body>
    Theme à personnaliser dans MCLTheme index.php --> TITLE : <?php wp_title(); ?>

    <!-- afficher des artiles -->
    <?php if (have_posts()) : ?>
        <ul>
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                </li>
        </ul>

    <?php endwhile;
        else : ?>

    <p>Pas d'articles</p>
<?php endif; ?>
</body>
<?php get_footer() ?>
<!-- </html> -->