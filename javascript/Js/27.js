let arr = [1,2,3,4,5];

// push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제하거나 교체하고 방번호 정렬까지 함
arr.splice(2, 1); // 배열의 arr[2]에서부터 n개를 삭ㅈ

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