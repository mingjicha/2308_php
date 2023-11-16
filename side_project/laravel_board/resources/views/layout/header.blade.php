<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">라라벨 팅커벨</a>
          {{-- 로그인 상태 --}}
          @auth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    징글벨🔔
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./free.html">🎅미리멜이크릿스마스🎄</a></li>
                    <li><a class="dropdown-item" href="./question.html">🙇‍♀️새해복많이받으세요🌅</a></li>
                  </ul>
                </li>
              </ul>
              <a href="{{route('user.logout.get')}}" class="navar-nav nav-link text-light" role="button">로그아웃</a>
            </div>
          @endauth


          {{-- 비로그인 상태 --}}
          @guest
              <a href="{{route('user.registration.get')}}" class="navar-nav nav-link text-light" role="button">회원가입</a>
          @endguest
        </div>
      </nav>
</header>