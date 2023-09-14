<?php
// 버블 정렬
// print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp = $arr2[0];
// $arr2[0] = $arr2[2];
// $arr2[2] = $tmp;

// print_r($arr2);

// 8개의 숫자를 배열에 입력해 주세요.
// 첫 번째 방법
$num = array(5, 34, 3, 2, 6, 7, 12);      

$count = 7;      // 배열 원소의 개수로 10을 $count에 입력

// echo "정렬 전 : ";               
// for ($a=0; $a<8; $a++)      // 정렬되기 전 배열 원소 출력
//     echo $num[$a]." ";

// echo "<br>";

for($i = $count - 1 - 1; $i >= 0; $i--)// $i는 7부터 0까지 1씩 감소 // -1 -1 두 번 하는 이유 오른쪽에서부터 왼쪽으로 이동하니까 맨 오른쪽은 정렬이 됐으니 -1
{
    for($j=0; $j<=$i; $j++)  // $j는 0부터 $i까지 1씩 증가
    {
        // 인접한 두 개의 데이터의 크기를 비교하여 크면
        if($num[$j] > $num[$j+1]) 
        {
            $tmp = $num[$j]; // 앞의 데이터를 $tmp에 잠시 대피
            $num[$j] = $num[$j+1];// 뒤의 데이터를 앞에 저장
            $num[$j+1] = $tmp;// $tmp를 뒤의 배열 원소에 저장
        }
    }
}

// echo "버블 정렬(오름차순) 후 : ";        
// for ($a=0; $a<7; $a++)    // 버블 정렬 후 배열 원소 출력
print_r($num);

// 두 번째 방법
// $arr = [5, 34, 3, 2, 6, 7, 12];

// $len = count($arr);
// for($i = 0; $i < $len; $i++){
//     for($j = 0; $j < $len - 1; $j++){
//         if($arr[$j] > $arr[$j + 1]){
//             $tmp = $arr[$j];
//             $arr[$j] = $arr[$j + 1];
//             $arr[$j + 1] = $tmp;
//         }
//     }
// }
// print_r($arr);


