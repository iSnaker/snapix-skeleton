<footer class="">
    <div class="container">
        <div class="padding-box">
            <div class="row">
                <div class="col-md-2">
                    <img src="/image/logo_white.png" class="img-responsive">
                </div>
                <div class="col-md-10">
                    <nav id="navbar_main" role="navigation" class="navbar navbar-left">
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars white-color fa-2x" aria-hidden="true"></i>
                            </button>

                        </div>
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <div class="col-md-12">
                                <ul class="nav navbar-nav navbar-right navbar-buttons">
                                    <?php foreach ($app->links as $item){ ?>
                                        <li class="item dropdown"><a href="<?php print $item['url']; ?>" class="selected"><?php print $item['name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-discription">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p><?php print $app->name; ?></p>
                    <div class="social">
                        <a href="" class="social-vk"></a>
                        <a href="" class="social-fb"></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contacts">
                        <p class="text">Телефон:</p>
                        <p class="h2 tel"><?php print $app->phone; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>