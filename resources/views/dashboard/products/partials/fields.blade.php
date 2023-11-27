<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 " style="border-right:1px solid #dedbdb">
            @include('partials.form.text', [
                'name' => 'name',
                'label' => 'Name',
                'value' => old('name', $product->name ?? null),
            ])
            <div class="row">
                <div class="col-md-6">
                    @include('partials.form.text', [
                        'name' => 'product_code',
                        'label' => 'Product code',
                        'value' => old('product_code', $product->code ?? null),
                    ])
                </div>
                <div class="col-md-6">

                    @include('partials.form.text', [
                        'name' => 'category',
                        'label' => 'Category',
                        'value' => 1,
                    ])
                </div>
                {{-- <div class="col-md-6">
                    @include('partials.form.text', [
                        'name' => 'purchase_ac',
                        'label' => 'Purchase Account',
                        'value' => old('purchase_ac', $product->purchase_account ?? null),
                    ])

                </div>
                <div class="col-md-6">
                    @include('partials.form.text', [
                        'name' => 'sales_ac',
                        'label' => 'Sales account',
                        'value' => old('purchase_ac', $product->purchase_account ?? null),
                    ])
                </div> --}}
                @include('partials.form.textarea', [
                    'name' => 'description',
                    'label' => 'Description',
                    'rows' => 5,
                    'value' => old('description', $product->description ?? null),
                ])
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-md-6">
                    @include('partials.form.text', [
                        'name' => 'unit',
                        'label' => 'Unit',
                        'value' => old('unit', $product->unit ?? null),
                    ])
                </div>
                <div class="col-md-6">
    
                    @include('partials.form.text', [
                        'name' => 'unit_price',
                        'label' => 'Unit Price',
                        'value' => old('unit_price', $product->unit_price ?? null),
                    ])
                </div>
                <div class="col-md-6">
    
                    @include('partials.form.text', [
                        'name' => 'tax_rate',
                        'label' => 'Tax Rate',
                        'type' => 'number',
                        'value' => old('tax_rate', $product->tax_rate ?? null),
                    ])
                </div>
                <div class="col-md-6">
                    @include('partials.form.select', [
                        'name' => 'currency',
                        'label' => 'Currency',
                        'options' => App\Helper\SelectOptions::currencies(),
                        'value' => old('currency', $lead->currency ?? 'USD'),
                    ])
                </div>
                @include('partials.form.select', [
                    'name' => 'user_owner_id',
                    'label' => 'owner',
                    'options' => App\Helper\SelectOptions::users(false),
                    'value' => old('user_owner_id', $lead->user_owner_id ?? auth()->user()->id),
                ])
            </div>
        </div>
    </div>
</div>
