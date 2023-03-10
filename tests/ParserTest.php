<?php

namespace App\Model;

use Nette;
use App\Model\Parser;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../app/model/Parser.php";

final class ParserTest extends TestCase
{
    public function testGetParts()
    {
        $parser = new Parser();
        $this->assertNull($parser->getParts(new \SimpleXMLElement("<parts> </parts>")), 'assert is null');
        $this->assertIsArray($parser->getParts(new \SimpleXMLElement("<parts> <part> <item> </item> </part> </parts>")), 'assert is array');
    }
}
