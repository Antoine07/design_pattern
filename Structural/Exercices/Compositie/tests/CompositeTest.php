<?php

use PHPUnit\Framework\TestCase;

use App\{Form, Input};

class CompositieTest extends TestCase
{
  protected Form $form;
  protected Input $input;

  public function setUp(): void
  {
    $this->form = new Form(
      name: "login",
      action: '/login'
    );
  }

  public function testForm():void{
    $this->form->attach(new Input(name : "email", type: "email", label: "Email:"));
    $this->form->attach(new Input(name : "password", type: "password", label: "Password:"));

    $form = (string) $this->form;
    $excepted = "<form name=\"login\" action=\"/login\"><label>Email:</label><input type=\"email\" name=\"email\" value=\"\" /><label>Password:</label><input type=\"password\" name=\"password\" value=\"\" /></form>";

    $this->assertEquals($form , $excepted);
  }
}
