<?php

// use app\User;

use app\Model\Teacher as Test;
// use app\User;
use app\Student;

include("./app/Student.php");
// include("./app/User.php");
include("./app/Model/Teacher.php");
// abstract class Person
// {
//     public function display()
//     {
//         echo "Hello World!";
//     }
//     abstract public function great();
// }

// // $p = new Person();


// class English extends Person
// {
//     public function great()
//     {
//         echo "Hello\n";
//     }
// }

// class German extends Person
// {
//     public function great()
//     {
//         echo "Hola! \n";
//     }
// }
// class Bangla extends Person
// {
//     public function great()
//     {
//         echo "Ki khbr! \n";
//     }
// }

$u = new User();

new Student();
new Test();
// function greatings($greats)
// {
//     foreach ($greats as $g) {
//         $g->great();
//         echo "<br>";
//     }
// }




// interface Person
// {
//     public function great();
// }

// class English implements Person
// {
//     public function great()
//     {
//         echo "Hello";
//     }
// }

// class Bangla implements Person
// {
//     public function great()
//     {
//         echo "Ki khbr!";
//     }
// }


// $objs = [
//     new English, new Bangla
// ];


// greatings($objs);


// class A
// {
// }
// class B extends A
// {
// }

// trait AB
// {
// }
// trait Helper
// {
// }
// class C extends B
// {
//     use AB, Helper;
// }

// class Math
// {
//     public const PI = 3.1416;
// }

// echo Math::PI;


class Model
{
    protected const TABLE_NAME = '';

    public static function all()
    {
        return 'SELECT * FROM ' . static::TABLE_NAME;
    }
}

class User extends Model
{
    protected const TABLE_NAME = 'users';
}

echo User::all();
