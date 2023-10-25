// Date
let now = new Date(); // 콘솔에 now치면 Wed Oct 25 2023 13:00:08 GMT+0900 (한국 표준시)
let sDate = new Date('2023-09-30 19:20:10'); // 지정한 날짜로 가져올 수 있음

// getFullYear() : 연도만 가져오는 메소드
let year = now.getFullYear();
console.log(now.getFullYear()); // 2023

// getMonth() : 월만 가져오는 메소드 **주의 +1을 해줘야 현재 월과 같게 나옴.
let month = now.getMonth() + 1
console.log(now.getMonth() + 1);

// getDate() : 일을 가져오는 메소드
let date = now.getDate();
console.log(now.getDate());

// 콘솔에다가
// year + '년 ' + month + '월 ' + date + '일'; // 2023년 9월 25일

// getDay() : 요일을 가져오는 메소드 ( 0 ~ 6 : 일요일 ~ 토요일 )
console.log(now.getDay());
let day = now.getDay();
let kDay = '';
switch (day) {
    case 0:
        kDay = '일요일';
        break;
    case 1:
        kDay = '월요일';
        break;
    case 2:
        kDay = '화요일';
        break;
        
    case 3:
        kDay = '수요일';
        break;
    case 4:
        kDay = '목요일';
        break;
    case 5:
        kDay = '금요일';
        break;
    case 6:
        kDay = '토요일';
        break;
}
console.log(now.getDay() + '');

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSecoonds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초를 가져온다.
// 콘솔 now.getTime(); // 1698207572298 

// 오늘로부터 며칠 전인지 구하기.
let d_now = new Date(); // 오늘 Date
let d_sDate = new Date('2023-09-30 19:20:10'); // 기준일
// const getDateDiff = (d1, d2) => {
//     const date1 = new Date(d1);
//     const date2 = new Date(d2);
    
//     const diffDate = date1.getTime() - date2.getTime();
    
//     return Math.abs(diffDate / (1000 * 60 * 60 * 24)); // 밀리세컨 * 초 * 분 * 시 = 일
//   }
// let d_day = Math.ceil(getDateDiff(d_now, d_sDate));

let diffDate = d_now - d_sDate;
console.log(Math.ceil(diffDate / 86400000)); // (1000 * 60 * 60 * 24) 곱하면 86,400,000
let diff = Math.abs(Math.floor((d_now - d_sDate) / 86400000));
// let diff = Math.abs(Math.floor((now.getTime() - sDate.getTime()) / 86400000));

// now2 = new Date(year, month-1, date, 0, 0, 0, 0); // 오늘 날짜 0시 0분 0초 0밀리초 가져오는 방법