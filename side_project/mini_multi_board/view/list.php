<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/css/common.css">
    <title><?php echo $this->titleBoardName ?></title>
</head>
<body>
    <!-- 헤더 설정 -->
    <?php require_once("view/inc/header.php"); ?>
        <div class="text-center mt-5 mb-5">
            <h1><?php echo $this->titleBoardName ?></h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modalInsert">
              <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
            </svg> 
        </div>
        <!-- relative 설정 안 했으니까 body 기준으로 absolute -->
     <div id="modal" class="displayNone">
        <div id="modalW"></div>
        <button id="btnModalClose">닫기</button>
     </div>   
    <main class="justify-content-center align-content-center h-75">
      <?php
          foreach($this->arrBoardInfo as $item) {
      ?>
            <div class="card<?php echo $item["id"]; ?>" >
              <img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없어요">
              <div class="card-body">
                <h5 class="card-title"><?php echo $item["b_title"] ?></h5>
                <p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."···" ?></p>
                <!-- <button id="btnDetail" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalRaemi">변신</button> -->
                <button class="btn btn-warning" onclick="openDetail(<?php echo $item['id']?>); return false;">변신</button>
              </div>
            </div>
      <?php
          }
      ?>
    <!-- 상세 Modal -->
    <div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="b_title">제목</h5>
            <button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>작성일 : <span id="created_at"></span></p>
            <p>수정일 : <span id="update_at"></span></p>
            <img id="b_img" src="" alt="">
            <p id="b_content">내용</p>
          </div>
    <!-- 작성 Modal -->
    <div class="modal fade" id="modalInsert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="/board/add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">나도 꼬마마법사🧚‍♀️</h5>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <input type="text" name="b_title" class="form-control" placeholder="이름을 입력하세요.">
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="b_content" id="exampleFormControlTextarea1" rows="10" placeholder="변신 주문을 입력하세요."></textarea>
              </div>
              <br>
              <div class="input-group mb-3">
                <!-- accept="image/*" 이미지 파일의 모든 확장자만 화면에 띄우겠다 -->
                <input type="file" name="b_img" class="form-control" id="inputGroupFile02" accept="image/*">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
              <button type="submit" class="btn btn-warning">등록</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    

    </main>
    <footer class="bg-dark fixed-bottom text-light text-center p-3">저작권</footer>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/view/js/common.js"></script>
</body>
</html>