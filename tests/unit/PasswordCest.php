<?php

namespace terabytesoft\helpers\tests;

use terabytesoft\helpers\Password;
use terabytesoft\helpers\tests\UnitTester;

/**
 * Class PasswordCest
 *
 * Tests codecept helpers password
 */
class PasswordCest
{
    /**
     * @var Password $password
     */
    private $password;

    /**
     * _before
     */
    public function _before(UnitTester $I): void
    {
        $this->password = new Password();
    }

    /**
     * _after
     */
    public function _after(UnitTester $I): void
    {
        unset($this->password);
    }

    /**
     * testPasswordHashDefaultOptions
     */
    public function testPasswordHashDefaultOptions(UnitTester $I): void
    {
        if ((version_compare(phpversion(), '7.3.0')) >= 0) {
            $passwordrandom = $this->password->generate(8);

            $hash = $this->password->hash(
                $passwordrandom,
                \Yii::$app->params['helper.password.algo'],
                \Yii::$app->params['helper.password.options']
            );

            $I->assertStringContainsString('$argon2id', $hash);

            $I->assertTrue($this->password->validate($passwordrandom, $hash));
        }
    }

    /**
     * testPasswordHashArgon2i
     */
    public function testPasswordHashArgon2i(UnitTester $I): void
    {
        if ((version_compare(phpversion(), '7.2.0')) >= 0) {
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
