<?php
    session_start();
    if($_SESSION['status']==0){
        header('location: login.html');
    }
    $dbcon=mysqli_connect("localhost","root","123");  
    mysqli_select_db($dbcon,"thunt");
    $uname=$_SESSION['uname'];
    $sql="SELECT * FROM attempts ORDER BY count,round DESC";
    $result = mysqli_query($dbcon,$sql);
    $count=1;
?>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
    <h1>Welcome Admin...</h1>
<table style="width:100%">
  <tr>
    <th>Rank</th>
    <th>Username</th> 
    <th>Attempts</th>
                <th>Current Round</th>
    <th>IQ%</th>
  </tr>
  <?php
        while($data = mysqli_fetch_assoc($result))
            { ?>
            <tr>
                <td class="th"><?php echo $count; $count=$count+1;?></td>
                <td class="th"><?php echo $data['user_name']?></td>
                <td class="th"><?php echo $data['count']?></td>
                <td class="th"><?php echo $data['round']?></td>
                <td class="th"><?php echo (500/($data['count']))?></td>
            </tr>
          <?php } ?>
  
</table>

</body>
</html>