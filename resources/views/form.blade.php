<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')


    

</head>

<body class="bg-bg-pink min-h-screen">
   <h1 class="text-pink text-5xl font-bold text-center mt-2">GuestBookkkk</h1>www

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('guest.store')}}" method="POST"  class=" bg-white mx-36 mt-5 rounded-xl py-5 ring-1  ring-black">
        @csrf
    <div class="grid grid-cols-2 place-items-center gap-5 ">
        <div class="" >
        <label for="nama">Nama </label> <br>
        <input type="text" id="name" name="name" required class="ring-1 ring-black">
        </div>
        <div>
        <label for="address">Address </label><br>
        <input type="text" id="address" name="address" required  class="ring-1 ring-black">
    </div>
    <div>
        <label for="whatshapp">Whatsapp Number </label><br>
        <input type="number" id="whatshapp" name="whatshapp" required  class="ring-1 ring-black">
    </div>
    <div>
        <label for="email">Email </label><br>
        <input type="email" id="email" name="email" required  class="ring-1 ring-black">
    </div>
    <div>
        <label for="organization">Organization/ Agency </label><br>
        <textarea type="text" id="organization" name="organization" required  class="ring-1 ring-black px-2"></textarea>
    </div>
    <div>
        <label for="purpose">Purpose of visit </label><br>
        <textarea type="text" id="purpose" name="purpose" required  class="ring-1 ring-black  px-2"></textarea>
    </div>      
</div>
<div class="grid place-items-center ">
    <label for="ttd">TTD</label><br>
    <canvas id="ttd" name="ttd" class="signature-pad" width=400 height=200></canvas>
<input type="hidden" name="ttd" id="signature">

</div>
<div class="flex justify-center gap-5 py-10">
<button type="submit" class="bg-bg-pink  rounded-md py-2 px-10 ring-1 ring-black hover:bg-slate-400" id="save">Save</button>
<button type="submit" class="bg-bg-pink  rounded-md py-2 px-10 ring-1 ring-black hover:bg-slate-400" id="clear">clear</button>
<button type="submit" class="bg-bg-pink  rounded-md py-2 px-10 ring-1 ring-black hover:bg-slate-400" onclick="window.location.href='{{ route('index')}}'">Cancel</button>



</div>
</form>


<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var canvas = document.getElementById('ttd');
        var signaturePad = new SignaturePad(canvas);

        // Clear signature
        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });

        // Save signature
        document.getElementById('save').addEventListener('click', function () {
            if (!signaturePad.isEmpty()) {
                var signature = signaturePad.toDataURL();
                document.getElementById('signature').value = signature;
                document.querySelector('form').submit();  // Submit the form
            } else {
                alert("data cannot be empty");
            }
        });
    });
</script>

</body>
</html>