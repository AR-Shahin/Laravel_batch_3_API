<?php

class User
{
    // public $name;
    // public $email;

    // public function __construct($n, $e)
    // {
    //     $this->name = $n;
    //     $this->email = $e;
    // }
    private $password = "1234";
    public function __construct(
        public $name,
        public $email
    ) {
    }
    public function info()
    {
        echo ("User name is {$this->name}. Email is {$this->email}!");
    }

    public static function display()
    {
        echo "I am static funciton";
    }

    private function anotherFunction()
    {
        self::display();
    }

    function __get($name)
    {
        echo "{$name} doesn't exist!";
    }

    function __set($name, $value)
    {
        echo "{$name} value is {$value}";
    }

    function __call($mName, $args)
    {
        echo "{$mName} args {$args[0]}";
    }
    // public function __destruct()
    // {
    //     echo "<br>Work Has Done!<br>";
    // }
}

$u1 = new User("w", "s");
echo $u1->$password;
// class Student
// {
//     public $name = "Shahin";
//     public $email = "s@mail.com";

//     public function info()
//     {
//         echo ("User name is {$this->name}. Email is {$this->email}!");
//     }
// }
// $u1 = new User("Shahin", "s@mail.com");
// $u2 = new User("user 2", "u2@mail.com");

// $u1->name = "Test";
// // $u1->info();
// echo "<br>";
// $u1->phone = "01754100";
// $u1->phone = "1256";
// echo "<br>";
// $u1->test(2000);
// echo $u1->phone;
// $u2->info();

// $s1 = new Student();
// echo "<br>";

// if ($s1 instanceof User) {
//     echo "Ok";
// } else {
//     echo "No!";
// }


// class Great
// {

//     function __invoke()
//     {
//         echo "<br>I am calling<br>";
//     }
// }


// (new Great())();


class Student extends User
{
    public static function display()
    {
        echo "Hello Bangladesh!";
    }
}


$s1 = new Student("Student 1", "S@mail.com");


$s1->info();
echo "<br>";
Student::display();


class Test
{

    public function __construct()
    {
    }
}

$t1 = new Test();
