<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selamat Datang - SmarTani</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Nunito', sans-serif;
      background-color: #f0f9f0;
      color: #2f4f2f;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    header {
      background-color: #4CAF50;
      color: white;
      padding: 30px 20px;
      text-align: center;
    }
    header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    header p {
      font-size: 1.2rem;
    }
    .hero {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 60px 20px;
      flex-wrap: wrap;
      flex-grow: 1;
    }
    .hero-text {
      max-width: 500px;
    }
    .hero-text h1 {
      font-size: 2.8rem;
      margin-bottom: 20px;
    }
    .hero-text p {
      font-size: 1.1rem;
      margin-bottom: 30px;
    }
    .hero-text .btn {
      display: inline-block;
      background: #4CAF50;
      color: white;
      padding: 12px 24px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .hero-text .btn:hover {
      background: #388E3C;
    }
    .btn-options {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }
    .btn-petani,
    .btn-admin {
      background: #4CAF50;
      color: white;
      padding: 12px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn-petani:hover,
    .btn-admin:hover {
      background: #388E3C;
    }
    .hero-img {
      max-width: 420px;
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
      overflow: hidden;
      position: relative;
    }
    .carousel {
      width: 100%;
      position: relative;
    }
    .carousel img {
      width: 100%;
      display: none;
      transition: opacity 0.5s ease-in-out;
    }
    .carousel img.active {
      display: block;
    }
    .carousel-buttons {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      pointer-events: none;
    }
    .carousel-buttons button {
      background: rgba(76, 175, 80, 0.7);
      border: none;
      color: white;
      font-size: 1.5rem;
      padding: 10px;
      cursor: pointer;
      border-radius: 50%;
      pointer-events: auto;
    }
    .carousel-buttons button:hover {
      background: rgba(56, 142, 60, 0.8);
    }
    footer {
      text-align: center;
      padding: 20px;
      background: #e8f5e9;
      color: #2e7d32;
      font-size: 0.9rem;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <h1>SmarTani: Aplikasi Petani Cerdas</h1>
    <p>Mengelola hasil panen & cuaca secara digital untuk petani Indonesia</p>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>Selamat Datang!</h1>
      <p>SmarTani adalah sistem informasi modern yang memudahkan petani dalam mencatat hasil panen, memantau cuaca, dan menyimpan data riwayat hasil panen.</p>

      <a href="javascript:void(0);" class="btn" id="startBtn" onclick="showLoginOptions()">Mulai Sekarang</a>

      <div id="loginOptions" class="btn-options" style="display: none;">
        <a href="{{ url('/login') }}" class="btn-petani">Login Petani</a>
        <a href="{{ url('/login/admin') }}" class="btn-admin">Login Admin</a>
      </div>
    </div>

    <div class="hero-img">
      <div class="carousel" id="imageCarousel">
        <img src="{{ asset('images/petani.png') }}" class="active" alt="Petani 1">
        <img src="{{ asset('images/petani2.jpg') }}" alt="Petani 2">
        <img src="{{ asset('images/petani3.jpg') }}" alt="Petani 3">

        <div class="carousel-buttons">
          <button onclick="prevSlide()">&#8592;</button>
          <button onclick="nextSlide()">&#8594;</button>
        </div>
      </div>
    </div>
  </section>

  <footer>
    &copy; {{ date('Y') }} SmarTani. Dibuat dengan ❤️ untuk petani Indonesia.
  </footer>

  <script>
    function showLoginOptions() {
      document.getElementById('loginOptions').style.display = 'flex';
      document.getElementById('startBtn').style.display = 'none';
    }

    let currentSlide = 0;
    const images = document.querySelectorAll('#imageCarousel img');

    function showSlide(index) {
      images.forEach(img => img.classList.remove('active'));
      images[index].classList.add('active');
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % images.length;
      showSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + images.length) % images.length;
      showSlide(currentSlide);
    }
  </script>

</body>
</html>
