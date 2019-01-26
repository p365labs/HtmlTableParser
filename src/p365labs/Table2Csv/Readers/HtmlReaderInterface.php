<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\Readers;

/**
 * Interface HtmlReaderInterface
 * @package App\p365labs\Table2Csv\Readers
 */
interface HtmlReaderInterface
{
    /**
     * @param string $path
     * @return string
     */
    public function load(string $path): string;
}
