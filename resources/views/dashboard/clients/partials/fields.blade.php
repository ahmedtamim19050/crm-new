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


            @include('partials.form.text', [
                'name' => 'name',
                'label' => 'Name',
                'value' => old('client_name', $client->name ?? null),
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
    </div>
</div>
