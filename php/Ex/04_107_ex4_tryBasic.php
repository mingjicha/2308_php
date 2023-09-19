<?php

try { // 예외상황이 발생할만한 소스코드(우리가 처리하고 싶은 소스코드들)
	// ex) commit
	echo "try 실행\n";
	throw new Exception("강제 예외 발생"); // try 실행 -> catch 실행 -> finally 실행
	echo "try 종료\n";
} catch( Exception $e ) { // 예외상황 발생 시 실행
	// ex) rollback
	echo "catch 실행\n";
	echo $e->getMessage(),"\n"; // 예외 발생할 때 메세지 출력되게 해줌
} finally { // 정상이든, 예외발생이든 무조건 실행
	echo "finally 실행";
}