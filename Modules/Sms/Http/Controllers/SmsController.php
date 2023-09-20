<?php

namespace Modules\Sms\Http\Controllers;

use App\Modules\SmsModule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sms\Entities\Setting;
use Modules\Sms\Http\Requests\SendSmsRequest;
use Modules\Sms\Services\CreateSendSmsService;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('sms::indexSms' );
    }

    public function StoreSendSms(SendSmsRequest $request , CreateSendSmsService $service)
    {
        return $service->handle($request->getDto());
    }

}
