<?php

namespace HorizonFramework\Core\CLI;

class ProgressBar
{
    /**
     * @var int $total The total number of steps in the progress bar.
     */
    private $total;

    /**
     * @var string $chart The character used to represent progress in the bar.
     */
    private $chart;

    /**
     * @var int $avance The current progress value.
     */
    private $avance;

    /**
     * @var bool $static Indicates if the progress bar is static.
     */
    private $static;

    /**
     * ProgressBar constructor.
     *
     * @param int    $total The total number of steps in the progress bar.
     * @param string $chart The character used to represent progress in the bar.
     */
    public function __construct($total = 100, $chart = '=')
    {
        $this->total = $total;
        $this->chart = $chart;
        $this->avance = 0;
    }

    /**
     * Set the progress bar as static.
     *
     * @return $this
     */
    public function static()
    {
        $this->static = true;

        return $this;
    }

    /**
     * Advance the progress bar by a specified amount.
     *
     * @param int $avance The amount to advance the progress bar.
     */
    public function advance(int $avance)
    {
        $this->avance = $avance;
        $this->output();
    }

    /**
     * Finish the progress bar by setting the progress to 100%.
     */
    public function finish()
    {
        $this->avance = 100;
        $this->output();
    }

    /**
     * Output the progress bar to the command line.
     */
    private function output()
    {
        $avance = str_repeat($this->chart, $this->avance);
        $pendiente = str_repeat(' ', $this->total - $this->avance);

        $porcentaje = $this->avance . "%";

        if ($this->static) {
            echo "\033[0;0H";
        }

        echo "[{$avance}{$pendiente}] {$porcentaje}" . PHP_EOL;
    }
}
