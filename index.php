<?php
    declare(strict_types=1);

    // The following is just for development ;)
    // Compile Sass
    if(file_exists(__DIR__ . '/vendor/autoload.php')) {

        define('ROOT', __DIR__);

        require __DIR__ . '/vendor/autoload.php';

        $sassFile = ROOT . '/css/style.scss';
        $cssFile = ROOT . '/css/style.css';
        $compileSass = false;

        if(file_exists($sassFile)) {

            $sassFolder = dirname($sassFile);

            if (file_exists($cssFile)) {
                $fileLastModifiedCss = filemtime($cssFile);
                foreach (scandir($sassFolder) as $file) {
                    if (filemtime($sassFolder . '/' . $file) > $fileLastModifiedCss) {
                        $compileSass = true;
                        break;
                    }
                }
            } else {
                $compileSass = true;
            }

            if($compileSass) {
                $compiler = (new \ScssPhp\ScssPhp\Compiler());
                $compiler->addImportPath($sassFolder);
                $compiler->setOutputStyle(\ScssPhp\ScssPhp\OutputStyle::COMPRESSED);
                file_put_contents($cssFile, $compiler->compileString(file_get_contents($sassFile))->getCss());
            }

        }

    }



?><!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Bludit">

    <!-- Dynamic title tag -->
    <?php echo Theme::metaTagTitle(); ?>

    <!-- Dynamic description tag -->
    <?php echo Theme::metaTagDescription(); ?>

    <!-- Include Favicon -->
    <?php echo Theme::favicon('img/favicon.png'); ?>

    <!-- Include CSS Styles from this theme -->
    <?php echo Theme::css('css/style.css' . (defined('ROOT') ? '?t=' . time() . '&' : '')); ?>

    <!-- Load Bludit Plugins: Site head -->
    <?php Theme::plugins('siteHead'); ?>
</head>
<body>

<!-- Load Bludit Plugins: Site Body Begin -->
<?php Theme::plugins('siteBodyBegin'); ?>

<!-- Navbar -->
<?php
 include(THEME_DIR_PHP.'navbar.php');
?>

<main>
<!-- Content -->
<?php
if ($WHERE_AM_I == 'page') {
    include(THEME_DIR_PHP.'page.php');
} else {
    include(THEME_DIR_PHP.'home.php');
}
?>
</main>

<footer class="container">

    <p>
        <strong><?php echo $site->footer(); ?></strong>
    </p>

    <p>
        <small>Powered by<img class="mini-logo" src="<?php echo DOMAIN_THEME_IMG.'favicon.png'; ?>"/> <a target="_blank" class="text-white" href="https://www.bludit
        .com">Bludit</a> - Design by <a href="https://eiweleit.de" title="Author of the Design">basteyy</a></small>
    </p>
</footer>

<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>