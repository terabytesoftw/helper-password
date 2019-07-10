<?php

namespace terabytesoft\helpers\password\tests;

use terabytesoft\helpers\password\Password;
use terabytesoft\helpers\password\tests\UnitTester;

class PasswordCest
{
    /**
     * @var Password $password
     */
    private $password;

    /**
     * _before
     */
    public function _before(UnitTester $I)
    {
        $this->password = new Password();
    }

    public function _after(UnitTester $I)
    {
    }

    /**
     * testPasswordHashDefaultOptions
     */
    public function testPasswordHashDefaultOptions(UnitTester $I): void
    {
        $passwordrandom = $this->password->generate(8);

        $hash = $this->password->hash(
            $passwordrandom,
            \Yii::$app->params['helper.password.algo'],
            \Yii::$app->params['helper.password.options']
        );

        $I->assertStringContainsString('$argon2id', $hash);

        $I->assertTrue($this->password->validate($passwordrandom, $hash));
    }

    /**
     * testPasswordHashArgon2i
     */
    public function testPasswordHashArgon2i(UnitTester $I): void
    {
        $options = [
            'memory_cost' => 1<<17,
            'time_cost'   => 3,
            'threads'     => 4,
        ];

        $passwordrandom = $this->password->generate(8);

        $hash = $this->password->hash(
            $passwordrandom,
            2,
            \Yii::$app->params['helper.password.options']
        );

        $I->assertStringContainsString('$argon2i', $hash);

        $I->assertTrue($this->password->validate($passwordrandom, $hash));
    }

    /**
     * testPasswordHashBcrypt
     */
    public function testPasswordHashBcrypt(UnitTester $I): void
    {
        $options = [
            'memory_cost' => 1<<17,
            'time_cost'   => 3,
            'threads'     => 4,
        ];

        $passwordrandom = $this->password->generate(8);

        $hash = $this->password->hash(
            $passwordrandom,
            2,
            \Yii::$app->params['helper.password.options']
        );

        $I->assertStringContainsString('$argon2i', $hash);

        $I->assertTrue($this->password->validate($passwordrandom, $hash));
    }
}
