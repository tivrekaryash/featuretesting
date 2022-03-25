<?php

require_once('./vendor/autoload.php');

try{
    $count = 15;
    $faker = \Faker\Factory::create();

    //Connecting MySQL Database
    $pdo  = new PDO('mysql:host=localhost;dbname=hrms_proto_db', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Drop the table 
    $stmt = $pdo->prepare("SET FOREIGN_KEY_CHECKS = 0");
    $stmt = $pdo->prepare("truncate table candidate_information");
    $stmt = $pdo->prepare("SET FOREIGN_KEY_CHECKS = 1");

    $stmt->execute();
    

    //Insert the data
    $sql = 'INSERT INTO candidate_information (candidate_fullname, candidate_dob, candidate_age, candidate_gender, candidate_address, phnum, candidate_email) 
    VALUES (:full_name, :dateofbirth,:age,:gender,:addresss,:phonenumber, :email)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $stmt->execute(
            [
                ':full_name' => $faker->name, 
                ':dateofbirth' => $faker->date,  
                ':age' => $faker->numberBetween($min = 18, $max = 60),
                ':gender' => $faker->randomElement($array = array ('Male','Female','Others')),
                ':addresss' => $faker->address,
                ':phonenumber' =>$faker->phoneNumber,
                ':email' => $faker->email
                
            ]
        );
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}
?>