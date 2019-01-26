<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\Writers;

/**
 * Interface CsvWriterInterface
 * @package App\p365labs\Table2Csv\Writers
 */
interface CsvWriterInterface
{

    /**
     * @param string $path
     */
    public function save(string $path): void;
}
