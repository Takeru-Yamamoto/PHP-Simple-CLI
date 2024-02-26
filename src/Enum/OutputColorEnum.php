<?php

namespace SimpleCli\Enum;

use SimpleCli\Trait\Common\Sapi;

/**
 * 出力に使用する色を表すEnum
 * 
 * @package SimpleCli\Enum
 */
enum OutputColorEnum: string
{
    case DEFAULT       = "default";
    case BLACK         = "black";
    case RED           = "red";
    case GREEN         = "green";
    case YELLOW        = "yellow";
    case BLUE          = "blue";
    case MAGENTA       = "magenta";
    case CYAN          = "cyan";
    case WHITE         = "white";
    case LIGHT_GRAY    = "light_gray";
    case DARK_GRAY     = "dark_gray";
    case LIGHT_RED     = "light_red";
    case LIGHT_GREEN   = "light_green";
    case LIGHT_YELLOW  = "light_yellow";
    case LIGHT_BLUE    = "light_blue";
    case LIGHT_MAGENTA = "light_magenta";
    case LIGHT_CYAN    = "light_cyan";


    use Sapi;

    /**
     * 文字色を変えた文字列を返す
     *
     * @param string $message
     * @return string
     */
    public function coloredMessage(string $message): string
    {
        return $this->isCli() ? $this->coloredCliMessage($message) : $this->coloredHtmlMessage(false, $message);
    }

    /**
     * 文字色を変えたCLI用の文字列を返す
     *
     * @param string $message
     * @return string
     */
    public function coloredCliMessage(string $message): string
    {
        $color = match ($this) {
            self::DEFAULT       => "\e[39m",
            self::BLACK         => "\e[30m",
            self::RED           => "\e[31m",
            self::GREEN         => "\e[32m",
            self::YELLOW        => "\e[33m",
            self::BLUE          => "\e[34m",
            self::MAGENTA       => "\e[35m",
            self::CYAN          => "\e[36m",
            self::WHITE         => "\e[90m",
            self::LIGHT_GRAY    => "\e[37m",
            self::DARK_GRAY     => "\e[90m",
            self::LIGHT_RED     => "\e[91m",
            self::LIGHT_GREEN   => "\e[92m",
            self::LIGHT_YELLOW  => "\e[93m",
            self::LIGHT_BLUE    => "\e[94m",
            self::LIGHT_MAGENTA => "\e[95m",
            self::LIGHT_CYAN    => "\e[96m",
        };

        return $color . $message . $this->resetCliAttribute();
    }

    /**
     * 背景色を変えた文字列を返す
     *
     * @param string $message
     * @return string
     */
    public function coloredBackgroundMessage(string $message): string
    {
        return $this->isCli() ? $this->coloredCliBackgroundMessage($message) : $this->coloredHtmlMessage(true, $message);
    }

    /**
     * 背景色を変えた文字列を返す
     *
     * @param string $message
     * @return string
     */
    public function coloredCliBackgroundMessage(string $message): string
    {
        $color = match ($this) {
            self::DEFAULT       => "\e[49m",
            self::BLACK         => "\e[40m",
            self::RED           => "\e[41m",
            self::GREEN         => "\e[42m",
            self::YELLOW        => "\e[43m",
            self::BLUE          => "\e[44m",
            self::MAGENTA       => "\e[45m",
            self::CYAN          => "\e[46m",
            self::WHITE         => "\e[47m",
            self::LIGHT_GRAY    => "\e[100m",
            self::DARK_GRAY     => "\e[101m",
            self::LIGHT_RED     => "\e[102m",
            self::LIGHT_GREEN   => "\e[103m",
            self::LIGHT_YELLOW  => "\e[104m",
            self::LIGHT_BLUE    => "\e[105m",
            self::LIGHT_MAGENTA => "\e[106m",
            self::LIGHT_CYAN    => "\e[107m",
        };

        return $color . $message . $this->resetCliAttribute();
    }

    /**
     * CLI用のAttributeをリセットする文字列を返す
     * 
     * @return string
     */
    public function resetCliAttribute(): string
    {
        return "\e[0m";
    }

    /**
     * 色を変えたHTML用の文字列を返す
     * 
     * @param bool $isBackground
     * @param string $message
     * @return string
     */
    public function coloredHtmlMessage(bool $isBackground, string $message): string
    {
        $style = $isBackground ? "background-color" : "color";

        $color = match ($this) {
            self::DEFAULT       => "",
            self::BLACK         => "000000",
            self::RED           => "ff0000",
            self::GREEN         => "00ff00",
            self::YELLOW        => "ffff00",
            self::BLUE          => "0000ff",
            self::MAGENTA       => "ff00ff",
            self::CYAN          => "00ffff",
            self::WHITE         => "ffffff",
            self::LIGHT_GRAY    => "c0c0c0",
            self::DARK_GRAY     => "808080",
            self::LIGHT_RED     => "ff8080",
            self::LIGHT_GREEN   => "80ff80",
            self::LIGHT_YELLOW  => "ffff80",
            self::LIGHT_BLUE    => "8080ff",
            self::LIGHT_MAGENTA => "ff80ff",
            self::LIGHT_CYAN    => "80ffff",
        };

        return "<span style=\"{$style}: #{$color}\">{$message}</span>";
    }
}
