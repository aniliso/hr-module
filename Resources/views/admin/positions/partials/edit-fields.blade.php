<div class="box-body">

    {!! Form::i18nInput('name', trans('hr::positions.form.name'), $errors, $lang, $position, ['data-slug'=>'source']) !!}

    {!! Form::i18nInput('slug', trans('hr::positions.form.slug'), $errors, $lang, $position, ['data-slug'=>'target']) !!}

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#job_description_{{ $lang }}" data-toggle="tab">{{ trans('hr::positions.form.job_description') }}</a></li>
            <li><a href="#qualification_{{ $lang }}" data-toggle="tab">{{ trans('hr::positions.form.qualification') }}</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="job_description_{{ $lang }}">
                <?php $old = $position->hasTranslation($lang) ? $position->translate($lang)->job_description : '' ?>
                @editor('job_description', trans('hr::positions.form.job_description'), old("{$lang}.job_description", $old), $lang)
            </div>
            <div class="tab-pane" id="qualification_{{ $lang }}">
                <?php $old = $position->hasTranslation($lang) ? $position->translate($lang)->qualification : '' ?>
                @editor('qualification', trans('hr::positions.form.qualification'), old("{$lang}.qualification", $old), $lang)
            </div>
        </div>
    </div>

</div>