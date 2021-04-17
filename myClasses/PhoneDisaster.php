<?php


namespace myClasses;


class PhoneDisaster
{
    public static function getRandPhones(): array
    {
        $res_arr = [];

        for ($i = 0; $i <= 15; $i++) {
            $res_arr[] = self::getRandPhoneNumber();
        }

        return $res_arr;
    }

    public static function getRandPhoneNumber(): string
    {
        $r = function () {
            return rand(0,9);
        };

        $res = "+7 9{$r()}{$r()} {$r()}{$r()}{$r()}-{$r()}{$r()}{$r()}{$r()}";

        return $res;

    }

    public static function getRandCity(): string
    {
        $cities = [
            'Геленджик',
            'Новосибирск',
            'Самара',
        ];

        $get_rand_city = function ($cities) {
            return $cities[rand(0, count($cities) - 1)];
        };

        return $get_rand_city($cities);
    }
}