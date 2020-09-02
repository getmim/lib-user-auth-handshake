<?php
/**
 * Handshake
 * @package lib-user-auth-handshake
 * @version 0.0.1
 */

namespace LibUserAuthHandshake\Library;

use LibUserAuthHandshake\Model\UserHandshake as UHandshake;

class Handshake
{

    static function generate(int $user_id, int $session_id=null, string $ip=null, string $agent=null): string {
        if(is_null($ip))
            $ip = \Mim::$app->req->getIp();
        if(is_null($agent))
            $agent = \Mim::$app->req->agent;

        $data = [
        	'user'    => $user_id,
        	'session' => $session_id,
        	'browser' => json_encode(['ip'=>$ip,'agent'=>$agent]),
        	'token'   => null,
        	'expires' => date('Y-m-d H:i:s', strtotime('+5 minutes'))
        ];

        while(true){
        	$data['token'] = md5(rand(100,999) . '-' . uniqid() . '-' . $user_id);
        	if(!UHandshake::getOne(['token' => $data['token']]))
        		break;
        }

        UHandshake::create($data);

        return $data['token'];
    }

    static function validate(string $token, string $ip=null, string $agent=null): ?object {
        $data = UHandshake::getOne(['token'=>$token]);
        if(!$data)
        	return null;

        if(is_null($ip))
            $ip = \Mim::$app->req->getIp();
        if(is_null($agent))
            $agent = \Mim::$app->req->agent;

        UHandshake::remove(['id'=>$data->id]);

        $browser = json_decode($data->browser);

        if($ip != $browser->ip || $agent != $browser->agent)
        	return null;

        $expires = strtotime($data->expires);
        if($expires < time())
        	return null;

        return (object)['user'=>$data->user, 'session'=>$data->session];
    }
}