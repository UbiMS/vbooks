<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>General</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .navbar-nav {
      margin: 0px;
      display: flex;
    }

    .navbar-nav .nav-link:hover {
      font-weight: bold;
    }

    .custom-box form input[type="search"] {
      background: linear-gradient(135deg,
          rgba(217, 217, 217, 0.5) 10%,
          rgba(255, 255, 255, 0.5) 100%);
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      margin: 0;
      max-width: 100%;
      /* Tambahkan max-width untuk responsif */
      width: 1000px;
      margin: auto;
      margin-top: 50px;
    }

    .custom-btn-general {
      background-color: #11284b;
      color: #ffffff;
      border: none;
      /* Menghapus border */
      margin-right: 10px;
    }

    .custom-btn-final-task {
      background-color: #ffffff;
      color: #11284b;
      border: none;
      /* Menghapus border */
    }

    .custom-btn-general:hover {
      background-color: #0056b3;
    }

    .custom-btn-final-task:hover {
      background-color: #0056b3;
    }

    .listbook {
      display: flex;
      flex-direction: column;
      /* Mengatur orientasi menjadi kolom */
      align-items: center;
    }

    .row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      /* Jarak antara baris */
    }

    .box {
      width: 180px;
      height: 270px;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      box-sizing: border-box;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
    }

    .box img {
      max-width: 100%;
      max-height: 90%;
      /* Adjust this value to ensure it fits well within the box */
      object-fit: contain;
    }

    .box p {
      margin: 0;
      padding: 5px 0 0;
      font-size: 14px;
      /* Adjust the font size as needed */
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      width: 100%;
      box-sizing: border-box;
    }

    /* Menambahkan margin kanan pada setiap box kecuali yang terakhir */
    .box+.box {
      margin-left: 20px;
    }

    /* Menghapus margin kanan pada box terakhir di setiap baris */
    .row .box:last-child {
      margin-right: 0;
    }

    a {
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body style="background-color: #eef4fa">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <div class="logo">
        <a href="/home_page">
          <img src="/img/logoVBooksBiru.png" width="106" height="30" alt="V-Books Logo" />
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 64px">
          <li class="nav-item" style="margin-right: 20px">
            <a class="nav-link active" aria-current="page" href="/home_page" style="color: #487baa">Home</a>
          </li>
          <li class="nav-item" style="margin-right: 20px">
            <a class="nav-link active" href="#" style="color: #487baa">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/general_catalog" style="color: #487baa">Catalog</a>
          </li>
        </ul>
        <img src="/img/user.png" class="profile-img" alt="User Profile" onclick="redirectToProfilePage()" />
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <form class="form-check m-2" action="/cari_general_katalog" method="post" role="search">
      <input class="form-control" type="search" name="keyword" placeholder="Search Book" aria-label="Search" style="
            padding: 15px;
            height: 100%;
            width: 1000px;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 70px;
          " />
    </form>
  </div>

  <div class="text-center" style="margin-left: -760px; margin-bottom: 40px">
    <a href="general_catalog">
      <button type="button" class="btn btn-primary btn-lg custom-btn-general">
        General
      </button>
    </a>
    <a href="finalTask_catalog">
      <button type="button" class="btn btn-secondary btn-lg custom-btn-final-task">
        Final Task
      </button>
    </a>
  </div>

  <div class="listbook">
    <div class="row">
      <?php foreach ($book as $index => $b) : ?>
        <a href="/detail_general/<?= $b['id_buku']; ?>" class="box">
          <img src="/img/<?= $b['cover']; ?>" alt="<?= $b['title']; ?>" />
          <p><?= $b['title']; ?></p>
        </a>
      <?php endforeach ?>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function redirectToLoginPage() {
      // Redirect ke halaman login
      window.location.href = "login.html";
    }
  </script>
</body>
<!-- Bootstrap Bundle with Popper -->

</html>