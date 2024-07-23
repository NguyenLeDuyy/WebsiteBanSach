<?php
    //Viết lệnh in ra màn hình câu chào "Hello World" và một câu giới thiệu họ tên của mình ở bên dưới
    function sayHello($name, $age = 16){
        echo "Hello World!<br>";
        echo "My name is ".$name." I'm ".$age." years old.<br>";
    }
    sayHello("Dưa Leo", 20);
    sayHello("Bi Long");


    // Xây dựng 1 hàm tính tổng 2 số a, b và cho ví dụ minh họa

    function sum($a, $b){
        return $a + $b;
    }
    echo sum(2, 5)."<br>";
    echo sum(4, 5)."<br>";

    // Viết hàm thực hiện tính toán +,-,*,/ 2 số a, b
    function tinhToan($a, $dau, $b){
        switch ($dau) {
            case '+':
                echo $a + $b."<br>";
                break;
            
            case '-':
                echo $a - $b."<br>";
                break;
            
            case 'x':
            case '.':
            case '*':
                echo $a * $b."<br>";
                break;
            
            case '/':
                echo $a / $b."<br>";
                break;
            
            default:
                echo "Phép tính bạn chọn không hợp lệ.";
                break;
        }
    }

    // tinhToan(3, "+", 2);
    // tinhToan(3, "-", 2);
    // tinhToan(3, "*", 2);
    // tinhToan(3, ".", 2);
    // tinhToan(3, "/", 2);

    echo sum(sum(5,9), 10)."<br>";


    // $a: tham trị (chỉ giá trị)
    // &$a: tham biến (cả biến đó)
    $b = 0;
    function tangMot(&$a){
        $a++;
    }
    tangMot($b);
    echo $b."<br>";
    function superSum(...$numbers){
        $tong = 0;
        for ($i = 0; $i < count($numbers); $i++){
            $tong += $numbers[$i];
        }
        return $tong;
    }
    echo superSum(1,2,3,4,5,6,4,5)."<br>";

    // Xây dựng hàm siêu tính toán. Cho phép nhập vào phép tính +,-,*,/ và các số bất kỳ. Thực hiện tính toán như phép tính đã chọn. Cho ví dụ minh họa.
    function tinhToanSieuCap($dau, ...$numbers){
        $ketQua = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++){
            switch ($dau) {
                case '+':
                    $ketQua += $numbers[$i];
                    break;
                case '-':
                    $ketQua -= $numbers[$i];
                    break;
                case '*':
                    $ketQua *= $numbers[$i];
                    break;
                case '/':
                    $ketQua /= $numbers[$i];
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        return $ketQua;
    }
    echo tinhToanSieuCap('+',1,2,3,4,5,6,7,8,9,10)."<br>";
    echo tinhToanSieuCap('-',1,2,3,4,5,6,7,8,9,10)."<br>";
    echo tinhToanSieuCap('*',1,2,3,4,5,6,7,8,9,10)."<br>";
    echo tinhToanSieuCap('/',1,2,3,4,5,6,7,8,9,10)."<br>";

    $mang = [1,2,3,4,5, 6, 7, 8, 9,10];
    // Viết hàm tính tổng các số chẵn trong mảng
    // Viết hàm in ra các số lẻ trong mảng
    // Viết hàm tính tổng các số chia hết cho 3 trong mảng và in ra tổng phép tính tổng. Vd: 3+6+9=18

    function tongChan($mang){
        $tong = 0;
        foreach($mang as $x){
            if ($x % 2 == 0){
                $tong += $x;
            }
        }
        return $tong;
    }
    
    function inSoLe($mang){
        foreach ($mang as $x) {
            if ($x % 2 != 0)
            echo $x." ";
        }
    }

    function chiaBa(){
        $tong = 0;
        foreach ($mang as $x) {
            if ($x % 3 == 0){
                $tong += $x;
                echo $x." + ";
            }
        }
        echo " = ".$tong;

    }

    echo "<br>".tongChan($mang)."<br>";
    echo inSoLe($mang)."<br>";
    chiaBa();

    ?>