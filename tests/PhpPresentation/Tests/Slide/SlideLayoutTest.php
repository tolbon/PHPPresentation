<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPresentation
 */

namespace PhpOffice\PhpPresentation\Tests;

use PhpOffice\PhpPresentation\Slide\SlideLayout;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PhpPresentation
 *
 * @coversDefaultClass PhpOffice\PhpPresentation\Slide\SlideLayout
 */
class SlideLayoutTest extends TestCase
{
    public function testBase()
    {
        $mockSlideMaster = $this->getMockForAbstractClass('PhpOffice\PhpPresentation\Slide\SlideMaster');

        $object = new SlideLayout($mockSlideMaster);
        static::assertInstanceOf('PhpOffice\\PhpPresentation\\Slide\\AbstractSlide', $object);
        static::assertInstanceOf('\\ArrayObject', $object->getShapeCollection());
        static::assertInstanceOf('PhpOffice\\PhpPresentation\\Style\\ColorMap', $object->colorMap);
    }

    public function testLayoutName()
    {
        // Mocks
        $mockSlideMaster = $this->getMockForAbstractClass('PhpOffice\PhpPresentation\Slide\SlideMaster');

        // Expected
        $expectedLayoutName = 'Title'.rand(1, 100);

        $object = new SlideLayout($mockSlideMaster);

        static::assertNull($object->getLayoutName());
        static::assertInstanceOf('PhpOffice\\PhpPresentation\\Slide\\SlideLayout', $object->setLayoutName($expectedLayoutName));
        static::assertEquals($expectedLayoutName, $object->getLayoutName());
    }

    public function testSlideMaster()
    {
        // Mocks
        $mockSlideMaster = $this->getMockForAbstractClass('PhpOffice\PhpPresentation\Slide\SlideMaster');

        $object = new SlideLayout($mockSlideMaster);

        static::assertInstanceOf('PhpOffice\\PhpPresentation\\Slide\\SlideMaster', $object->getSlideMaster());
    }
}
