<div class="col-md-4">

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <?php includeLayout('front_category', array('categories' => App\Models\Category::all())); ?>
        </div>
    </div>
    <!-- /category widget -->

    <!-- newsletter widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Newsletter</h2>
        </div>
        <div class="newsletter-widget">
            <form>
                <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                <?php if (isset($_SESSION["is_auth"]) & $_SESSION["is_auth"] === true): ?>
                    <input class="input" hidden name="newsletter" value="<?= $_SESSION['user_info']['email'] ?>">
                <?php else: ?>
                    <input class="input" name="newsletter" placeholder="Введите ваш Email">
                <?php endif; ?>
                <a href="/subscribe" class="primary-button">Подписаться</a>
            </form>
        </div>
    </div>
    <!-- /newsletter widget -->

</div>