<?php <<__EntryPoint>> function main() {
$headers = <<<HEADERS
From: =?UTF-8?B?PGZvb0BleGFtcGxlLmNvbT4=?=
Subject: =?ks_c_5601-1987?B?UkU6odk=?=
X-Foo: =?ks_c_5601-1987?B?UkU6odk=?= Foo
X-Bar: =?ks_c_5601-1987?B?UkU6odk=?= =?UTF-8?Q?Foo?=
To: <test@example.com>
HEADERS;

$decoded = iconv_mime_decode_headers($headers, ICONV_MIME_DECODE_CONTINUE_ON_ERROR, 'UTF-8');

var_dump($decoded['From']);
var_dump($decoded['Subject']);
var_dump($decoded['X-Foo']);
var_dump($decoded['X-Bar']);
var_dump($decoded['To']);

$decoded = iconv_mime_decode_headers($headers, ICONV_MIME_DECODE_CONTINUE_ON_ERROR | ICONV_MIME_DECODE_STRICT, 'UTF-8');

var_dump($decoded['From']);
var_dump($decoded['Subject']);
var_dump($decoded['X-Foo']);
var_dump($decoded['X-Bar']);
var_dump($decoded['To']);
}
