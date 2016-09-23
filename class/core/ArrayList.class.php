<?php
/**
 * ArrayList
 *
 * @author: Tomasz Jazwinski
 * @date: 2007-11-28
 */
class ArrayList
{
    /**
     * @var array
     */
    private $tab;
    /**
     * @var int
     */
    private $size;

    public function ArrayList()
    {
        $this->tab = array();
        $this->size = 0;
    }

    /**
     * @param $value
     */
    public function add($value)
    {
        $this->tab[] = $value;
        $this->size++;
    }

    /**
     * @param $idx
     * @return mixed
     */
    public function get($idx)
    {
        return $this->tab[$idx];
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        if ($this->size == 0) {
            return null;
        }
        return $this->tab[($this->size) - 1];
    }

    /**
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return ($this->size) == 0;
    }

    public function removeLast()
    {
        return $this->size = ($this->size) - 1;
    }

}
?>