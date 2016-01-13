@extends('layout')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <h3>Create reminder</h3>

                <form action="{{ action(\App\Http\Controllers\ReminderController::class.'@store') }}" method="post">

                    {!! csrf_field() !!}

                    <div class="form-group" data-check="date">

                        <label class="control-label">Date</label>

                        <input type="text" placeholder="YYYY-MM-DD" class="form-control" name="date"
                               data-inputmask="'mask': '9999-99-99'">

                    </div>

                    <div class="form-group" data-check="interval">

                        <label class="control-label">Remind me</label>

                        <select class="form-control" name="interval">

                            <option value="+1W">A week after</option>
                            <option value="+3D">3 days after</option>
                            <option value="+1D">A day after</option>
                            <option value="">The same day</option>
                            <option value="-1D" selected>A day ahead of time</option>
                            <option value="-3D">3 days ahead of time</option>
                            <option value="-1W">A week ahead of time</option>
                            <option value="-2W">2 weeks ahead of time</option>

                        </select>

                    </div>

                    <div class="form-group" data-check="description">

                        <label class="control-label">Description</label>

                        <textarea rows="3" class="form-control autoexpand" name="description"
                                  placeholder="Event description"></textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">

                            <button type="submit" class="btn btn-primary btn-block">Create reminder <i
                                        class="fa fa-fw fa-bell"></i></button>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-md-8">

                <h1>Upcomming events</h1>

                <ul class="list-group">

                    @foreach($reminders as $reminder)

                        <li class="list-group-item">

                            <button class="btn btn-danger pull-right remove-event" title="Remove event" data-route="{{ action(\App\Http\Controllers\ReminderController::class.'@destroy', $reminder->id) }}">
                                <i class="fa fa-fw fa-remove"></i>
                            </button>

                            <h4>
                                {{ $reminder->starts_on }}
                                <small title="Notification date">{{ $reminder->notify_on }}</small>
                            </h4>

                            <p>{{ $reminder->description }}</p>

                        </li>

                    @endforeach

                    @if($reminders->isEmpty())

                        <li class="alert alert-info">

                            <i class="fa fa-fw fa-info-circle"></i>

                            You don't have any events.

                        </li>

                    @else

                        <div class="text-right">

                            {!! $reminders->render() !!}

                        </div>

                    @endif

                </ul>

            </div>

        </div>

    </div>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Are you shure you want to remove event?</p>

                    <form action="" id="remove-form" method="post">

                        {!! csrf_field() !!}

                        {!! method_field('DELETE') !!}

                        <button class="btn btn-danger" type="submit">Yes</button>

                        <button class="btn btn-default" type="button" data-dismiss="modal">No</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

    <script>
        $(function () {

            $(document).on('click', '.remove-event', function(e) {

                e.preventDefault();

                var $form = $('#remove-form');

                $form.attr('action', $(this).data('route'));

                $form.closest('.modal').modal('show');

            });

        });
    </script>

@stop