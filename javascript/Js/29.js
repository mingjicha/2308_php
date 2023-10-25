Math.ceil(3.5) // 올림
Math.round(3.5) // 반올림
Math.floor(3.5) // 버림

// random() : 0 이상 1 미만의 랜덤한 수를 리턴
Math.random() * 10;
let ran = Math.ceil((Math.random() * 10));

// 잘 뜨는지 확인 해보기 (루프 100만번 얼마 안 걸림)
console.log('루프시작');
for(let i = 0; i < 10000000; i++){
    let ran = math.ceil((Math.random() * 10));
    if( ran < 1 || ran > 10){
        console.log('이상한 숫자');
    }
}
console.log('루프끝');

// min(), max() : 파라미터 중 가장 작은 값, 가장 큰 값을 리턴
Math.min(1, 2, 3);
Math.max(1, 2, 3);

