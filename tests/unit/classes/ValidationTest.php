<?php

namespace tests\unit\classes;

use app\classes\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase {

    private array $data = [];

    public function setUp(): void {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["email"] = "erisvaldo@gmail.com";
        $_POST["password"] = "12345678";
        $this->data = [
            "email" => "e",
            "password" => "p",
        ];
    }   

    public function test_if_is_validating_the_data() {
        $validated = Validation::validate($this->data);
        $this->assertArrayHasKey("email", $validated);
        $this->assertArrayHasKey("password", $validated);
    }

    public function test_invalid_data() {
        $_POST["password"] = "";
        Validation::validate($this->data);
        $this->assertArrayHasKey("password", $_SESSION["messages"]);
    }

    public function test_if_email_is_invalid() {
        $_POST["email"] = "eris@gmail";
        Validation::validate($this->data);
        $this->assertArrayHasKey("email", $_SESSION["messages"]);
    }

    public function test_if_the_invalid_data_being_persited() {
        $_POST["email"] = "eris";
        Validation::validate($this->data);
        $this->assertArrayHasKey("email", $_SESSION["persistedData"]);
    }
}