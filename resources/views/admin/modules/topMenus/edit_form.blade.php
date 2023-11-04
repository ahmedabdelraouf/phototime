<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="title_{{$form_lang}}" class="form-label @if ($errors->has("title_$form_lang")) is-invalid @endif">Menu Title</label>
            <input type='text' name='title_{{$form_lang}}' id='title_{{$form_lang}}' value='{{old("title_$form_lang", $menu->{"title_$form_lang"})}}' placeholder="Menu Title ({{strtoupper($form_lang)}})"
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
            <label for="a_title_{{$form_lang}}" class="form-label @if ($errors->has("a_title_$form_lang")) is-invalid @endif">Menu URL Tag Title</label>
            <input type='text' name='a_title_{{$form_lang}}' id='a_title_{{$form_lang}}' value='{{old("a_title_$form_lang", $menu->{"a_title_$form_lang"})}}' placeholder="Menu URL Tag Title ({{strtoupper($form_lang)}})"
                   class='form-control @if ($errors->has("a_title_$form_lang")) is-invalid @endif' required
                   @if ($errors->has("a_title_$form_lang"))
                       aria-describedby="a_title_{{$form_lang}}-error"
                   aria-invalid="true"
                @endif
            />
            @if ($errors->has("a_title_$form_lang"))
                <div id="a_title_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("a_title_$form_lang") }}</div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-9 col-lg-9">
        <div class="form-group">
            <label for="url_{{$form_lang}}" class="form-label @if ($errors->has("url_$form_lang")) is-invalid @endif">Menu Link</label>
            <input type='text' name='url_{{$form_lang}}' id='url_{{$form_lang}}' value='{{old("url_$form_lang", $menu->{"url_$form_lang"})}}' placeholder="Menu Link ({{strtoupper($form_lang)}})"
                   class='form-control @if ($errors->has("url_$form_lang")) is-invalid @endif' required
                   @if ($errors->has("url_$form_lang"))
                       aria-describedby="url_{{$form_lang}}-error"
                   aria-invalid="true"
                @endif
            />
            @if ($errors->has("url_$form_lang"))
                <div id="url_{{$form_lang}}-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("url_$form_lang") }}</div>
            @endif
        </div>
    </div>
</div>
