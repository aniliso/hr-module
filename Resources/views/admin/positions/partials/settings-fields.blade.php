<div class="box box-primary">
    <div class="box-body">
        {!! Form::normalInput('reference_no', trans('hr::positions.form.reference_no'), $errors, isset($position) ? $position : null) !!}

        {!! Form::normalSelect('personal_number', trans('hr::positions.form.personal_number'), $errors, array_combine(range(1,50,1), range(1,50,1)), isset($position) ? $position : null, ['class'=>'form-control select2']) !!}

        <div class="form-group{{ $errors->has("start_at") ? ' has-error' : '' }}">
            {!! Form::label("start_at", trans('hr::positions.form.start_at').':') !!}
            <div class='input-group date' id='start_at'>
                <input type="text" class="form-control" name="start_at" value="{{ old('start_at', isset($position->start_at) ? $position->start_at->format('d.m.Y H:i') : Carbon::now()->hour(0)->minute(0)->format('d.m.Y H:i')) }}"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            {!! $errors->first("start_at", '<span class="help-block">:message</span>') !!}
        </div>

        <div class="form-group{{ $errors->has("end_at") ? ' has-error' : '' }}">
            {!! Form::label("end_at", trans('hr::positions.form.end_at').':') !!}
            <div class='input-group date' id='end_at'>
                <input type="text" class="form-control" name="end_at" value="{{ old('end_at', isset($position->end_at) ? $position->end_at->format('d.m.Y H:i') : Carbon::tomorrow()->format('d.m.Y H:i')) }}"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            {!! $errors->first("end_at", '<span class="help-block">:message</span>') !!}
        </div>

        {!! Form::normalInput('ordering', trans('hr::positions.form.ordering'), $errors, isset($position) ? $position : null) !!}

        {!! Form::normalCheckbox('status', trans('hr::positions.form.status'), $errors, isset($position) ? $position : null) !!}

    </div>
</div>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">{{ trans('hr::positions.title.personal_criteria') }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group{{ $errors->has("criteria.experience") ? ' has-error' : '' }}">
            {!! Form::label("criteria.experience", trans('hr::positions.form.criteria.experience')) !!}
            {!! Form::select('criteria[experience]', HrCriteria::experience()->lists(), isset($position->criteria->experience) ? $position->criteria->experience : null, ['class'=>'form-control select2']) !!}
            {!! $errors->first("criteria.experience", '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group{{ $errors->has("criteria.military") ? ' has-error' : '' }}">
            {!! Form::label("criteria.military", trans('hr::positions.form.criteria.military')) !!}
            {!! Form::select('criteria[military][]', HrCriteria::military()->lists(), isset($position->criteria->military) ? $position->criteria->military : null, ['class'=>'form-control select2', 'multiple'=>'multiple']) !!}
            {!! $errors->first("criteria.military", '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group{{ $errors->has("criteria.education") ? ' has-error' : '' }}">
            {!! Form::label("criteria.education", trans('hr::positions.form.criteria.education')) !!}
            {!! Form::select('criteria[education][]', HrCriteria::education()->lists(), isset($position->criteria->education) ? $position->criteria->education : null, ['class'=>'form-control select2', 'multiple'=>'multiple']) !!}
            {!! $errors->first("criteria.education", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">{{ trans('hr::positions.title.position_information') }}</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has("position.level") ? ' has-error' : '' }}">
                    {!! Form::label("position.level", trans('hr::positions.form.position.level')) !!}
                    {!! Form::select('position[level]', HrInformation::level()->lists(), isset($position->position->level) ? $position->position->level : null, ['class'=>'form-control select2']) !!}
                    {!! $errors->first("position.level", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has("position.worktime") ? ' has-error' : '' }}">
                    {!! Form::label("position.worktime", trans('hr::positions.form.position.worktime')) !!}
                    {!! Form::select('position[worktime]', HrInformation::worktime()->lists(), isset($position->position->worktime) ? $position->position->worktime : null, ['class'=>'form-control select2']) !!}
                    {!! $errors->first("position.worktime", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has("position.department") ? ' has-error' : '' }}">
            {!! Form::label("position.department", trans('hr::positions.form.position.department')) !!}
            {!! Form::select('position[department]', HrInformation::department()->lists(), isset($position->position->department) ? $position->position->department : null, ['class'=>'form-control select2']) !!}
            {!! $errors->first("position.department", '<span class="help-block">:message</span>') !!}
        </div>

        <div class="form-group{{ $errors->has("position.city") ? ' has-error' : '' }}">
            {!! Form::label("position.city", trans('hr::positions.form.position.city')) !!}
            {!! Form::select('position[city][]', HrInformation::city()->lists(), isset($position->position->city) ? $position->position->city : null, ['class'=>'form-control select2', 'multiple'=>'multiple']) !!}
            {!! $errors->first("position.city", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>

@push('js-stack')
<script>
    jQuery(document).ready(function () {
        $('#start_at').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'DD.MM.YYYY HH:mm'
        });
        $('#end_at').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'DD.MM.YYYY HH:mm'
        });
    });
</script>
@endpush