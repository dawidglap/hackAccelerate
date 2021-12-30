
<x-layouts.app
title="home page utente"
description="questae' la home page dell utente">

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <h1>home page del mio portale</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
           @foreach($articles as $article)
           <div>
               <h1>{{ $article->title }}</h1>
               <p>{{ $article->description }}</p>
               @if($article->meta)

                <p><strong>META</strong></p>
                    @foreach($article->meta as $k=>$v)
                        <p>
                            <strong>{{ $k }}</strong> : {{ $v }}
                        </p>

                    @endforeach
               @endif  
           </div>
           @endforeach
        </div>
    </div>
 </div>
</x-layouts.app>
