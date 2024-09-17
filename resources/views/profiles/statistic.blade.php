@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistics for {{ auth()->user()->name }}</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Messages Statistics</h2>
            <canvas id="messagesChart" width="400" height="200"></canvas>
        </div>
        <div class="col-md-6">
            <h2>Reviews Statistics</h2>
            <canvas id="reviewsChart" width="400" height="200"></canvas>
        </div>
    </div>

    <div>
        <h2>Votes Statistics</h2>
        <canvas id="votesChart" width="400" height="200"></canvas>
    </div>
</div>
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dati per i messaggi
            var messagesData = @json($messagesPerMonth->pluck('count'));
            var labels = @json($messagesPerMonth->map(function($item) {
                return $item->year . '-' . $item->month;
            }));

            // Creazione del grafico a area per i messaggi
            var messagesCtx = document.getElementById('messagesChart').getContext('2d');
            var messagesChart = new Chart(messagesCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Messages',
                        data: messagesData,
                        backgroundColor: 'rgba(54, 162, 235, 0.4)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month-Year'
                            },
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Messages'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Dati per le recensioni
            var reviewsData = @json($reviewsPerMonth->pluck('count'));

            // Creazione del grafico a area per le recensioni
            var reviewsCtx = document.getElementById('reviewsChart').getContext('2d');
            var reviewsChart = new Chart(reviewsCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Reviews',
                        data: reviewsData,
                        backgroundColor: 'rgba(255, 206, 86, 0.4)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month-Year'
                            },
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Reviews'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Dati per i voti
            var votesData = @json($votesPerMonth->map(function($item) {
                return $item->total_votes; // Assicurati che `total_votes` sia il campo corretto per il totale dei voti
            }));
            var votesLabels = @json($votesPerMonth->map(function($item) {
                return $item->year . '-' . $item->month;
            }));

            // Creazione del grafico a barre per i voti
            var votesCtx = document.getElementById('votesChart').getContext('2d');
            var votesChart = new Chart(votesCtx, {
                type: 'bar',
                data: {
                    labels: votesLabels,
                    datasets: [{
                        label: 'Total Votes',
                        data: votesData,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month-Year'
                            },
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Votes'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
