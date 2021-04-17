<?php


namespace myClasses;


class Arrays
{
    private $arr = [];
    private $row_sum = [];
    private $column_sum = [];
    private $uniq = [];
    private $min = 1;
    private $max;
    private $col;
    private $row;

    public function __construct(int $max = 1000, int $col = 5, int $row = 7)
    {
        $this->max = $max;
        $this->col = $col;
        $this->row = $row;

        for ($i = 0; $i < $col; $i++) {

            for ($j = 0; $j < $row; $j++) {

                $rand = $this->getRand($this->min, $this->max);

                while (!$this->checkIfUniq($rand)) {
                    $rand = $this->getRand($this->min, $this->max);
                }
                $this->setVal($rand, $i, $j);
            }
        }
    }

    private function getRand(int $min, int $max)
    {
        $limit = $this->row * $this->col;
        if ($max < ($limit)) die("Max должен быть больше {$limit}, иначе залупится цикл");
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
        $this->row_sum[$row] += $val;
        $this->column_sum[$col] += $val;
        $this->uniq[$val] = 'Q';
    }

    public function getArr()
    {
        return $this->arr;
    }

    public function __toString()
    {
//        $res = "<style></style>";
        $res = "<table>";
        $style = "align='right' width='20px'";
        $res .= "<tr><td></td>";
        foreach ($this->row_sum as $curr) {
            $res .= "<td {$style}><b>{$curr}</b></td>";
        }
        $res .= "</tr>";
        for ($i = 0; $i < $this->col; $i++) {
            $res .= "<tr>";
            for ($j = 0; $j < $this->row; $j++) {
                if ($j == 0) {
                    $res .= "<td {$style}><b>{$this->column_sum[$i]}</b></td>";
                }

                $res .= "<td {$style}'>{$this->arr[$i][$j]}</td>";
            }
            $res .= "</tr>";
        }
        $res .= "</table>";

        return $res;
    }

    public static function run1(): void
    {
        echo "Тест 5 * 7, от 1 до 1000 (как в задании)<br><br>";

        $arr = new self();
        echo $arr;

        echo "<br><br>";
    }

    public static function run2(): void
    {
        echo "Тест 2 * 3, от 1 до 6, чтобы было удобнее проверить суммы<br><br>";

        $arr = new self(6, 2, 3);
        echo $arr;

        echo "<br><br>";
    }

    public static function run3(): void
    {
        echo "Тест 5 * 7, чтобы удобнее было увидеть уникальность значений<br><br>";

        $arr = new self(35);
        echo $arr;

        echo "<br><br>";
    }

    public static function run4(): void
    {
        echo "Тест 5 * 7 со значениями от 1 до 34, чтобы показать ошибку<br><br>";

        $arr = new self(34);
        echo $arr;

        echo "<br><br>";
    }

    public function printSums() {
        var_dump($this->row_sum);
        var_dump($this->column_sum);
    }
}