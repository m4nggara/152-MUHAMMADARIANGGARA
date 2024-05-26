@extends('admin.app')

@section('title')
    - Master Item
@endsection

@section('sidebar-collapse')
    sidebar-main-resized
@endsection

@section('page-header')

<div class="page-header page-header-light page-header-static shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title py-2 my-1">
                Tambah Item
            </h6>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="collapse d-block ms-auto">
            <div class="d-flex justify-content-end py-2">
                <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.items.index') }}';">Batal</button>
                <button type="button" class="btn btn-main ms-3" onclick="$('#form').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content-header')
{{-- <div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Tambah Item
            </h6>
        </div>
    </div>
</div> --}}
@endsection

@section('content')

<div class="content">
    <div class="card">

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning border-0 alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form id="form" action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kategori:</label>
                    <select name="category" class="form-select">
                        <option value="" disabled selected>--Pilih Kategori--</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Judul Item:</label>
                    <input type="text" class="form-control" placeholder="Nama Item" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo Banner: </label>
                    <input type="file" name="photo_banner" class="form-control file-input-caption" accept="image/*" data-allowed-file-extensions='["jpg", "png"]' data-show-upload="false">
                    <span class="form-text">*Hanya file berektensi <code>.jpg</code> dan <code>.png</code></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi: </label>
                    <textarea id="ckeditor" rows="14" cols="14" class="form-control" placeholder="Masukan deskripsi" name="desc">{{ old('desc') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Owner:</label>
                    <input type="text" class="form-control" placeholder="Nama Owner" name="owner" value="{{ old('owner') }}">
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Kontak:</label>
                        <input type="text" class="form-control" placeholder="Masukan nomor kontak" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="Masukan email" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap: </label>
                    <textarea rows="2" cols="2" class="form-control" placeholder="Masukan alamat" name="address">{{ old('address') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link Google Maps: <span class="text-muted">(optional)</span></label>
                    <input type="text" class="form-control" placeholder="Masukan link google" name="maps" value="{{ old('maps') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo Lainnya: <span class="text-muted">(optional)</span></label>
                    <input type="file" name="photo_lain[]" class="form-control file-input" multiple="multiple" accept="image/*" data-allowed-file-extensions='["jpg", "png"]' data-show-upload="false">
                    <span class="form-text">*Hanya file berektensi <code>.jpg</code> dan <code>.png</code></span>
                </div>

                {{-- <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.items.index') }}';">Batal</button>
                    <button type="submit" class="btn btn-main ms-3">Simpan</button>
                </div> --}}
            </form>
        </div>
    
    </div>
</div>

@endsection

@push('script-lib')
    <script src="{{ url('vendor/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ url('vendor/fileinput/plugins/sortable.min.js') }}"></script>
	<script src="{{ url('vendor/ckeditor/ckeditor_classic.js') }}"></script>
@endpush

@push('script')
	<script>
        /* ------------------------------------------------------------------------------
        *
        *  # Bootstrap file uploader
        *
        * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        const FileUpload = function() {


        //
        // Setup module components
        //

        // Bootstrap file upload
        const _componentFileUpload = function() {
            if (!$().fileinput) {
                console.warn('Warning - fileinput.min.js is not loaded.');
                return;
            }

            //
            // Define variables
            //

            // Buttons inside zoom modal
            const previewZoomButtonClasses = {
                rotate: 'btn btn-light btn-icon btn-sm',
                toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
                fullscreen: 'btn btn-light btn-icon btn-sm',
                borderless: 'btn btn-light btn-icon btn-sm',
                close: 'btn btn-light btn-icon btn-sm'
            };

            // Icons inside zoom modal classes
            const previewZoomButtonIcons = {
                prev: document.dir == 'rtl' ? '<i class="ph-arrow-right"></i>' : '<i class="ph-arrow-left"></i>',
                next: document.dir == 'rtl' ? '<i class="ph-arrow-left"></i>' : '<i class="ph-arrow-right"></i>',
                rotate: '<i class="ph-arrow-clockwise"></i>',
                toggleheader: '<i class="ph-arrows-down-up"></i>',
                fullscreen: '<i class="ph-corners-out"></i>',
                borderless: '<i class="ph-frame-corners"></i>',
                close: '<i class="ph-x"></i>'
            };

            // File actions
            const fileActionSettings = {
                zoomClass: '',
                zoomIcon: '<i class="ph-magnifying-glass-plus"></i>',
                dragClass: 'p-2',
                dragIcon: '<i class="ph-dots-six"></i>',
                removeClass: '',
                removeErrorClass: 'text-danger',
                removeIcon: '<i class="ph-trash"></i>',
                indicatorNew: '<i class="ph-file-plus text-success"></i>',
                indicatorSuccess: '<i class="ph-check file-icon-large text-success"></i>',
                indicatorError: '<i class="ph-x text-danger"></i>',
                indicatorLoading: '<i class="ph-spinner spinner text-muted"></i>'
            };


            //
            // Basic
            //

            $('.file-input').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="ph-file-plus me-2"></i>',
                uploadIcon: '<i class="ph-file-arrow-up me-2"></i>',
                removeIcon: '<i class="ph-x fs-base me-2"></i>',
                layoutTemplates: {
                    icon: '<i class="ph-check"></i>'
                },
                browseClass: 'btn btn-secondary',
                uploadClass: 'btn btn-light',
                removeClass: 'btn btn-light',
                initialCaption: "No file selected",
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                fileActionSettings: fileActionSettings
            });


            //
            // Caption
            //

            $('.file-input-caption').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="ph-file-plus me-2"></i>',
                uploadIcon: '<i class="ph-file-arrow-up me-2"></i>',
                removeIcon: '<i class="ph-x fs-base me-2"></i>',
                layoutTemplates: {
                    icon: '<i class="ph-check"></i>'
                },
                browseClass: 'btn btn-secondary',
                uploadClass: 'btn btn-light',
                removeClass: 'btn btn-light',
                initialCaption: "No file selected",
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                fileActionSettings: fileActionSettings,
                showCaption: false,
                dropZoneEnabled: false
            });

        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentFileUpload();
            }
        }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
        FileUpload.init();
        });

    </script>

    <script>
        /* ------------------------------------------------------------------------------
        *
        *  # CKEditor module
        *
        * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        const CKEditorClassic = function() {


        //
        // Setup module components
        //

        // CKEditor
        const _componentCKEditorClassic = function() {
            if (typeof ClassicEditor == 'undefined') {
                console.warn('Warning - ckeditor_classic.js is not loaded.');
                return;
            }

            // Editor with prefilled text
            ClassicEditor.create(document.querySelector('#ckeditor'), {
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                        '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                        '|', 'link', 'blockQuote', 'codeBlock',
                        '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                    ],
                    shouldNotGroupWhenFull: false
                }

            }).catch(error => {
                console.error(error);
            });

        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentCKEditorClassic();
            }
        }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
        CKEditorClassic.init();
        });

    </script>

@endpush