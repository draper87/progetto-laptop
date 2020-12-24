<head>

    <link href="../../css/app.css" rel="stylesheet" />

</head>


<h2>Modifica Laptop {{$laptop->name}}</h2>

<!-- inizio form -->
<form action="{{ route('laptop.update' , $laptop) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div>
        <img src="{{asset('storage') . '/' . $laptop->image_path}}" alt="">
    </div>

<!-- inizio input immagine -->
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name">Titolo</label><br>
            <input class="form-control" type="text" name="name" placeholder="Name" value="{{ isset($laptop->name)? $laptop->name : old('name')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="brand">Brand</label><br>
            <input class="form-control" type="text" name="brand" placeholder="brand" value="{{ isset($laptop->brand)? $laptop->brand : old('brand')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="material">Material</label><br>
            <input class="form-control" type="text" name="material" placeholder="Material" value="{{ isset($laptop->material)? $laptop->material : old('material')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="ram_memory">ram_memory</label><br>
            <input class="form-control" type="text" name="ram_memory" placeholder="ram_memory" value="{{ isset($laptop->ram_memory)? $laptop->ram_memory : old('ram_memory')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="motherboard">motherboard</label><br>
            <input class="form-control" type="text" name="motherboard" placeholder="motherboard" value="{{ isset($laptop->motherboard)? $laptop->motherboard : old('motherboard')}}" >
        </div>
        <div class="col-lg-6">
            <label for="network">network</label><br>
            <input class="form-control" type="text" name="network" placeholder="network" value="{{ isset($laptop->network)? $laptop->network : old('network')}}" >
        </div>
        <div class="col-lg-6">
            <label for="connections">connections</label><br>
            <input class="form-control" type="text" name="connections" placeholder="connections" value="{{ isset($laptop->connections)? $laptop->connections : old('connections')}}" >
        </div>
        <div class="col-lg-6">
            <label for="display_size">display_size</label><br>
            <input class="form-control" type="text" name="display_size" placeholder="display_size" value="{{ isset($laptop->display_size)? $laptop->display_size : old('display_size')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="storage_size">storage_size</label><br>
            <input class="form-control" type="text" name="storage_size" placeholder="storage_size" value="{{ isset($laptop->storage_size)? $laptop->storage_size : old('storage_size')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="battery">battery</label><br>
            <input class="form-control" type="text" name="battery" placeholder="battery" value="{{ isset($laptop->battery)? $laptop->battery : old('battery')}}" >
        </div>
        <div class="col-lg-6">
            <label for="weight">weight</label><br>
            <input class="form-control" type="text" name="weight" placeholder="weight" value="{{ isset($laptop->weight)? $laptop->weight : old('weight')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="max_temp">max_temp</label><br>
            <input class="form-control" type="text" name="max_temp" placeholder="max_temp" value="{{ isset($laptop->max_temp)? $laptop->max_temp : old('max_temp')}}">
        </div>
        <div class="col-lg-6">
            <label for="max_noise">max_noise</label><br>
            <input class="form-control" type="text" name="max_noise" placeholder="max_noise" value="{{ isset($laptop->max_noise)? $laptop->max_noise : old('max_noise')}}">
        </div>
        <div class="col-lg-6">
            <label for="max_noise">price</label><br>
            <input class="form-control" type="text" name="price" placeholder="price" value="{{ isset($laptop->price)? $laptop->price : old('price')}}" required>
        </div>
        <div class="col-lg-6">
            <label for="videocard_name">videocard_name</label><br>
            <input class="form-control" type="text" name="" placeholder="" value="{{ isset($laptop->videocard_name)? $laptop->videocard_name : old('videocard_name')}}" disabled>
        </div>
        <div class="col-lg-6">
            <label for="cpu_name">cpu_name</label><br>
            <input class="form-control" type="text" name="" placeholder="" value="{{ isset($laptop->cpu_name)? $laptop->cpu_name : old('cpu_name')}}" disabled>
        </div>
        <div class="col-lg-6">
            <label for="laptop_id">laptop_id</label><br>
            <input class="form-control" type="text" name="" placeholder="" value="{{ isset($laptop->laptop_id)? $laptop->laptop_id : old('laptop_id')}}" disabled>
        </div>




        <div class="col-lg-6">
            <label for="image_path">Carica immagine</label><br>
            <input type="file" name="image_path" placeholder="Image_path" accept="image/*">
        </div>
    </div>
    <!-- fine input immagine -->

    <!-- inizio button -->
    <div class="form-group row">
        <div class="offset-lg-6 col-lg-2">
            <input class="btn btn-success" type="submit" value="Invia i dati">
        </div>
    </div>

</form>

        {{-- bottone cancella --}}
<div class="offset-lg-2 col-lg-2">
        <form id="form_post"action="{{route('laptop.destroy', $laptop)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" name="" value="Elimina">Elimina</button>
        </form>
</div>

    <!-- fine button -->







