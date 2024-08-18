@extends("admin.layout.master")

@push('browser_title')
    Website settings ::
@endpush

@section('categories-active')
    active current-page
@endsection

@section("page-title")
    Website settings Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Website settings</h2>
                <div class="clearfix"></div>
            </div>


            <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf

                @foreach($settings as $setting)
                    <div class="setting-item">
                        <label for="{{ $setting->key }}" class="setting-label">
                            <strong style="color: #3498db; font-size: 1rem">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</strong>
                        </label>
                        @if ($setting->type === 'text')
                            <div class="form-group">
                                <input class='form-control' type="text" name="settings[{{ $setting->key }}]"
                                       value="{{ $setting->value }}">
                            </div>
                        @elseif ($setting->type === 'number')
                            <div class="form-group">
                                <input class='form-control' type="number" name="settings[{{ $setting->key }}]"
                                       value="{{ $setting->value }}">
                            </div>
                        @elseif ($setting->type === 'textarea')
                            <div class="form-group">
                                <textarea class='form-control' rows="5"
                                          name="settings[{{ $setting->key }}]">{{ $setting->value }}</textarea>
                            </div>
                        @elseif ($setting->type === 'image')
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <input type='file' name='settings[{{ $setting->key }}]' id='image'
                                               accept="image/*"
                                               class='form-control @if ($errors->has("image")) is-invalid @endif'/>
                                    </div>
                                </div>

                                @if ($setting->value)
                                    <div class="col-md-6 text-center">
                                        <img src="{{ images_path($setting->value) }}" alt="Current Image"
                                             style="max-width: 200px; max-height: 200px; margin-bottom: 10px;"
                                             data-toggle="modal" data-target="#imageModal_{{ $setting->key }}">
                                    </div>
                                @endif
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal_{{ $setting->key }}" tabindex="-1" role="dialog"
                                 aria-labelledby="imageModalLabel_{{ $setting->key }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            @if ($setting->value)
                                                <img src="{{ images_path($setting->value) }}" alt="Current Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                    <br>
                @endforeach

                <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                    <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                        <i class="fa fa-fw mr-2 fa-plus"></i> Save Settings
                    </button>
                </div>
            </form>

        </div>
    </div>
    <style>
        .modal-content {
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .modal-dialog {
            max-width: 100%;
            margin: 0;
        }
    </style>
@endsection
