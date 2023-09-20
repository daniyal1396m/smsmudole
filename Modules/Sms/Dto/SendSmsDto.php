<?php

namespace Modules\Sms\Dto;

class SendSmsDto
{
    private function __construct(private int $mobile_number, private string $message)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['mobile_number'],
            $data['message'] ?? setting()['default']
        );
    }

    /**
     * @return int
     */
    public
    function getNumber(): int
    {
        return $this->mobile_number;
    }

    /**
     * @return string
     */
    public
    function getMessage(): string
    {
        return $this->message;
    }

}
