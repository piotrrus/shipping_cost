@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-12">
            <h2>Choose file with codes and calculate total price</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="import" method="post">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

                            <div class="col-8">
                                <label class="btn btn-light medium" for="file-selector">
                                    <input id="file-selector" name="file" type="file" style="display: none" required>
                                    Choose file
                                </label>
                                <input class="btn btn-warning medium" type="submit"  value="Upload the file">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
