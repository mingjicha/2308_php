<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark hover-warning">
        <div class="container-fluid">
            <a class="navbar-brand">꼬마마법사</a>
            <?php if($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist") { ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    게시판
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <?php 
                            foreach($this->arrBoardNameInfo as $item) {
                        ?>
                        <li><a class="dropdown-item" href="/board/list?b_type=<?php echo $item["b_type"] ?>"><?php echo $item["b_name"] ?></a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                </ul>
                <!-- a 태그니까 메소드는 GET으로 받아 줌 -->
                <a href="/user/logout" class="nav-link text-light" role="button">로그아웃</a>
            </div>
            </div>
        <?php } ?>
    </nav>
</header>