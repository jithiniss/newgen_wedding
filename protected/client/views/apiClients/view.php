
<?php

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//'id',
        'client_id',
        'client_secret',
    //'created_time',
//'access_token',
//'status',
//'expire_time',
//'created_by',
    ),
));

