<?php

if (!function_exists('responseData')) {
    function responseData($data = [], $message = 'success', $status = 200)
    {
        return [
            'message' => $message,
            'data' => $data,
            'status' => $status
        ];
    }
}

if (!function_exists('responseError')) {
    function responseError($data = [], $message = 'error', $status = 500)
    {
        return [
            'message' => $message,
            'data' => $data,
            'status' => $status
        ];
    }
}