<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/horizontal/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 09:16:30 GMT -->
<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Codescandy">

 <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-M8S4MT3EYG');
 </script>


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favi">


<!-- Libs CSS -->
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
  <title>Đăng nhập</title>
</head>

<body>
    
  <!-- container -->
  <main class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault"></label>
  
           </a>
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <form action="{{ route('check.login') }}">
            <div class="card-body p-6">
                <div class="mb-4">
                  <a href="../index.html"><img style="width: 45%;" src="../assets/images/brand/logo/logo.png" class="mb-2 text-inverse" alt="Image"></a>
                  <p class="mb-6">Đăng nhập tài khoản vào hệ thống</p>
                </div>
                <!-- Form -->
                <form action="check.login" method="GET">
                  <!-- Username -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Tên đăng nhập</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required="">
                  </div>
                  <!-- Password -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="">
                  </div>
                  <!-- Checkbox -->
                  
                  <div>
                    <!-- Button -->
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>

                    @if(isset($mess))
                        <p class="mb-0 mt-3">{{ $mess }}</p>
                    @endif
                  </div>
    
    
                </form>
              </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- Scripts -->
  <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>
<!-- Mirrored from dashui.codescandy.com/dashuipro/horizontal/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 09:16:30 GMT -->
</html>