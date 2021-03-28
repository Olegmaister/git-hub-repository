<?php
/* @var $provider \yii\data\ArrayDataProvider**/

use yii\helpers\Url;
use core\helpers\ArrayHelper;
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Login</th>
        <th scope="col">Name</th>
        <th scope="col">Html Url</th>
        <th scope="col">Description</th>
        <th scope="col">Stargazers Count</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($provider->getModels() as $item) : ?>

        <tr>
            <td><?=$item['hub']['login']?></td>
            <td><?=$item['hub']['name']?></td>
            <td><a target="_blank" href="<?=Url::to($item['hub']['html_url'])?>"><?=$item['hub']['html_url']?></a></td>
            <td><?=$item['hub']['description']?></td>
            <td><?=$item['hub']['stargazers_count']?></td>
            <td>
                <button
                        data-id="<?=$item['api_id']?>"
                        class="btn btn-danger js-remove-favorites">
                    Удалить
                </button>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?= \yii\widgets\LinkPager::widget([
    'pagination' => $provider->getPagination()
])?>