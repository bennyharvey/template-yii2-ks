<aside class="main-sidebar">
    <section class="sidebar fixed">
        <?php
        $linkTemplate = '<a class="ripple_effect" href="{url}">{icon} {label}</a>';
        $menuTemplate = '<a class="ripple_effect" href="{url}">{icon} {label}
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span></a>';

        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Main', 'url' => ['/site/index'], 'template' => $linkTemplate,],
                    ['label' => 'Active Directory', 'url' => ['/ad/index'], 'template' => $linkTemplate,],
                    ['label' => 'Header', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Menu',
                        'icon' => 'share',
                        'url' => '#',
                        'template' => $menuTemplate,
                        // 'visible' => Yii::$app->user->can('menu'),
                        'items' => [
                            ['label' => 'Menu item', 'icon' => 'file-code-o', 'url' => ['/'],],
                            ['label' => 'Menu item', 'icon' => 'file-code-o', 'url' => ['/'],],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>
