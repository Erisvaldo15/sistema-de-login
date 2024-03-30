<?php

namespace app\controllers;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginControllerTest extends TestCase
{

    private LoginController $loginController;
    private MockObject $requestMock;
    private MockObject $responseMock;

    public function setUp(): void
    {
        session_start();

        $this->loginController = new LoginController;
        $this->requestMock = $this->createMock(Request::class);
        $this->responseMock = $this->createMock(Response::class);

        $_POST["email"] = "erisvaldo@gmail.com";
        $_POST["password"] = "12345678";
    }

    public function tearDown(): void {
        session_destroy();
    }

    public function test_if_is_logging()
    {
        $this->loginController->store($this->requestMock, $this->responseMock);
        $this->assertArrayHasKey("user", $_SESSION);
    }

    public function test_inexistent_email_in_database()
    {
        $_POST["email"] = "eris@gmail.com";
        $this->loginController->store($this->requestMock, $this->responseMock);
        $this->assertSame("Email not found", $_SESSION["messages"]["email"]["message"]);
    }

    public function test_failed_password()
    {
        $_POST["password"] = "1234567";
        $this->loginController->store($this->requestMock, $this->responseMock);
        $this->assertSame("Password not found", $_SESSION["messages"]["password"]["message"]);
    }
}
