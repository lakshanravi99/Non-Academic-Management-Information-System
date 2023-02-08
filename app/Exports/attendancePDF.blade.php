<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = 'dist/images/logo.svg'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>NMIS - UOR</h2>
<p>UOR Address</p>
<p>Phone : 0412256789</p>
<p>Email : UORNMIS@gmail.com</p>
<p> <b> Employee Attendance List </b> </p>
    </td> 
  </tr>
  
   
</table>



<table id="customers">
  <tr>
    <th >Employee ID</th>
    <th >Username</th>
    <th >Arrival Time</th>
    <th >Leave Time</th>
    <th >Date</th>
    <th >Status</th>
    
  </tr>
  @if(count($users))
    @foreach ( $users as $user )
      <tr>
        <td>{{ $user->emp_id }}</td>
        <td>{{ $user->fname }}</td>
        <td>{{ $user->arrival_time }}</td>
        <td>{{ $user->leave_time }}</td>
        <td>{{ $user->date }}</td>
        <td>{{ $user->status }}</td>
      </tr>
    @endforeach
  @endif  
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
