<script type="text/javascript">
    $(function()
    {
        $('.back_button').click(function()
        {
            location.href = $(this).attr('url');
        });
    });
</script>

<?php

function addAttributesToElements(&$elements)
{
    foreach ($elements as $i => $element)
    {
        $class = '';

        switch ($element->type)
        {
            case 'text':
            case 'password':
                $class = 'text';
                break;

            case 'date':
                $class = 'text date_picker';
                $element->attributes['readonly'] = true;
                break;
        }

        if (!empty($class))
        {
            if (array_key_exists('class', $element->attributes))
            {
                $element->attributes['class'] = $element->attributes['class'] . ' ' . $class;
            }
            else
            {
                $element->attributes['class'] = $class;
            }
        }

        $elements[$i] = $element;
    }
}


function addAttributesToButtons(&$buttons)
{
    foreach ($buttons as $i => $button)
    {
        $length = mb_strlen($button->value, 'utf-8');

        $class = isset($button->attributes['class']) ? $button->attributes['class'] . " submit" : "submit";

        if ($length > 11)
        {
            $class.= ' long';
        }
        elseif ($length > 6)
        {
            $class.= ' mid';
        }
        else
        {
            $class.= ' small';
        }

        $button->attributes['class'] = $class;

        $buttons[$i] = $button;
    }
}


function formatDateAttributes(&$model)
{
    foreach ($model->attributes as $attr => $value)
    {
        if (Yii::app()->dater->isDbDate($value))
        {
            $model->$attr = Yii::app()->dater->formFormat($value);
        }
    }
}

$elements = $form->getElements();

addAttributesToElements($elements);
addAttributesToButtons($form->buttons);
formatDateAttributes($form->model);

$model_class = get_class($form->model);
$form->attributes['class'] = 'admin_form';
?>

<div class='form'>

    <?php echo $this->msg('Поля отмеченные * обязательны.', 'info'); ?>

    <?php echo $form->renderBegin(); ?>

    <?php foreach ($elements as $element): ?>
        <?php if ($element->type == 'date'): ?>

            <p>
                <?php echo $form->getActiveFormWidget()->labelEx($form->model, $element->name); ?>
                <?php echo $form->getActiveFormWidget()->textField($form->model, $element->name, $element->attributes); ?>
                <?php
                $this->widget('application.extensions.calendar.SCalendar',
                    array(
                    'inputField' => "{$model_class}_{$element->name}",
                    'ifFormat'   => '%d.%m.%Y',
                    'language'   => 'ru-UTF'
                ));
                ?>
                <?php echo $form->getActiveFormWidget()->error($form->model, $element->name); ?>
            </p>

        <?php elseif ($element->type == 'editor'): ?>

            <p>
                <?php echo $form->getActiveFormWidget()->labelEx($form->model, $element->name); ?>

                <?php
                $this->widget('application.extensions.tiny_mce.TinyMCE',array(
                    'model' => $form->model,
                    'attribute' => $element->name,
                ));
                ?>

                <?php echo $form->getActiveFormWidget()->error($form->model, $element->name); ?>
            </p>
            <br/>

        <?php elseif ($element->name == 'captcha'): ?>

            <p>
                <?php echo $form->getActiveFormWidget()->labelEx($form->model, 'captcha'); ?>
                <?php
                $this->widget('application.extensions.recaptcha.EReCaptcha',
                   array(
                       'model'      => $form->model,
                       'attribute'  => 'captcha',
                       'theme'      => 'red',
                       'language'   => 'ru_Ru',
                       'publicKey' => '6LcsjsMSAAAAAG5GLiFpNi5R80_tg6v3NndjyuVh'
                ));
                ?>
                <?php echo $form->getActiveFormWidget()->error($form->model, 'captcha'); ?>
            </p>

        <?php elseif ($element->type == 'multi_select'): ?>
            <p>
                <?php echo $form->getActiveFormWidget()->labelEx($form->model, $element->name); ?>

                <?php
                $this->widget(
                    'application.extensions.emultiselect.EMultiSelect',
                    $element->params
                );
                ?>

                <?php
                echo $form->getActiveFormWidget()->dropdownlist(
                    $form->model,
                    $element->name,
                    $element->items,
                    array('multiple' => 'multiple', 'key' => $element->name, 'class' => 'multiselect')
                );
                ?>
            </p>

        <?php elseif ($element->type == 'autocomplete'): ?>

            <p>
                <?php echo $form->getActiveFormWidget()->labelEx($form->model, $element->name); ?>

                <?php
                $this->widget('CAutoComplete',
                      array(
                         'name'      => $element->name,
                         'url'       => array($element->url),
                         'minChars'  => 2,
                         'delay'     => 500,
                         'matchCase' => false,
                         'htmlOptions'=>array('size'=>'40')
                ));
                ?>

                <?php echo $form->getActiveFormWidget()->error($form->model, $element->name); ?>
            </p>
            
        <?php elseif ($element->type == "checkbox"): ?>
              
            <div class='checkbox_input'>
                <?php echo $element->renderInput(); ?>
            </div>  
              
            <div class='checkbox_label'>  
                <?php echo $element->renderLabel(); ?>
            </div>    
            <br clear="all" />

       <?php elseif ($element->type == "widget"): ?>

            <?php if (isset($element->attributes['widget'])): ?>
                <?php $this->widget($element->attributes['widget'], array('model' => $form->model)); ?>
            <?php endif ?>

        <?php elseif ($element->type == 'file_manager'): ?>

            <fieldset>
                <legend><?php echo $element->params['title']?>:</legend>

                <?php
                $this->widget('fileManager.portlets.Uploader', array(
                    'model'       => $form->model,
                    'data_type'   => $element->params['data_type'],
                    'maxFileSize' => 10*1000*1000,
                    'tag'         => $element->name
                ));
                ?>
            </fieldset>


        <?php
        elseif ($element->type == 'image'):
            $element->type='file';
            $element_name=$element->name;
        ?>
        <label for="<?php $element->name; ?>">
            <?php echo $element->label; ?>
            <?php if ($element->required): ?>
            (<?php echo Yii::t('main', 'обязательное поле'); ?>)
            <?php endif ?>
        </label>

        <?php if($element->path!=''):?><div><img src="<?=$element->path?>" alt="" ></div><?php endif; ?>
        <?php if (!empty($error)): ?>
            <?php echo $error; ?>
            <?php endif ?>
        <?php
        echo $element->renderInput().'<br><br>';
        ?>
            
        <?php else: ?>
            <p>
                <?php echo $element->render(); ?>
            </p>
        <?php endif ?>
    <?php endforeach ?>

    <?php echo $form->renderButtons(); ?>
    <?php echo $form->renderEnd(); ?>

</div>


