<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>LOGIN PAGE</title>
</head>
<body>
    <!----bootsrap div calss container (กล่องข้อความ)เพื่อครอบเนื้อหา และส่วนประกอบต่าง ๆ ก็คือแท็ก <table> --->
    <div class="container">
        <!----div calss row อยู่ใน class container                         ก็คือแท็ก <tr>, <thead>, <tbody> หรือ <tfoot>--->
        <div class="row">
            <!----calss col(colum) md(ปรับขนาด) 4(ความกว้างของcolum) offset(ขยับคอลัมน์)   ก็คือแท็ก <td> หรือ <th>--->
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h1>Login</h1>
                <hr>               
                <form action="{{route('login-user')}}" method="post">
                <!---Session controller if ($user)-->
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <!--csa rf token security --->    
                @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <!---class="form-control ต้องการตรวจสอบค่า-->
                        <input type="text" class="form-control" placeholder="Enter username" name="username" value="{{old('username')}}">
                         <!---span  ข้อความแจ้งเตือน หากไม่ได้กรอกข้อมูล หรือ---->
                        <span class="text-danger">@error('username') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <!--class="btn btn-block btn-primary ปุ่มที่มีขนาดยาวเต็มพื้นที่หน้าเว็บ--->
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                    <br>
                    <a href="registration" class="btn btn-block btn-primary">Register Here</a>
                </form>
            </div>
        </div>
    </div>
</body>
<!--link bootsrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</html>