@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistics for {{ auth()->user()->name }}</h1>

    <div>
        <h2>Reviews Messages Charts</h2>
        <canvas id="messagesChart" width="400" height="200"></canvas>
    </div>
    <div>
        <h2>Votes Charts</h2>
        <canvas id="votesChart" width="400" height="200"></canvas>
    </div>
</div>
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dati per messaggi e recensioni
            var messagesData = @json($messagesPerMonth->pluck('count'));
            var reviewsData = @json($reviewsPerMonth->pluck('count'));
            var labels = @json($messagesPerMonth->map(function($item) {
                return $item->year . '-' . $item->month;
            }));

            // Creazione del grafico
            var ctx = document.getElementById('messagesChart').getContext('2d');
            var messagesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Messages',
                        data: messagesData,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }, {
                        label: 'Reviews',
                        data: reviewsData,
                        backgroundColor: 'rgba(255, 206, 86, 0.6)'
                    }]
                }
            });
              // Dati per i voti
    var votesData = @json($votesPerMonth->groupBy('vote_id')->map(function($group) {
        return $group->pluck('count');
    }));
    var votesLabels = @json($votesPerMonth->groupBy('vote_id')->keys());

    var votesCtx = document.getElementById('votesChart').getContext('2d');
    var votesChart = new Chart(votesCtx, {
        type: 'bar',
        data: {
            labels: votesLabels,
            datasets: [{
                label: 'Votes',
                data: votesData,
                backgroundColor: 'rgba(75, 192, 192, 0.6)'
            }]
        }
    });
        });
    </script>
@endsection
