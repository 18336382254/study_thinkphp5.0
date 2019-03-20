<?php
/**
 * Created by PhpStorm.
 * User: 王灿
 * Date: 2019/3/19 0019
 * Time: 17:48
 */
namespace app\index\model;

use think\Model;
use think\Loader;
class Admin extends Model{
    //模型内验证
    public function add_admin($data){
        $res = $this->validate('Admin')->save($data);
        if(!$res){
            return $this->getError();
        }else{
            return '成功!';
        }
    }
}