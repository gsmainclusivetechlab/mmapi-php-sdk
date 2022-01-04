<?php
namespace mmpsdkTest\src\mocks;

class MockObject
{
    public static function get($fileName)
    {
        return file_get_contents(__DIR__ . '/' . $fileName);
    }
}
