

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

            @include('partials.form.text', [
                'name' => 'name',
                'label' => 'Name',
                'value' => old('client_name', $organisation->name ?? null),
            ])
              @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                  'options' => App\Helper\SelectOptions::labels(),
                 'value' => old('labels', isset($organisation) ? $organisation->label : null),
            ])
            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $organisation->user_owner_id ?? auth()->user()->id),
            ])
                @include('partials.form.textarea', [
                    'name' => 'address',
                    'label' => 'Address',
                    'rows' => 5,
                    'value' => old('address', $organisation->address ?? null),
                ])
        </div>
    </div>
</div>