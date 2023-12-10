<h3 class="text-light mb-4">Plant Activities</h3>

<div class="activity-container container m-0">
    @foreach ($activities as $activity)
        <div class="tile-container container my-2">
            <div class="row">
                <div class="col-3">
                    @if ($activity->title == 'Plant Added')
                        <img src="{{ asset('img/plants/icons/plant.png') }}" width="100%">
                    @elseif($activity->title == 'Plant Diagnosis')
                        <img src="{{ asset('img/plants/icons/diagnose.png') }}" width="100%">
                    @else
                        <img src="{{ asset('img/plants/icons/checkbox.png') }}" width="100%">
                    @endif
                </div>
                <div class="col">
                    <p class="text-end" style="border-bottom: 1px solid #000">
                        <small>{{ date_format($activity->created_at, "F d Y, h:i a") }}</small>
                    </p>
                    <h6>{{ $activity->title }}</h6>
                </div>
            </div>
        </div>
    @endforeach

    <p class="text-center mt-5"><i>No more activity to show.</i></p>
</div>


<style>
    #body{
        width: 100%;
        position:fixed;
        left:0px;
        bottom:0px;
        height: 65vh
    }
    .activity-container{
        max-height: 80%;
        overflow-y: auto;
    }
</style>