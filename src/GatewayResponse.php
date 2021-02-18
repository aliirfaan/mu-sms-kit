<?php
namespace Aliirfaan\SmsKit;

/**
 * GatewayResponse
 * @author aliirfaan
 */
class GatewayResponse
{
    /**
     * Status codes translation table.
     *
     * The list of codes returned by SMS API
     *
     * @var array
     */
    public const statusTexts = [
        '4000' => 'MAX_QUERY_STRING_LENGTH',
        '100' => 'MAX_PARAM_NAME_LENGTH',
        '3000' => 'MAX_PARAM_VALUE_LENGTH',
        '14' => 'MAX_HTTP_ORIG_ADDRESS_LEN',
        '16' => 'HTTP_MAX_MOBILENUMBER_LEN',
        '7' => 'MAX_HTTP_CLIENTID_LEN',
        '134' => 'HTTP_INVALID_CONTRY_CODE',
        '133' => 'HTTP_FLASH_MSG_LENGTH_EXCEEDED',
        '132' => 'HTTP_MESSAGE_LIMIT_EXCEEDED',
        '131' => 'HTTP_DBINSERT_FAILED',
        '130' => 'HTTP_HOLIDAYRESTRICTION_FAILED',
        '129' => 'HTTP_INVALID_PROTOCOL',
        '128' => 'HTTP_DBINIT_FAILED',
        '127' => 'HTTP_HTML_DIR_NOTSET',
        '126' => 'HTTP_CREATE_TARFILE_ERROR',
        '125' => 'HTTP_DATA_NOTAVAILABLE',
        '124' => 'HTTP_FILEOPEN_ERROR',
        '123' => 'HTTP_FILE_MISSING',
        '122' => 'HTTP_FILEOPEN_FAILED',
        '121' => 'HTTP_INVALID_FILE',
        '120' => 'HTTP_TIME_EXCEDED',
        '119' => 'HTTP_TIME_ELAPSED',
        '118' => 'HTTP_WRONGDATEFORMAT',
        '117' => 'HTTP_DATEFORMAT_MISSING',
        '116' => 'HTTP_SECOND_MISSING',
        '115' => 'HTTP_MINUTE_MISSING',
        '114' => 'HTTP_HOUR_MISSING',
        '113' => 'HTTP_DATE_MISSING',
        '112' => 'HTTP_CONCAT_MSG_MISSING',
        '111' => 'CFGPATH_NOTSET',
        '110' => 'SCRIPT_FILENAME_NOTSET',
        '109' => 'HOMEPATH_NOTSET',
        '108' => 'HTTP_INVALIDTIMEZONE_FAILED',
        '107' => 'HTTP_LOGINIT_FAILED',
        '106' => 'HTTP_GETCLIENTINFO_FAILED',
        '105' => 'HTTP_ACNTACTIVE_FAILED',
        '104' => 'HTTP_LOGINCLIENT_FAILED',
        '103' => 'HTTP_LMTCTRL_INT_FAILED',
        '102' => 'HTTP_MSGCTRL_INIT_FAILED',
        '101' => 'HTTP_WRONG_CLIENTID',
        '100' => 'HTTP_MSGCRTL_FAILED',
        '100' => 'HTTP_THROUPUT_NOT_AVAILABLE',
        '99' => 'HTTP_USERNAME_MISSING',
        '98' => 'HTTP_PASSWORD_MISSING',
        '97' => 'HTTP_MOBILE_NUMBER_MISSING',
        '96' => 'HTTP_USERDATA_MISSING',
        '95' => 'HTTP_DB_FAILURE',
        '94' => 'HTTP_SYSTEM_ERROR',
        '93' => 'HTTP_WRONG_UNAME',
        '92' => 'HTTP_WRONG_PASSWD',
        '91' => 'HTTP_INVALID_MOBILE_NUMBER',
        '90' => 'HTTP_UDH_MISSING',
        '01' => 'HTTP_DATA_AVAILABLE'
    ];
}
