<?php

namespace tests\unit\controllers;

use app\controllers\RegisterController;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterControllerTest extends TestCase {

    private MockObject $requestMock;
    private MockObject $responseMock;
    private RegisterController $registerController;

    protected function setUp(): void
    {
        $_POST["name"] = "erisvaldo";
        $_POST["email"] = "valdo@gmail.com";
        $_POST["password"] = "erisvaldo";
        $_POST["confirmation_password"] = "erisvaldo";

        $this->requestMock = $this->createMock(Request::class);
        $this->responseMock = $this->createMock(Response::class);
        $this->registerController = new RegisterController;
    }

    protected function tearDown(): void {
        unset($_SESSION["messages"]);
        unset($_SESSION["persistedData"]);
    }

    public function test_if_was_registered() {
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/")->willReturnSelf();
        $this->registerController->store($this->requestMock, $this->responseMock);
    }

    public function test_email_already_exist() {
        $_POST["email"] = "rick@gmail.com";
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/register")->willReturnSelf();
        $this->registerController->store($this->requestMock, $this->responseMock);
        $this->assertSame("E-mail already exist", $_SESSION["messages"]["email"]["message"]);
    }

    public function test_confirmation_password_does_not_match_with_password() {
        $_POST["email"] = "cristiano@gmail.com";
        $_POST["confirmation_password"] = "12345678";
        $this->responseMock->expects($this->once())->method("withHeader")->with("Location", "/register")->willReturnSelf();
        $this->registerController->store($this->requestMock, $this->responseMock);
        $this->assertSame("Passwords are not equal", $_SESSION["messages"]["confirmation_password"]["message"]);
    }
}