@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-12">
            <!-- Session Message -->
            @if (session("message"))
            <div class="alert alert-danger">
                {{ session("message") }}
            </div>
            @endif

            <!-- Profile Table -->
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Sponsor Level</th>
                            <th scope="col">Avg Vote</th>
                            <th scope="col">Service</th>
                            <th scope="col">Visible</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <!-- Profile ID -->
                        <th scope="row">{{ $profile->id }}</th>

                        <!-- Profile CV (Name) -->
                        <td>
                            {{ $profile->cv }}
                        </td>

                        <!-- Profile Photo -->
                        <td>
                            <img class="img-thumbnail" src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Image" style="max-width: 100px;">
                        </td>

                        <!-- Address -->
                        <td>
                            {{ $profile->address }}
                        </td>

                        <!-- Telephone -->
                        <td>
                            {{ $profile->telephone_number }}
                        </td>

                        <!-- Specializations -->
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($profile->specializations as $specialization)
                                    <li>{{ $specialization->name }}</li>
                                @endforeach
                            </ul>
                        </td>

                        <!-- Sponsor Levels -->
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($profile->sponsors as $sponsor)
                                    <li>{{ $sponsor->level }}</li>
                                @endforeach
                            </ul>
                        </td>

                        <!-- Average Vote Calculation -->
                        <td>
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
                        </td>

                        <!-- Service Description -->
                        <td>
                            {{ Str::limit($profile->service, 50) }}
                        </td>

                        <!-- Visibility -->
                        <td>
                            <span class="badge {{ $profile->visible ? 'bg-success' : 'bg-secondary' }}">
                                {{ $profile->visible ? 'Yes' : 'No' }}
                            </span>
                        </td>

                        <!-- Action Buttons (Edit/Delete) -->
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-secondary btn-sm">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" class="delete-form">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
