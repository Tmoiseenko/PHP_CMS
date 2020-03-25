<div class="col-12 pagination-container">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <? while ($page++ < $num_pages): ?>
                <? if ($page == $current_page) : ?>
                    <li class="page-item disabled">
                        <a class="page-link"><?= $page ?></a>
                    </li>
                <? else : ?>
                    <li class="page-item">
                        <a class="page-link paginator__item" href="?<?= http_build_query(array_merge($_GET, array("page"=>$page))) ?>"><?= $page ?></a>
                    </li>
                <? endif ?>
            <? endwhile ?>
        </ul>
    </nav>
</div>
