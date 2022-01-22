<?php

/**User: Celio Natti** */

namespace nattiframework\models;

use nattiframework\core\Model;

/**
 * Class ContactForm
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\models
 */

 class ContactForm extends Model
 {
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter Your Subject',
            'email' => 'E-Mail',
            'body' => 'Messages',
        ];
    }

    public function send()
    {
        return true;
    }
 }