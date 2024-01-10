<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function online_payment(Request $request) 
    {
        $data_deposit = $request->all();
        // Remove non-numeric characters from the string
        $get_amount = preg_replace("/[^0-9]/", "", $data_deposit['amount']);
        // Convert the string to an integer for comparison
        $get_amount = (int) $get_amount;
        // dd($data_deposit);
        // thanh toán momo
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        //redirect sau khi thanh toán
        $redirectUrl = "http://localhost/tvmovie";
        $ipnUrl = "http://localhost/tvmovie";
        $extraData = "";

        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        dd($result);
        $jsonResult = json_decode($result, true);  // decode json
        // dd($jsonResult);

        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }
}

// test momo:
// NGUYEN VAN A
// 9704 0000 0000 0018
// 03/07
// OTP

// test vnpay:
// (vnp_TmnCode): CGXZLS0Z
// (vnp_HashSecret): XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456