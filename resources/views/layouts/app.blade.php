<!doctype html>
<html    data-navigation-type="horizontal" data-navbar-horizontal-shape="slim" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Template Scripts and Styles -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <!-- (other favicon links) -->
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="{{ asset('vendors/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />

    {{-- Custom Image Upload Box --}}
    <link href="{{ asset('assets/css/image-upload-box.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/multi-image-upload.css') }}" rel="stylesheet" />

    <script>
        window.config.set({
            phoenixNavbarTopStyle: 'darker'
        });
    </script>
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            document.getElementById('style-default').setAttribute('disabled', true);
            document.getElementById('user-style-default').setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            document.getElementById('style-rtl').setAttribute('disabled', true);
            document.getElementById('user-style-rtl').setAttribute('disabled', true);
        }
    </script>
</head>

<body>
    <main class="main" id="top">
        <div class="wrapper">
            {{--        @include('layouts.includes.navbar_vertical')--}}
            <div class="page-wrapper">
                @include('layouts.includes.navbar')
                <div class="position-relative" id="contentContainer">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @include('layouts.includes.footer')

    <!-- JavaScript and Template Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/phoenix.js') }}"></script>
    <script src="{{ asset('vendors/dhtmlx-gantt/dhtmlxgantt.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce-dashboard.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/flatpickr/flatpickr.min.js') }}"></script>

    {{--    Custom Image upload box--}}
    <script src="{{ asset('assets/js/image-upload-box.js') }}"></script>
    <script src="{{ asset('assets/js/multi-image-upload.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



    <script>
        document.querySelectorAll('.nav-link.dropdown-indicator').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const bsCollapse = new bootstrap.Collapse(target, { toggle: false });
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                if (expanded) {
                    bsCollapse.hide();
                } else {
                    bsCollapse.show();
                }
            });
        });
    </script>

<style>
    .overlay-container{
        z-index: 9999;
    }
    .create-form-icon{
        width: 50px;
    }
    .alert{
        height: 40px;
        width: 400px;
        margin-left: 10px;
        font-size: 0.9rem;
    }
    .auth-form-box-custom{
        width: 600px;
    }

    /******** css for item edit & view pages ********/
    .image-upload-box2 {
        position: relative;
        width: 120px;
        height: 120px;
        padding: 4px;
        border: 1px solid #ccc;
        border-radius: 12px;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
    }

    .image-upload-box2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 7px;
        transition: transform 0.3s ease;
    }

    .image-upload-box2 .upload-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 30px;
        z-index: 1; /* Ensure it's above the image */
    }

    .image-upload-box2 .edit-icon2 {
        position: absolute;
        top: 18px;
        right: -10px;
        transform: translate(-50%, -50%);
        font-size: 12px;
        background-color: #232323;
        z-index: 2; /* Higher z-index to ensure it's above the image */
        display: none; /* Initially hidden */
    }

    .edit-icon2:hover{
        background-color: red;
    }

    .image-upload-box2:hover img {
        transform: scale(1.1);
    }

    .image-upload-box2:hover .edit-icon2 {
        display: block; /* Show edit icon on hover */
    }

    .item-image-view {
        position: relative;
        border-radius: 12px;
        padding: 5px;
        overflow: hidden; /* This is necessary to make sure the trash icon stays inside the container */
    }

    .item-image-thumbnail{
        border-radius: 7px;
    }

    .trash-icon {
        position: absolute;
        top: 18px;
        right: -10px;
        transform: translate(-50%, -50%);
        font-size: 10px;
        background-color: #232323;
        z-index: 1; /* Ensure it's above the image */
        display: none;
    }

    .trash-icon:hover{
        background-color: red;
    }

    .item-image-view:hover .trash-icon {
        display: block;
    }

    .item-image-view .item-image-thumbnail {
        /*border-radius: 3px;*/
        transition: transform 0.3s ease;
    }

    .item-image-view:hover .item-image-thumbnail {
        transform: scale(1.2);
    }


    .zoom-effect {
        transition: transform 0.3s ease-in-out;
    }

    .zoom-effect:hover {
        transform: scale(1.1);
    }

    .square-card{
        height: auto;
        aspect-ratio: 1/1;
    }


    .highlight-effect {
        transition: border-bottom 0.2s ease-in-out; /* Change the transition property to border-bottom */
    }

    .highlight-effect:hover {
        border-bottom: 5px solid #cc214b;
    }

    /* Custom CSS to center the alert */
    .alert-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999; /* Ensure it's above other content */
    }

    .floating-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

</style>

{{--<script>--}}
{{--    // Dismiss alerts after 2 seconds--}}
{{--    $(document).ready(function () {--}}
{{--        $('.alert').delay(2000).fadeOut('slow');--}}
{{--    });--}}
{{--</script>--}}

<script>
    /******Custom Alert*******/
    function showCustomAlert(message) {
        // Create a new div element for the alert
        const alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', 'bg-warning', 'text-white', 'd-flex', 'align-items-center');
        alertDiv.setAttribute('role', 'alert');

        // Create the icon element
        const iconSpan = document.createElement('span');
        iconSpan.classList.add('fas', 'fa-info-circle', 'text-white', 'fs-5', 'me-3');

        // Create the text element
        const textP = document.createElement('p');
        textP.classList.add('mb-0', 'flex-1');
        textP.textContent = message;

        // Create the close button
        const closeButton = document.createElement('button');
        closeButton.classList.add('btn-close');
        closeButton.setAttribute('type', 'button');
        closeButton.setAttribute('data-bs-dismiss', 'alert');
        closeButton.setAttribute('aria-label', 'Close');

        // Append elements to the alert div
        alertDiv.appendChild(iconSpan);
        alertDiv.appendChild(textP);
        alertDiv.appendChild(closeButton);

        // Get the container for alerts
        const alertContainer = document.querySelector('.alert-container');

        // Append the alert to the container
        alertContainer.appendChild(alertDiv);
        setTimeout(() => {
            alertDiv.classList.remove('fade');
            // Remove the alert from the DOM after the fade-out animation
            setTimeout(() => {
                alertDiv.remove();
            }, 2000);
        }, 200);
    }

    function showSuccessAlert(message) {
        // Create a new div element for the alert
        const alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', 'bg-success', 'text-white', 'd-flex', 'align-items-center', 'w-80', 'fade');
        alertDiv.setAttribute('role', 'alert');

        // Create the icon element
        const iconSpan = document.createElement('span');
        iconSpan.classList.add('fas', 'fa-check', 'text-white', 'fs-5', 'me-3');

        // Create the text element
        const textP = document.createElement('p');
        textP.classList.add('mb-0', 'flex-1');
        textP.textContent = message;

        // Create the close button
        const closeButton = document.createElement('button');
        closeButton.classList.add('btn-close');
        closeButton.setAttribute('type', 'button');
        closeButton.setAttribute('data-bs-dismiss', 'alert');
        closeButton.setAttribute('aria-label', 'Close');

        // Append elements to the alert div
        alertDiv.appendChild(iconSpan);
        alertDiv.appendChild(textP);
        alertDiv.appendChild(closeButton);

        // Get the container for alerts
        const alertContainer = document.querySelector('.alert-container');

        // Append the alert to the container
        alertContainer.appendChild(alertDiv);

        // Fade out the alert after 2 seconds
        setTimeout(() => {
            alertDiv.classList.remove('fade');
            // Remove the alert from the DOM after the fade-out animation
            setTimeout(() => {
                alertDiv.remove();
            }, 1000);
        }, 100);
    }

    /******** Call this function to restrict a text field to number only ********/
    function handleNumericInput(event) {
        var input = event.target;
        var value = input.value;
        // Remove any non-numeric characters except a dot
        value = value.replace(/[^0-9.]/g, '');

        // Allow only one dot
        value = value.replace(/(\..*)\./g, '$1');

        // Allow up to 4 decimal places
        value = value.replace(/(\.\d{4})\d*/g, '$1');

        // Update the input value
        input.value = value;
    }



    /*********************** **************************/
    /****** Script for Item Edit & View *******/
    /*********************** **************************/

    document.querySelector('.image-upload-box2').addEventListener('click', function() {
        document.querySelector('.formFileSm2').click();
    });

    document.querySelector('.formFileSm2').addEventListener('change', function() {
        const file = this.files[0];
        const imageType = /image.*/;

        if (file && file.type.match(imageType)) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.querySelector('.uploaded-image');
                img.src = e.target.result;
                img.style.display = 'block';
                // document.querySelector('.edit-icon').style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    });

    document.querySelector('.image-upload-box2').addEventListener('click', function(event) {
        const fileInput = document.querySelector('.formFileSm2');
        const removeIcon = document.getElementById('editImage');

        if (event.target === removeIcon) {
            const img = document.querySelector('.uploaded-image');
            img.src = '#';
            img.style.display = 'none';
            fileInput.value = '';
        }
    });


    /*********************** **************************/
    /*** End of Dynamically Add File upload options ***/
    /*********************** **************************/

</script>

@yield('scripts')

</body>
</html>
