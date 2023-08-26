<?php
/** @var \common\models\Congviec $model */
?>
<tr>
    <td><?=$index+1?></td>
    <td><?=$model->tencongviec?></td>
    <td><?=$model->getStatusText()?></td>
</tr>
