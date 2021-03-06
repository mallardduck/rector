<?php

declare(strict_types=1);

namespace Rector\CodingStyle\Tests\Rector\MethodCall\PreferThisOrSelfMethodCallRector;

use Iterator;
use Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector;
use Rector\CodingStyle\Tests\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\AbstractTestCase;
use Rector\CodingStyle\Tests\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\BeLocalClass;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class PreferThisOrSelfMethodCallRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideDataForTest()
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    public function provideDataForTest(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    /**
     * @return mixed[]
     */
    protected function getRectorsWithConfiguration(): array
    {
        return [
            PreferThisOrSelfMethodCallRector::class => [
                '$typeToPreference' => [
                    AbstractTestCase::class => 'self',
                    BeLocalClass::class => 'this',
                ],
            ],
        ];
    }
}
