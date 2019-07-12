<?php

namespace terabytesoft\helpers;

use yii\base\Security;

/**
 * Class Password
 *
 * Helper security methods
 **/
class Password
{
    /**
     * @var Security $security
     **/
    protected $security;

    /**
     * __construct
     **/
    public function __construct()
    {
        $this->security = new Security();
    }

    /**
     * hash
     *
     * Wrapper for yii security helper method
     **/
    public function hash(string $password, int $algo, array $params = []): string
    {
        return password_hash($password, $algo, $params);
    }


    /**
     * validate
     *
     * wrapper for yii security helper method
     **/
    public function validate(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * generate
     *
     * generates user-friendly random password containing at least one lower case letter, one uppercase letter and one
     * digit. The remaining characters in the password are chosen at random from those three sets
     *
     * @see https://gist.github.com/tylerhall/521810
     **/
    public function generate(int $length): string
    {
        $sets = [
            'abcdefghjkmnpqrstuvwxyz',
            'ABCDEFGHJKMNPQRSTUVWXYZ',
            '23456789',
        ];
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }

        $password = str_shuffle($password);

        return $password;
    }
}
