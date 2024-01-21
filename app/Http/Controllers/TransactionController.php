<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class TransactionController extends Controller
{
    // public function execPostRequest($url, $data)
    // {
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Content-Length: ' . strlen($data))
    //     );
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //     //execute post
    //     $result = curl_exec($ch);
    //     //close connection
    //     curl_close($ch);
    //     return $result;
    // }

    // public function online_payment(Request $request) 
    // {
    //     $data_deposit = $request->all();
    //     // Remove non-numeric characters from the string
    //     $get_amount = preg_replace("/[^0-9]/", "", $data_deposit['amount']);
    //     // Convert the string to an integer for comparison
    //     $get_amount = (int) $get_amount;
    //     // dd($data_deposit);
    //     // thanh toán momo
    //     $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
    //     $partnerCode = 'MOMOBKUN20180529';
    //     $accessKey = 'klm05TvNBzhg7h7j';
    //     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    //     $orderInfo = "Thanh toán qua MoMo";
    //     $amount = "10000";
    //     $orderId = time() . "";
    //     //redirect sau khi thanh toán
    //     $redirectUrl = "http://localhost/tvmovie";
    //     $ipnUrl = "http://localhost/tvmovie";
    //     $extraData = "";

    //     $partnerCode = $partnerCode;
    //     $accessKey = $accessKey;
    //     $serectkey = $secretKey;
    //     $orderId = $orderId; // Mã đơn hàng
    //     $orderInfo = $orderInfo;
    //     $amount = $amount;
    //     $ipnUrl = $ipnUrl;
    //     $redirectUrl = $redirectUrl;
    //     $extraData = $extraData;

    //     $requestId = time() . "";
    //     $requestType = "payWithATM";
    //     // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //     //before sign HMAC SHA256 signature
    //     $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    //     $signature = hash_hmac("sha256", $rawHash, $serectkey);
    //     $data = array('partnerCode' => $partnerCode,
    //         'partnerName' => "Test",
    //         "storeId" => "MomoTestStore",
    //         'requestId' => $requestId,
    //         'amount' => $amount,
    //         'orderId' => $orderId,
    //         'orderInfo' => $orderInfo,
    //         'redirectUrl' => $redirectUrl,
    //         'ipnUrl' => $ipnUrl,
    //         'lang' => 'vi',
    //         'extraData' => $extraData,
    //         'requestType' => $requestType,
    //         'signature' => $signature);
    //     $result = $this->execPostRequest($endpoint, json_encode($data));
    //     dd($result);
    //     $jsonResult = json_decode($result, true);  // decode json
    //     // dd($jsonResult);

    //     //Just a example, please check more in there
    //     return redirect()->to($jsonResult['payUrl']);
    //     // header('Location: ' . $jsonResult['payUrl']);
    // }

    public function online_payment(Request $request) 
    {
        // Thanh toán bằng VN-PAY / Demo thanh toán bằng ngân hàng NCB

        $data_deposit = $request->all();
        // Remove non-numeric characters from the string
        $get_amount = preg_replace("/[^0-9]/", "", $data_deposit['amount']);
        // Convert the string to an integer for comparison
        $get_amount = (int) $get_amount;
        Session::put('temp_amount', $get_amount);

        $total = $get_amount;
        // Tạo CODE đơn hàng tự động
        $randomNumber = mt_rand(9999, 1000000);
        $orderCode = "OD-" . $randomNumber;
        // Cấu hình VN-PAY
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // URL giao diện thanh toán VN-PAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // URL trả về khi thanh toán thành công
        $vnp_Returnurl = "http://127.0.0.1/tvmovie/online-payment/cap-nhat-so-du";
        // Tài khoản và mật khẩu của SANBOX VN-PAY (Demo Test)
        $vnp_TmnCode = "II78YVTZ";//Mã website tại VN-PAY
        $vnp_HashSecret = "KIJTXHPLDUJIVKGKDHQFWDMIXRWXPSZV";//Chuỗi kí tự bí mật
        // Cấu hình thông tin thanh toán đặt vé
        $vnp_TxnRef = $orderCode; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán mua phim tại TVMOVIE';// Thông tin đơn hàng
        $vnp_Amount = $total * 100; // Tổng tiền cần thanh toán
        $vnp_Locale = 'vn'; // việt nam
        $vnp_OrderType = 'payment';
        // tạo mảng chứa thông tin thanh toán VN-PAY
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'Thanh toán mua phim thành công.'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        return redirect($vnp_Url);

    }

    public function response(Request $request)
    {
        // Xử lý khi thanh toán thành công
        if ($request->vnp_ResponseCode === "00") {
            // cập nhật số dư khi thanh toán thành công
            $get_customer_id = Session::get('customer_id');
            $customer = Customer::where('id', $get_customer_id)->first();
            $get_balance = $customer->balance;
            
            // Remove non-numeric characters from the string
            $format_balance = preg_replace("/[^0-9]/", "", $get_balance);
            // Convert the string to an integer for comparison
            $format_balance = (int) $format_balance;
            $get_amount = Session::get('temp_amount');
            $new_amount = $format_balance + $get_amount;
            $new_amount = number_format($new_amount, 0, ',', '.') . ' VND';
            $customer->balance = $new_amount;
            $customer->save();
            Session::put('balance', $customer->balance);
            Toastr::success('Nạp tiền thành công', 'Thành công');
            return redirect('/');

        } else {
            // Xử lý khi thanh toán thất bại
            Toastr::error('Nạp tiền không thành công', 'Thất bại');
            return redirect('/');
        }

    }
}

// test momo:
// NGUYEN VAN A
// 9704 0000 0000 0018
// 03/07
// OTP


//test vnpay:
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ: NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456