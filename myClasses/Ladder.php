<?php

namespace myClasses;

class Ladder
{
    private $top = 100;
    private $start = 1;
    private $step = 1;
    private const DELIMITER = " ";
    private const BREAK = "<br>";

    public function __construct(array $raw = null)
    {
        if (isset($raw["start"])) {
            if (!isset($raw["top"]) && $raw["start"] >= $this->top) {
                throw new \Exception("Или задайте start ({$raw['start']}) меньше 100, или задайте top > {$raw['start']}");
            }
            $this->setStartValue($raw["start"]);
        }

        if (isset($raw["top"])) {
            $this->setTopValue($raw["top"]);
        }

        if (isset($raw["step"])) {
            $this->setStepValue($raw["step"]);
        }
    }

    public function build(): string
    {
        $res = "";
        $last_level_counter = 1;
        for ($i = $this->start; $i <= $this->top; ) {
            for ($j = 1; $j <= $last_level_counter; $j++) {
                $res .= $i;
                $i += $this->step;
                if ($i > $this->top) {
                    break;
                }
                $res .= self::DELIMITER;
            }
            $res .= self::BREAK;
            $last_level_counter++;
        }

        return $res;
    }

    public function setStartValue($start)
    {
        if (!is_int($start)) {
            throw new \Exception("start ({$start}) должно быть типа int");
        }
        $this->start = $start;

        return true;
    }

    public function setStepValue($step)
    {
        if (!is_int($step)) {
            throw new \Exception("step ({$step}) должно быть типа int");
        }

        if ($step < 1) {
            throw new \Exception("step ({$step}) должно быть больше 0");
        }
        $this->step = $step;

        return true;
    }

    public function setTopValue($top)
    {
        if (!is_int($top)) {
            throw new \Exception("top ({$top}) должно быть типа int");
        }

        if ($top < $this->start) {
            throw new \Exception("Верхнее значение должно ({$top}) быть выше стартового ({$this->start})");
        }
        $this->top = $top;

        return true;
    }

    public static function run1()
    {

        echo "Тест без параметров, чтоб было как в задании.<br><br>";

        $ladder = new self();
        echo $ladder->build();

        echo "<br><br>";
    }

    public static function run2()
    {
        $data = [
            "start" => 3,
            "top" => 278,
            "step" => 6,
        ];

        echo "Тест с начальным, конечным значением лесенки и шагом.<br>";
        echo "Чтобы показать, что это все не просто так.<br><br>";

        $ladder = new self($data);
        echo $ladder->build();

        echo "<br><br>";
    }

    public static function run3()
    {
        $data = [
            "start" => 101,
        ];

        echo "Тест с неправильным начальным значением.<br>";

        $ladder = new self($data);
        echo $ladder->build();

        echo "<br><br>";
    }
}