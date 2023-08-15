@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid p-2 border border-2 border-white rounded-2 my-5">
        <form class="row g-3" action="{{ route('insert_role') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputAddress" name="name">
                    @if ($errors->has('name'))
                        <p><small class="px-2 text-danger">{{ $errors->first('address') }}</small></p>
                    @endif
                </div>
                <label for="">Color</label>
                <div class="col-12 my-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineDanger"
                            value="bg-gradient-danger" checked>
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-danger"
                            for="inlineDanger">Danger</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineSuccess"
                            value="bg-gradient-success">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-success"
                            for="inlineSuccess">Success</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlinePrimary"
                            value="bg-gradient-primary">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-primary"
                            for="inlinePrimary">Primary</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineWarning"
                            value="bg-gradient-warning">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-warning"
                            for="inlineWarning">Waring</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineSecondary"
                            value="bg-gradient-secondary">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-secondary"
                            for="inlineSecondary">Secondary</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineInfo"
                            value="bg-gradient-info">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-info"
                            for="inlineInfo">Info</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineLight"
                            value="bg-gradient-light">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-light"
                            for="inlineLight">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineDark"
                            value="bg-gradient-dark">
                        <label class="form-check-label p-2 text-white rounded-2 bg-gradient-dark"
                            for="inlineDark">Dark</label>
                    </div>
                </div>

            </div>
            <label for="">Active</label>
            <div class="col-md-6 my-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_disabled" id="inlineRadio2" value="1"
                        checked>
                    <label class="form-check-label" for="inlineRadio2">Enable</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_disabled" id="inlineRadio3" value="2">
                    <label class="form-check-label" for="inlineRadio3">Disable</label>
                </div>
            </div>
    </div>


    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    </form>
    </div>
@endsection
