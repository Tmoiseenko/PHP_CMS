<?php require_once VIEW_DIR . '/layout/base/header.php'; ?>
<div class="container mb-5">
    <h1 class="m-5"><?= $title ?></h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Автор</th>
            <th scope="col">Книга</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($content as $book){
            ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $book->author ?></td>
                <td><?= $book->title ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
<?php require_once VIEW_DIR . '/layout/base/footer.php'; ?>
