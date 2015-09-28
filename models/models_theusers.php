<?php

use PhangoApp\PhaModels\ExtraModels\UserPhangoModel;
use PhangoApp\PhaModels\Webmodel;
use PhangoApp\PhaModels\CoreFields\CharField;
use PhangoApp\PhaModels\CoreFields\PasswordField;
use PhangoApp\PhaModels\CoreFields\EmailField;

$theuser=new UserPhangoModel('theuser');

$theuser->change_id_default('id');

$theuser->register('username', new CharField(25), 1);

$theuser->register('password', new PasswordField(255), 1);

$theuser->register('email', new EmailField(255), 1);

$theuser->register('token_client', new CharField(255));

$theuser->register('token_recovery', new CharField(255));

$theuser->username='username';

?>