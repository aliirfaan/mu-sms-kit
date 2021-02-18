<?php
namespace Aliirfaan\SmsKit;

use Aliirfaan\SmsKit\GatewayResponse;

/**
 *  Use Messaging Gateway Platform to send SMS messages
 *  @author aliirfaan
 */
class Sms
{
    /**
     * The service endpoint
     *
     * @var string
     */
    private $apiUrl;
        
    /**
     * The account username
     *
     * @var string
     */
    private $username;

    /**
     * The account password
     *
     * @var string
     */
    private $password;
        
    /**
     * The account from sender Id
     *
     * @var string
     */
    private $senderId;

    /**
     * Create a new instance
     *
     * @param  string  $username
     * @param  string  $password
     * @param  string  $senderId
     * @param  string  $apiUrl
     *
     * @return void
     */
    public function __construct($username, $password, $senderId, $apiUrl)
    {
        $this->username = $username;
        $this->password = $password;
        $this->senderId = $senderId;
        $this->apiUrl = $apiUrl;
    }
    
    /**
     * Send a text message
     *
     * Use cURL to send request to a URL
     *
     * @param  string $phoneNumber
     * @param  string $message
     * @param  int $concatenated Possible values are true or false. If true the message is sent as concatenated if udata message is more than 160 chars.
     * @param  string $deferred
     * @param  string $dsr
     * @param  int $connectTimeoutSeconds Number of seconds that cURL should timeout
     * @return array $data
     */
    public function sendSms($phoneNumber, $message, $concatenated = 1, $deferred = 'false', $dsr = 'true', $connectTimeoutSeconds = 60)
    {
        $data = array(
            'result' => null,
            'success' => false,
            'message' => null,
        );
        
        $smsParams = array(
            'UserName' => $this->username,
            'PassWord' => $this->password,
            'SenderId' => $this->senderId,
            'Number' => $phoneNumber,
            'UserData' => $message,
            'Concatenated' => $concatenated,
            'Deferred' => $deferred,
            'Dsr' => $dsr
        );
        $data['params'] = $smsParams;

        $requestParams = http_build_query($smsParams);
        $requestUrl = $this->apiUrl . '?' . $requestParams;

        try {
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_FAILONERROR  => 1,
                    CURLOPT_CONNECTTIMEOUT  => $connectTimeoutSeconds,
                    CURLOPT_URL => $requestUrl,
                    CURLOPT_NOBODY => 1,
                    CURLOPT_HEADER => 1
                )
            );
            $result = curl_exec($curl);
            if (!$result) {
                $data['message'] = 'Error: ' . curl_error($curl) . ' - Code: ' . curl_errno($curl);
            } else {
                $curlInfo = curl_getinfo($curl);
                $httpStatusCode = intval($curlInfo['http_code']);
                if ($httpStatusCode !== 200) {
                    $data['message'] = 'SMS was not sent. HTTP error code: '.$httpStatusCode;
                } else {
                    $result = trim($result);

                    $smsWasSent = $this->smsWasSent($result);
                    $data['result'] = $result;
                    $data['success'] =  $smsWasSent['success'];
                    $data['message'] = $smsWasSent['message'];
                }
            }
            curl_close($curl);
        } catch (\Exception $e) {
            $data['message'] = 'An exception occured: '.$e->getMessage();
        }

        return $data;
    }
        
    /**
     * getTransactionReference
     *
     * Response is usually in this format: 23057713610-0306201020101331756371100
     * We explode at '-' to get transaction reference
     *
     * @param  string $response
     * @return string transaction reference
     */
    public function getTransactionReference($response)
    {
        $transactionReference = null;

        $responsePieces = explode('-', $response);
        if (\array_key_exists(1, $responsePieces)) {
            $transactionReference = $responsePieces[1];
        }
        $transactionReference = strval($transactionReference);

        return $transactionReference;
    }
    
    /**
     * smsWasSent
     *
     * Read transaction reference to see if sms was actually sent or we got an error code
     * @param  string $transactionReference
     * @return array
     */
    public function smsWasSent($transactionReference)
    {
        $data = array(
            'success' => false,
            'message' => null,
        );

        if (\array_key_exists($transactionReference, GatewayResponse::statusTexts)) {
            $data['message'] = 'SMS was not sent. Code: '.$transactionReference.' Description: '.GatewayResponse::statusTexts[$transactionReference];
        } elseif ($transactionReference == '') {
            $data['message'] = 'SMS was not sent. An unknown error occured';
        } else {
            $data['message'] = $transactionReference;
            $data['success'] = true;
        }

        return $data;
    }
}