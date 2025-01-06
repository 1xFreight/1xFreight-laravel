@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Forma de contact</h1>
        </div>
        <div class="dash-card">
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                <tr>
                    <th style="width: 150px">Data</th>
                    <th style="width: 150px">Numele</th>
                    <th style="width: 150px">Email</th>
                    <th style="width: 150px">Număr</th>
                    <th style="width: 150px">Compania</th>
                </tr>
                </thead>
                <tbody>
                @if(count($items))
                    @foreach($items as $item)
                        <tr @if($item->viewed == null) class="table-success" @endif>
                            @php $date = \Carbon\Carbon::parse($item->created_at); @endphp
                            <td>{{$date->format('H:i d.m.Y')}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->company}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            let token = $('meta[name="_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '{{route('dashboard.contact.form.viewed')}}',
                data: '_token='+token,
            });
        });
    </script>
@endpush

