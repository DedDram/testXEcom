<?php
namespace App\Models;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.xe.com/api/protected/midmarket-converter/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Authority: www.xe.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: ru,en;q=0.9,ba;q=0.8,it;q=0.7,pt;q=0.6,de;q=0.5,uk;q=0.4,cy;q=0.3,mt;q=0.2,sr;q=0.1,bg;q=0.1';
$headers[] = 'Authorization: Basic bG9kZXN0YXI6cHVnc25heA==';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Cookie: xeid=c0ce3b1a-28be-4d01-8d8d-9cd35be1d10d; dashboardCurrencies=[%22USD%22%2C%22EUR%22%2C%22AED%22%2C%22RUB%22]; userId=0df04ac6-5a87-4c1c-a7ba-d5397376ab40; lastQuote={%22sendingAmount%22:1000%2C%22sendingCurrency%22:%22USD%22%2C%22receivingAmount%22:%22%22%2C%22receivingCurrency%22:%22USD%22%2C%22fixedField%22:%22sending%22%2C%22destinationCountry%22:%22US%22}; __gtm_referrer=https%3A%2F%2Fpersonal-registration.xe.com%2F; IR_gbd=xe.com; IR_12610=1705662499422%7C0%7C1705662499422%7C%7C; IR_PI=b0ded5c8-b6ba-11ee-bd25-59d6a86f6c0d%7C1705748899422; xeConsentState={%22performance%22:true%2C%22marketing%22:true%2C%22compliance%22:true}; xe_sso_sid=s%3A7nN1VO2wxZVm8fjpJsFFNwm_MJCaB6MW.llymzbe1yQ5V4v2j%2Fn8q1xuxNP9%2BTHqsiisGtX%2Bi5BQ; amp_470887=MMjEvi66Fa9CS5RDu1KKWz...1hkgmbnt1.1hkgmh6uo.8.5.d';
$headers[] = 'Dnt: 1';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Referer: https://www.xe.com/currencyconverter/';
$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"118\", \"YaBrowser\";v=\"23.11\", \"Not=A?Brand\";v=\"99\", \"Yowser\";v=\"2.5\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 YaBrowser/23.11.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

