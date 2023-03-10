<?php

namespace App\Model;

use Nette;

/**
* Parser
*
* @author hydroxid
*/
class Parser
{
    public const FILE = 'files/export_full.xml';

    /**
    * parse xml file
    *
    * @author hydroxid
    */
    public function load() : array
    {
        $items = [];
        $total = 0;

        if (file_exists(self::FILE)) {
            $xml = new \SimpleXMLElement(file_get_contents(self::FILE));

            $i = 0;
            if ($xml) {

                $total = count($xml->items->item);
                foreach ($xml->items->item as $item) {

                    $items[] = [
                        'name' => (string) $item['name'],
                        //  get parts if exists
                        'parts' => $this->getParts($item->parts)
                    ];
                    $i++;

                }
            }

        }

        return [
            'total' => $total,
            'items' => $items
        ];
    }

    /**
    * get parts if exists
    *
    * @param \SimpleXMLElement $parts
    * @author hydroxid
    */
    public function getParts(\SimpleXMLElement $parts) : ?array
    {
        $result = null;
        if ($parts && $parts->part && $parts->part->item) {
            foreach ($parts->part->item as $part) {
                $result[] = (string) $part['name'];
            }
        }
        return $result;
    }
}
