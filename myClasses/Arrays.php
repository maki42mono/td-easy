<?php


namespace myClasses;


class Arrays
{
    private $arr = [];
    private $uniq = [];
    private $min = 1;
    private $max;

    public function __construct(int $max = 1000, int $col = 5, int $row = 7)
    {
        $this->max = $max;

        for ($i = 0; $i < $col; $i++) {
            for ($j = 0; $j < $row; $j++) {
                $rand = self::getRand($this->min, $this->max);
                while (!$this->checkIfUniq($rand)) {
                    $rand = self::getRand($this->min, $this->max);
                }
                $this->setVal($rand, $i, $j);
            }
        }
    }

    private static function getRand(int $min, int $max)
    {
        if ($max < 35) die("Max должен быть больше 35, иначе залупится цикл");
        return rand($min, $max);
    }

    private function checkIfUniq($to_check): bool
    {
        if (isset($this->uniq[$to_check])) {
            return false;
        }

        return true;
    }

    private function setVal($val, $col, $row)
    {
        $this->arr[$col][$row] = $val;
        $this->uniq[$val] = 'Q';
    }

    public function getArr()
    {
        return $this->arr;
    }

    public function __toString()
    {
        $res = "<table>";
        foreach ($this->arr as $key => $value) {
            $res .= "<tr>";
            foreach ($value as $curr) {
                $res .= "<td align='right'>{$curr}</td>";
            }
            $res .= "</tr>";
        }
        $res .= "</table>";

        return $res;
    }

    private static function getCellFormatted(int $cell): string
    {
        $res = (string)$cell;
        $res = "";

        for ($i = 1; $i < 4 - (strlen($res) + 1); $i++) {
            $res .= "_";
        }

        $res .= $cell . " ";

        return $res;
    }

    public static function run1(): void
    {
        $arr = new self();
        echo $arr;
    }
}