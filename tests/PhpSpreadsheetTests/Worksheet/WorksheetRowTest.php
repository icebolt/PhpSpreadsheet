<?php

namespace PhpOffice\PhpSpreadsheetTests\Worksheet;

use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use PhpOffice\PhpSpreadsheet\Worksheet\RowCellIterator;
use PHPUnit_Framework_TestCase;

class WorksheetRowTest extends PHPUnit_Framework_TestCase
{
    public $mockWorksheet;
    public $mockRow;

    public function setUp()
    {
        $this->mockWorksheet = $this->getMockBuilder(Worksheet::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockWorksheet->expects($this->any())
            ->method('getHighestColumn')
            ->will($this->returnValue('E'));
    }

    public function testInstantiateRowDefault()
    {
        $row = new Row($this->mockWorksheet);
        self::assertInstanceOf(Row::class, $row);
        $rowIndex = $row->getRowIndex();
        self::assertEquals(1, $rowIndex);
    }

    public function testInstantiateRowSpecified()
    {
        $row = new Row($this->mockWorksheet, 5);
        self::assertInstanceOf(Row::class, $row);
        $rowIndex = $row->getRowIndex();
        self::assertEquals(5, $rowIndex);
    }

    public function testGetCellIterator()
    {
        $row = new Row($this->mockWorksheet);
        $cellIterator = $row->getCellIterator();
        self::assertInstanceOf(RowCellIterator::class, $cellIterator);
    }
}
