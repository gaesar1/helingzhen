<?php
/**
 * Created by PhpStorm.
 * User: yike
 * Date: 2016/6/6
 * Time: 10:03
 */
if (!defined('IN_IA')) {
    exit('Access Denied');
}
global $_W, $_GPC;
/*if (empty($_W['fans']['nickname'])) {
    mc_oauth_userinfo();
}*/
$site = $_W['siteroot'];
$setdata = pdo_fetch("select * from " . tablename('yike_guess_sysset') . ' where uniacid=:uniacid limit 1', array(
    ':uniacid' => $_W['uniacid']
));
$set = unserialize($setdata['sets']);
foreach($set['banner'] as $k => $v){
    $set['banner'][$k]= tomedia($v);
}
if(empty($_W['member']['uid'])){
    if($set['follow']['href']){
        //message("请先关注公众号", $set['follow']['href'], 'success');
        $href = $set['follow']['href'];
        include $this->template('follow');die;
    }else{
        message("请管理员设置引导关注页");
    }
}elseif($_W['fans']['follow'] == 0){
    if($set['follow']['href']){
        //message("请先关注公众号", $set['follow']['href'], 'success');
        $href = $set['follow']['href'];
        include $this->template('follow');die;
    }else{
        message("请管理员设置引导关注页");
    }
}
$user = pdo_fetch('select * from '.tablename('mc_members').' where uid = :uid', array(':uid' => $_W['member']['uid']));
$user1 = pdo_fetch('select * from '.tablename('yike_members').' where uid = :uid', array(':uid' => $_W['member']['uid']));
if(empty($user1)){
    $insert = array(
        'uid' => $_W['member']['uid'],
        'uniacid' => $_W['uniacid'],
        'login_time' => time()
    );
    pdo_insert('yike_members', $insert);
}else{
    if(date('Y-m-d', $user1['login_time']) == ((date('Y-m-d', time())))){
        $insert = array(
            'login_time' => time()
        );
    }else{
        $insert = array(
            'login_time' => time(),
            'ok_task' => '',
        );
    }
    pdo_update('yike_members', $insert, array(
        'uid' => $_W['member']['uid']
    ));
}
if($user1['blacklist'] == 1){
    die("<!DOCTYPE html>
                <html>
                    <head>
                        <meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=0'>
                        <title>抱歉，出错了</title><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=0'><link rel='stylesheet' type='text/css' href='https://res.wx.qq.com/connect/zh_CN/htmledition/style/wap_err1a9853.css'>
                    </head>
                    <body>
                    <div class='page_msg'><div class='inner'><span class='msg_icon_wrp'><i class='icon80_smile'></i></span><div class='msg_content'><h4>抱歉，您的账号已被禁用，请联系管理员解封</h4></div></div></div>
                    </body>
                </html>");
}
if($set['task']['integral']['open']){
    if($user1['is_one'] != 1){
        $data = array(
            'credit1' => $user['credit1'] + $set['task']['integral']['open']
        );
        pdo_update('mc_members', $data, array(
            'uid' => $_W['member']['uid']
        ));;
        $data1 = array(
            'is_one' => 1,
        );
        pdo_update('yike_members', $data1, array(
            'uid' => $_W['member']['uid']
        ));
        $data2 = array(
            'uid' => $user['uid'],
            'uniacid' => $_W['uniacid'],
            'money' => $set['task']['integral']['open'],
            'type' => 1,
            'balance' => $user['credit1'] + $set['task']['integral']['open'],
            'create_time' => time(),
            'name' => '首次'
        );
        pdo_insert('yike_guess_balance', $data2);
        if(date('Y-m-d', time()) == ((date('Y-m', time())).'-1')){
            $data4 = array(
                'add_money' => $set['task']['integral']['open']
            );
        }else{
            $user1 = pdo_fetch(' SELECT * FROM '.tablename('yike_members').' WHERE uid = :uid',array(':uid' => $_W['member']['uid']));
            $data4 = array(
                'add_money' => $user1['add_money'] + $set['task']['integral']['open']
            );
        }
        pdo_update('yike_members', $data4, array(
            'uid' => $_W['member']['uid']
        ));
    }
}
$guess = pdo_fetchall('select * from '.tablename('yike_guess_guess').' where uniacid = :uniacid and is_show = 1 and sold_out = 0 order by id desc', array(':uniacid' => $_W['uniacid']));
foreach($guess as $k => $v){
    $guess[$k]['home_image'] = tomedia($v['home_image']);
    $guess[$k]['guest_iamge'] = tomedia($v['guest_iamge']);
    $guess[$k]['image'] = tomedia($v['image']);
}
$classify = pdo_fetchall('select * from '.tablename('yike_guess_classify').' where uniacid = :uniacid and is_show = 1 and parents_id = 0', array(':uniacid' => $_W['uniacid']));
foreach($classify as $k => $v){
    $classify[$k]['image'] = tomedia($v['image']);
}
$banner = pdo_fetchall('select * from '.tablename('yike_guess_banner').' where uniacid = :uniacid and is_show = 1',array(':uniacid' => $_W['uniacid']));
foreach($banner as $k => $v){
    $banner[$k]['image'] = tomedia($v['image']);
}
if($set['follow']['open'] == 1){
    $follow['follow'] = $_W['fans']['follow'];
    $follow['href'] = $set['follow']['href'];
}else{
    $follow['follow'] = 1;
}
load()->func('tpl');
include $this->template('index');