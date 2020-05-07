<?php require_once VIEW_DIR . '/layout/header.php'; ?>
<?php require_once VIEW_DIR . '/layout/front_menu.php'; ?>
<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('<?= $post->image ?>');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">Lifestyle</a>
                </div>
                <h1>Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</h1>
                <ul class="post-meta">
                    <li><a href="author.html"><?= $post->user->login ?></a></li>
                    <li><?= $post->created_at->toFormattedDateString() ?></li>
                    <li><i class="fa fa-comments"></i> 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">

                <!-- post content -->
                <?= $post->content ?>
                <!-- /post content -->

                <!-- post comments -->
                <div class="section-row mt-5">
                    <div class="section-title">
                        <h3 class="title">3 Comments</h3>
                    </div>
                    <div class="post-comments">

                <div class="section-row">
                    <div class="section-title">
                        <h3 class="title">Leave a reply</h3>
                    </div>
                    <form class="post-reply">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="input" type="text" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="input" type="text" name="website" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="primary-button">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /post reply -->
                </div>
            </div>
            </div>

            <?php require_once VIEW_DIR . '/sidebar.php'; ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<?php require_once VIEW_DIR . '/layout/footer.php'; ?>
