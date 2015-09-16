<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 31.08.15
 * Time: 18:32
 */
class Entity{

    private $data = array();
    /** @var \ChangeAnalyzer[]  */
    private $listners = array();

    public function __get($name) {
        return $this->data[$name];
    }

    public function __toString() {
        return json_encode($this->data);
    }
    public function __set($name, $value) {
        if (array_key_exists($name,$this->data)){
            if ($value == $this->data[$name]){
                return;
            }

        }
        $this->data[$name] = $value;
        $this->notify($name);
    }

    public function attach($listner){
        $this->listners[] = $listner;
    }

    public function notify($property) {
        foreach ($this->listners as $listner) {
            $listner->update($property,$this);
        }

    }


}

class ChangeAnalyzer{
    public function update($property, $entity) {
        printf('%s: %s => %s%s', date("H:i:s"),$property,$entity->$property,PHP_EOL);
        printf('%s%s',$entity,PHP_EOL);

    }
}


$analizer = new ChangeAnalyzer();
$entity = new Entity();
$entity->attach($analizer);
$entity->a="hakjshhdglksdghsdl";
$entity->b="123456";