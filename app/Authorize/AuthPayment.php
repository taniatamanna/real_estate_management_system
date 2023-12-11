<?php
namespace App\Authorize;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeNetPayment

{
    private $APILoginId;
    private $APIKey;
    private $refId;
    private $merchantAuthentication;
    public $responseText;


    public function __construct()
    {

        $this->APILoginId = env('AuthorizeNetApiID');
        $this->APIKey = env('AuthorizeNetTransaction');

        $this->refId = 'rf' . rand(1,1000);

        $this->merchantAuthentication = $this->setMerchantAuthentication();
        $this->responseText = array("1"=>"Approved", "2"=>"Declined", "3"=>"Error", "4"=>"Held for Review");
    }

    public function setMerchantAuthentication()
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($this->APILoginId);
        $merchantAuthentication->setTransactionKey($this->APIKey);

        return $merchantAuthentication;
    }

    public function setCreditCard($cardDetails)
    {
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardDetails["card"]);
        $creditCard->setExpirationDate( $cardDetails["expyear"] . "-" . $cardDetails["expmonth"]);
        $paymentType = new AnetAPI\PaymentType();
        $paymentType->setCreditCard($creditCard);

        return $paymentType;
    }

    public function setTransactionRequestType($paymentType, $amount)
    {
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($paymentType);

        return $transactionRequestType;
    }

    public function chargeCreditCard($cardDetails)
    {
        $environment  = env('AUTHORIZENET_MODE');
        $paymentType = $this->setCreditCard($_POST);
        $transactionRequestType = $this->setTransactionRequestType($paymentType, $cardDetails['amount']);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId( $this->refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        //$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        if ($environment === 'PRODUCTION') {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }
        elseif ($environment === 'SANDBOX')
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        }
         else {
            $response = '';
        }
        return $response;
    }
}
