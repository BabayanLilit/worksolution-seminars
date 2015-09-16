<?php

/**
 * @author Smotrov Dmitriy <smotrov@worksolutions.ru>
 */
class DatabaseStorage
{
    private $rows;
    private $rowsCount = 0;

    /**
     * @param array $data
     * @return int
     */
    public function addRow($data)
    {
        $this->rowsCount++;

        $this->rows[$this->rowsCount] = array_merge($data, [
            'id' => $this->rowsCount
        ]);

        return $this->rowsCount;
    }

    public function getRow($id)
    {
        return $this->rows[$id];
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function hasRow($number)
    {
        return isset($this->rows[$number]);
    }
}
