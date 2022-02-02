<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HOME PAGE</title>
</head>
<body>
    <!----bootsrap div calss container (กล่องข้อความ)เพื่อครอบเนื้อหา และส่วนประกอบต่าง ๆ ก็คือแท็ก <table> --->
    <div class="container">
        <!----div calss row อยู่ใน class container                         ก็คือแท็ก <tr>, <thead>, <tbody> หรือ <tfoot>--->
        <div class="row">
            <!----calss col(colum) md(ปรับขนาด) 4(ความกว้างของcolum) offset(ขยับคอลัมน์)   ก็คือแท็ก <td> หรือ <th>--->
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h1>WELCOME </h1><h3>{{$data->firstname}} {{$data->lastname}}</h3>
                <hr>         

                <form action="/edit-proflie/{id}" method="post">







                <!--csa rf token security --->    
                @csrf
               <table class="table">
                   <thead>
                        <th>Username</th>
                        <th >firstname lastname</th>
                        <th>Action</th>
                   </thead>
                   <tbody>
                       <tr>
                           <td>{{$data->username}}</td>
                           <td>{{$data->firstname}} {{$data->lastname}}</td>
                            <td><a href="logout" class="btn btn-block btn-primary">LogOut</a></td>
                            <a href="/editPro/{{$users->id}}" class="btn btn-primary">Edit Proflie11</a>
                            
                            
                            <a href="edit" class="btn btn-block btn-primary">Edit Proflie</a>
                       </tr>
                   </tbody>

               </table>
             </form>
            </div>

        </div>
    </div>


</body>


<!--link bootsrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</html>