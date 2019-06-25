<?php
/**
 * Author 阿伟先生.
 * Date: 2019-05-14
 * Time: 09:47
 * Email: 515242609@qq.com
 */

/*****************************状态常量*******************************/
//成功请求
define('STATUS_OK', 200);
//用户需要登录
define('NEED_LOGIN', 202);
//没有权限操作
define('NO_AUTH', 300);
//请求失败
define('ERR_REQUEST', 500);

/*************************特殊设置常量**************************************/
//仅用于微信授权cookie使用
define('COOKIE_WECHAT','h5_oauth_user');


/****************************登录常量****************************/
//成功请求
define('YXK_ADMIN_AUTH_KEY', 'yxk.admin.auth.key');
//用户需要登录
define('H5_USER_AUTH_SIGN', 'login:h5_user_auth_sign');
//没有权限操作
define('H5_ADMIN_UID', 'login:h5_admin_uid');
//请求失败
