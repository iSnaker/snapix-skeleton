<header class="navbar-fixed-top header_bg">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav id="navbar_main" role="navigation" class="navbar navbar-left">
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars white-color fa-2x" aria-hidden="true"></i>
                            </button>

                        </div>
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <div class="col-md-9">
                                <ul class="nav navbar-nav navbar-right navbar-buttons">
                                    <?php foreach ($app->links as $item){ ?>
                                        <li class="item dropdown"><a href="<?php print $item['url']; ?>" class="selected"><?php print $item['name']; ?>
                                                <?php if(isset($item['sub']) && (is_array($item['sub'])) && (count($item['sub']))){ ?>
                                                    <ul class="dropdown-menu">
                                                        <?php foreach($item['sub'] as $child){ ?>
                                                            <li><a href="<?php print $child['url']; ?>"><?php print $child['name']; ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>