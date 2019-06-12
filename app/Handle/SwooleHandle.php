<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/6/12
 * Time: 2:44 PM
 */

namespace App\Handle;


class SwooleHandle
{
    public function __construct()
    {

    }
    public function onOpen($serv, $request)
    {
        echo 'onOpen';
    }
    public function onMessage($serv,$frame)
    {
        echo 'onMessage';
    }
    public function onClose($serv,$fd)
    {
        echo 'onClose';
    }

}