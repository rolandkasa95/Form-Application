<?php
/**
 * Session Class
 */
class Session
{
    public $session;

    /**
     *The constructor
     */
    public function __construct()
    {
        session_start();
        $this->session = &$_SESSION;
    }

    /**
     * @param array|null $data
     */
    public function save($data = null)
    {
        foreach ($data as $key => $value) {
            $this->session[$key] = $value;
        }
    }

    /**
     * @param null $key
     * @return bool
     */
    public function get($key = null)
    {
        if (!$this->session && !$key) return false;
        return $this->session[$key];
    }

    /**
     *Destroyer
     */
    public function destroy()
    {
        unset($this->session);
    }
}