<?php

namespace SimpleCli\Trait\Command;

use SimpleCli\Enum\OutputColorEnum;

/**
 * コマンドラインへの出力処理を管理する
 * 
 * @package SimpleCli\Trait\Command
 * 
 * @method string newLineString()
 */
trait Output
{
    /**
     * システム書き込みバッファをフラッシュする
     * 
     * @return void
     */
    private function flush(): void
    {
        flush();
    }

    /**
     * コマンドラインへの出力処理
     * 改行は行わない
     * 
     * @param string $message
     * @return void
     */
    protected function outputWithoutNewLine(string $message): void
    {
        echo $message;
        $this->flush();
    }

    /**
     * コマンドラインへの出力処理
     * 
     * @param string $message
     * @return void
     */
    protected function output(string $message): void
    {
        $this->outputWithoutNewLine($message . $this->newLineString());
    }

    /**
     * コマンドラインへの改行処理
     * 
     * @param int $count
     * @return void
     */
    protected function newLine(int $count = 1): void
    {
        $this->outputWithoutNewLine(str_repeat($this->newLineString(), $count));
    }

    /**
     * コマンドラインへのCarriage Return処理
     * 
     * @return void
     */
    protected function carriageReturn(): void
    {
        $this->outputWithoutNewLine("\r");
    }

    /**
     * コマンドラインへの出力処理
     * withNewLineがtrueの場合は改行する
     * withNewLineがfalseの場合は改行しない
     *  
     * @param bool $withNewLine
     * @param string $message
     * @return void
     */
    private function switchOutput(bool $withNewLine, string $message): void
    {
        $withNewLine ? $this->output($message) : $this->outputWithoutNewLine($message);
    }

    /**
     * messageの文字色を変更する
     * 
     * @param bool $isBackgroundColored
     * @param string $message
     * @param \SimpleCli\Enum\OutputColorEnum $color
     * @return string
     */
    private function coloredMessage(bool $isBackgroundColored, string $message, OutputColorEnum $color): string
    {
        return $isBackgroundColored ? $color->coloredBackgroundMessage($message) : $color->coloredMessage($message);
    }

    /**
     * 文字色をDefaultに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputDefault(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::DEFAULT));
    }

    /**
     * 文字色をBlackに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputBlack(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::BLACK));
    }

    /**
     * 文字色をRedに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputRed(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::RED));
    }

    /**
     * 文字色をGreenに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputGreen(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::GREEN));
    }

    /**
     * 文字色をYellowに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputYellow(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::YELLOW));
    }

    /**
     * 文字色をBlueに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputBlue(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::BLUE));
    }

    /**
     * 文字色をMagentaに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputMagenta(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::MAGENTA));
    }

    /**
     * 文字色をCyanに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputCyan(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::CYAN));
    }

    /**
     * 文字色をWhiteに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputWhite(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::WHITE));
    }

    /**
     * 文字色をLightGrayに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightGray(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_GRAY));
    }

    /**
     * 文字色をDarkGrayに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputDarkGray(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::DARK_GRAY));
    }

    /**
     * 文字色をLightRedに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightRed(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_RED));
    }

    /**
     * 文字色をLightGreenに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightGreen(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_GREEN));
    }

    /**
     * 文字色をLightYellowに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightYellow(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_YELLOW));
    }

    /**
     * 文字色をLightBlueに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightBlue(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_BLUE));
    }

    /**
     * 文字色をLightMagentaに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightMagenta(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_MAGENTA));
    }

    /**
     * 文字色をLightCyanに変更してコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputLightCyan(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->switchOutput($withNewLine, $this->coloredMessage($isBackgroundColored, $message, OutputColorEnum::LIGHT_CYAN));
    }

    /**
     * successメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputSuccess(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightGreen($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * infoメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputInfo(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightCyan($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * warningメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputWarning(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightYellow($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * errorメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputError(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightRed($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * primaryメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputPrimary(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightBlue($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * secondaryメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputSecondary(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightGray($message, $isBackgroundColored, $withNewLine);
    }

    /**
     * noticeメッセージをコマンドラインへ出力する
     * 
     * @param string $message
     * @param bool $isBackgroundColored
     * @param bool $withNewLine
     * @return void
     */
    protected function outputNotice(string $message, bool $isBackgroundColored = false, bool $withNewLine = true): void
    {
        $this->outputLightMagenta($message, $isBackgroundColored, $withNewLine);
    }
}
