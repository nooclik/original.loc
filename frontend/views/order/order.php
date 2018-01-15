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
                        <?= Html::input('hidden', 'price', $model["price"], ['id' => 'price']) ?>
                    </td>
                    <td>
                        <span id="summ"><b><?= $model['price'] ?></b></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" id="contact-info">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td><strong>ФИО</strong></td>
                    <td><?= Html::input('text', 'contact["name"]', '', ['class' => 'form-control', 'placeholder' => 'Введите Ваше имя...', 'required' => 'required']) ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td><?= Html::input('email', 'contact["email"]', '', ['class' => 'form-control', 'placeholder' => 'Введите Ваш email...', 'required' => 'required']) ?></td>
                </tr>
                <tr>
                    <td><strong>Телефон</strong></td>
                    <td><?= Html::input('phone', 'contact["phone"]', '', ['class' => 'form-control', 'placeholder' => '(xx) xxx-xx-xx', 'required' => 'required', 'id' => 'phone']) ?></td>
                </tr>
                <tr>
                    <td><strong>Город</strong></td>
                    <td><?= Html::input('text', 'contact["city"]', '', ['class' => 'form-control', 'placeholder' => 'Введите Ваш город...']) ?></td>
                </tr>
                <tr>
                    <td><strong>Адрес</strong></td>
                    <td><?= Html::input('text', 'contact["address"]', '', ['class' => 'form-control', 'placeholder' => 'Введите Ваш адрес...']) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= Html::submitButton('Оформить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?= Html::endForm();

$this->registerJS("
var price = $('#price').val();
var summ;

    $('#quantity').change(function (){
        var quantity = $('#quantity').val();
        summ = price * quantity;
        $('#summ').text(Math.round((summ) * 100) / 100);
    });
$('#phone').mask('(00) 000-00-00', );
");
