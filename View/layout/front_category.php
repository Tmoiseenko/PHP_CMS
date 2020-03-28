<ul>
    <?php foreach ($categories as $cat) :?>
    <li><a href="/category/<?= $cat->name ?>"><?= $cat->name ?></a></li>
    <?php endforeach; ?>
</ul>