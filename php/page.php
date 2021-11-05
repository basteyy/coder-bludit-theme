<article class="post container">
    <?php
    Theme::plugins('pageBegin'); ?>

    <?php
    if ($page->coverImage()): ?>
        <img alt="Cover Image" class="cover" src="<?php
        echo $page->coverImage(); ?>"/>
    <?php
    endif ?>

    <header>
        <a class="text-dark" href="<?php
        echo $page->permalink(); ?>">
            <h1 class="title"><?php
                echo $page->title(); ?></h1>
        </a>
    </header>

    <aside>

        <?= $page->username() ?> <?= $L->get('at') ?> <?= $page->date() ?>

        <?php
        if (!$page->isStatic() && !$url->notFound()): ?>
            <br/>
            <?php
            echo $L->get('Reading time') . ': ' . $page->readingTime() ?>
        <?php
        endif ?>
    </aside>

    <section class="text">
        <?php
        echo $page->content(); ?>
    </section>

    <?php
    Theme::plugins('pageEnd'); ?>
</article>