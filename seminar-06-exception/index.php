<?php

class Person{
    public  $data = array();
}
class History{
    /**
     * @var Doctor[]
     */
    private $doctors = array();
    private $items = array();

    /**
     * @var Person
     */
    private $person;

    public function __construct(Person $person) {
        $this->person = $person;
    }

    /**
     * @param Doctor $doctor
     */
    public function attachDoctor(Doctor $doctor) {
        $this->doctors[] = $doctor;
    }


    public function process() {
        foreach ($this->doctors as $doctor) {
            try{
                $doctor->view($this,$this->person);

            }catch (DoctorException $e){
                $this->items[] = $e->getMessage();
            } catch (DoctorFatalException $e) {
                throw new Exception($e->getMessage(),$e->getCode(),$e);
            }

        }

    }

    public function __toString() {
        return implode(',', $this->items);
    }
}

class Doctor{

    public function view(History $history, Person $person) {
        if ($person->data["IS_DIED"]){
            throw new DoctorException("Пациент ".$person->data["NAME"]." умер");
        }
        if ($person->data["IS_BLIND"]){
            throw new DoctorException("Пациент слепой");
        }
        if (empty($person->data)){
            throw new DoctorFatalException("Нет информации о пациенте");
        }
    }
}

class DoctorException extends Exception{

}

class DoctorFatalException extends Exception{

}

try {
    $person = new Person();
    $person->data = array(
        "NAME" => "Gthdbsq",
        "IS_DIED" => true,
        "IS_BLIND" => false,
    );
    $history = new History($person);
    $doctor = new Doctor();
    $history->attachDoctor($doctor);
    $history->process();
    echo $history;

    $person = new Person();
    $person->data = array(
        "NAME" => "Gthdbsq",
        "IS_BLIND" => true,
    );
    $history = new History($person);
    $doctor = new Doctor();
    $history->attachDoctor($doctor);
    $history->process();
    echo $history;

    $person = new Person();
    $history = new History($person);
    $doctor = new Doctor();
    $history->attachDoctor($doctor);
    $history->process();
    echo $history;
} catch (Exception $e) {
    echo $e->getMessage();
}