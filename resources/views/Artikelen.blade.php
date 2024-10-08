@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Medische Feiten</h2>
    <div class="row">
        @php
            // Array of facts, images, and update times
            $facts = [
                [
                    'title' => 'Wist je dat?',
                    'text' => 'Dagelijks 30 minuten matige fysieke activiteit kan helpen bij het verminderen van het risico op hart- en vaatziekten.',
                    'image' => 'healthcare.jpg',
                    'updated' => '1 uur geleden'
                ],
                [
                    'title' => 'Belangrijk Feit',
                    'text' => 'Vroege detectie van ziekten door regelmatige medische controles kan levensreddend zijn.',
                    'image' => 'doctor.jpg',
                    'updated' => '3 uur geleden'
                ],
                [
                    'title' => 'Gezondheidstip',
                    'text' => 'Regelmatige meditatie en ademhalingsoefeningen kunnen stress verminderen en bijdragen aan een betere gezondheid.',
                    'image' => 'meditation.jpg',
                    'updated' => '2 uur geleden'
                ],
                [
                    'title' => 'Wist je dat?',
                    'text' => 'Het drinken van voldoende water kan uw concentratie en energieniveau verbeteren. Het wordt aanbevolen om minstens 2 liter water per dag te drinken.',
                    'image' => 'hydration.jpg',
                    'updated' => '30 minuten geleden'
                ],
                [
                    'title' => 'Gezondheidstip',
                    'text' => 'Een goede nachtrust van 7-8 uur per nacht is essentieel voor het herstellen van uw lichaam en geest.',
                    'image' => 'sleep.jpg',
                    'updated' => '5 uur geleden'
                ],
                [
                    'title' => 'Wist je dat?',
                    'text' => 'Vitamine D is essentieel voor een gezond immuunsysteem en sterke botten. Een paar minuten zonlicht per dag is vaak voldoende.',
                    'image' => 'vitamins.jpg',
                    'updated' => '4 uur geleden'
                ],
                [
                    'title' => 'Beweeg Meer!',
                    'text' => 'Regelmatige lichaamsbeweging kan niet alleen helpen bij gewichtsbeheersing, maar ook bij het verbeteren van de stemming en het verminderen van stress.',
                    'image' => 'exercise.jpg',
                    'updated' => '2 uur geleden'
                ],
                [
                    'title' => 'Hygiëne Feit',
                    'text' => 'Regelmatig handen wassen met zeep kan helpen om de verspreiding van ziekteverwekkers te voorkomen.',
                    'image' => 'handwash.jpg',
                    'updated' => '1 uur geleden'
                ]
            ];
        @endphp

        @foreach ($facts as $fact)
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('image/' . $fact['image']) }}" class="img-fluid rounded-start" alt="{{ $fact['title'] }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $fact['title'] }}</h5>
                            <p class="card-text">{{ $fact['text'] }}</p>
                            <p class="card-text"><small class="text-muted">Laatste update: {{ $fact['updated'] }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
