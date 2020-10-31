@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Income') }}</div>

                <div class="card-body">
                    <income-create></income-create>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
