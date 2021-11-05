<nav role="navigation">
    <a title="<?= $L->g('startpage') ?>" href="<?php echo Theme::siteUrl() ?>">
        <?php echo $site->title() ?>
    </a>

    <ul>
        <?php foreach ($staticContent as $staticPage): ?>
            <li >
                <a href="<?php echo $staticPage->permalink() ?>"><?php echo $staticPage->title() ?></a>
            </li>
        <?php endforeach ?>

        <?php foreach (Theme::socialNetworks() as $key=>$label): ?>
            <li>
                <a href="<?php echo $site->{$key}(); ?>" target="_blank">
                    <span class="d-inline d-sm-none"><?php echo $label; ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<!--

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark text-uppercase">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">



            </ul>
        </div>
    </div>
</nav>
-->