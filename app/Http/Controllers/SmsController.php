<?php

namespace App\Http\Controllers;

use App\Modules\SmsModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{
    public function indexSendSms(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('indexSms');
    }

    public function indexSetting(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('indexSetting');
    }

    public function StoreSendSms(Request $request)
    {
        $rules = [
            'mobile_number' => 'required|ir_mobile',
            'message' => 'required|persian_alpha_eng_num',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            } else {
                return back()->withErrors($validator)->withInput();
            }
        }
        $mobileNumber = $request->input('mobile_number');
        $message = ($request->has('message')) ? $request['message'] : 'باتشکر از شما بزودی با شما تماس خواهیم گرفت ';

        $smsApi = new SmsModule();
        $response = $smsApi->sendSms($mobileNumber, $message);

        if ($request->ajax()) {
            if ($response['status'] == 'success') {
                return response()->json(['message' => $response['message'], 'code' => $response['code']]);
            } else {
                return response()->json(['message' => $response['message'], 'code' => $response['code']]);
            }
        } else {
            if ($response['status'] == 'success') {
                echo $response['message'];
            } else {
                echo $response['message'];
            }
        }
    }

    public function storeSetting(Request $request): \Illuminate\Http\RedirectResponse
    {
        Artisan::call('config:clear');
        if ($request->username) {
            $this->setConfig('username', $request->username);
        }
        if ($request->password) {
            $this->setConfig('password', $request->password);
        }
        if ($request->sender) {
            $this->setConfig('sender', $request->sender);
        }
        if ($request->secret) {
            $this->setConfig('secret', $request->secret);
        }
        if ($request->api) {
            $this->setConfig('api', $request->api);
        }
        return redirect()->back();
    }

    public function setConfig($field, $value): bool
    {
        $configFilePath = '../config/smsSettings.php';
        $configContent = file_get_contents($configFilePath);

        if ($configContent !== false) {
            $configContent = preg_replace("/'" . $field . "' => '(.*)'/", "'" . $field . "' => '$value'", $configContent);
            if (file_put_contents($configFilePath, $configContent) !== false) {
                Artisan::call('config:cache');
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
