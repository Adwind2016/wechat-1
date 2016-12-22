<?php

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;

use EasyWeChat\Message\Image;
use EasyWeChat\Message\Voice;
use Illuminate\Http\Request;

class WechatController extends Controller
{
    public function serve()
    {
        //  Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $userApi=$wechat->user;
        $wechat->server->setMessageHandler(function($message) use($userApi,$wechat){
            switch ($message->MsgType) {
                case 'event':
                    return '这是个事件消息';
                    break;
                case 'text':
                    return '这是个一个测试文本消息'.$userApi->get($message->FromUserName)->nickname.$this->test();
                    break;
                case 'image':
                    $image=new Image()
                    return '这是一个图片消息';
                    break;
                case 'voice':
                    // return 'zheshishengyin';
                    $voice=new Voice(['media_id'=>'ZtfHQHvIN7YVSGd8Tq97j_gXueg4uPQasVwRIx1tpAU']);
                    $wechat->staff->message($voice)->to($message->FromUserName)->send();
                    return 'ok';
                    break;

                case 'video':
                    return '这是个video消息';
                    break;
                case 'location':
                    return '这是个坐标信息';
                    break;
                case 'link':
                    return  '这是个链接信息';
                    break;

                default:
                    return '这个消息我没有定义过';
                    break;
            }

        });

        //  Log::info('return response.');

        return $wechat->server->serve();
    }

}
