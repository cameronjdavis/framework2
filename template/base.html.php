<!DOCTYPE html>
<html>
    <head>
        <title><?= $page->getTitle() ?></title>
        <?php foreach ($page->getHeadContent() as $headContent): ?>
            <?= $headContent ?>
        <?php endforeach; ?>
    </head>
    <body>
        <?= $page->getBody() ?>
    </body>
</html>