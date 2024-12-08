<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Genioam\NewComposer\FormattatoreData;

class FormattatoreDataTest extends TestCase
{
    public function test_invalid_format()
    {

        $this->expectException(InvalidArgumentException::class);
        
        $formattatore = new FormattatoreData(); 
        
        $formattatore->ottieniDataCorrente(new DateTimeImmutable(),"MAREMMA"); //Verifica che i due valori passati come argomenti siano uguali.
    }

    public function testOttieniDataFormato1()
    {
        $formattatore = new FormattatoreData(); 
        $dateString = $formattatore->ottieniDataCorrente(new DateTimeImmutable("2020-01-01"), "Y-m-d");
        $this->assertEquals("2020-01-01",$dateString);

    }

    public function testOttieniDataFormato2()
    {
        $formattatore = new FormattatoreData(); 
        $dateString = $formattatore->ottieniDataCorrente(new DateTimeImmutable("2020-01-01"), "Y/m/d");
        $this->assertEquals("2020/01/01",$dateString);
    }

    public function testOttieniDataFormato3()
    {
        $formattatore = new FormattatoreData(); 
        $dateString = $formattatore->ottieniDataCorrente(new DateTimeImmutable("2020-01-01"), "y.m.d");
        $this->assertEquals("20.01.01",$dateString);
    }

    // public function testOttieniDataFormato4()
    // {
    //     $formattatore = new FormattatoreData(); 
    //     $dateString = $formattatore->ottieniDataCorrente(new DateTimeImmutable("2020-01-01"), "ddmmyyyy");
    //     $this->assertEquals("01012020",$dateString);
    // }
}
