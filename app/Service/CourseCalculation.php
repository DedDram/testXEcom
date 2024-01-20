<?php

namespace App\Service;

use App\Models\CurrencyName;

class CourseCalculation
{
   public static function getCourse(string $fromCurrencyCode, string $toCurrencyCode, int $amount): float|int
   {
       // Получение последнего курса для исходной валюты
       $fromRate = CurrencyName::where('currency_code', $fromCurrencyCode)
           ->firstOrFail()
           ->exchanges()
           ->latest('timestamp')
           ->value('course');

       // Получение последнего курса для целевой валюты
       $toRate = CurrencyName::where('currency_code', $toCurrencyCode)
           ->firstOrFail()
           ->exchanges()
           ->latest('timestamp')
           ->value('course');

        // Расчет суммы в целевой валюте
       return ($amount / $fromRate) * $toRate;
   }
}
