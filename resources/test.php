<?php
//Viết một hàm PHP kiểm tra xem một số có phải là số nguyên tố hay không. 
//Hàm sẽ nhận một số nguyên dương và trả về true nếu đó là số nguyên tố, ngược lại trả về false.
function isPrime($number) {
    if($number % 1 == 0 && $number % $number==0){
        echo 'true';
    }else{
        echo 'false';
    }
}
return isPrime(2);
?>