<?php
// example code
class NumberToWords {
    public $number;
    private $definedNumbers = [
            0=>"zero", 
            1=>"one", 
            2=>"two", 
            3=>"three", 
            4=>"four", 
            5=>"five", 
            6=>"six", 
            7=>"seven", 
            8=>"eight", 
            9=>"nine", 
            10=>"ten", 
            11=>"eleven", 
            12=>"twelve", 
            13=>"thirteen", 
            14=>"fourteen", 
            15=>"fifteen", 
            16=>"sixteen", 
            17=>"seventeen", 
            18=>"eighteen", 
            19=>"nineteen",
            20=>"twenty", 
            30=>"thirty", 
            40=>"fourty", 
            50=>"fifty", 
            60=>"sixty", 
            70=>"seventy", 
            80=>"eighty", 
            90=>"ninety", 
            100=>"hundred",
            1000000=>"million",
            1000000000=>"billion"
        ];

    public function __construct($number){
        $this->number = $number;
    }

    public function getWords(){
        if( array_key_exists($this->number, $this->definedNumbers) ) {
            return $this->definedNumbers[$this->number];
        }
        if($this->number < 100){
            $num1 = floor($this->number/10);
            $num2 = $this->number - ($num1*10);
            return $this->definedNumbers[$this->number - $num2]. " ".$this->definedNumbers[$num2];
        }
        return number_format($this->number);
    }

}


$number = 67;
$num2Words = new NumberToWords($number);
echo $num2Words->getWords();