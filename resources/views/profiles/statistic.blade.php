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
            // Messages Data
            let messagesData = @json($messagesPerMonth->pluck('count'));
            let messagesLabels = @json($messagesLabels);

            // Linear Chart
            let messagesCtx = document.getElementById('messagesChart').getContext('2d');
            let messagesChart = new Chart(messagesCtx, {
                type: 'line',
                data: {
                    labels: messagesLabels,
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

            // Reviews Data
            let reviewsData = @json($reviewsPerMonth->pluck('count'));
            let reviewsLabels = @json($reviewsLabels);

            // Linear Chart
            let reviewsCtx = document.getElementById('reviewsChart').getContext('2d');
            let reviewsChart = new Chart(reviewsCtx, {
                type: 'line',
                data: {
                    labels: reviewsLabels,
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

            // Votes Data
            let votesData = @json($votesPerMonth->pluck('total_votes'));
            let votesLabels = @json($votesLabels);

            // Band chart
            let votesCtx = document.getElementById('votesChart').getContext('2d');
            let votesChart = new Chart(votesCtx, {
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
