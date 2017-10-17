@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'hr.application.form'])
    İnsan Kaynakları Formu
    @endcomponent

    <section class="section-padding md-p-top-50 section-page" id="app">
        <div class="container">
            {!! Form::open(['v-on:submit'=>'submitForm', 'files'=>true, 'method'=>'post']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.personal') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.gender') }}</label>
                                            <select class="browser-default form-control" name="gender" class="select"
                                                    v-model="application.gender">
                                                @foreach(HrApplication::gender()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors.first_name }">
                                            <label class="browser-default">{{ trans('hr::applications.form.first_name') }}</label>
                                            <input class="browser-default form-control" id="first_name" type="text"
                                                   placeholder="{{ trans('hr::applications.form.first_name') }}"
                                                   v-model="application.first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors.last_name }">
                                            <label>{{ trans('hr::applications.form.last_name') }}</label>
                                            <input class="browser-default form-control" id="last_name" type="text"
                                                   placeholder="{{ trans('hr::applications.form.last_name') }}"
                                                   v-model="application.last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.nationality') }}</label>
                                            <select class="browser-default form-control select" name="nationality"
                                                    v-model="application.nationality">
                                                @foreach(HrApplication::nationality()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.marital') }}</label>
                                            <select class="browser-default form-control" name="marital"
                                                    v-model="application.marital">
                                                @foreach(HrApplication::marital()->lists() as $key => $marital)
                                                    <option value="{{ $key }}">{{ $marital }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.identity') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['identity.birthdate'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.birthdate') }}</label>
                                            <date-picker v-model="application.identity.birthdate" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.identity.birthdate') }}"></date-picker>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['identity.birthplace'] }">
                                            <label>{{ trans('hr::applications.form.identity.birthplace') }}</label>
                                            <select class="browser-default form-control select"
                                                    v-model="application.identity.birthplace">
                                                @foreach(HrInformation::city()->lists() as $key => $city)
                                                    <option value="{{ $key }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.identity.bloodgroup') }}</label>
                                            <select class="browser-default form-control select"
                                                    v-model="application.identity.bloodgroup">
                                                @foreach(HrApplication::bloodgroup()->lists() as $key => $blood)
                                                    <option value="{{ $key }}">{{ $blood }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['identity.no'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.no') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.no') }}"
                                                   v-model="application.identity.no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.sgk') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.sgk') }}"
                                                   v-model="application.identity.sgk">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.tax') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.tax') }}"
                                                   v-model="application.identity.tax">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.contact') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.address1'] }">
                                            <label>{{ trans('hr::applications.form.contacts.address1') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.address1') }}"
                                                   v-model="application.contact.address1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.address2'] }">
                                            <label>{{ trans('hr::applications.form.contacts.address2') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.address2') }}"
                                                   v-model="application.contact.address2">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.county'] }">
                                            <label>{{ trans('hr::applications.form.contacts.county') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.county') }}"
                                                   v-model="application.contact.county">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.city'] }">
                                            <label>{{ trans('hr::applications.form.contacts.city') }}</label>
                                            <select class="browser-default form-control select"
                                                    v-model="application.contact.city">
                                                @foreach(HrInformation::city()->lists() as $key => $city)
                                                    <option value="{{ $key }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.phone'] }">
                                            <label>{{ trans('hr::applications.form.contacts.phone') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.phone') }}"
                                                   v-model="application.contact.phone">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.gsm'] }">
                                            <label>{{ trans('hr::applications.form.contacts.gsm') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.gsm') }}"
                                                   v-model="application.contact.gsm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.postcode'] }">
                                            <label>{{ trans('hr::applications.form.contacts.postcode') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.postcode') }}"
                                                   v-model="application.contact.postcode">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.email'] }">
                                            <label>{{ trans('hr::applications.form.contacts.email') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.email') }}"
                                                   v-model="application.contact.email">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.driver') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.type'] }">
                                            <label>{{ trans('hr::applications.form.driver.type') }}</label>
                                            <select class="browser-default form-control select"
                                                    v-model="application.driving.type">
                                                @foreach(HrApplication::driving()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.no'] }">
                                            <label>{{ trans('hr::applications.form.driver.no') }}</label>
                                            <input class="browser-default form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.driver.no') }}"
                                                   v-model="application.driving.no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.issue_at'] }">
                                            <label>{{ trans('hr::applications.form.driver.issue_at') }}</label>
                                            <date-picker v-model="application.driving.issue_at" input-class="browser-default" :config="config.year" placeholder="{{ trans('hr::applications.form.driver.issue_at') }}"></date-picker>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.health') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.health_desc') }}</label>

                                            <input type="radio" id="health.no" value="0" v-model="select.health" />
                                            <label for="health.no">{{ trans('hr::applications.select.no') }}</label>

                                            <input type="radio" id="health.yes" value="1" v-model="select.health" />
                                            <label for="health.yes">{{ trans('hr::applications.select.yes') }}</label>

                                            <div v-if="select.health == 1">
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.health') }}"
                                                       v-model="application.health">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>{{ trans('hr::applications.legend.criminal') }}</legend>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.criminal_desc') }}</label>

                                            <input type="radio" id="criminal.no" value="0" v-model="select.criminal" />
                                            <label for="criminal.no">{{ trans('hr::applications.select.no') }}</label>

                                            <input type="radio" id="criminal.yes" value="1" v-model="select.criminal" />
                                            <label for="criminal.yes">{{ trans('hr::applications.select.yes') }}</label>

                                            <div v-if="select.criminal == 1">
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.criminal') }}"
                                                       v-model="application.criminal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.skills') }}</h2></legend>
                                <div v-for="(skill, key) in application.skills">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.skills.program') }}</label>
                                                <select class="form-control" class="select" v-model="skill.program">
                                                    @foreach(HrApplication::skill()->lists() as $key => $skill)
                                                        <option value="{{ $key }}" {{ $loop->first ? 'selected' : null }}>{{ $skill }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="skill.program == 7">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['skills.'+key+'.other'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.skills.other') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.select.skills.other') }}"
                                                       v-model="skill.other">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label v-if="key == 0">{{ trans('hr::applications.select.skills.level') }}</label>
                                            <div class="form-group" :class="{ 'has-error' : formErrors['skills.'+key+'.level'] }">
                                                <input type="radio" :id="'level.better'+key" value="4" v-model="skill.level"/>
                                                <label :for="'level.better'+key">{{ trans('hr::applications.select.skills.radio.better') }}</label>

                                                <input type="radio" :id="'level.good'+key" value="3" v-model="skill.level"/>
                                                <label :for="'level.good'+key">{{ trans('hr::applications.select.skills.radio.good') }}</label>

                                                <input type="radio" :id="'level.middle'+key" value="2" v-model="skill.level"/>
                                                <label :for="'level.middle'+key">{{ trans('hr::applications.select.skills.radio.middle') }}</label>

                                                <input type="radio" :id="'level.little'+key" value="1" v-model="skill.level"/>
                                                <label :for="'level.little'+key">{{ trans('hr::applications.select.skills.radio.little') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'skills')"
                                                   v-if="application.skills.length < {{ count(HrApplication::skill()->lists()) }}"><i
                                                            class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'skills')" v-if="key > 0"><i
                                                            class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.language') }}</h2></legend>
                                <div v-for="(lang, key) in application.language" v-if="key < {{ count(HrApplication::language()->lists()) }}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.language.lang') }}</label>
                                                <select class="form-control" class="select" v-model="lang.lang">
                                                    @foreach(HrApplication::language()->lists() as $key => $language)
                                                        <option value="{{ $key }}" {{ $loop->first ? 'selected' : null }}>{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.speak') }}</label>
                                                    <div class="form-group">
                                                        <input type="radio" :id="'speak.better'+key" value="3"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'speak.middle'+key" value="2"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'speak.little'+key" value="1"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.read') }}</label>
                                                    <div class="form-group">
                                                        <input type="radio" :id="'read.better'+key" value="3"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'read.middle'+key" value="2"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'read.little'+key" value="1"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.write') }}</label>
                                                    <div class="group">
                                                        <input type="radio" :id="'write.better'+key" value="3"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'write.middle'+key" value="2"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'write.little'+key" value="1"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'language')"
                                                   v-if="application.language.length < {{ count(HrApplication::language()->lists()) }}"><i
                                                            class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'language')" v-if="key > 0"><i
                                                            class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.education') }}</h2></legend>
                                <div v-for="(educate, key) in application.education">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.start_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.educate.start_at') }}</label>
                                                        <date-picker v-model="educate.start_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.educate.start_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.end_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.educate.end_at') }}</label>
                                                        <date-picker v-model="educate.end_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.educate.end_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.name'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.name') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.educate.name') }}"
                                                               v-model="educate.name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.branch'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.branch') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.educate.branch') }}"
                                                               v-model="educate.branch">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.status'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.status') }}</label>
                                                        <select class="browser-default form-control" class="select"
                                                                v-model="educate.status">
                                                            @foreach(HrApplication::educationStatus()->lists() as $key => $status)
                                                                <option value="{{ $key }}">{{ $status }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label v-if="key == 0">&nbsp;</label>
                                                    <div class="form-group">
                                                        <a class="btn-floating waves-effect waves-light red"
                                                           v-on:click="addRow(key, 'education')"
                                                           v-if="application.education.length < {{ count(HrCriteria::education()->lists()) }}"><i
                                                                    class="material-icons">add</i></a>
                                                        <a class="btn-floating waves-effect waves-light red"
                                                           v-on:click="removeRow(key, 'education')" v-if="key > 0"><i
                                                                    class="material-icons">remove</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.course') }}</h2></legend>
                                <div v-for="(cours, key) in application.course">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.courses.name') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.courses.name') }}"
                                                       v-model="cours.name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.company'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.courses.company') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.courses.company') }}"
                                                       v-model="cours.company">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.issue_at'] }">
                                                <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.courses.date') }}</label>
                                                <date-picker v-model="cours.issue_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.courses.date') }}"></date-picker>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'course')" v-if="application.course.length < 6">
                                                    <i class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'course')" v-if="key > 0">
                                                    <i class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.experience') }}</h2></legend>
                                <div v-for="(exper, key) in application.experience">
                                    <div class="row m-bot-20">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['exper.start_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.experiences.start_at') }}</label>
                                                        <date-picker v-model="exper.start_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.experiences.start_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['exper.end_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.experiences.end_at') }}</label>
                                                        <date-picker v-model="exper.end_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.experiences.end_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.company'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.company') }}</label>
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.company') }}"
                                                                       v-model="exper.company">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.department'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.department') }}</label>
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.department') }}"
                                                                       v-model="exper.department">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.position'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.position') }}</label>
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.position') }}"
                                                                       v-model="exper.position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['exper.reason'] }">
                                                        <label v-if="key < 0">{{ trans('hr::applications.form.experiences.reason') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.experiences.reason') }}"
                                                               v-model="exper.reason">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label v-if="key < 0">{{ trans('hr::applications.form.experiences.title_desc') }}</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.full_name'] }">
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.full_name') }}"
                                                                       v-model="exper.full_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.title'] }">
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.title') }}"
                                                                       v-model="exper.title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['exper.phone'] }">
                                                                <input class="browser-default form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.phone') }}"
                                                                       v-model="exper.phone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'experience')" v-if="application.experience.length < 5">
                                                    <i class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'experience')" v-if="key > 0">
                                                    <i class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.reference') }}</h2></legend>
                                <div v-for="(ref, key) in application.reference">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.full_name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.references.full_name') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.references.full_name') }}"
                                                       v-model="ref.full_name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.work_place'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.references.work_place') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.references.work_place') }}"
                                                       v-model="ref.work_place">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['ref.position'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.position') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.position') }}"
                                                               v-model="ref.position">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['ref.proximity'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.proximity') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.proximity') }}"
                                                               v-model="ref.proximity">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.phone'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.phone') }}</label>
                                                        <input class="browser-default form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.phone') }}"
                                                               v-model="ref.phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'reference')" v-if="application.reference.length < 5">
                                                    <i class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'reference')" v-if="key > 0">
                                                    <i class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><small>{{ trans('hr::applications.form.references.description') }}</small></p>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.request') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.price'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.requests.price') }}</label>
                                            <input class="browser-default form-control" id="first_name" type="text"
                                                   placeholder="{{ trans('hr::applications.form.requests.price') }}"
                                                   v-model="application.request.price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.work_time'] }">
                                            <label>{{ trans('hr::applications.form.requests.work_time') }}</label>
                                            <select class="browser-default form-control" class="select"
                                                    v-model="application.request.work_time">
                                                @foreach(HrInformation::worktime()->lists() as $key => $status)
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.department'] }">
                                            <label>{{ trans('hr::positions.form.position.department') }}</label>
                                            <select class="browser-default form-control" class="select"
                                                    v-model="application.request.department">
                                                @foreach(HrInformation::department()->lists() as $key => $status)
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.travel'] }">
                                            <label>{{ trans('hr::applications.form.requests.travel') }}</label>
                                            <select class="browser-default form-control" class="select"
                                                    v-model="application.request.travel">
                                                <option value="">{{ trans('hr::applications.select.select') }}</option>
                                                <option value="1">{{ trans('hr::applications.select.no') }}</option>
                                                <option value="2">{{ trans('hr::applications.select.yes') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.job_rotation'] }">
                                            <label>{{ trans('hr::applications.form.requests.job_rotation') }}</label>
                                            <select class="browser-default form-control" class="select"
                                                    v-model="application.request.job_rotation">
                                                <option value="">{{ trans('hr::applications.select.select') }}</option>
                                                <option value="1">{{ trans('hr::applications.select.no') }}</option>
                                                <option value="2">{{ trans('hr::applications.select.yes') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.emergency') }}</h2></legend>
                                <div v-for="(emr, key) in application.emergency">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['emergency.'+key+'.full_name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.emergencies.full_name') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.emergencies.full_name') }}"
                                                       v-model="emr.full_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['emergency.'+key+'.phone'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.emergencies.phone') }}</label>
                                                <input class="browser-default form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.emergencies.phone') }}"
                                                       v-model="emr.phone">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="addRow(key, 'emergency')" v-if="application.emergency.length < 5">
                                                    <i class="material-icons">add</i></a>
                                                <a class="btn-floating waves-effect waves-light red"
                                                   v-on:click="removeRow(key, 'emergency')" v-if="key > 0">
                                                    <i class="material-icons">remove</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12 m-top-bot-20">
                            <p class="font-12">{{ trans('hr::applications.messages.notice') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 m-top-bot-20">
                            {!! Captcha::image('captcha_hr', ['v-model'=>'application.captcha_hr']) !!}
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12 m-top-20">
                            {!! BSForm::submit(trans('hr::applications.buttons.send'), ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('js_inline')

<script src="{!! Module::asset('hr:js/underscore-min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/loadingoverlay.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/loadingoverlay_progress.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/pnotify.js') !!}"></script>
<link rel="stylesheet" href="{!! Module::asset('hr:css/pnotify.css') !!}"/>
<script src="{!! Module::asset('hr:js/moment.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/tr.js') !!}"></script>
<script src="{!! Module::asset('hr:js/bootstrap-datetimepicker.min.js') !!}"></script>
<link rel="stylesheet" href="{!! Module::asset('hr:css/bootstrap-datetimepicker.min.css') !!}" />
<script src="{!! Module::asset('hr:js/vue.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/axios.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/vue-bootstrap-datetimepicker.min.js') !!}"></script>

<script>
    //axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="token"]').getAttribute('content');
    axios.defaults.headers.common['Cache-Control'] = 'no-cache';
    Vue.component('date-picker', VueBootstrapDatetimePicker.default);
    var app = new Vue({
        el: '#app',
        data: {
            config: {
                date: {
                    format: 'DD.MM.YYYY'
                },
                year: {
                    format: 'YYYY'
                }
            },
            select: {
                health: null,
                criminal: null
            },
            application: {},
            newApplication: {},
            formErrors: {
                identity: {}
            }
        },
        created:function() {
          this.addArray();
        },
        methods: {
            addRow: function (index, id) {
                if(id == 'language') {
                    this.application.language.splice(index + 1, 0, {});
                } else if(id == 'skills') {
                    this.application.skills.splice(index + 1, 0, {});
                } else if(id == 'education') {
                    this.application.education.splice(index + 1, 0, {});
                } else if(id == 'course') {
                    this.application.course.splice(index + 1, 0, {});
                } else if(id == 'experience') {
                    this.application.experience.splice(index + 1, 0, {});
                } else if(id == 'reference') {
                    this.application.reference.splice(index + 1, 0, {});
                } else if(id == 'emergency') {
                    this.application.emergency.splice(index + 1, 0, {});
                }
            },
            removeRow: function (index, id) {
                if(id == 'language') {
                    this.application.language.splice(index, 1);
                } else if(id == 'skills') {
                    this.application.skills.splice(index, 1);
                } else if(id == 'education') {
                    this.application.education.splice(index, 1);
                } else if(id == 'course') {
                    this.application.course.splice(index, 1);
                } else if(id == 'experience') {
                    this.application.experience.splice(index, 1);
                } else if(id == 'reference') {
                    this.application.reference.splice(index, 1);
                } else if(id == 'emergency') {
                    this.application.emergency.splice(index, 1);
                }
            },
            submitForm: function (e) {
                e.preventDefault();
                this.ajaxStart(true);
                this.application.captcha_hr = grecaptcha.getResponse(this.application.captcha_hr);
                axios.post('{{ route('hr.application.create') }}', this.application)
                        .then(response => {
                            this.ajaxStart(false);
                            this.formErrors = {};
                            this.clearArray();
                            this.pnotify(response.data.message, "success");
                        }).catch(error => {
                            this.ajaxStart(false);
                            this.pnotify(error.response.data.message);
                            this.formErrors = error.response.data.message;
                });
            },
            ajaxStart: function (loading) {
                if (loading) {
                    $('#app').LoadingOverlay("show");
                } else {
                    $('#app').LoadingOverlay("hide");
                }
            },
            pnotify: function (errors, type='error') {
                var html = "<div class=\"notify\">";
                if(type=='error') {
                    html += _.map(errors, function (error, key) {
                        return "<p>" + error + "</p>";
                    }).join('');
                } else {
                    html += errors;
                }
                html += "</div>";
                PNotify.prototype.options.styling = "bootstrap3";
                new PNotify({
                    title: '{{ trans('hr::applications.title.application') }}',
                    text: html,
                    type: type
                });
            },
            addArray: function() {
                this.application = {
                    gender: 1,
                    first_name: null,
                    last_name: null,
                    nationality: 1,
                    marital: 2,
                    health: null,
                    criminal: null,
                    captcha_hr: null,
                    identity: {
                        birthdate: null,
                        blood_group: null,
                        birthplace: 6,
                        bloodgroup: ''
                    },
                    driving: {
                        type: '',
                        no: null,
                        issue_at: null
                    },
                    contact: {
                        city: 6
                    },
                    language: [
                        { lang: '' }
                    ],
                    skills: [
                        { program: '' }
                    ],
                    education: [
                        { status: '' }
                    ],
                    course: [
                        {}
                    ],
                    experience: [
                        {}
                    ],
                    reference: [
                        {}
                    ],
                    emergency: [
                        {}
                    ],
                    request: {
                        price: null,
                        work_time: '',
                        travel: '',
                        job_rotation: '',
                        department: ''
                    }
                }
            },
            clearArray: function() {
                this.application = {
                    gender: 1,
                    first_name: null,
                    last_name: null,
                    nationality: 1,
                    marital: 2,
                    health: null,
                    criminal: null,
                    captcha_hr: null,
                    identity: {
                        birthdate: null,
                        blood_group: null,
                        birthplace: 6,
                        bloodgroup: ''
                    },
                    driving: {
                        type: '',
                        no: null,
                        issue_at: null
                    },
                    contact: {
                        city: 6
                    },
                    language: [
                        { lang: '' }
                    ],
                    skills: [
                        { program: '' }
                    ],
                    education: [
                        { status: '' }
                    ],
                    course: [
                        {}
                    ],
                    experience: [
                        {}
                    ],
                    reference: [
                        {}
                    ],
                    emergency: [
                        {}
                    ],
                    request: {
                        price: null,
                        work_time: '',
                        travel: '',
                        job_rotation: '',
                        department: ''
                    }
                }
            }
        }
    });
</script>
@endpush

@push('css_inline')
<style>
    .has-error label {
        color: darkred;
    }

    fieldset {
        margin-top: 20px;
    }

    label {
        font-size: 12px;
    }

    [type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
        padding-left: 25px;
        padding-right: 5px;
    }

    .btn-floating {
        width: 30px;
        height: 30px;
        line-height: 30px;
    }

    .btn-floating i {
        line-height: 30px;
    }

    .notify {
        padding: 10px 5px 0 5px;
    }

    .notify p {
        line-height: 12px;
    }
</style>
@endpush

@push('js_inline')
{!! Captcha::setLang(locale())->scriptWithCallback(['captcha_hr']) !!}
@endpush