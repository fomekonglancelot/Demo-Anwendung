<?php


namespace App\DTO;


use phpDocumentor\Reflection\Types\This;

class Converter
{
    public $locale;

    /**
     * Converter constructor.
     * @param string|null $locale
     */
    public function __construct(?string $locale = null)
    {
        $this->locale = $locale;

        if (!$locale) {
            $this->locale = app()->getLocale();
        }
    }

    /**
     * @return string
     */
    public function currency($country): string
    {
        $currency = '';
        switch ($country) {
            case 'us':
                $currency = '$';
                break;
            default:
                $currency = '€';
                break;
        }
        return $currency;
    }

    /**
     * @param $salary
     * @param string|null $currency
     * @return string
     */
    public function getSalary($salary, string $currency): string
    {
        if ($currency) {
            return self::numberFormat($salary) . $currency;
        }
        return strval(self::numberFormat($salary)) . self::currency();
    }

    /**
     * @param $number
     */
    public function numberFormat($country, $number): string
    {

        $format = '';
        switch ($country) {
            case 'us':
                $format = number_format($number, 2, '.', ',');
                break;

            case 'fr':
                $format = number_format($number, 2, ',', ' ');
                break;

            default:
                $format = number_format($number, 2, ',', '.');
                break;

        }

        return $format;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function determinedCountry(string $currency): string
    {
        $country = '';

        if (($this->locale === "de" || $this->locale === "fr") && $currency === "$") {

            return $country = "us";

        } else if ($this->locale === "fr" && $currency === "€") {
            return $country = "fr";

        } else {
            return $country = "de";
        }

        return $country;
    }

}
