<?php
/**
 * Created by PhpStorm.
 * User: 王灿
 * Date: 2019/3/19 0019
 * Time: 17:11
 */
namespace app\common\validate;

use think\Validate;

class Admin extends Validate{

    protected $rule =   [
        'nickname'  => 'require|max:25',
        'username'   => 'require|max:25',
        'password' => 'require|max:25',
        'salt' => 'require|max:25',
        'ab'    =>'require',
        'cc'    =>'require',
    ];

}