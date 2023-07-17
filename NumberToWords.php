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
        // if( array_key_exists($this->number, $this->definedNumbers) ) {
        //     return $this->findDefined($this->number);
        // }
        if($this->number < 100){
            return $this->findBelow100($this->number);
        }
        if($this->number < 1000){
            return $this->findBelow1000($this->number);
        }
        if($this->number < 10000){
            return $this->findBelow10k($this->number);
        }

        if($this->number < 100000){
            return $this->findBelow100k($this->number);
        }
        if($this->number < 1000000){
            return $this->findBelow1Million($this->number);
        }
        if($this->number < 1000000000){
            return $this->findBelowBillion($this->number);
        }
        if($this->number < 1000000000000){
            return $this->findBelowTrillion($this->number);
        }
        return number_format($this->number);
    }

    private function findDefined($input_num){
        return $this->definedNumbers[$input_num];
    }
    private function findBelow100($input_num){
        if($input_num < 20) {
            return $this->findDefined($input_num);
        }
        $num1 = floor($input_num/10); 
        $num2 = $input_num - ($num1*10);
        if ($num2 < 1) {
            return $this->definedNumbers[$input_num - $num2];
        } 
        return $this->definedNumbers[$input_num - $num2]. " ".$this->definedNumbers[$num2];
    }
    private function findBelow1000($input_num){
        if($this->number < 100){
            return $this->findBelow100($this->number);
        }
        $num1 = floor($input_num/100);
        $num2 = $input_num - ($num1*100);

        $words = "";
        if ($num1 > 0) {
            $words .= $this->definedNumbers[$num1]." hundred " ;
        }
        $words .= "and ". $this->findBelow100($num2);
        return $words;
    }

    private function findBelow10k($input_num){

        if($this->number < 1000){
            return $this->findBelow1000($this->number);
        }
        $num1 = floor($input_num/1000);
        $words = '';
        $num2 = $input_num - ($num1*1000);
        if($num1 > 0){
            $words = $this->definedNumbers[$num1] . " thousand,";
        } 
        $words  .= $this->findBelow1000($num2);
        return $words;
    }

    private function findBelow100k($input_num){
        $num1 = floor($input_num/1000);
        $num2 = $input_num - ($num1*1000);

        $words = $this->findBelow100($num1);
        $words  .=  " thousand, " . $this->findBelow10k($num2);
        return $words;
    }

    private function findBelow1Million($input_num){
        $num1 = floor($input_num/1000);
        $num2 = $input_num - ($num1*1000);

        $words = $this->findBelow1000($num1);
        $words  .=  " thousand, " . $this->findBelow1000($num2);
        return $words;
    }

    private function findBelowBillion($input_num){
        $num1 = floor($input_num/1000000);
        $num2 = $input_num - ($num1*1000000);
        if ($num1 < 20) {
            return $this->definedNumbers[$num1]  . " million, " . $this->findBelow1Million($num2);
        }
        if ($num1 < 100) {
            return $this->findBelow100($num1)  . " million, " . $this->findBelow1Million($num2);
        }
        return $this->findBelow1000($num1)  . " million, " . $this->findBelow1Million($num2);
    }

    private function findBelowTrillion($input_num){
        $num1 = floor($input_num/1000000000);
        $num2 = $input_num - ($num1*1000000000);
        if ($num1 < 20) {
            return $this->definedNumbers[$num1]  . " billion, " . $this->findBelowBillion($num2);
        }
        if ($num1 < 100) {
            return $this->findBelow100($num1)  . " billion, " . $this->findBelowBillion($num2);
        }
        return $this->findBelow1000($num1)  . " billion, " . $this->findBelowBillion($num2);
    }

}


// $number = 800000;
// echo number_format($number).'<br>';
// $num2Words = new NumberToWords($number);
// echo $num2Words->getWords();

for ($i=0; $i < 100; $i++) {
    $num = random_int(10, 10000000000);
    $num2Words = new NumberToWords($num);
    echo number_format($num)."=>". $num2Words->getWords() ."<br>";
}
