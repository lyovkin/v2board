<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller {

	public function createPayment(Request $request)
    {
        $user = $request->user()->id;
        $sum = $request->get('OutSum');
        $mrh_login = config('roboconfig.testLogin');
        $mrh_pass1 = config('roboconfig.testPassword1');
        $inv_id = mt_rand();
        $inv_desc = 'Пополнение баланса';
        $crc = md5("$mrh_login:$sum:$inv_id:$mrh_pass1");

        if($sum != 0) {
            $payment = new Payment();
            $payment->uid = $inv_id;
            $payment->user_id = $user;
            $payment->balance = $sum;
            $payment->description = $inv_desc;
            $payment->operation = '+';
            $payment->save();
        }
        return redirect()->action('ZaLaravel\LaravelRobokassa\Controllers\IpnRobokassaController@getResult', array('OutSum' => $sum, 'InvId' => $inv_id));
       // header("Location: http://test.robokassa.ru/Index.aspx?MrchLogin=$mrh_login&OutSum=$sum&InvId=$inv_id&Desc=$inv_desc&SignatureValue=$crc");
    }
}
