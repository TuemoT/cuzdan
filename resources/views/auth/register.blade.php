<html lang="tr">

<head>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    {{--
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> --}}

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'> --}}

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt</title>
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url('assets/js/userprofile.js') }}"></script>

</head>
<style>
    .img-circle {
        border-radius: 50%;
    }

    @media (max-width: 767.98px) {
        .sidebar-wrapper {
            position: static;
            width: inherit;
        }
    }

    @media (min-width: 992px) {
        .skillset .level-title {
            display: inline-block;
            float: left;
            width: 30%;
            margin-bottom: 0;
        }
    }

    #cadre {
        border: 2px solid red;
        padding: 10px;
        border-radius: 50px 40px;


    }
</style>
<script>
    // Fonction pour afficher le formulaire correspondant à l'option sélectionnée
    function afficherFormulaire() {
      var optionSelectionnee = document.getElementById("options").value;
      var formPersonel = document.getElementById("form-personel");
      var formBusiness = document.getElementById("form-business");
      var formAvatar = document.getElementById("avatar");

      // Afficher le formulaire Personel si l'option "business" est sélectionnée
      if (optionSelectionnee === "personel") {
        formPersonel.style.display = "block";
        formBusiness.style.display = "none";
        formAvatar.style.display="none";
      }
      // Afficher le formulaire business si l'option "business" est sélectionnée
      else if (optionSelectionnee === "business") {
        formPersonel.style.display = "none";
        formBusiness.style.display = "block";
        formAvatar.style.display="none";
      }
      // Cacher les deux formulaires si aucune option n'est sélectionnée
      else {
        formPersonel.style.display = "none";
        formBusiness.style.display = "none";
      }
    }
</script>


<body>
    <section class="container">

        <!-- Validation Errors -->
        <x-auth.validation-errors :errors="$errors" />
        <header>Cüzdan Kayıt Platformu</header>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            {{-- <div class="d-flex justify-content-center" id="avatar">
                <div class="profile_picture text-center  ">
                    <input type="file" name="image_path" accept="image/png, image/jpeg, image/jpg"
                        onchange="display_image(this);" class="d-none upload-box-image">
                    <img class="box-image-preview img-fluid img-circle elevation-2"
                        src="{{ asset('assets/images/user-thumb.jpg') }}" alt="Profile picture"
                        onclick="$(this).closest('.profile_picture').find('input').click();"
                        style="height:150px; width:150px;">
                </div>
            </div> --}}
            <div class="form-container">
                <label for="options">Kayıt Türü</label>
                <div class="column">
                    <div class="select-box">
                        <select id="options" onchange="afficherFormulaire()" name="reg_type">
                            <option value="">Seçiniz</option>
                            <option value="personel">Bireysel</option>
                            <option value="business">Kurumsal</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div id="form-personel" style="display: none;">
            <form method="POST" action="{{ route('register') }}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="profile_picture text-center">
                    <input type="file" name="image_path" accept="image/png, image/jpeg, image/jpg"
                        onchange="display_image(this);" class="d-none upload-box-image">
                    <img class="box-image-preview img-fluid img-circle elevation-2"
                        src="{{ asset('assets/images/user-thumb.jpg') }}" alt="Profile picture"
                        onclick="$(this).closest('.profile_picture').find('input').click();"
                        style="height:150px; width:150px;">
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Ad</label>
                        <input name="first_name" id="first_name" type="text" placeholder="Adınız" required />
                    </div>
                    <div class="input-box">
                        <label>Soyad</label>
                        <input type="text" id="last_name" placeholder="Soyadınız" required name="last_name" />
                    </div>
                </div>


                <x-auth.input-email />

                <div class="column">
                    <div class="input-box">
                        <label>Şifre</label>
                        <input name="password" type="password" placeholder="Şifre giriniz" required />
                    </div>
                    <div class="input-box">
                        <label for="password_confirmation">Şifrenizi Tekrar Ediniz</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Şifre giriniz" required />


                    </div>
                </div>
                <br>
                <div class="column">
                    <div></div>
                    <div class="input-box">
                        <label>Telefon Numarası</label>
                        <input type="tel" id="phone" placeholder="Telefon numaranızı giriniz" class="form-control" name="phone" required />

                    </div>
                    <div class="input-box">
                        <label>Doğum Tarihi</label>
                        <input type="date" name="birth_day" id="birth_day" placeholder="Enter birth date" required />
                    </div>
                </div>
                <div class="gender-box">
                    <h3>Cinsiyet</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="male" name="gender" checked value="Male" />
                            <label for="check-male">Erkek</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="female" name="gender" value="Female" />
                            <label for="check-female">Kadın</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="other" name="gender" value="Other" />
                            <label for="check-other">belirtmek istemiyorum</label>
                        </div>
                    </div>
                </div>

                <div class="input-box address">
                    <label>Adres</label>
                    <input type="text" name="address" id="address" placeholder="Adresinizi giriniz" required />


                    <div class="column">

                        <div class="input-box">
                            <label>Region</label>
                            {{-- <input type="text" name="city" id="city" placeholder="Şehir giriniz" required /> --}}
                            <select name="region"  id="region" class='form-control'>
                                <option value="">-- Region --</option>
                                <option>Africa</option>
                                <option>Asia</option>
                                <option>Europe</option>
                                <option>North America</option>
                                <option>South America</option>
                                <option>Oceania</option>
                                <option>Antarctica</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Ülke</label>
                            {{-- <input type="text" name="country" id="country" placeholder="Ülke giriniz" required />
                            --}}
                            <select name="country" :value="isset($user) ? $user->country : ''" id="country"
                                class='form-control'>
                                <option value="">-- Country --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Eyalet</label>
                            {{-- <input type="text" name="region" id="region" placeholder="Bölge giriniz" required />
                            --}}
                            <select name="state" :value="isset($user) ? $user->state : ''" id="state"
                                class='form-control'>
                                <option value="">-- State --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Şehir</label>
                            {{-- <input type="text" name="city" id="city" placeholder="Şehir giriniz" required /> --}}
                            <select name="city" :value="isset($user) ? $user->city : ''" id="city" class='form-control'>
                                <option value="">-- City --</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-box payment">
                    <label>TC/VKN</label>
                    <input type="number" id="tc_vkn" placeholder="TC Kimlik Numaranız" name="tc_vkn" required />
                    <div class="column">
                        <div class="input-box">
                            <label>Banka</label>
                            <input type="text" id="bank_name" placeholder="Banka" required name="bank_name" />
                        </div>
                        <div class="input-box">
                            <label>Iban</label>
                            <input type="text" id="iban" placeholder="Iban" required name="iban" />
                        </div>
                    </div>


                    <div class="input-box">
                        <label>Category</label>
                        <select name="category" id="category" class='form-control'>
                            <option hidden>--Sales Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box">
                        <label>Currency</label>
                        <select name="currency" id="currency" class='form-control'>
                            <option hidden>--Döviz Kuru--</option>
                            <option>UE</option>
                            <option>TR</option>
                            <option>US</option>
                            <option>AS</option>
                            <option>AFK</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="insertislemi">Gönder</button>

                </div>
            </form>
        </div>



        <div id="form-business" style="display: none;">
            <form method="POST" action="{{ route('register') }}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="profile_picture text-center">
                    <input type="file" name="image_path" accept="image/png, image/jpeg, image/jpg"
                        onchange="display_image(this);" class="d-none upload-box-image">
                    <img class="box-image-preview img-fluid img-circle elevation-2"
                        src="{{ asset('assets/images/user-thumb.jpg') }}" alt="Profile picture"
                        onclick="$(this).closest('.profile_picture').find('input').click();"
                        style="height:150px; width:150px;">
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Ad</label>
                        <input name="first_name" id="first_name" type="text" placeholder="Adınız" required />
                    </div>
                    <div class="input-box">
                        <label>Soyad</label>
                        <input type="text" id="last_name" placeholder="Soyadınız" required name="last_name" />
                    </div>
                </div>


                <x-auth.input-email />

                <div class="column">
                    <div class="input-box">
                        <label>Şifre</label>
                        <input name="password" type="password" placeholder="Şifre giriniz" required />
                    </div>
                    <div class="input-box">
                        <label for="password_confirmation">Şifrenizi Tekrar Ediniz</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Şifre giriniz" required />


                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Telefon Numarası</label>
                        <input type="tel" id="phones" placeholder="Telefon numaranızı giriniz" name="phone" required />
                    </div>
                    <div class="input-box">
                        <label>Doğum Tarihi</label>
                        <input type="date" name="birth_day" id="birth_day" placeholder="Enter birth date" required />
                    </div>
                </div>
                <div class="gender-box">
                    <h3>Cinsiyet</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="male" name="gender" checked value="Male" />
                            <label for="check-male">Erkek</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="female" name="gender" value="Female" />
                            <label for="check-female">Kadın</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="other" name="gender" value="Other" />
                            <label for="check-other">belirtmek istemiyorum</label>
                        </div>
                    </div>
                </div>
                <div class="input-box">
                    <div class="column">
                        <div class="input-box">
                            <label>Ticari Ünvanı</label>
                            <input type="text" placeholder="Ticari Ünvan" name="commercial_title" required />
                        </div>
                        <div class="input-box">
                            <label>Şirket Türü</label>
                            <input type="text" placeholder="Şirket Türü" name="company_type" required />
                        </div>
                    </div>
                </div>

                <div class="input-box">
                    <div class="column">
                        <div class="input-box">
                            <label>Mersis No</label>
                            <input type="text" id="mersis_no" placeholder="Mersis No" name="mersis_no" required />
                        </div>
                        <div class="input-box">
                            <label>Sicil No</label>
                            <input type="text" id="registration_number" placeholder="Sicil No"
                                name="registration_number" required />
                        </div>
                    </div>
                </div>

                <div class="input-box">
                    <div class="column">
                        <div class="input-box">
                            <label>Vergi Dairesi</label>
                            <input type="text" id="tax_admin" placeholder="Vergi Dairesi" name="tax_admin" required />
                        </div>
                        <div class="input-box">
                            <label>Vergi No</label>
                            <input type="text" id="tax_number" placeholder="Vergi Numarası" name="tax_number"
                                required />
                        </div>
                    </div>
                </div>

                <div class="input-box address">
                    <label>Adres</label>
                    <input type="text" name="address" id="address" placeholder="Adresinizi giriniz" required />


                    <div class="column">

                        <div class="input-box">
                            <label>Region</label>
                            {{-- <input type="text" name="city" id="city" placeholder="Şehir giriniz" required /> --}}
                            <select name="region" id="regions" class='form-control'>
                                <option value="">-- Region --</option>
                                <option>Africa</option>
                                <option>Asia</option>
                                <option>Europe</option>
                                <option>North America</option>
                                <option>South America</option>
                                <option>Oceania</option>
                                <option>Antarctica</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Ülke</label>
                            {{-- <input type="text" name="country" id="country" placeholder="Ülke giriniz" required />
                            --}}
                            <select name="country" :value="isset($user) ? $user->country : ''" id="countrys" class='form-control'>
                                <option value="">-- Country --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Eyalet</label>
                            {{-- <input type="text" name="region" id="region" placeholder="Bölge giriniz" required />
                            --}}
                            <select name="state" :value="isset($user) ? $user->state : ''" id="states" class='form-control'>
                                <option value="">-- State --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label>Şehir</label>
                            {{-- <input type="text" name="city" id="city" placeholder="Şehir giriniz" required /> --}}
                            <select name="city" :value="isset($user) ? $user->city : ''" id="citys" class='form-control'>
                                <option value="">-- City --</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-box payment">
                    <label>TC/VKN</label>
                    <input type="number" id="tc_vkn" placeholder="TC Kimlik Numaranız" name="tc_vkn" required />
                    <div class="column">
                        <div class="input-box">
                            <label>Banka</label>
                            <input type="text" id="bank_name" placeholder="Banka" required name="bank_name" />
                        </div>
                        <div class="input-box">
                            <label>Iban</label>
                            <input type="text" id="iban" placeholder="Iban" required name="iban" />
                        </div>
                    </div>


                    <div class="input-box">
                        <label>Category</label>
                        <select name="category" id="category" class='form-control'>
                            <option hidden>--Sales Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box">
                        <label>Currency</label>
                        <select name="currency" id="currency" class='form-control'>
                            <option hidden>--Döviz Kuru--</option>
                            <option>UE</option>
                            <option>TR</option>
                            <option>US</option>
                            <option>AS</option>
                            <option>AFK</option>
                        </select>
                    </div>
                    </div>
                <div class="form-actions">
                    <button type="submit" name="insertislemi">Gönder</button>

                </div>

            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ url('assets/js/userprofile.js') }}"></script>

        @php

        /**
        * Alert
        */
        $message = '';
        $icon = '';

        if (!empty($errors->all())) {
        $icon = 'error';
        $message = $errors->first();
        } elseif (session()->has('success')) {
        $icon = 'success';
        $message = session()->get('success');
        } elseif (session()->has('error')) {
        $icon = 'error';
        $message = session()->get('error');
        } elseif (!empty($success)) {
        $icon = 'success';
        $message = $success;
        }

        @endphp

        <script>
            var Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                });
                var message = '{{ $message }}';
                var icon = '{{ $icon }}';
                if (message.length > 0) {
                    Toast.fire({
                        icon: icon,
                        title: message
                    });
                }
        </script>

        <script>
            function saverecord() {
                    $("#submitbtn").trigger('click');
                }

                /**
                 *  Display Image
                 */
                function display_image(input) {

                    if (input.files && input.files[0]) {

                        var reader = new FileReader();
                        reader.onload = function(e) {

                            $(input).closest('div').find('.box-image-preview').attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }

                }
        </script>


        @include('auth.api')


    </section>





</body>

</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px;
        background: #fff;
    }

    .container {
        position: relative;
        max-width: 900px;
        width: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .container header {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        text-align: center;
    }

    .container .form {
        margin-top: 30px;
    }

    .form .input-box {
        width: 100%;
        margin-top: 20px;
    }

    .input-box label {
        color: #333;
    }

    .form :where(.input-box input, .select-box) {
        position: relative;
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        margin-top: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 0 15px;
    }

    .input-box input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .form .column {
        display: flex;
        column-gap: 15px;
    }

    .form .gender-box {
        margin-top: 20px;
    }

    .gender-box h3 {
        color: #333;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;
    }

    .form :where(.gender-option, .gender) {
        display: flex;
        align-items: center;
        column-gap: 50px;
        flex-wrap: wrap;
    }

    .form .gender {
        column-gap: 5px;
    }

    .gender input {
        accent-color: #343434;
    }

    .form :where(.gender input, .gender label) {
        cursor: pointer;
    }

    .gender label {
        color: #707070;
    }

    .address :where(input, .select-box) {
        margin-top: 15px;
    }

    .payment :where(input, .select-box) {
        margin-top: 2px;
    }

    .select-box select {
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        color: #707070;
        font-size: 1rem;
    }

    .form button {
        height: 55px;
        width: 100%;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        margin-top: 30px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #bb2782;
    }

    .form button:hover {
        background: rgba(187, 39, 130, 0.8);
    }

    /*Responsive*/
    @media screen and (max-width: 500px) {
        .form .column {
            flex-wrap: wrap;
        }

        .form :where(.gender-option, .gender) {
            row-gap: 15px;
        }
    }

    .upload {
        width: 100px;
        position: relative;
        margin: auto;
    }

    .upload img {
        border-radius: 50%;
        border: 6px solid #eaeaea;
    }

    .upload .round {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #bb2782;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
    }

    .upload .round input[type="file"] {
        position: absolute;
        transform: scale(2);
        opacity: 0;
    }

    input[type="file"]::-webkit-file-upload-button {
        cursor: pointer;
    }
</style>





<script>
    const phonesInputField = document.querySelector("#phones");
           const phonesInput = window.intlTelInput(phonesInputField, {
             utilsScript:
               "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
           });




           $(document).ready(function() {
          //-------------------------------SELECT CASCADING-------------------------//
          var selectedCountry = (selectedRegion = selectedCity = "");
          // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
          var BATTUTA_KEY = "00000000000000000000000000000000";
          // Populate country select box from battuta API
          url =
            "https://battuta.medunes.net/api/country/all/?key=" +
            BATTUTA_KEY +
            "&callback=?";

          // EXTRACT JSON DATA.
          $.getJSON(url, function(data) {
            console.log(data);
            $.each(data, function(index, value) {
              // APPEND OR INSERT DATA TO SELECT ELEMENT.
              $("#countrys").append(
                '<option value="' + value.code + '">' + value.name + "</option>"
              );
            });
          });
          // Country selected --> update region list .
          $("#countrys").change(function() {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $("#countrys").val();
            // Populate country select box from battuta API
            url =
              "https://battuta.medunes.net/api/region/" +
              countryCode +
              "/all/?key=" +
              BATTUTA_KEY +
              "&callback=?";
            $.getJSON(url, function(data) {
              $("#states option").remove();
              $('#states').append('<option value="">Please select your state</option>');
              $.each(data, function(index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#states").append(
                  '<option value="' + value.region + '">' + value.region + "</option>"
                );
              });
            });
          });
          // Region selected --> updated city list
          $("#states").on("change", function() {
            selectedRegion = this.options[this.selectedIndex].text;
            // Populate country select box from battuta API
            countryCode = $("#countrys").val();
            region = $("#states").val();
            url =
              "https://battuta.medunes.net/api/city/" +
              countryCode +
              "/search/?region=" +
              region +
              "&key=" +
              BATTUTA_KEY +
              "&callback=?";
            $.getJSON(url, function(data) {
              console.log(data);
              $("#citys option").remove();
              $('#citys').append('<option value="">Please select your city</option>');
              $.each(data, function(index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#citys").append(
                  '<option value="' + value.city + '">' + value.city + "</option>"
                );
              });
            });
          });
          // city selected --> update location string
          $("#citys").on("change", function() {
            selectedCity = this.options[this.selectedIndex].text;
            $("#location").html(
              "Locatation: Country: " +
                selectedCountry +
                ", Region: " +
                selectedRegion +
                ", City: " +
                selectedCity
            );
          });
        });

</script>
