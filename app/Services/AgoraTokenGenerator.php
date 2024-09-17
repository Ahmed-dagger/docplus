<?php

namespace App\Services;

class AgoraTokenGenerator
{
    public static function generateToken($appId, $appCertificate, $channelName, $uid, $role, $expireTime = 3600)
    {
        $currentTimestamp = time();
        $privileges = [
            'join_channel' => $expireTime,
        ];

        switch ($role) {
            case 'publisher':
                $privileges['publish_audio'] = $expireTime;
                $privileges['publish_video'] = $expireTime;
                break;

            case 'subscriber':
                // No additional privileges for subscribers
                break;
        }

        $signature = hash_hmac('sha256', $channelName . $uid . $currentTimestamp . $expireTime . json_encode($privileges), $appCertificate);

        return [
            'token' => base64_encode(json_encode([
                'app_id' => $appId,
                'channel_name' => $channelName,
                'uid' => $uid,
                'role' => $role,
                'expire_time' => $expireTime,
                'privileges' => $privileges,
                'signature' => $signature
            ]))
        ];
    }
}
