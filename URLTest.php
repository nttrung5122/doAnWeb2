<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\URL;

class URLTest extends TestCase
{
    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';
        
        $url = new URL();
        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedResult, $result);
    }
}

