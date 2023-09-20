<?php

namespace Modules\Sms\Services;

use GuzzleHttp\Client;
use Modules\Sms\Dto\SendSmsDto;

class CreateSendSmsService
{
    public function handle(SendSmsDto $dto)
    {
        $mobileNumber = $dto->getNumber();

        $message = $dto->getMessage() ?? setting()['default'];

        $response = $this->sendSms($mobileNumber, $message);
        if ($response['status'] == 'success') {
            echo $response['message'];
        } else {
            echo $response['message'];
        }
    }
    public function sendSms($mobileNumber, $message): array
    {
        $username = setting()['username'];
        $password = setting()['password'];
        $senderNumber = setting()['sender'];
        $receiverNumber = $mobileNumber;
        $client = new Client();
        $response = $client->get('http://sms20.ir/send_via_get/send_sms.php', [
            'query' => [
                'username' => $username,
                'password' => $password,
                'sender_number' => $senderNumber,
                'receiver_number' => $receiverNumber,
                'note' => $message,
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode == 200) {
            return ['status' => 'success', 'message' => 'پیامک با موفقیت ارسال شد', 'code' => $statusCode];
        } else {
            return ['status' => 'error', 'message' => 'خطا در ارتباط با سرویس پیامک', 'code' => $statusCode];
        }
    }

}
