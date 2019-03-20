<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Loader;
use app\index\model\Admin as AdminModel;
class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
    //添加管理员账号密码
    public function add_admin(){
        $password   = '123456';
        $salt       = time();
        $password = md5($password.$salt);
        $data = [
            'nickname' => 'wangcan',
            'username' => 'admin',
            'password' => $password,
            'salt'     => $salt,
            'status'   => 1,
            'create_time'=> time()
        ];
        $validate = Loader::validate('Admin');
        $res = $validate->check($data);
        if(!$res){
            dump($validate->getError());
        }
    }
    //控制器调用模型验证
    public function add_admin1(){
        $password   = '123456';
        $salt       = time();
        $password = md5($password.$salt);
        $data = [
            'nickname' => 'wangcan',
            'username' => 'admin',
            'password' => $password,
            'salt'     => $salt,
            'status'   => 1,
            'create_time'=> time()
        ];
        $AdminModel = new AdminModel();
        $ret = $AdminModel->validate('Admin')->save($data);
        if(false === $ret){
            // 验证失败 输出错误信息
            dump($AdminModel->getError());
        }else{
            dump('成功!');
        }
    }
    //模型内验证
    public function add_admin2(){
        $password   = '123456';
        $salt       = time();
        $password = md5($password.$salt);
        $data = [
            'nickname' => 'wangcan',
            'username' => 'admin',
            'password' => $password,
            'salt'     => $salt,
            'status'   => 1,
            'create_time'=> time()
        ];
        $adminModel = new AdminModel();
        $ret = $adminModel->add_admin($data);
        return $ret;
        /*if(false === $ret){
            // 验证失败 输出错误信息
            dump($adminModel->getError());
        }else{
            dump('成功了!');
        }*/
    }
}
