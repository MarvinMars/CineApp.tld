@extends('app')
@section('content')
    <v-container fill-height class="catalog">
        <v-layout>
            <div class="row flex-column">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                @include('film-card')
                @include('film-card')
                @include('film-card')
                @include('film-card')
                @include('film-card')
            </div>
        </v-layout>
    </v-container>
@endsection