<?php

namespace Modules\Sms\Dto;

class SettingDto
{
    private function __construct(private int $sender, private string $default, private string $username , private string $password)
    {
    }


    public static function fromArray(array $data): self
    {
        return new self(
            $data['sender'],
            $data['default'],
            $data['username'],
            $data['password'],
        );
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }/**
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }


}
