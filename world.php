<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];
$city = $_GET['context'];

$count_t = true;

if($city == 'country'){
  $count_t = true;
}else{
  $count_t = false;
}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if ($city = 'cities'){

  $sql_stmt = "SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code=countries.code WHERE countries.name = :country";
  $stmt2 = $conn->prepare($sql_stmt);
  $stmt2->bindParam(":country", $country, PDO::PARAM_STR);
  $stmt2->execute();
  $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

}
  $count = '%'.$country.'%';
  $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
  $stmt->bindParam(":country", $count, PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if($count_t) {?>

  <table class= "center">
  <thead class = "head">
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>
  </thead>

<tbody >
<ul>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['continent']; ?></td>
    <td><?= $row['independence_year']; ?></td>
    <td><?= $row['head_of_state']; ?></td>

</tr>

<?php endforeach; ?>
</tbody>
</table>
</ul>
<?php } ?>


<?php if(!$count_t){?>

<table class= "center">
  <thead class = "head">
    <tr>
      
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
     
    </tr>
  </thead>



<?php foreach ($results2 as $row): ?>
  <tbody class= "body">
  <tr>
    
    <td><?= $row['name']; ?></td>
    <td><?= $row['district']; ?></td>
    <td><?= $row['population']; ?></td>
    
  
</tr>
</tbody>
<?php endforeach; ?>
</table>
<?php } ?>






