<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\HtmlTableParsing;

interface HtmlTableParsingStratetgyInterface
{
    /**
     * @param string $html
     *
     * @return string
     */
    public function doTableParsing(string $html);
}
