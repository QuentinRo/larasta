<!--
/**
 * Created by PhpStorm.
 * User: Davide
 * Date: 14/01/2018
 * Time: 18:56

 * !!!! IMPORTANT !!!!
 * ONLY FOR TEACHER ROLE
 * If you want have all contacts informations for teacher -> do nothing
 * If you want have nothing information for teacher so go to the STEP by STEP procedure
 * STEP by STEP: folow the step procedure starting in the Step 1
 * After finished go to PeopleController and follow the same procedure
 */
-->

@extends ('layout')

@section ('content')
    <link rel="stylesheet" href="/css/people.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!--------------------->
    <!-- Section Header --->
    <!--------------------->

    <div class="body simple-box" id="view">
        <!-- FirstName and LastName -->

        <div id="people_Name" class="row">
            <span>{{ $person->firstname }} {{ $person->lastname }}</span>
        @if (($user->getLevel() >= 2))  <!-- View button only for teacher -->
            <span>
                    <button id="btn-add-section" name="btn-add-section" data-toggle="modal" data-target="#peopleModal" class="btn btn-success people-btn_desactive"/>Modifier
                </span>
            @endif
        </div>

        <div class="margin10 row"></div>

        <div class="row bar30">
            <h5>Entreprise / Etablissement</h5>
        </div>

        <br>

        <div class="margin10 row">
            (à compléter)
        </div>

        <br>

        <div class="row bar30">
            <h5>Contact</h5>
        </div>

        <div class="margin10 row"></div>

        <div id="people_Info" class="row">

            @if (isset($adress))
                <div>
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <span>{{ $adress->address1 }}</span>
                    @if ($adress->address2 != null)
                        <span>{{ $adress->address2 }} - </span>
                    @endif
                    <span>{{ $adress->postalCode }} - </span>
                    <span>{{ $adress->city }}</span>
                    <!-- If google maps lat and long is not available do not display link -->
                    @if( ($adress->lat != null) && ($adress->lng != null))
                        <a href="http://maps.google.com/?q={{$adress->lat}},{{$adress->lng}}">[Google Maps]</a>
                    @endif
                </div>
            @endif

        <!-- Contacts -->

            @foreach($contacts as $contact)      <!-- View all contacts for one people -->
            <div>
                <!-- Mail contact type -->
                @if($contact->contactTypeDescription == 'Email')
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                @endif
            <!-- Fixe phone contact type -->
                @if($contact->contactTypeDescription == 'Tel Fixe')
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                @endif
            <!-- Mobile phone contact type -->
                @if($contact->contactTypeDescription == 'Tel Portable')
                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                @endif
                <span>{{ $contact->value }}</span>
            </div>
            @endforeach

        </div>

        <br>

        <div class="row bar30">
            <h5>Stages</h5>
        </div>

        <br>

        <div class="margin10 row">
            (à compléter)
        </div>

    </div>
@stop
