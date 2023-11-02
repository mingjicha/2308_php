<?php

spl_autoload_register( function($path) {
    $path = str_replace("\\", "/", $path); // 역슬러시가 있으면 슬러시로 다 바꾸고 그것을 $path에 저장

    // require_once($path.".php"); // 확장자명 고정시키기 위해 설정 파일에 설정하기
    require_once($path._EXTENSION_PHP); // 설정한 확장자 달아주기
});