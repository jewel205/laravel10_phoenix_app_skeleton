
@if ($message = Session::get('success'))
    <div class="alert alert-outline-success d-flex align-items-center" role="alert">
        <span class="fas fa-check-circle text-success fs-5 me-3"></span>
        <p class="mb-0 flex-1">{{ $message }}</p>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-danger fs-5 me-3"></span>
        <p class="mb-0 flex-1">{{ $message }}</p>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-outline-warning d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-warning fs-5 me-3"></span>
        <p class="mb-0 flex-1">{{ $message }}</p>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-outline-info d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-info fs-5 me-3"></span>
        <p class="mb-0 flex-1">{{ $message }}</p>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('trashed'))
    <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
        <span class="far fa-trash-alt text-danger fs-5 me-3"></span>
        <p class="mb-0 flex-1">{{ $message }}</p>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{--@if ($errors->any())--}}
{{--<div class="alert alert-outline-danger d-flex align-items-center" role="alert" style="font-size: 0.8rem">--}}
{{--    Please fix below errors.--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        <br />{{ $error }}--}}
{{--    @endforeach--}}
{{--    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--</div>--}}
{{--@endif--}}

