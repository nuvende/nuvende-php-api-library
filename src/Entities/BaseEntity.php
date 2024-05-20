<?php


namespace Nuvende\Gateway\Entities;

/**
 * Class BaseResponse
 * @package App\Services\Responses
 */
abstract class BaseEntity
{

    /**
     * @return array
     */
    abstract public function toArray(): array;

    abstract public function fill(array $input);

    public function __construct($input = [])
    {
        $this->fill($input);
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
