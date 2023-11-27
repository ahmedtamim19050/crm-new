<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <span>Element</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
        </ol>
    </div>
</div>

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

            {{-- @livewire('live-lead-form',[
                'lead' => $deal ?? null,
                'generateTitle' => $generateTitle ?? true,
                'client' => $client ?? null,
                'organisation' => $organisation ?? null,
                'person' => $person ?? null
            ]) --}}


            @include('partials.form.text', [
                'name' => 'client_name',
                'label' => 'Customer',
                'value' => old('client_name', $deal->client->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'organisation_name',
                'label' => 'Organization',
                'value' => old('organisation_name', $deal->organisation->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'person_name',
                'label' => 'Contact Person',
                'value' => old('person_name', $deal->person->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'title',
                'label' => 'Title',
                'value' => old('title', $deal->title ?? null),
            ])
            @include('partials.form.textarea', [
                'name' => 'description',
                'label' => 'Description',
                'rows' => 5,
                'value' => old('description', $deal->description ?? null),
            ])

            <div class="row">

                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'reference',
                        'label' => 'Reference',
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.select', [
                        'name' => 'currency',
                        'label' => 'Currency',
                        'options' => App\Helper\SelectOptions::currencies(),
                        'value' => old('currency', $deal->currency ?? 'USD'),
                    ])
                </div>
            </div>
            <div class="row">

                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'issue_date',
                        'label' => 'Issue date',
                        'type' => 'date',
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'expiry_date',
                        'label' => 'Expiry date',
                        'type' => 'date',
                    ])
                </div>
            </div>
            @include('partials.form.textarea', [
                'name' => 'terms',
                'label' => 'Terms',
                'rows' => 5,
                'value' => old('description', $deal->description ?? null),
            ])
            @include('partials.form.select', [
                'name' => 'labels',
                'label' => 'Labels',
                'options' => $labels,
                'value' => old('labels', isset($deal) ? $deal->labels->pluck('id')->toArray() : null),
            ])

            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $deal->user_owner_id ?? auth()->user()->id),
            ])
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
