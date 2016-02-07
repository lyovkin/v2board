<?php

$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('register a user');

$I->amOnPage('/');
$I->click('Регистрация');
$I->seeCurrentUrlEquals('/auth/register');

$I->fillField('user_name', 'IvanTester');
$I->fillField('name', 'Ivan');
$I->fillField('last_name', 'Ivanov');
$I->fillField('email', 'example@example.com');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('button[type=submit]');

$I->amOnPage('/home');
