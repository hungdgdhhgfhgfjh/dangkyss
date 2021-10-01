<?php
$user=[];
$news="";
 $erroho="";
 $erroten="";
 $erroemail="";
 $erropassword="";
 $errongay="";
 $errothang="";
 $erronam="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ho=$_REQUEST["ho"];
    $ten=$_REQUEST["ten"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $ngay=$_REQUEST["ngay"];
    $thang=$_REQUEST["thang"];
    $nam=$_REQUEST["nam"];
    $errors=[];
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    if($ho == "" && $ten == "" && $email == "" && $password=="" && $ngay == "" && $thang == "" && $nam == "" ){
        $erroho="vui lòng nhập họ";
        $erroten="vui lòng nhập họ";
        $erroemail="vui lòng nhập email";
        $erropassword="vui lòng nhập password";
        $errongay="vui lòng nhập ngay";
        $errothang="vui lòng nhập thang";
        $erronam="vui lòng nhập nam";
        $errors="thanh cong";
    }else {
      $news="thành công";
    $webnews="dangkys.json";
    $user=$_REQUEST;
    $users=file_get_contents($webnews);
    if($users=""){
        $users=[];
    } else {
        $users=json_decode($users);
    }
    $users[]=$user;
    $data=json_encode($users);
    file_put_contents($webnews,$data);
     }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p><?php echo $news; ?><p>
    <form action="" method="POST">
        <input type="text" name="ho"    placeholder="họ">
        <p><?php echo $erroho; ?></p>
        <input type="text" name="ten"   placeholder="tên">
        <p><?php echo $erroten; ?></p>
        <br>
        <br>
        <input type="text" name="email" placeholder="email">
        <p><?php echo $erroemail; ?></p>
        <br>
        <br>
        <input type="password" name="password" placeholder="mật khẩu">
        <p><?php echo $erropassword; ?></p>
        <br>
        <select name="ngay" id="">
        <p><?php echo $errongay; ?></p>
            <option value="">vui long chon ngay</option>
            <?php for($i=1;$i<32;$i++): ?>
            <option value="<?php echo " ngày" . $i;  ?>"> <?php echo $i ."ngày" ?></option>
            <?php endfor; ?>
        </select>
        <select name="thang" id="">
        <p><?php echo $errothang; ?></p>
            <option value="">vui long chon ngay</option>
            <?php for($i=1;$i<13;$i++): ?>
            <option value="<?php echo " tháng" . $i;  ?>"><?php echo "tháng" . $i;  ?></option>
            <?php endfor; ?>
        </select>
        <select name="nam" id="">
        <p><?php echo $erronam; ?></p>
            <option value="">vui long chon ngay</option>
            <?php for($i=1950;$i<2010;$i++): ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor; ?>
            
        </select>
        <br>
        <br>
        <button type="submit">submit</button>
    </form>
    <table>
        <tr>
            <th>tên</th>
            <th>email</th>
            <th>pass</th>
            <th>ngay/thang/nam sinh</th>
        </tr>
        
        <?php foreach($user as $khachhang =>$thongtin):
            echo "<pre>";
            print_r($thongtin);
            echo "</pre>";
            ?>
         <tr>
             <td><?php echo $thongtin; ?></td>
         </tr>
         <?php endforeach; ?>
    </table>
</body>
</html>