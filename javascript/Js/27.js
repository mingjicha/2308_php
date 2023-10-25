let arr = [1,2,3,4,5];

// push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제하거나 교체하고 방번호 정렬까지 함
arr.splice(2, 1); // 배열의 arr[2]에서부터 n개를 삭제

// arr에서 5번만 삭제해 주세요.
arr.splice(4, 1);

// 배열의 arr[2]에 값이 10인 인덱스를 추가
arr.splice(2, 0, 10);

arr.splice(2, 1, 'aaa');

arr.splice(2, 0, 10, 11, 12, 13);

// indexOf() : 배열에서 특정 요소를 찾는데 사용
arr.indexOf(4);

// lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
arr = [1, 1, ,1 ,3, 4, 5, 6, 6, 6, 10];

// pop() : 배열의 가장 마지막 요소를 삭제
arr.pop();
let i_pop = arr.pop(); // 삭제한 pop의 마지막 요소를 i_pop에 저장

// sort() : 배열을 정렬
arr = [5, 4, 6, 7, 3, 2];
let arr_sort = arr.sort((a, b) => b - a); // 내림차순 정렬
// arr.sort((a, b) => a - b)// 오름차순 정렬

// 원본데이터와 별도의 새로 배열을 만드는 방법 (Value Copy 방식)
let arr1 = arr;
let arr2 = Array.from(arr);
// 둘 다 다르니까 찾아서 확인하기 ! (주소를 참조한다 ?)

// includes() : 배열의 특정요소를 가지고 있는지 판별 (return boolean)
arr = ['치킨', '육회비빔밥', '비엔나'];
// 콘솔에다가 쓰면,
// arr.includes('짜장면') false
// arr.includes('치킨') true
let boo_includes = arr.includes('짜장면');

// join() : 배열의 모든 요소를 연결해서 하나의 문자열을 리턴
// 콘솔에다가 치면, 
arr.join(); // '치킨,육회비빔밥,비엔나'
arr.join(''); // '치킨육회비빔밥비엔나'
arr.join('/'); // '치킨 / 육회비빔밥 / 비엔나'

// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// 모든 요소의 값 * 2의 결과를 배열로 얻으려면
let arr_map = arr.map(num => num * 2); // [2, 4, 6, 8, 10, 12, 14, 16, 18]

arr_map = arr.map( num => {
    if( num % 3 === 0 ) {
        return '짝';
    } else {
        return num;
    }
}); // [1, 2, '짝', 4, 5, '짝', 7, 8, '짝']

// some() : 주어진 함수를 만족하는 요소가 있는지 판별해서 하나라도 있으면 true (return boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_some = arr.some( num => num === 9 );
// 콘솔에다가 boo_some 쳐보기

// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 마나족 안 하면 false (return boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_every = arr.every( num => num === 9 );

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_filter = arr.filter( num => num % 3 === 0 ); // [3, 6, 9]