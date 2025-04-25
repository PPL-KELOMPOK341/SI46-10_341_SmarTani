<!-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pengeluaran</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      background-color: #f5f5f5;
    }

    /* HEADER */
    .header {
      background-color: #43b02a;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 20px;
      color: white;
      border-bottom-left-radius: 50px;
    }

    .header .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .header .profile {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .header .profile img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #fff;
    }

    .header .profile span {
      font-size: 14px;
      color: white;
    }

    /* FORM */
    .form-container {
      max-width: 900px;
      margin: 30px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      border: 1px solid #ddd;
    }

    .form-container h1 {
      text-align: left;
      margin-bottom: 20px;
      font-size: 24px;
    }

    .form-container h2 {
      text-align: left;
      margin-top: 30px;
      font-size: 20px;
    }

    .form-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      align-items: center;
    }

    label {
      width: 30%;
      margin-right: 10px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select,
    textarea {
      width: 65%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    textarea {
      height: 100px;
    }

    .required:after {
      content: " *";
      color: red;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-yellow {
      background-color: #FFB300;
      color: white;
    }

    .btn-yellow:hover {
      background-color: #ffa000;
    }

    .btn-blue {
      background-color: #4CAF50;
      color: white;
    }

    .btn-blue:hover {
      background-color: #45a049;
    }

    .btn-red {
      background-color: #f44336;
      color: white;
    }

    .btn-red:hover {
      background-color: #da190b;
    }

    .form-row {
      display: flex;
      justify-content: space-between;
      gap: 15px;
    }

    .form-row .form-group {
      flex: 1;
    }

    /* FOOTER */
    footer {
      background-color: #2e7d32;
      color: white;
      padding: 40px 20px 20px;
      margin-top: 60px;
    }

    .footer-container {
      max-width: 1000px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
    }

    .footer-section {
      flex: 1;
      min-width: 200px;
    }

    .footer-section h4 {
      margin-bottom: 15px;
      font-size: 16px;
      font-weight: 500;
    }

    .footer-section p,
    .footer-section a {
      font-size: 14px;
      color: #e0f2f1;
      text-decoration: none;
      display: block;
      margin-bottom: 6px;
    }

    .footer-section a:hover {
      text-decoration: underline;
    }

    .footer-icons a {
      margin-right: 10px;
      display: inline-block;
    }

    .footer-icons img {
      width: 20px;
      height: 20px;
    }

    .footer-logo img {
      width: 120px;
      margin-top: 10px;
    }

    .copyright {
      text-align: center;
      font-size: 13px;
      margin-top: 30px;
      border-top: 1px solid #66bb6a;
      padding-top: 10px;
      color: #c8e6c9;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="menu-icon">&#9776;</div>
    <div class="profile">
      <img src="https://via.placeholder.com/30" alt="user-icon">
      <span>Rayhan Mulia Pratama</span>
    </div>
  </div>

 
  <div class="form-container"> 
  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengeluaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #ddd;
        }
        .form-container h1 {
            text-align: left;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-container h2 {
            text-align: left;
            margin-top: 30px;
            font-size: 20px;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center; 
        }
        label {
            width: 30%; 
            margin-right: 10px;
        }
        input[type="text"], input[type="date"], input[type="number"], select, textarea {
            width: 65%; 
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        } 
        
        textarea {
            height: 100px; 
        }
        .required:after {
            content: " *";
            color: red;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-yellow {
            background-color: #FFEB3B;
            color: black;
        }
        .btn-yellow:hover {
            background-color: #fdd835;
        }
        .btn-blue {
            background-color: #4CAF50;
            color: white;
        }
        .btn-blue:hover {
            background-color: #45a049;
        }
        .btn-red {
            background-color: #f44336;
            color: white;
        }
        .btn-red:hover {
            background-color: #da190b;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 15px; 
        }
        .form-row .form-group {
            flex: 1; 
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>FORM PENGELUARAN</h1>

        <form action="{{ route('pengeluaran.store') }}" method="POST">

        @csrf

       
       <h2>Informasi Penanaman</h2>

        <div class="form-row">
        <div class="form-group">
            <label for="nama_tanaman" class="required">Nama Tanaman</label>
            <input type="text" id="nama_tanaman" name="nama_tanaman" required>
        </div>

        <div class="form-group">
            <label for="periode" class="required">Periode</label>
            <select id="periode" name="periode" required>
                <option value="">Pilih periode penanaman</option>
                <option value="P1">Periode 1</option>
                <option value="P2">Periode 2</option>
            </select>
        </div></div>

        <div class="form-row">
        <div class="form-group">
            <label for="tanggal_penanaman" class="required">Tanggal Penanaman</label>
            <input type="date" id="tanggal_penanaman" name="tanggal_penanaman" required>
        </div></div>

        <div class="form-group">
            <button type="button" class="btn-yellow">Cari Data</button>
        </div> 

        
        <h2>Biaya Pengeluaran</h2>

        <div class="form-row">
        <div class="form-group">
            <label for="total_biaya_bibit" class="required">Total Biaya Bibit</label>
            <input type="number" id="total_biaya_bibit" name="total_biaya_bibit" required>
        </div>

        <div class="form-group">
            <label for="upah_panen" class="required">Upah Panen</label>
            <input type="number" id="upah_panen" name="upah_panen" required>
        </div></div>

        <div class="form-row">
        <div class="form-group">
            <label for="total_biaya_pupuk" class="required">Total Biaya Pupuk</label>
            <input type="number" id="total_biaya_pupuk" name="total_biaya_pupuk" required>
        </div>

        <div class="form-group">
            <label for="jumlah_pupuk" class="required">Jumlah Pupuk yang Digunakan (kg)</label>
            <input type="number" id="jumlah_pupuk" name="jumlah_pupuk" required>
        </div></div>
        
        <div class="form-row">
        <div class="form-group">
            <label for="tanggal_pengeluaran" class="required">Tanggal Pengeluaran</label>
            <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
        </div>

        <div class="form-group">
            <label for="jumlah_bibit" class="required">Jumlah Bibit</label>
            <input type="number" id="jumlah_bibit" name="jumlah_bibit" required>
        </div></div> 

        
        <h2>Pengeluaran Lainnya</h2>

        <div class="form-row">
        <div class="form-group">
            <label for="tujuan_pengeluaran" class="required">Tujuan Pengeluaran</label>
            <input type="text" id="tujuan_pengeluaran" name="tujuan_pengeluaran" required>
        </div>

        <div class="form-group">
            <label for="harga" class="required">Harga</label>
            <input type="number" id="harga" name="harga" required>
        </div></div>

        <div class="form-group">
            <label for="tanggal_pengeluaran" class="required">Tanggal Pengeluaran</label>
            <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
        </div>

        <div class="form-group">
            <label for="catatan">Catatan (Optional)</label>
            <textarea id="catatan" name="catatan"></textarea>
        </div>

        
        <div class="form-group">
            <button type="submit" class="btn-blue">Simpan</button>
            <button type="button" class="btn-red">Kembali</button>
        </div>
        <a href="form-pengeluaran.html"><button>Ubah</button></a>


    </form>
</div>

</body>
</html>
  </div>

  
  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h4>Our Office</h4>
        <p>📍 Telkom University</p>
        <p>📞 08122121</p>
        <p>📧 smartani@gmail.com</p>
        <div class="footer-icons">
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png"/></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook.png"/></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/youtube-play.png"/></a>
          <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png"/></a>
        </div>
      </div>

      <div class="footer-section">
        <h4>Fitur</h4>
        <a href="#">Program</a>
        <a href="#">Hasil Tani</a>
        <a href="#">Bantuan</a>
      </div>

      <div class="footer-section">
        <h4>Quick Links</h4>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Support</a>
      </div>

      <div class="footer-section footer-logo">
        <img src="https://via.placeholder.com/120x50?text=SmarTani" alt="SmarTani Logo">
      </div>
    </div>

    <div class="copyright">
      © SmarTani — All Right Reserved.
    </div>
  </footer>

</body>
</html> -->

---------------

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengeluaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        /* HEADER */
        .header {
            background-color: #43b02a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            color: white;
            border-bottom-left-radius: 50px;
        }

        .header .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .header .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
        }

        .header .profile span {
            font-size: 14px;
            color: white;
        }

        /* FORM */
        .form-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #ddd;
        }

        .form-container h1 {
            text-align: left;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-container h2 {
            text-align: left;
            margin-top: 30px;
            font-size: 20px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        label {
            width: 30%;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 65%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 100px;
        }

        .required:after {
            content: " *";
            color: red;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-yellow {
            background-color: #FFB300;
            color: white;
        }

        .btn-yellow:hover {
            background-color: #ffa000;
        }

        .btn-blue {
            background-color: #4CAF50;
            color: white;
        }

        .btn-blue:hover {
            background-color: #45a049;
        }

        .btn-red {
            background-color: #f44336;
            color: white;
        }

        .btn-red:hover {
            background-color: #da190b;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        /* FOOTER */
        footer {
            background-color: #2e7d32;
            color: white;
            padding: 40px 20px 20px;
            margin-top: 60px;
        }

        .footer-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
        }

        .footer-section h4 {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 500;
        }

        .footer-section p,
        .footer-section a {
            font-size: 14px;
            color: #e0f2f1;
            text-decoration: none;
            display: block;
            margin-bottom: 6px;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .footer-icons a {
            margin-right: 10px;
            display: inline-block;
        }

        .footer-icons img {
            width: 20px;
            height: 20px;
        }

        .footer-logo img {
            width: 120px;
            margin-top: 10px;
        }

        .copyright {
            text-align: center;
            font-size: 13px;
            margin-top: 30px;
            border-top: 1px solid #66bb6a;
            padding-top: 10px;
            color: #c8e6c9;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="menu-icon">&#9776;</div>
        <div class="profile">
            <img src="https://via.placeholder.com/30" alt="user-icon">
            <span>Rayhan Mulia Pratama</span>
        </div>
    </div>

    <!-- FORM -->
    <div class="form-container">
        <h1>Form Pengeluaran</h1>

        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf

            <h2>Informasi Penanaman</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="nama_tanaman" class="required">Nama Tanaman</label>
                    <input type="text" id="nama_tanaman" name="nama_tanaman" required>
                </div>

                <div class="form-group">
                    <label for="periode" class="required">Periode</label>
                    <select id="periode" name="periode" required>
                        <option value="">Pilih periode penanaman</option>
                        <option value="P1">Periode 1</option>
                        <option value="P2">Periode 2</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_penanaman" class="required">Tanggal Penanaman</label>
                    <input type="date" id="tanggal_penanaman" name="tanggal_penanaman" required>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn-yellow">Cari Data</button>
            </div>

            <h2>Biaya Pengeluaran</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="total_biaya_bibit" class="required">Total Biaya Bibit</label>
                    <input type="number" id="total_biaya_bibit" name="total_biaya_bibit" required>
                </div>

                <div class="form-group">
                    <label for="upah_panen" class="required">Upah Panen</label>
                    <input type="number" id="upah_panen" name="upah_panen" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="total_biaya_pupuk" class="required">Total Biaya Pupuk</label>
                    <input type="number" id="total_biaya_pupuk" name="total_biaya_pupuk" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_pupuk" class="required">Jumlah Pupuk yang Digunakan (kg)</label>
                    <input type="number" id="jumlah_pupuk" name="jumlah_pupuk" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_pengeluaran" class="required">Tanggal Pengeluaran</label>
                    <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_bibit" class="required">Jumlah Bibit</label>
                    <input type="number" id="jumlah_bibit" name="jumlah_bibit" required>
                </div>
            </div>

            <h2>Pengeluaran Lainnya</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="tujuan_pengeluaran" class="required">Tujuan Pengeluaran</label>
                    <input type="text" id="tujuan_pengeluaran" name="tujuan_pengeluaran" required>
                </div>

                <div class="form-group">
                    <label for="harga" class="required">Harga</label>
                    <input type="number" id="harga" name="harga" required>
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan (Optional)</label>
                <textarea id="catatan" name="catatan"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-blue">Simpan</button>
                <button type="button" class="btn-red" onclick="window.location.href='{{ route('pengeluaran.index') }}'">Kembali</button>
            </div>

        </form>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>Our Office</h4>
                <p>📍 Telkom University</p>
                <p>📞 08122121</p>
                <p>📧 smartani@gmail.com</p>
                <div class="footer-icons">
                    <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png" /></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook.png" /></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/youtube-play.png" /></a>
                    <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" /></a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Fitur</h4>
                <a href="#">Program</a>
                <a href="#">Hasil Tani</a>
                <a href="#">Bantuan</a>
            </div>

            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Support</a>
            </div>

            <div class="footer-section footer-logo">
                <img src="https://via.placeholder.com/120x50?text=SmarTani" alt="SmarTani Logo">
            </div>
        </div>

        <div class="copyright">
            © SmarTani — All Right Reserved.
        </div>
    </footer>

</body>

</html>