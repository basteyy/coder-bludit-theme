<video playsinline autoplay muted loop poster="<?= DOMAIN_THEME_IMG ?>coding_sequences.jpg">
    <source src="<?= DOMAIN_THEME_IMG ?>coding_sequences.mp4" type="video/mp4">
</video>
<header class="container">
    <strong><?= $site->title() ?></strong>
    <small><?= $site->slogan() ?></small>
</header>

<section class="container">

    <?php
    if (empty($content)): ?>
        <header class="container">
            <?php
            $language->p('No pages found') ?>
        </header>
    <?php
    endif ?>




    <?php
    foreach ($content as $page): ?>
        <!-- Post -->

        <article class="post home container">
            <?php
            Theme::plugins('pageBegin'); ?>


            <?php
            if ($page->coverImage()): ?>
                <img class="card-img-top mb-3 rounded-0" alt="Cover Image" src="<?php
                echo $page->coverImage(); ?>"/>
            <?php
            endif ?>

            <header class="tiny">
                <a class="text-dark" href="<?php
                echo $page->permalink(); ?>"><?php
                    echo $page->title(); ?></a>
            </header>

            <aside>
                <?php
                echo $page->date(); ?> - <?php
                echo $L->get('Reading time') . ': ' . $page->readingTime(); ?>
            </aside>

            <section class="text">
                <?php
                echo $page->contentBreak(); ?>
            </section>


            <?php
            if ($page->readMore()): ?>
                <div class="more">
                    <a href="<?php
                    echo $page->permalink(); ?>"><?php
                        echo $L->get('Read more'); ?></a>
                </div>
            <?php
            endif ?>


            <?php
            Theme::plugins('pageEnd'); ?>

        </article>

    <?php
    endforeach ?>

    <!-- Pagination -->
    <?php
    if (Paginator::numberOfPages() > 1): ?>
        <nav class="paginator container">
            <ul>

                <!-- Previous button -->
                <?php
                if (Paginator::showPrev()): ?>
                    <li>
                        <a href="<?php
                        echo Paginator::previousPageUrl() ?>" tabindex="-1">👈 </a>
                    </li>
                <?php
                endif; ?>

                <!-- Home button -->
                <?php
                if (Paginator::currentPage() != 1) : ?>
                <li>
                    <a href="<?php
                    echo Theme::siteUrl() ?>">🏠</a>
                </li>
                <?php endif; ?>

                <!-- Next button -->
                <?php
                if (Paginator::showNext()): ?>
                    <li>
                        <a  href="<?php
                        echo Paginator::nextPageUrl() ?>"> 👉</a>
                    </li>
                <?php
                endif; ?>

            </ul>
        </nav>
    <?php
    endif ?>

</section>