<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="registyle.css">
    <title>registration</title>
</head>
<body>

<h3>Course Registration Form</h3>

<div>
  <form action="regi.php" method="POST">
       <label>ID</label>
    <input type="text" id="lname" name="roll" placeholder="roll number..">
    <label>Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

 

    <label for="department">department</label>
    <select id="department" name="department">
      <option value="cse">CSE</option>
      <option value="eee">ELECTRICAL</option>
      <option value="me">MECHANICAL</option>
      <option value="mie">MECHATRONICS</option>
      <option value="ete">ETE</option>
      <option value="ce">civil</option>
      <option value="petrolium">petrolium</option>
    </select>
     <label>batch</label>
    <input type="text" id="lname" name="batch" placeholder="batch">
   <label>level</label>
    <input type="text" id="lname" name="level" placeholder="level">
     <label>term</label>
    <input type="text" id="lname" name="term" placeholder="term">
     <label>course</label>
    <input type="text" id="lname" name="course" placeholder="course">
     <label>credit</label>
    <input type="text" id="lname" name="credit" placeholder="credit">
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
