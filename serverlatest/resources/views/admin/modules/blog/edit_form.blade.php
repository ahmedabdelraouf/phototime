<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="title_{{$form_lang}}" class="form-label @if ($errors->has("title_$form_lang")) is-invalid @endif">Service Title</label>
            <input type='text' name='title_{{$form_lang}}' id='title_{{$form_lang}}' value='{{old("title_$form_lang", $service->{'title_'.$form_lang})}}' placeholder="Service Title ({{strtoupper($form_lang)}})"
                   class='form-control @if ($errors->has("title_$form_lang")) is-invalid @endif' required
                   @if ($errors->has("title_$form_lang"))
                       aria-describedby="title_{{$form_lang}}-error"
                   aria-invalid="true"
                @endif
            />
            @if ($errors->has("title_$form_lang"))
                <div id="title_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("title_$form_lang") }}</div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="slug_{{$form_lang}}" class="form-label @if ($errors->has("slug_$form_lang")) is-invalid @endif">Service slug</label>
            <input type='text' name='slug_{{$form_lang}}' id='slug_{{$form_lang}}' value='{{old("slug_$form_lang", $service->{'slugData'.ucfirst($form_lang)}->slug)}}' placeholder="Service unique slug"
                   class='form-control @if ($errors->has("slug_$form_lang")) is-invalid @endif'
                   @if ($errors->has("slug_$form_lang"))
                       aria-describedby="slug_{{$form_lang}}-error"
                   aria-invalid="true"
                @endif
            />
            @if ($errors->has("slug_$form_lang"))
                <div id="slug_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("slug_$form_lang") }}</div>
            @endif
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="short_desc_{{$form_lang}}" class="form-label @if ($errors->has("short_desc_$form_lang")) is-invalid @endif">Short description ({{strtoupper($form_lang)}})</label>
            <textarea name="short_desc_{{$form_lang}}" id="short_desc_{{$form_lang}}"
                      class='form-control @if ($errors->has("short_desc_$form_lang")) is-invalid @endif'
                      rows="3" required
                      @if ($errors->has("short_desc_$form_lang"))
                          aria-describedby="short_desc_{{$form_lang}}-error"
                      aria-invalid="true"
                @endif
            >{{old("short_desc_$form_lang", $service->{'short_desc_'.$form_lang})}}</textarea>
            @if ($errors->has("short_desc_$form_lang"))
                <div id="short_desc_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("short_desc_$form_lang") }}</div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <label for="meta_keywords_{{$form_lang}}" class="form-label @if ($errors->has("meta_keywords_$form_lang")) is-invalid @endif">Meta Keywords ({{strtoupper($form_lang)}})</label>
        <textarea name="meta_keywords_{{$form_lang}}" id="meta_keywords_{{$form_lang}}"
                  class='form-control tags @if ($errors->has("meta_keywords_$form_lang")) is-invalid @endif'
                  rows="3" required
                  @if ($errors->has("meta_keywords_$form_lang"))
                      aria-describedby="meta_keywords_{{$form_lang}}-error"
                  aria-invalid="true"
                @endif
            >{{old("meta_keywords_$form_lang", $service->{'meta_keywords_'.$form_lang})}}</textarea>
        @if ($errors->has("meta_keywords_$form_lang"))
            <div id="meta_keywords_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_keywords_$form_lang") }}</div>
        @endif
    </div>
</div>
</div>

<div class="row" style="margin-top: 2%">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="meta_title_{{$form_lang}}" class="form-label @if ($errors->has("meta_title_$form_lang")) is-invalid @endif">Meta Title for the service</label>
            <input type='text' name='meta_title_{{$form_lang}}' id='meta_title_{{$form_lang}}' value='{{old("meta_title_$form_lang", $service->{'meta_title_'.$form_lang})}}' placeholder="Service Meta Title ({{strtoupper($form_lang)}})"
                   class='form-control @if ($errors->has("meta_title_$form_lang")) is-invalid @endif' required
                   @if ($errors->has("meta_title_$form_lang"))
                       aria-describedby="meta_title_{{$form_lang}}-error"
                   aria-invalid="true"
                @endif
            />
            @if ($errors->has("meta_title_$form_lang"))
                <div id="meta_title_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_title_$form_lang") }}</div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="meta_description_{{$form_lang}}" class="form-label @if ($errors->has("meta_description_$form_lang")) is-invalid @endif">Meta description ({{strtoupper($form_lang)}})</label>
            <textarea name="meta_description_{{$form_lang}}" id="meta_description_{{$form_lang}}"
                      class='form-control @if ($errors->has("meta_description_$form_lang")) is-invalid @endif'
                      rows="2" required
                      @if ($errors->has("meta_description_$form_lang"))
                          aria-describedby="meta_description_{{$form_lang}}-error"
                      aria-invalid="true"
                @endif
            >{{old("meta_description_$form_lang", $service->{'meta_description_'.$form_lang})}}</textarea>
            @if ($errors->has("meta_description_$form_lang"))
                <div id="meta_description_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_description_$form_lang") }}</div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12">
        <div class="form-group">
            <label for="content_{{$form_lang}}" class="form-label @if ($errors->has("content_$form_lang")) is-invalid @endif">Service full description ({{strtoupper($form_lang)}})</label>
            <textarea name="content_{{$form_lang}}" id="content_{{$form_lang}}"
                      class="form-control editor @if ($errors->has("content_$form_lang")) is-invalid @endif"
                      @if ($errors->has("content_$form_lang"))
                          aria-describedby="content_{{$form_lang}}-error"
                      aria-invalid="true"
                @endif
            >{{old("content_$form_lang", $service->{'content_'.$form_lang})}}</textarea>
            @if ($errors->has("content_$form_lang"))
                <div id="content_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("content_$form_lang") }}</div>
            @endif
        </div>
    </div>
</div>
