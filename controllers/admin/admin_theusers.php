<?php

use PhangoApp\PhaI18n\I18n;
use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaLibs\GenerateAdminClass;
use PhangoApp\PhaLibs\AdminUtils;

function TheUsersAdmin()
{

    Webmodel::load_model('modules/theusers/models/models_theusers');

    $model=Webmodel::$m;

    settype($_GET['op'], 'integer');
    
    switch($_GET['op'])
    {
    
        default:
        
            echo '<h2>'.I18n::lang('pastafari', 'theusers', 'Users of pastafari modules').'</h2>';
            
            $model->theuser->create_forms();
            
            $repeat_password=new \PhangoApp\PhaModels\Forms\PasswordForm('repeat_password');
        
            $repeat_password->label=I18n::lang('users', 'repeat_password', 'Repeat password');
            $repeat_password->required=1;
            
            $model->theuser->insert_after_field_form('password', 'repeat_password', $repeat_password);
            
            $admin=new GenerateAdminClass($model->theuser, AdminUtils::set_admin_link('theusers', array('op' => 0)));
            
            $admin->list->arr_fields=array('id', 'username');
            $admin->list->set_fields_showed($admin->list->arr_fields);
            
            $admin->list->order_field='id';
            
            $admin->list->order=1;
            
            $admin->arr_fields_edit=array('username', 'password', 'repeat_password', 'email');
            
            $admin->show();
        
        break;
    
    }

}

?>