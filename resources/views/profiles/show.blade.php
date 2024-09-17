@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Session Message -->
        @if (session("message"))
        <div class="alert alert-danger">
            {{ session("message") }}
        </div>
        @endif

        <div class="col-md-8">
            <!-- Profile Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Profile Details: {{ $profile->user->name }}, {{ $profile->user->surname }}</h2>
                </div>


                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Image">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>ID:</strong> {{ $profile->id }}</li>
                                <li class="list-group-item"><strong>Email:</strong> {{ $profile->user->email }}</li>
                                <li class="list-group-item"><strong>Telephone:</strong> {{ $profile->telephone_number }}</li>
                                <li class="list-group-item"><strong>Address:</strong> {{ $profile->address }}</li>
                                <li class="list-group-item"><strong>Visible:</strong>
                                    <span class="badge {{ $profile->visible ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $profile->visible ? 'Yes' : 'No' }}
                                    </span>
                                </li>
                                @if ($profile->is_premium)
                                <li class="list-group-item"><strong>Premium</strong>
                                </li>
                                @endif
                                <li class="list-group-item"><strong>Average vote:</strong>
                                    @php
                                        $voteArray = [];
                                        foreach ($profile->votes as $vote) {
                                            $voteArray[] = $vote->pivot->vote_id;
                                        }
                                        $totalVotes = array_sum($voteArray);
                                        $numberVote = count($voteArray);
                                        $mediaFinale = $numberVote > 0 ? number_format($totalVotes / $numberVote, 2) : 'N/A';
                                    @endphp
                                    <span class="badge bg-info">{{ $mediaFinale }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- CV (PDF Display) -->
                    <div class="mb-4">
                        <h5>Curriculum Vitae</h5>
                        <embed src="{{ asset('storage/' . $profile->cv) }}" width="100%" height="500px" type="application/pdf">
                    </div>

                    <!-- Services -->
                    <div class="mb-4">
                        <h5>Services</h5>
                        <p>{{ $profile->service }}</p>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Specializations</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($profile->specializations as $specialization)
                        <li class="list-group-item">
                                    Field: {{ $specialization->field }} -
                                    Specialization: {{ $specialization->name }}
                                </li>
                            @endforeach
                        </ul>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Reviews</h4>
                </div>
                <div class="card-body">
                    @if($profile->reviews->isEmpty())
                        <p>No reviews available.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($profile->reviews as $review)
                                <li class="list-group-item">
                                    <strong>Review #{{ $review->id }}:</strong> {{ $review->review_text }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Messages Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Messages</h4>
                </div>
                <div class="card-body">
                    @if($profile->messages->isEmpty())
                        <p>No messages available.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($profile->messages as $message)
                                <li class="list-group-item">
                                    <strong>Message by {{ $message->email }}:</strong> {{ $message->message_text }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mb-4 d-flex justify-content-around">
                <a class="btn btn-secondary" href="{{ route("admin.profiles.edit", $profile) }}">Modifica profilo</a>
                {{-- <a class="btn btn-primary" href="{{ route('reviews.create', $profile->id) }}">Invia recensione</a>
                <a class="btn btn-primary" href="{{ route('messages.create', $profile->id) }}">Invia un messaggio</a> --}}
            </div>

            {{-- <!-- Voting System -->
            <div class="card">
                <div class="card-header">
                    <h4>Vote for this Profile</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.vote', $profile->id) }}">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select" aria-label="Seleziona un voto" name="vote">
                                @foreach($votes as $vote)
                                    <option value="{{ $vote->id }}">{{ $vote->name }} ({{ $vote->vote }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Invia voto</button>
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
</div>
@endsection
