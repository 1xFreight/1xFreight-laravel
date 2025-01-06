@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Accesari website</h1>
        </div>
        <div class="dash-card">
            <canvas id="myChart" class="chartjs-render-monitor"></canvas>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <script>
        let visits = @php echo json_encode($visits) @endphp;
        const xValues = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: visits,
                    borderColor: "#0020DD",
                    fill: false
                }]
            },
            options: {
                legend: {display: false}
            }
        });
    </script>
@endpush

