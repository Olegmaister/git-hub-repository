<?php
/* @var $provider \yii\data\ArrayDataProvider**/
/* @var $favorites array**/

use yii\widgets\LinkPager;
use core\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<a href="<?=Url::to('/')?>">Search</a>
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
    <?php foreach ($provider->getModels() as $item)  :?>
        <tr>
        <td><?=$item['owner']['login']?></td>
        <td><?=$item['name']?></td>
            <td><a target="_blank" href="<?=Url::to($item['html_url'])?>"><?=$item['html_url']?></a></td>
        <td><?=$item['description']?></td>
        <td><?=$item['stargazers_count']?></td>
        <td>
            <button
                    data-id="<?=$item['id']?>"
                    class="btn btn-primary add-favorites-<?=$item['id']?> js-add-favorites <?php if(ArrayHelper::keyExists($item['id'],$favorites)) echo 'hidden'?>">
                    Добавить
            </button>
            <button
                    data-id="<?=$item['id']?>"
                    class="btn btn-danger remove-favorites-<?=$item['id']?> js-remove-favorites <?php if(!ArrayHelper::keyExists($item['id'],$favorites)) echo 'hidden'?>">
                Удалить
            </button>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php echo LinkPager::widget([
   'pagination' => $provider->getPagination()
]);?>


