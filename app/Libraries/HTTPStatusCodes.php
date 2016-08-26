<?php

namespace App\Libraries;

class HTTPStatusCodes
{
    public static function code($status)
    {
        $codes = self::statusCodes();

        $filtered = null;

        for ($i = 0, $n = count($codes); $i < $n; $i++) {
            if ($codes[$i]['status'] == $status) {
                $filtered = $codes[$i];
                break;
            }
        }

        return $filtered;
    }

    private static function statusCodes()
    {
        return [
            ['status' => 100, 'description' => 'Continue', 'type' => 'Informational', 'is_successful' => true],
            ['status' => 101, 'description' => 'Switching Protocols', 'type' => 'Informational', 'is_successful' => true],
            ['status' => 200, 'description' => 'OK', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 201, 'description' => 'Created', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 202, 'description' => 'Accepted', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 203, 'description' => 'Non-Authoritative Information', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 204, 'description' => 'No Content', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 205, 'description' => 'Reset Content', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 206, 'description' => 'Partial Content', 'type' => 'Successful', 'is_successful' => true],
            ['status' => 300, 'description' => 'Multiple Choices', 'type' => 'Redirection', 'is_successful' => true],
            ['status' => 301, 'description' => 'Moved Permanently', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 302, 'description' => 'Found', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 303, 'description' => 'See Other', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 304, 'description' => 'Not Modified', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 305, 'description' => 'Use Proxy', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 307, 'description' => 'Temporary Redirect', 'type' => 'Redirection', 'is_successful' => false],
            ['status' => 400, 'description' => 'Bad Request', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 401, 'description' => 'Unauthorized', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 402, 'description' => 'Payment Required', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 403, 'description' => 'Forbidden', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 404, 'description' => 'Not Found', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 405, 'description' => 'Method Not Allowed', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 406, 'description' => 'Not Acceptable', 'type' => 'Client Error', 'is_successful' => true],
            ['status' => 407, 'description' => 'Proxy Authentication Required', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 408, 'description' => 'Request Timeout', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 409, 'description' => 'Conflict', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 410, 'description' => 'Gone', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 411, 'description' => 'Length Required', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 412, 'description' => 'Precondition Failed', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 413, 'description' => 'Request Entity Too Large', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 414, 'description' => 'Request-URI Too Long', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 415, 'description' => 'Unsupported Media Type', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 416, 'description' => 'Requested Range Not Satisfiable', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 417, 'description' => 'Expectation Failed', 'type' => 'Client Error', 'is_successful' => false],
            ['status' => 500, 'description' => 'Internal Server Error', 'type' => 'Server Error', 'is_successful' => false],
            ['status' => 501, 'description' => 'Not Implemented', 'type' => 'Server Error', 'is_successful' => false],
            ['status' => 502, 'description' => 'Bad Gateway', 'type' => 'Server Error', 'is_successful' => false],
            ['status' => 503, 'description' => 'Service Unavailable', 'type' => 'Server Error', 'is_successful' => false],
            ['status' => 504, 'description' => 'Gateway Timeout', 'type' => 'Server Error', 'is_successful' => false],
            ['status' => 505, 'description' => 'HTTP Version Not Supported', 'type' => 'Server Error', 'is_successful' => false],
        ];
    }
}
