<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if(!function_exists('formatarDocumento')) {
function formatarDocumento($documento)
{
if (strlen($documento) == 11) {
$documento = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', "\$1.\$2.\$3-\$4", $documento);
return $documento;
} else if (strlen($documento) == 14) {
$documento = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', "\$1.\$2.\$3/\$4-\$5",$documento);
return $documento;
} else {
return $documento;
}
}
}

if(!function_exists('onlyNumbers')) {
function onlyNumbers($value)
{
return preg_replace('/\D/', '', $value);
}
}

if (!function_exists('conversionDate')) {
function conversionDate($date, $showTime = true)
{
if (strlen($date)) {
$time = null;
if (strlen($date) > 10) {
$time = substr($date, 10, -3);
$date = substr($date, 0, 10);
}

$token = strpos($date, '/') ? '/' : '-';
$tmp = explode($token, $date);
foreach ($tmp as &$val) {
$val = str_pad($val, 2, 0, STR_PAD_LEFT);
}

if (!$showTime) {
return trim(implode(($token == '-' ? '/' : '-'), array_reverse($tmp)));
}

return trim(implode(($token == '-' ? '/' : '-'), array_reverse($tmp)) . " {$time}");
}

return '';
}
}
