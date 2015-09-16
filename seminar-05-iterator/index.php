<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 07.09.15
 * Time: 18:21
 */
class DirIterator implements Iterator{


    /** @var   */
    private  $index;

    /** @var array  */
    private $storage = array();

    /**
     * @param $pass
     * @throws Exception
     */
    public function __construct($pass) {
        if (!is_dir($pass)){
            throw new Exception("Принимаем только директорию");
        }
        $this->storage = scandir($pass);
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current() {
        return $this->storage[$this->index];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next() {
        $this->index++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key() {
        return $this->index;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid() {
        if (array_key_exists($this->index,$this->storage)){
             return true;
        }
        return false;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind() {
        $this->index = 0;
    }
}
$obj = new DirIterator(__DIR__);
foreach ($obj as $key => $value) {
   // var_dump($value);
}

$dirIter = new DirectoryIterator(__DIR__);
foreach ($dirIter as $value) {
   printf("name %s, size %s, info %s, ext %s\r\n",$value->getFilename(),$value->getSize(),$value->getFileInfo(),$value->getExtension());
}
$recObj = new RecursiveDirectoryIterator(__DIR__);
/** @var SplFileInfo $value */
foreach ($recObj as $value) {
    printf("name %s, size %s, info %s, ext %s\r\n",$value->getFilename(),$value->getSize(),$value->getFileInfo(),$value->getExtension());
}
