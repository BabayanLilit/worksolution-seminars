<?php

/**
 * @author Smotrov Dmitriy <smotrov@worksolutions.ru>
 */
class FileStorage
{
    private $content = "";

    public function write($content)
    {
        $this->content = $content;
    }

    public function read()
    {
        return $this->content;
    }
}
