<!-- resources/views/livewire/image-upload.blade.php -->

<div>
    <div class="card-body text-center">
        @if ($image=='')
        <img class="img-account-profile rounded-circle mb-2" 
        src="{{ asset('storage/' . ($user->userimg ? $user->userimg : 'userimg/defaultimg.jpg'))}}"
             alt="">
        
@else       
            <img class="img-preview  rounded-circle mb-2" wire:ignore.self  style="width: 292px;"/>
        @endif

        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
        <input  class="btn btn-primary"  type="file" wire:model="image" accept="image/*"  name="image" id="image" onchange="previewImage()" >
    </div>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('image');
        var preview = document.querySelector('.img-preview');

        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
