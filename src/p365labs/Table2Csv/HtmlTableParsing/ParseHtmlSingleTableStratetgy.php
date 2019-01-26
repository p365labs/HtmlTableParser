<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\HtmlTableParsing;

class ParseHtmlSingleTableStratetgy implements HtmlTableParsingStratetgyInterface
{
    /**
     * @inheritdoc
     */
    public function doTableParsing(string $html): string
    {
        $csv = array();
        preg_match('/<table(>| [^>]*>)(.*?)<\/table( |>)/is', $html, $b);
        $table = $b[2];
        preg_match_all('/<tr(>| [^>]*>)(.*?)<\/tr( |>)/is', $table, $b);
        $rows = $b[2];
        foreach ($rows as $row) {
            //cycle through each row
            if (preg_match('/<th(>| [^>]*>)(.*?)<\/th( |>)/is', $row)) {
                //match for table headers
                preg_match_all('/<th(>| [^>]*>)(.*?)<\/th( |>)/is', $row, $b);
                $csv[] = strip_tags(implode(',', $b[2]));
            } elseif (preg_match('/<td(>| [^>]*>)(.*?)<\/td( |>)/is', $row)) {
                //match for table cells
                preg_match_all('/<td(>| [^>]*>)(.*?)<\/td( |>)/is', $row, $b);
                $csv[] = strip_tags(implode(',', $b[2]));
            }
        }
        $csv = implode("\n", $csv);

        return $csv;
    }
}
