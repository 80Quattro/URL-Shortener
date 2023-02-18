<?php

namespace App\Classes;

use AshAllenDesign\ShortURL\Classes\Builder;
use AshAllenDesign\ShortURL\Exceptions\ShortURLException;

use App\Models\ShortURL;
use Exception;

class ShortURLBuilder extends Builder
{

    /**
     * Id of the user (this URL owner)
     *
     * @var int
     */
    protected $user_id;

    /**
     * Set user_id (owner of this URL)
     *
     * @param  int  $user_id
     * @return $this
     */
    public function userId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Overrided!
     * Attempt to build a shortened URL and return it.
     *
     * @return ShortURL
     *
     * @throws ShortURLException
     */
    public function make(): ShortURL
    {
        if (! $this->destinationUrl) {
            throw new ShortURLException('No destination URL has been set.');
        }
        if (! $this->user_id) {
            throw new Exception('No user_id has been set');
        }

        $data = $this->toArray();

        $this->checkKeyDoesNotExist();

        $shortURL = ShortURL::create($data);

        $this->resetOptions();

        return $shortURL;
    }

    /**
     * Overrided!
     * Returns an array of all properties used during record creation.
     *
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        $arr = parent::toArray();
        $arr['user_id'] = $this->user_id;
        return $arr;
    }

}