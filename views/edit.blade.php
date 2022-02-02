<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>EDIT PAGE</title>
</head>
<body>
    <!----bootsrap div calss container (กล่องข้อความ)เพื่อครอบเนื้อหา และส่วนประกอบต่าง ๆ ก็คือแท็ก <table> --->
    <div class="container">
        <!----div calss row อยู่ใน class container                         ก็คือแท็ก <tr>, <thead>, <tbody> หรือ <tfoot>--->
        <div class="row">
            <!----calss col(colum) md(ปรับขนาด) 4(ความกว้างของcolum) offset(ขยับคอลัมน์)   ก็คือแท็ก <td> หรือ <th>--->
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h1>Edit Proflie</h1>
                <hr>         
                
                
            <!---/updateAirline/{id}--->
               <!--     <form action="{{route('edit-update')}}" method="post">
                    /edit-update/{id}
                 --->
                    <form action="{{route('updatePro')}}" method="post" enctype="multipart/form-data">








                <!--csa rf token security --->    
                @csrf
                <div class="form-group">
                        <label for="username">Username</label>
                        <!---class="form-control ต้องการตรวจสอบค่า-->
                        <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" value="{{$editPro->username}}">
                        <span class="text-danger">@error('username') {{$message}} @enderror</span>
                        <p>Username must includes A-Z, a-z, 0-9 <br>
                        max 12 characters
                        </p>
                        
                    </div>
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" placeholder="Enter firstname" name="firstname" id="firstname" value="{{$editPro->firstname}}">
                        <span class="text-danger">@error('firstname') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Surname</label>
                        <input type="text" class="form-control" placeholder="Enter lastname" name="lastname" id="lastname" value="{{$editPro->lastname}}">
                        <span class="text-danger">@error('lastname') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" id="password" value="{{$editPro->password}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    
                    <button class="btn btn-block btn-primary" type="submit">sve</button>
                    </form>



               <table class="table">
                   <thead>
    
                        <th>Action</th>
                   </thead>
                   <tbody>
                       <tr>
                          
                          <!--  <td><a href="logout" class="btn btn-block btn-primary">Save</a></td>--->
                            <a href="dashboard" class="btn btn-block btn-primary">Cancel</a>
                            
                       </tr>
                   </tbody>

               </table>
            </div>

        </div>
    </div>























</body>


<!--link bootsrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</html>