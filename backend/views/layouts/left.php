<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        -->

        <!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Товары', 'icon' => 'shopping-cart', 'url' => ['/product']],
                    ['label' => 'Категории', 'icon' => 'sitemap', 'url' => ['/category']],
                    [
                        'label' => 'Атрибуты товара', 'icon' => 'tasks', 'url' => '#', 'items' =>
                        [
                            ['label' => 'Атрибуты', 'url' => ['/attribute']],
                            ['label' => 'Значения', 'url' => ['/attribute-value']],
                        ]
                    ],
                    ['label' => 'Бренд', 'url' => ['/brand'], 'icon' => 'registered'],
                    ['label' => 'Вариации товар', 'url' => ['/variation'], 'icon' => 'cubes'],
                    ['label' => 'Маркетинг', 'url' => '#', 'icon' => 'pie-chart'],
                    ['label' => 'Настройки', 'url' => '#', 'icon' => 'wrench',
                        'items' =>
                            [
                                ['label' => 'Слайд', 'url' => ['setting/carousel'], 'icon' => 'picture-o'],
                                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                            ],
                    ],


                ],
            ]
        ) ?>

    </section>

</aside>
