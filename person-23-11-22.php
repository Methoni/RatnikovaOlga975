<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Family tree</title>

    <style>
        h2 {
            text-align: center;
        }
        .jon {
            display:flex;
            align-items:center;
            justify-content: center;
        }
    </style>
</head>
<body>
<?php

class Person {
    private $name;
    private $lastname;
    private $mother;
    private $father;


    function __construct($name, $lastname=null, $mother=null, $father=null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->mother = $mother;
        $this->father = $father;
    }

    function getName() {
        return $this->name;
    }
    function getLastName() {
        return $this->lastname;
    }
    function getMother() {
        return $this->mother;
    }
    function getFather() {
        return $this->father;
    }
    function getInfo() 
    {
        return 
        "My name is: " . $this->getName() . " " . $this->getLastName() . "<br>My father is: " . $this->getFather()->getName() . " " . $this->getFather()->getLastName() . "<br>My mother is: " . $this->getMother()->getName() . " " . $this->getMother()->getLastName() . "<br>My paternal grandfather is: " . $this->getFather()->getFather()->getName() . " " . $this->getFather()->getFather()->getLastName() . "<br>My paternal grandmother is: " . $this->getFather()->getMother()->getName() . " " . $this->getFather()->getMother()->getLastName() . "<br>My maternal grandfather is: " . $this->getMother()->getFather()->getName() . " " . $this->getMother()->getFather()->getLastName() . "<br>My maternal grandmother is: " . $this->getMother()->getMother()->getName() . " " . $this->getMother()->getMother()->getLastName();                
    }
}

$fishermanswife = new Person ("unknown", null, null, null);
$fisherman = new Person ("some unknown fisherman", null, null, null);
$lyarra = new Person ("Lyarra", "Stark", null, null);
$rickard = new Person ("Rickard", "Stark", null, null);
$vella = new Person ("Vella", null, $fishermanswife, $fisherman);
$eddard = new Person ("Eddard", "Stark", $lyarra, $rickard);
$jon = new Person ("Jon", "Snow", $vella, $eddard);


$lyarra = new Person ("Lyarra", "Stark", null, null);
$rickard = new Person ("Rickard", "Stark", null, null);
$rhaella = new Person ("Rhaella", "Targaryen", null, null);
$aerys = new Person ("Aerys", "Targaryen", null, null);
$lyanna = new Person ("Lyanna", "Stark", $lyarra, $rickard);
$rhaegar = new Person ("Rhaegar", "Targaryen", $rhaella, $aerys);
$aegon = new Person ("Aegon", "Targaryen", $lyanna, $rhaegar);
?>

<div class="container-fluid">
<h2>My biography is a total mess</h2>
    <div class="row">
        <div class="col-md-4">
            <?php echo $jon->getInfo(); ?>
        </div>
        <div class="col-md-4">
            <div class="jon"><img src="/img/jonsnow-sm.jpg" alt=""></div>
        </div>
        <div class="col-md-4">
            <?php echo $aegon->getInfo(); ?>
        </div>
    </div>
</div>
</body>
</html>



