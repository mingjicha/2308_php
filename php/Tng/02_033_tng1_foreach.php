<?php
// id만 출력해 주세요.
$arr = [
    [
        "id" => "may"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "meoru"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "siru"
        ,"pw" => "php504"
    ]
];

echo "ID List\n";
foreach($arr as $item)
    {echo $item["id"]."\n";
}

?>