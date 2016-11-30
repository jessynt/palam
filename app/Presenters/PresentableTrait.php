<?php
namespace App\Presenters;


trait PresentableTrait
{

    /**
     * View presenter instance
     *
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public function present()
    {
        if ( ! $this->presenter || ! class_exists($this->presenter))
        {
            throw new \RuntimeException('Please set the $presenter property to your presenter path.');
        }
        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }
        return $this->presenterInstance;
    }
}