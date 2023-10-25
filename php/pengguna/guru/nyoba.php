<!DOCTYPE html>
<html>
<body>

<form>
  <label for="cars">Choose a car:</label>
  <select name="cars" id="cars" onchange="displayCarData()">
    <?php
      // Your database connection
      $connection = mysqli_connect("localhost", "root", "", "car");

      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

      // Query to fetch data
      $query = "SELECT id, car_name, car_info FROM car";
      $result = mysqli_query($connection, $query);

      // Loop through the query results to generate options
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '" data-info="' . $row['car_info'] . '">' . $row['car_name'] . '</option>';
      }

      // Close the connection
      mysqli_close($connection);
    ?>
  </select>
  <br><br>
  <label for="carInfo">Car Information:</label>
  <input type="text" id="carInfo" readonly>
</form>

<script>
  function displayCarData() {
    var selectedCar = document.getElementById("cars");
    var carInfo = selectedCar.options[selectedCar.selectedIndex].getAttribute('data-info');
    document.getElementById("carInfo").value = carInfo;
  }
</script>

</body>
</html>
