<video playsinline autoplay muted loop poster="https://eiweleit.de/assets/media/images/coding_sequences.jpg">
    <source src="https://eiweleit.de/assets/media/video/coding_sequences.mp4" type="video/mp4">
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
        <nav class="paginator">
            <ul class="pagination flex-wrap">

                <!-- Previous button -->
                <?php
                if (Paginator::showPrev()): ?>
                    <li class="page-item mr-2">
                        <a class="page-link" href="<?php
                        echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <?php
                            echo $L->get('Previous'); ?></a>
                    </li>
                <?php
                endif; ?>

                <!-- Home button -->
                <li class="page-item <?php
                if (Paginator::currentPage() == 1) echo 'disabled' ?>">
                    <a class="page-link" href="<?php
                    echo Theme::siteUrl() ?>">Home</a>
                </li>

                <!-- Next button -->
                <?php
                if (Paginator::showNext()): ?>
                    <li class="page-item ml-2">
                        <a class="page-link" href="<?php
                        echo Paginator::nextPageUrl() ?>"><?php
                            echo $L->get('Next'); ?> &#9658;</a>
                    </li>
                <?php
                endif; ?>

            </ul>
        </nav>
    <?php
    endif ?>

</section>