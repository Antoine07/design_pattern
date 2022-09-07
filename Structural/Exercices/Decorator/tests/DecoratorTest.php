<?php

use PHPUnit\Framework\TestCase;

use App\Decorators\{Italic, Paragraph, Text};

class DecoratorTest extends TestCase
{

    /**
     * @test italic 
     */
   public function testEm():void{

    $em =  (new Italic(new Text("Bonjour le monde!")) ) ;

    $this->assertEquals( (string) $em , "<em>Bonjour le monde!</em>" );
   }

   public function testEmParagrap():void{

    $em =  new Paragraph(  (new Italic(new Text("Bonjour le monde!")) ) ) ;

    $this->assertEquals( (string) $em , "<p><em>Bonjour le monde!</em></p>" );
   }
}
