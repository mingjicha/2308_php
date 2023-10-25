// 1. 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40 ];
let ARR1_sort = Array.from(ARR1).sort((a, b) => a - b); // [3, 3, 5, 5, 6, 7, 8, 40, 80, 92, 100]
// ARR1.sort((a, b) => a - b);
// 콘솔에 ARR1 쳤을 때 원본이 보존되는 것을 알 수 있음.

// 2-1. 홀수와 짝수를 분리해서 각각 새로운 배열을 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
const ARR2_2 = ARR2.filter( num => num % 2 === 0 ); // 짝수 [4, 2]
const ARR2_3 = ARR2.filter( num => num % 2 === 1 ); // 홀수 [5, 7, 3, 5, 1]

// 2-2. 함수로 만들어 주세요.
function test(arr, flg) {
    if( flg === 0 ) {
        return arr.filter( num => num % 2 === 0 );
    } else {
        return arr.filter( num => num % 2 === 1 );
    }
}
// 콘솔에서 test(ARR2, 1); 넣으면

// 3. 다음 문자열에서 구분 문자를 '.'에서 ' '(공백)으로 변경해 주세요.
const STR1 = 'php504.meer.kat';
STR1.replaceAll('.', ' ');
STR1.replaceAll(/\./g, ' ');
STR1.split('.').join(' ');
