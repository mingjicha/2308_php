<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>여러분의 방문을 환영합니다.</title>

    </head>
    <header>
        {{-- header --}}
        <div> 
            왼쪽 산리오 버튼 오른쪽 햄버거 버튼(작은 화면)
            {{-- 수정해서 COMPANY CHARACTER RECRUIT BOARD --}}
            COMPANY CHARACTER PLACE RECRUIT 메뉴(큰 화면)
            헤더는 스크롤을 내려도 고정
        </div>
    </header>
    <body>
        {{-- body --}}
        <div>
            바디 오른쪽 상단 고정 : 인스타 이동 버튼, 유튜브 이동 버튼 
        </div>
        <div> 
            모눈종이 백그라운드
            가운데 산리오 캐릭터 사진
            스크롤 내리는 마우스 이모지(애니메이션 효과)
            <p>SCROLL DOWN</p>
        </div>
        <div>
            하얀색 백그라운드
            캐릭터 소개 부분
            <p>CHARACTER</p>
            VIEW MORE -> 캐릭터 소개로 이동
            16개 캐릭터를 4*4로 넣고 
            테두리 넣어주고 이미지/한글이름/영어이름
            마우스 hover시 색 넣어주고 다른 이미지 나오게
        </div>
        <div>
            회색 백그라운드
            회사 소개 부분
            <p>COMPANY</p>
            각 회사 소개로 이동
        </div>
        <div>
            노란베이지 백그라운드
            채용 공고 부분
            <p>RECRUIT</p>
            각 채용 정보로 이동
        </div>
        <div>
            {{-- 
                기본은 PLACE지만 회원들이 적을 수 있는
                왼) 자유게시판 오) 질문게시판
                --}}

            캐릭터 백그라운드
            회사 위치 부분
            <p>PLACE</p>
            회사 위치 표 부분 이동
        </div>
        <div>
            남색 백그라운드
            산리오 타워 지도 표시
            <p>CONTACT US</p>
            지도 출력 : 왼쪽 지도, 오른쪽 문자로 표시
        </div>
        <div>
            누르면 바디 상단으로 이동하는 버튼 TOP 
        </div>
    </body>
    <footer>
        {{-- footer --}}
        <div>
            C 2023 SANRIO CO., LTD. (왼쪽)
            개인정보처리방침 (오른쪽) 클릭 시 이동
        </div>
    </footer>
</html>
