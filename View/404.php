<?php require_once VIEW_DIR . '/layout/base/header.php'; ?>
    <h1 style="margin: 10px;">404 error</h1>
    <div style="border: 2px solid #f54089; margin: 10px; padding: 10px;"><?= $e->getMessage() ?></div>
<?php require_once VIEW_DIR . '/layout/base/footer.php'; ?>
