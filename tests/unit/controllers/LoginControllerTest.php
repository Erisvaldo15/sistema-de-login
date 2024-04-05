<?php

namespace app\controllers;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LoginControllerTest extends TestCase
{
    private MockObject $requestMock;
    private MockObject $responseMock;
    private LoginController $loginController;

    protected function setUp(): void
    {
        $_POST["email"] = "rick@gmail.com";
        $_POST["password"] = "12345678";

        $this->requestMock = $this->createMock(Request::class);
        $this->responseMock = $this->createMock(Response::class);
        $this->loginController = new LoginController();
    }

    protected function tearDown(): void {
        unset($_SESSION["messages"]);
        unset($_SESSION["persistedData"]);
    }

    public function test_if_login_passed()
    {
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/user")->willReturnSelf();   // Set behavior of Response Mock
        $this->loginController->store($this->requestMock, $this->responseMock);
    }

    public function test_email_not_found() {
        $_POST["email"] = "rickgrimes@gmail.com";
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/")->willReturnSelf(); 
        $this->loginController->store($this->requestMock, $this->responseMock);
        $this->assertSame("Email not found", $_SESSION["messages"]["email"]["message"]);
    }

    public function test_invalid_password() {
        $_POST["password"] = "1234567";
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/")->willReturnSelf(); 
        $this->loginController->store($this->requestMock, $this->responseMock);
        $this->assertSame("Password not found", $_SESSION["messages"]["password"]["message"]);
    }
}
