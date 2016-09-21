<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="login">
    <div class="container wishes">
        <div class="row">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'api-clients-form',
                'enableAjaxValidation' => false,
            ));
            ?>
            <?

            $time = date('Y-m-d H:i:s');
            $exptime = date('Y-m-d H:i:s',strtotime('+30 day', strtotime($time)));
            echo $form->textField($model, 'created_time', array('class' => 'ui_apps', 'value' => $time));
            echo $form->textField($model, 'expire_time', array('class' => 'ui_apps', 'value' => $exptime));

            ?>

            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Generate' : 'Refresh'); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
</section>