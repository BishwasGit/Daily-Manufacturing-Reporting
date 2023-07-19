<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 04:09:00 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Job Dashboard | {{env("APP_NAME")}} - Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{env('APP_NAME')}} Admin & Dashboard" name="description" />
    <meta content="Bibhuti" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.appUrl = "{{ env('APP_URL') }}";
        var route_prefix = "{{env('APP_URL')}}/files";
    </script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    @stack("css")
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>

    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include("backend.header")




        @include("backend.sidebar")

        <div class="vertical-overlay"></div>


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield("content")

                    

                </div>

            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © {{env("APP_NAME")}}.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Developed by <a href="https://www.bibhutisolutions.com/" target="_blank">Bibhuti Solutions Pvt. Ltd.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <?php /*
    @include("backend.parts.customizer")
    */ ?>


    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
    <script type='text/javascript' src='https://choices-js.github.io/Choices/assets/scripts/choices.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/flatpickr'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>


    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var baseUrl = '{{ env("APP_URL") }}'; // Replace with your base URL

            var textareas = document.querySelectorAll('.ckeditor-classic');
            for (var i = 0; i < textareas.length; i++) {
                CKEDITOR.replace(textareas[i], {
                    // height: 100,
                    filebrowserImageBrowseUrl: baseUrl + '/files?type=Images',
                    filebrowserImageUploadUrl: baseUrl + '/files/upload?type=Images&_token={{ csrf_token() }}',
                    filebrowserBrowseUrl: baseUrl + '/files?type=Files',
                    filebrowserUploadUrl: baseUrl + '/files/upload?type=Files&_token={{ csrf_token() }}',
                    filebrowserImageUploadPath: '/storage/photos', // Adjust the path as per your requirements
                    filebrowserUploadPath: '/storage/files', // Adjust the path as per your requirements
                    baseHref: baseUrl + '/', // Set the baseHref to the baseUrl
                    filebrowserImageBrowseCallback: function(url) {
                        var relativePath = url.replace(baseUrl + '/', '');
                        alert("COW");
                        onSelectFile(relativePath); // Call your custom function with the relative path
                    }
                });
            }
        });

        function onSelectFile(url) {
            // Use the relative path as needed
            console.log(url);
        }

        jQuery(document).ready(function($) {
            // $('.lfm').filemanager('image', {
            //     prefix: window.appUrl + '/files',
            // });
        });
    </script>
    

    <script>
        //  $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>

    <script>
        var lfm = function(id, type, options) {
            let button = document.getElementById(id);

            button.addEventListener('click', function() {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function(items) {
                    var file_path = items.map(function(item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';

                    // set or change the preview image src
                    items.forEach(function(item) {
                        let img = document.createElement('img')
                        img.setAttribute('style', 'height: 5rem')
                        img.setAttribute('src', item.thumb_url)
                        target_preview.innerHTML = '';
                        target_preview.appendChild(img);
                    });

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };
    </script>
    @if(isset($GLOBALS['scripts']))
    {!! implode(PHP_EOL, $GLOBALS['scripts']) !!}
    @endif

    @stack("js")
</body>

</html>