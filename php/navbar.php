<nav role="navigation">
    <a title="<?= $L->g('startpage') ?>" href="<?php echo Theme::siteUrl() ?>">
        <?php echo $site->title() ?>
    </a>

    <ul id="_menue">
        <li><a href="#_menue">&#9776;</a></li>
        <li><a href="#">&#x2715;</a></li>
        <?php foreach ($staticContent as $staticPage): ?>
            <li>
                <a href="<?php echo $staticPage->permalink() ?>"><?php echo $staticPage->title() ?></a>
            </li>
        <?php endforeach ?>

        <?php
         $socials = false;

         foreach (Theme::socialNetworks() as $key=>$label) {
            $socials .= sprintf('<li><a href="%s" target="_blank">%s</a></li>', $site->{$key}(), $label);
            }

         if($socials) : ?>
        <li class="--social">
            <a href="#_socials">Social</a>
            <ul id="_socials">
                <li><a href="#">&#x2715</a></li>
                <?= $socials ?>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</nav>