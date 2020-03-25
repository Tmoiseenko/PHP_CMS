<div class="col-12">
    <div class="card">
        <div class="card-body d-flex">
            <form class="w-75">
                <div class="d-flex flex-row">
                    <div class="form-group pr-2 mb-0">
                        <input hidden type="number" name="page" value="<?= $current_page ?>">
                        <select class="form-control" id="statusform" name="order_by">
                            <option value="login" <?= isset($_GET['order_by']) ? $_GET['order_by'] === 'status' ? 'selected' : "" : '' ?>>Имени пользователя</option>
                            <option value="email" <?= isset($_GET['order_by']) ? $_GET['order_by'] === 'user_name' ? 'selected' : "" : '' ?>>Email пользователя</option>
                        </select>
                    </div>
                    <div class="form-group pr-2 mb-0">
                        <select class="form-control" id="statusform" name="order">
                            <option value="DESC" <?= isset($_GET['order']) ? $_GET['order'] === 'DESC' ? 'selected' : "" : '' ?>>По убыванию</option>
                            <option value="ASC" <?= isset($_GET['order']) ? $_GET['order'] === 'ASC' ? 'selected' : "" : '' ?>>По возрастанию</option>
                        </select>
                    </div>
                    <div class="form-group pr-2 mb-0">
                        <select class="form-control" id="statusform" name="per_page">
                            <option value="10" <?= isset($_GET['per_page']) ? $_GET['per_page'] === '10' ? 'selected' : "" : '' ?>>Выводит по 10</option>
                            <option value="20" <?= isset($_GET['per_page']) ? $_GET['per_page'] === '20' ? 'selected' : "" : '' ?>>Выводит по 20</option>
                            <option value="50" <?= isset($_GET['per_page']) ? $_GET['per_page'] === '50' ? 'selected' : "" : '' ?>>Выводит по 50</option>
                            <option value="200" <?= isset($_GET['per_page']) ? $_GET['per_page'] === '200' ? 'selected' : "" : '' ?>>Выводит по 200</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" name="filter" value="Сортировать">
                </div>
            </form>
            <?php $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
            <a href="<?= $url_path ?>/create" class="btn btn-primary w-25">Создать</a>
        </div>
    </div>
</div>
