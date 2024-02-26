<?php

namespace SimpleCli\Trait\Command;

/**
 * コマンドラインへプログレスバーを表示する処理を管理する
 * 
 * @package SimpleCli\Trait\Command
 * 
 * @method bool isCli()
 * 
 * @method void carriageReturn()
 * @method void outputWithoutNewLine(string $message)
 * @method void newLine(int $count = 1)
 */
trait ProgressBar
{
    /**
     * 現在プログレスバーを表示しているかどうか
     * 
     * @var bool
     */
    private $isProgress = false;

    /**
     * プログレスバーに現在使用されている記号のインデックス
     * 
     * @var int
     */
    private $symbolIndex = 0;

    /**
     * プログレスバーの進捗に使用する記号
     * 
     * @var string
     */
    protected $progressSymbol = "#";

    /**
     * プログレスバーに使用する記号のリスト
     * 
     * @var array<string>
     */
    protected $symbols = ["|", "/", "-", "\\"];


    /**
     * コマンドラインへのプログレスバー出力
     * 
     * @param int $percent
     * @throws \InvalidArgumentException
     * @return void
     */
    private function progress(int $percent): void
    {
        if ($percent < 0 || $percent > 100) throw new \InvalidArgumentException("Argument {$percent} is out of range.");

        $currentSymbol = $this->symbols[$this->symbolIndex];

        // Carriage Return
        $this->carriageReturn();

        // プログレスバーの出力
        $block = str_repeat($this->progressSymbol, $percent);
        $this->outputWithoutNewLine(sprintf("%s [%-100s]\t%3d%%", $currentSymbol, $block, $percent));

        $this->symbolIndex = ($this->symbolIndex + 1) % count($this->symbols);
    }

    /**
     * コマンドラインへのプログレスバー出力開始
     * 
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function startProgress(): void
    {
        // Cliでない場合は処理を終了
        if (!$this->isCli()) return;

        $this->isProgress = true;
        $this->progress(0);
    }

    /**
     * コマンドラインのプログレスバー更新
     * 
     * @param int $percent
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function updateProgress(int $percent): void
    {
        $percent >= 100 && $this->isProgress ? $this->endProgress() : $this->progress($percent);
    }

    /**
     * コマンドラインのプログレスバー出力終了
     * 
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function endProgress(): void
    {
        if (!$this->isProgress) return;

        $this->isProgress = false;

        $this->progress(100);
        $this->newLine();
    }
}
