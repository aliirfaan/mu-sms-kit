<?php
namespace Aliirfaan\SmsKit\Tests;

use PHPUnit\Framework\TestCase;
use Aliirfaan\SmsKit\Sms;

/**
*  Test for myt-sms helper class
*  @author aliirfaan
*/
class SmsTest extends TestCase
{
    private $username = 'test';

    private $password = 'test';

    private $senderId = 'test';

    private $apiUrl = 'test';

    public function providerTestSmsWasSent()
    {
        return array(
            array('0306201020101331756371100', true),
            array('91', false),
            array('4000', false),
            array('01', false),
            array('7', false),
            array('', false)
        );
    }

    public function providerTestGetTransactionReference()
    {
        return array(
            array('23057723610-0306201020101331756371100', '0306201020101331756371100'),
            array('7713611-91', '91'),
            array('7713611-01', '01'),
            array('7713611-', ''),
            array('91', ''),
            array('9991', ''),
            array('abc', ''),
            array('', '')
        );
    }

    /**
     * @dataProvider providerTestSmsWasSent
     */
    public function testSmsWasSent($transactionReference, $expectedResult)
    {
        $sms = new Sms($this->username, $this->password, $this->senderId, $this->apiUrl);

        $result = $sms->smsWasSent($transactionReference);
        $this->assertEquals($expectedResult, $result['success']);
    }

    /**
     * @dataProvider providerTestGetTransactionReference
     */
    public function testGetTransactionReference($response, $expectedResult)
    {
        $sms = new Sms($this->username, $this->password, $this->senderId, $this->apiUrl);

        $result = $sms->getTransactionReference($response);
        $this->assertEquals($expectedResult, $result);
    }
}
