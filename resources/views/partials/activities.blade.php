<div class="row">
    <div class="col-md-12">
        @include('partials.form.text', [
            'name' => 'title',
            'label' => 'Title',
        ])
    </div>
    <div class="col-md-6 mb-3">

            <label class="form-label">Form</label>
            <input type="datetime-local" class="form-control" name="form">

    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">To</label>
        <input type="datetime-local" class="form-control" name="to">
    </div>

    <div class="col-md-6">
        @include('partials.form.select',[
            'name' => 'guests[]',
            'label' => 'Guest',
            'options' => $persons,      
         
          ])
    </div>
    <div class="col-md-6">
        @include('partials.form.text', [
            'name' => 'location',
            'label' => 'Location',
        ])
    </div>
    <div class="col-md-12">
        @include('partials.form.textarea', [
            'name' => 'description',
            'label' => 'Description',
            'rows' => 5,
        ])
    </div>
</div>