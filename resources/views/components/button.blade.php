    @props(['type' => 'primary','ref'=>'#'])

    <a {{ $attributes->merge(['class' => "btn btn-$type",'href'=>"$ref"]) }}>
        {{ $slot }}
    </a>
    
