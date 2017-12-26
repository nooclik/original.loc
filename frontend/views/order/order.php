<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 26.12.2017
 * Time: 19:31
 */
use yii\helpers\Html;

$this->title = 'Офорление заказа: ' . $model['product'];
?>
<?= Html::beginForm() ?>
    <div class="row" id="order">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>
                        <b>
                            <?= $model['product'] ?>
                        </b>
                        <br>
                        <?= $model['variation']; ?>
                    </td>
                    <td>
                        <?= $model['sku'] ?>
                    </td>
                    <td>
                        <?= Html::input('number', 'quantity', '1', ['id' => 'quantity', 'class' => 'form-control', 'min' => 1]) ?>
                    </td>
                    <td class="price">
                        <?= $model['price'] ?>
                        <?= Html::input('hidden', 'price', $model["price"]) ?>
                    </td>
                    <td>
                        <?= Html::submitButton('Оформить', ['class' => 'btn']) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?= Html::endForm();
