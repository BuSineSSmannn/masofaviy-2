<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'functions.php';
//Классы для работы с датой и временем Итераторы Виртуальные массивы  Класс Directory Класс Generator

$timezone = new DateTimeZone('Asia/Tashkent');
$date = new DateTime();
$date->setTimezone($timezone);

echo $date->format('d.m.Y H:i:s');
br();

$date2 = new DateTime('2020-11-17 12:00:00');
echo $date2->format('d.m.Y H:i:s');
br();
$date2->setDate(2019,12,15);
$date2->setTime(15,34,45,500);
echo $date2->format('d.m.Y H:i:s:u');
$date2->setTimezone($timezone);

br();
debug( $date2->getTimezone()->getOffSet($date));
br();

$interval_date = $date2->diff($date);
echo $interval_date->h;
br();
echo $interval_date->m;
br();
$diff = date_diff($date,$date2);
debug($diff);
debug($date);
debug($date2);
echo $diff->format('1-data 2-datadan %d kun farq qiladi');

hr();

class Test{
    public $x = 10;
    public $y = 3;
    protected $z = 5;
    private $v = -5;
}

$test = new Test();
debug($test);
foreach($test as $key=>$value){
    echo "$key = $value;";
}

class MyClass implements Iterator{
        private $array = ['age'=>21,'name'=>'Javoxir','job'=>'Web Developer'];

        public function rewind(){
            reset($this->array);
        }

        public function current(){
            return current($this->array);
        }

        public function key(){
            return key($this->array);
        }

        public function next(){
            return next($this->array);
        }

        public function valid(){
            $key = key($this->array);
            return ($key !== null && $key !==false);
        }
}


$arr = new MyClass();
debug($arr);
foreach($arr as $k=>$v) echo "$k = $v";



$dir = new DirectoryIterator('E:\Open Server\domains\codelife1.lc\6-oy');

foreach($dir as $file){
    echo $file->getFilename();
    if($file->isFile()) echo ' - ' . $file->getSize() . ' bite';
    br();
}


class TestArray implements ArrayAccess{
    private $arr = [];

    public function offsetExists($key){
        return isset($this->arr[$key]);
    }
    public function offsetGet($key){
        return $this->arr[$key];
    }
    public function offSetset($key,$value){
        $this->arr[$key] = $value;
    }
    public function offsetUnset($key){
        unset($this->arr[$key]);
    }
}

$myclass = new TestArray();


$myclass['test'] = 1123123123;
echo $myclass['test'];
unset($myclass['test']);
echo isset($myclass['test']);

debug($myclass);
hr();

$dir = dir('E:\Open Server\domains\codelife1.lc\6-oy');
debug($dir);
echo $dir->read();
br();
echo $dir->read();
hr();

while(($file = $dir->read()) !== false){
    echo $file;
    br();
}

echo $dir->read();
br();
$dir->rewind();

echo $dir->read();
br();

echo $dir->read();
br();
echo $dir->read();
br();
echo $dir->read();
br();
echo $dir->read();
br();

$dir->close();
hr();

function test($from,$to){
    for($i = $from;$i<=$to;$i++) {
        $cmd = yield $i;
        if($cmd == 'salom!') return 'stop!' ;
    }
}

$t = test(1,10);
debug($t);

// foreach($t as $v) echo $v.";";


$t->rewind();


while($t->valid()){
    echo $t->current().'-;';
    if($t->current() == 2) $t->send('salom!');
    $t->next();
}
br();
echo $t->getReturn();


?>