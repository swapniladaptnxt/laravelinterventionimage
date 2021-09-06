{{-- <html lang="en">

<head>
    <title>Laravel Image Intervention</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
        
            <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Height</label>
                    <input type="text" name ="height" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Height">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Width</label>
                    <input type="text"  name ="width" class="form-control" id="exampleInputPassword1" placeholder="Enter Width">
                </div>
                <div class="form-check">
                    <label for="exampleInputPassword1">Upload Image</label>

                    <input type="file" name="filename" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Get Magic</button>
            </form>
        </div>
        <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="filename" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>
        @if ($image)
           <div class="row">
         <div class="col-md-8">
              <strong>Original Image:</strong>
              <br/>
              <img src="/images/{{$image->filename}}" />
        </div>
        <div class="col-md-4">
            <strong>Blur Image:</strong>
            <br/>
            <img src="/thumbnail/{{$image->filename}}"  />
            </div>
           </div>
        @endif       
  </form>
  
    </div>
</body>

</html> --}}
<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-20/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Sep 2021 13:31:22 GMT -->

<head>
    <title>AdaptNxt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.eQk9-CoeFP.css">
</head>

<body class="img js-fullheight" style="background-image:url(images/xbg.jpg.pagespeed.ic.jWFl-8BG3y.jpg)">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">AdaptNxt</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        {{-- <h3 class="mb-4 text-center">Have an account?</h3> --}}
                        <form method="post" action="{{url('create')}}" enctype="multipart/form-data" class="signin-form">
                                @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Height" name="height" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="text" class="form-control" name="width" placeholder="Enter Width"
                                    required>
                                
                            </div>
                             <div class="form-group">
                                <input id="password-field" type="file" name="filename" class="form-control" 
                                    required>
                               
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Get Magic</button>
                            </div>
                          
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js%2bbootstrap.min.js%2bmain.js.pagespeed.jc.9eD6_Mep8S.js"></script>___scripts_2___
    <script>
        eval(mod_pagespeed_zB8NXha7lA);
    </script>
    <script>
        eval(mod_pagespeed_xfgCyuItiV);
    </script>
    <script defer src="../../../../static.cloudflareinsights.com/beacon.min.js"
        data-cf-beacon='{"rayId":"68a80eb92ce852aa","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.8.1","si":10}'>
    </script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-20/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Sep 2021 13:31:26 GMT -->

</html>
