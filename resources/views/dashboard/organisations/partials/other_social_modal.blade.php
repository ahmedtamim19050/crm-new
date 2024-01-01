<form action="{{route('other.social.url.update',$organisation)}}" method="post">
    @csrf
    @if($socialData)
    @foreach ($socialData as $index=>$socials)
    
    <div class="row">
         @foreach ($socials as $key=>$social)
         <div class="col-md-6">
             @include('partials.form.text', [
                 'name' => "meta[social][$index][$key]",
                 'label' => "Social $key",
                  'value'=>$social
                 
             ])
         </div>
         {{-- <div class="col-md-6">
             @include('partials.form.text', [
                 'name' => 'meta[social][url]',
                 'label' => 'Social Url',
             ])
         </div> --}}
         @endforeach
     </div>
     @endforeach
     @endif
     <div class="col-sm-12 d-flex justify-content-between">
        <p class="text-primary">Add other social url</p>
        <button type="button" class="btn btn-secondary btn-sm py-2" id="addColumnButton"><i
                class="fas fa-plus"></i></button>
    </div>
    <div class="row clientRow" id="">

      

    </div>

    <div class="modal-footer">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var columnCounter = {{count($socialData)}};

    $('#addColumnButton').on('click', function() {
        columnCounter += 1;

        $('.clientRow').each(function() {
            for (var i = 0; i < 1; i++) {
                $(this).append(`
                <div class="col-md-6">
                @include('partials.form.text', [
                    'name' => 'meta[social][${columnCounter}][name]',
                    'label' => 'Social name',
                ])
                </div>
                <div class="col-md-6">
                        @include('partials.form.text', [
                            'name' => 'meta[social][${columnCounter}][url]',
                            'label' => 'Social Url',
                        ])
                    </div>
                        `);

            }
        });
    });
</script>