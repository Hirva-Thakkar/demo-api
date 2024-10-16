<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class CountryController extends Controller
{

    // public function index($name) // Make sure to include the parameter here
    // {
    //     $client = new \GuzzleHttp\Client();

    //     $response = $client->get("https://restcountries.com/v3.1/name/" . urlencode($name));

    //     $body = $response->getBody()->getContents();

    //     $data = json_decode($body, true);

    //     // dd($data);

    //     return view('index', compact('data'));
    // }

    public function create()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $data = $response->getBody()->getContents();
        $countries = json_decode($data, true);
        // dd($countries);

        return view('create', ['countries' => $countries]);
    }
        //     public function create()
        // {
        //     $ch = curl_init();

        //     curl_setopt($ch, CURLOPT_URL, "https://restcountries.com/v3.1/all");
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        //     curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);  // Verify SSL certificate
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // Verify the host

        //     $response = curl_exec($ch);

        //     if (curl_errno($ch)) {
        //         return back()->withErrors('Error: ' . curl_error($ch));
        //     }

        //     curl_close($ch);

        //     $countries = json_decode($response, true);

        //     return view('create', ['countries' => $countries]);
        // }


    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
        $name = $request->input('country');

        $client = new Client();
        $response = $client->get("https://restcountries.com/v3.1/name/{$name}");
        $body = $response->getBody()->getContents();
        $country = json_decode($body, true);
        // https://openexchangerates.org/api/latest.json?app_id=YOUR_APP_ID
    }
    return view('index', ['data' => $country]);
    }

    public function createCurrency(){

        $value = ['CURRENCY_SYMBOLS' => [
        'USD' => '$',      // US Dollar
        'EUR' => '€',      // Euro
        'GBP' => '£',      // British Pound
        'INR' => '₹',      // Indian Rupee
        'JPY' => '¥',      // Japanese Yen
        'AUD' => 'A$',     // Australian Dollar
        'CAD' => 'C$',     // Canadian Dollar
        'CNY' => '¥',      // Chinese Yuan
        'RUB' => '₽',      // Russian Ruble
        'BRL' => 'R$',     // Brazilian Real
        'ZAR' => 'R',      // South African Rand
        'CHF' => 'CHF',    // Swiss Franc
        'SEK' => 'kr',     // Swedish Krona
        'NOK' => 'kr',     // Norwegian Krone
        'DKK' => 'kr',     // Danish Krone
        'SGD' => 'S$',     // Singapore Dollar
        'HKD' => 'HK$',    // Hong Kong Dollar
        'MXN' => 'Mex$',   // Mexican Peso
        'NZD' => 'NZ$',    // New Zealand Dollar
        'ARS' => '$',      // Argentine Peso
        'CLP' => 'CLP$',   // Chilean Peso
        'COP' => 'COL$',   // Colombian Peso
        'IDR' => 'Rp',     // Indonesian Rupiah
        'MYR' => 'RM',     // Malaysian Ringgit
        'THB' => '฿',      // Thai Baht
        'PHP' => '₱',      // Philippine Peso
        'KRW' => '₩',      // South Korean Won
        'TRY' => '₺',      // Turkish Lira
        'AED' => 'د.إ',    // UAE Dirham
        'SAR' => 'ر.س',    // Saudi Riyal
        'QAR' => 'ر.ق',    // Qatari Riyal
        'EGP' => '£',      // Egyptian Pound
        'PKR' => '₨',      // Pakistani Rupee
        'BDT' => '৳',      // Bangladeshi Taka
        'VND' => '₫',      // Vietnamese Dong
        'PLN' => 'zł',     // Polish Zloty
        'HUF' => 'Ft',     // Hungarian Forint
        'CZK' => 'Kč',     // Czech Koruna
        'RON' => 'lei',    // Romanian Leu
        'ILS' => '₪',      // Israeli New Shekel
        'NGN' => '₦',      // Nigerian Naira
        'KZT' => '₸',      // Kazakhstani Tenge
        'KWD' => 'د.ك',    // Kuwaiti Dinar
        'BHD' => 'ب.د',    // Bahraini Dinar
        'OMR' => 'ر.ع.',   // Omani Rial
        'JOD' => 'د.ا',    // Jordanian Dinar
        'LKR' => 'Rs',     // Sri Lankan Rupee
        'MMK' => 'K',      // Myanmar Kyat
        'XAF' => 'FCFA',   // Central African CFA Franc
        'XOF' => 'CFA',    // West African CFA Franc
        'TWD' => 'NT$',    // New Taiwan Dollar
        'MAD' => 'د.م.',   // Moroccan Dirham
        'DZD' => 'دج',     // Algerian Dinar
        'BND' => 'B$',     // Brunei Dollar
        'NPR' => '₨',      // Nepalese Rupee
        'MUR' => '₨',      // Mauritian Rupee
        'GHS' => 'GH₵',    // Ghanaian Cedi
        'KES' => 'KSh',    // Kenyan Shilling
        'TZS' => 'TSh',    // Tanzanian Shilling
        'UGX' => 'USh',    // Ugandan Shilling
        'ETB' => 'Br',     // Ethiopian Birr
        'BWP' => 'P',      // Botswana Pula
        'ZMW' => 'ZK',     // Zambian Kwacha
        'MZN' => 'MT',     // Mozambican Metical
        'GEL' => '₾',      // Georgian Lari
        'AZN' => '₼',      // Azerbaijani Manat
        'BYN' => 'Br',     // Belarusian Ruble
        'KGS' => 'лв',     // Kyrgyzstani Som
        'TMT' => 'm',      // Turkmenistani Manat
        'UZS' => 'сўм',    // Uzbekistani Som
        'LBP' => 'ل.ل',    // Lebanese Pound
        'SOS' => 'Sh',     // Somali Shilling
        'SDG' => 'ج.س.',   // Sudanese Pound
        'SYP' => '£',      // Syrian Pound
        'IRR' => '﷼',      // Iranian Rial
        'IQD' => 'ع.د',    // Iraqi Dinar
        'YER' => '﷼',      // Yemeni Rial
        'AFN' => '؋',      // Afghan Afghani
        ]]; 

        $currency = $value['CURRENCY_SYMBOLS'];
        return view('createCurrency', compact('currency'));
    }

    public function storeCurrency(Request $request){
        // dd($request->all());
        $inputData = $request->all();
        $inputCurrancy = $inputData['currency'];
        $inputPrice = $inputData['price'];
        $apiKey = '45f74722ca244085bf075dc98e479255';
        // dd('hee');
        $client = new Client();
        $response = $client->get("https://openexchangerates.org/api/latest.json?app_id={$apiKey}");

        $body = $response->getBody()->getContents();
        $country = json_decode($body, true);

        $exchangeRate = $country['rates'][$inputCurrancy];

        $convertPrice = number_format($inputPrice * $exchangeRate, 2);
        // dd($convertPrice);
        return response()->json(array('rates' => $convertPrice, 'exchange_rate' => $exchangeRate));
        // return view('createCurrency', compact('convertPrice'));
    }
}
