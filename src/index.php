<?php
session_start();
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    body{
        background: linear-gradient(to right, rgb(81, 81, 185),rgb(190, 190, 85));
    }
    .maindiv{
        margin: 2% 35%;
    }
    h2{
        color:antiquewhite;
        font-weight: 900;
        font-size: 35px;
    }
    input{
       border-top-left-radius: 15px;
       border-bottom-right-radius: 15px;
       background-color: lightblue ;
       color: blue;
       font-size: 18px;   
       padding: 0.3em 1em;  
       margin-top: 1em  ;
       margin-left: 1em;
    }
    select{
        border-top-left-radius: 15px;
       border-bottom-right-radius: 15px;
       background-color: lightblue ;
       color: blue;
       font-size: 18px;   
       padding: 0.3em 1em;
       margin-top : 1em;
       margin-left: 1em;

    }
    #btn{
        margin-top : 1em;
        background-color: darkslateblue;
        padding: 10px 20px;
        color : white;
        font-weight: 900;
        border-width: 2px;
    }
    #disp{
        color:white;
        font-weight: 900;

    }
    #disp table{
        border-color: blue;
        border-style: solid;
    }
    span{
        color:white;
        font-weight: 900;
        font-size: 20px;
    }
    label{
        
        color:white;
        font-weight: 900;
        font-size: 20px;

    }
</style>


</head>
<body>
    <div class='maindiv'>
        <div class ='seconddiv'>
        <h2>Picnic Registration</h2>
        <div class='lastdiv'>
            <span>Name </span> </t><input type = 'text' id ='name'><br>
            
            <label for="gender">Gender</label>

            <select name="gen" id="gen">
     <option value="male">Male</option>
     <option value="female">Female</option>
      </select>
      
</br>
         <label>Phone No</label> <input type = 'text' id ='phone' ><br>
<span>Journey Date </span><input type= 'date' id = 'jodate'   > <br > <span>Return Date </span><input type= 'date' id = 'redate'   > <br>
<label for="vehicle">Vehiclle :</label> 
  <select name="vehicle" id="vehicle">
    <option value="car">Car</option>
    <option value="bus">Bus</option>
    <option value="van">Van</option>
    <option value="mini">Mini</option>
  </select><br>


    <label for="food">Food Card :</label> 

      <select name="food" id="food">
     <option value="yes">yes</option>
     <option value="no">No</option>
      </select></br>
      

        </div>

        </div>
        <button id='btn'>Submit</button>
    </div>
    <div id='disp'></div>
    <script >
  var pArr=[];
       $(document).ready(function(){
       

    $('#btn').on('click',function(){
        var name = document.getElementById('name').value;
        var gen = document.getElementById('gen').value;
        var phone = document.getElementById('phone').value;
        var jodate = document.getElementById('jodate').value;
        var redate = document.getElementById('redate').value;
        var vehicle = document.getElementById('vehicle').value;
        var foodcard = document.getElementById('food').value;

        $.ajax({
            url : "functions.php",
            type : "POST",
            datetype: "JSON",
            data :{
                name : name ,
               
                gen : gen ,
                phone : phone ,
                
                jodate : jodate,
                redate : redate ,
                vehicle : vehicle ,
                foodcard :  foodcard ,
                "action" : "sub"
            }
        }).done(function(data){
         pArr =JSON.parse(data);
         
         display(pArr);
        })
    })
   
})
function display (pArr){
    html = "<table border=2px   ><tr><th>Sr.no</th><th>Name</th><th>Gender</th><th>Phone</th><th>Journey Date</th><th>Return Date</th><th>Vehicle</th><th>FoodCard</th></tr>"

  for(let i=0 ; i<pArr.length ;i++){
      html += "<tr><td>"+(i+1)+"</td><td>"+pArr[i].name+"</td><td>"+pArr[i].gen+"</td><td>"+pArr[i].phone+"</td><td>"+pArr[i].jodate+"</td><td>"+pArr[i].redate+"</td><td>"+pArr[i].vehicle+"</td><td>"+pArr[i].food+"</td></tr>";
  }
  html += "</table>";
  document.getElementById('disp').innerHTML= html;
}

    </script>
</body>
</html>