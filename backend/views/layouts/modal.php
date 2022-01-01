<?php 

use yii\bootstrap\Modal;

Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'header' => '<div class="modal-title"></div>',
        'id' => 'modalWindow',
        'size' => 'modal-md',
        'closeButton' => [
            'id' => 'close-button',
            'class' => 'close',
            'data-dismiss' => 'modal',
            'style' => 'margin-top: 10px;'
        ],
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        'clientOptions' => [
            'backdrop' => true, 'keyboard' => true
        ]
    ]);

echo "
    <div id='modalContent'>
        <div style='text-align:center'>
            <i class='fa fa-refresh' aria-hidden='true'></i> <span>Загрузка...</span>
        </div>
    </div>
";
Modal::end();

?>