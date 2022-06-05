<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.Admin', 'Ujian Online') }}</title> --}}
    <title>@yield('title') - Ujian Online</title>
    <link rel="icon" href="{{ asset('/img/logo-ujian.png') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://kit.fontawesome.com/fe6aa2d4ea.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.bootstrap5.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     {{-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" /> --}}
     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

     <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/effect-button.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('/css/button-hover.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/radio-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/preloader.css') }}">
    <script src="jquery.min.js"></script>
    {{-- <script>
    //script preloader
     (function( $ ) {
       $(window).on('load', function(){
        $('#preloader').fadeOut('slow',function(){
               $(this).hide();
           });
       });

      })(jQuery);

     //slow bisa diganti dengan angka misal 2000
    </script> --}}

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    @yield('styles')


</head>
<body id="page-top">
    <div id="loading"></div>
        <script>
            var load = document.getElementById("loading");

            window.addEventListener('load', function(){
             load.style.display = "none";
            });
           </script>
        @include('sweetalert::alert')

        {{-- <div id="preloader">
            <div class="socket">
             <img src="/loading/loading-web2.gif" alt="">
            </div>
        </div> --}}

        <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->
                @include('admin.component.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
               <div>
                   <!-- SuperAdmin -->
                    @yield('admin')
                    @yield('sekolah')
                    <!-- End SuperAdmin -->
                   <!-- Admin -->
                    @yield('profile')
                    @yield('content')
                    @yield('categoryUjian')
                    @yield('category')
                    @yield('post')
                    @yield('postEssay')
                    @yield('kelas')
                    @yield('siswaAdmin')
                    @yield('guruAdmin')
                    @yield('distribusiUjianKelas')
                    <!-- End Admin -->
                    @yield('blank')
                    <!-- Guru -->
                    @yield('guru')
                    <!-- End Guru -->
                    <!-- Siswa -->
                    @yield('siswa')
                    @yield('ujianSekolah')
                    <!-- End Siswa -->
                </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        @include('admin.component.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->

</div>
<!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
     </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title badge bg-danger p-2" style="font-size: 16px;" id="exampleModalLabel">Ready to Leave?</h2>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/fe6aa2d4ea.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
{{-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/datatables-demo.js"></script>


</body>

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    width: '100%',
    height: '200px',
    removeButtons: 'PasteFromWord',
  };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
    </script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#my-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}




<script src="https://kit.fontawesome.com/fe6aa2d4ea.js" crossorigin="anonymous"></script>
@yield('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#master').on('click',function (e) {
                if ($(this).is(':checked',true)) {
                    $('.sub_chk').prop('checked',true)
                }else {
                    $('.sub_chk').prop('checked',false)
                }
            });
            $('.delete_all').on('click',function (e) {
                var allVals = [];
                $('.sub_chk:checked').each(function () {
                    allVals.push($(this).attr('data-id'));
                });
                if (allVals.length <= 0) {
                    // alert("Please select row.");
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<b class="fs-4 alert alert-danger">Silahkan pilih data yang akan dihapus</b>'
                    });
                }else {
                    // var check = confirm("Are you sure you want to delete this row?");
                    var check = Swal.fire({
                    title: 'Apakah File Data ingin di <b>Hapus</b> ?',
                    text: "Jika Tidak, Klik Cancel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                    // if (check == true) {
                    if (result['isConfirmed']) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:'ids='+join_selected_values,
                            success:function (data) {
                                console.log(data);
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    // alert(data['success']);
                                    // Swal.fire('success','Delete data success!');
                                    // location.reload();
                                    Swal.fire(
                                    'Success!',
                                    'Delete Data Successfully!',
                                    'success'
                                    )
                                    .then((result) => {
                                        if (result['isConfirmed']) {
                                            let timerInterval
                                        Swal.fire({
                                        title: 'Auto close alert!',
                                        html: 'I will close in <b></b> milliseconds.',
                                        timer: 500,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            const b = Swal.getHtmlContainer().querySelector('b')
                                            timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                        }).then((result) => {
                                            if (
                                            /* Read more about handling dismissals below */
                                            result.dismiss === Swal.DismissReason.timer
                                            ) {
                                            console.log('I was closed by the timer')
                                            location.reload();
                                            }
                                        });
                                        }

                                    });
                                } else if (data['success']){
                                    alert(data['error']);
                                } else{
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function( index, value ){
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                });
            }
        });

            // });
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });
            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();
                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                return false;
            });
        });
    </script>

<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {

        select: true,
        "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "All"]],
        "columnDefs": [
        { "orderable": false, "targets": 0 }
        ],
        "order": [],
        });
    });
</script>

<script>
    $(document).ready(function() {
    var printCounter = 0;
    $('#examplePrint').DataTable( {
        dom: 'Bfrtip',
        stateSave: true,

        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'pdf',
                messageBottom: null
            },
            {
                extend: 'csv',
                messageBottom: null
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;

                    if ( printCounter === 1 ) {
                        // return "<h5>This is the first time you have printed this document.</h5>";
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }
                },
                messageBottom: null
            }
        ]
    } );
} );
</script>

<script>
    $('.jeda-confirm').on('click', function (event) {
    let timerInterval
        Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
    });

</script>

<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
    title: 'Apakah File Data Ingin Di <b>Hapus</b> ?',
    text: "Jika tidak, Click Cancel!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
            }
        })
    });
</script>

<script>
    $('.edit-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
    title: 'Apakah File Data Ingin Di <b>Edit</b> ?',
    text: "Jika tidak, Click Cancel!",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Edit, Now!'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
            }
        })
    });
</script>

<script>
    $('.show-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    Swal.fire({
    title: 'Tampilkan File Data ?',
    text: "Jika tidak, Click Cancel!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Show, Now!'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
            }
        })
    });
</script>

</html>

